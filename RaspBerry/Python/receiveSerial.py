import serial
import time
import mysql.connector
from time import sleep
ser = serial.Serial('/dev/ttyACM0',9600, timeout=1)
ser.flush()
empty="TRUNCATE TABLE `pimeteo`;"
#--------------------------#
#----Gestion Base Mysql----#
#--------------------------#
DB_SERVER ='127.0.0.1' 
DB_USER='root'     
DB_PWD='root'          
DB_BASE='releves'     
def empty_base():
    try:
        db = mysql.connector.connect(
            host = DB_SERVER, 
            user = DB_USER, 
            password = DB_PWD, 
            database = DB_BASE) #Connexion
        cursor = db.cursor() #Curseur
        cursor.execute(empty) #On envoie la requete et on ferme
        db.commit()
        db.close()
    except:
        print("SQL table reset error")
def query_db(sql):
    db = mysql.connector.connect(
        host = DB_SERVER, 
        user = DB_USER, 
        password = DB_PWD, 
        database = DB_BASE) #Connexion
    cursor = db.cursor() #Curseur
    cursor.execute(sql) #On envoie la requete et on ferme
    db.commit()
    db.close()
    

def tempget():
    datebuff = time.strftime('%Y-%m-%d %H:%M:%S')
    line = ser.readline().decode('utf-8').rstrip()
    data = line.split(':')
    query_db("""INSERT INTO pimeteo (date, temp, hum, res) VALUES ('%s','%s','%s','%s');""" % (datebuff, data[0], data[1], data[2]))
    
#On crée la table si elle n'existe pas
query_db("""CREATE TABLE IF NOT EXISTS pimeteo (`date` datetime NOT NULL,
              temp decimal(3,1) NOT NULL, 
              hum decimal(4,1) NOT NULL, 
              res decimal(3,1) NOT NULL);""")

try:
 ok = True
 while ok:
     if ser.in_waiting>0:
         tempget()
         sleep(2)
         
except KeyboardInterrupt:
    print("adios.")
    exit()
