import serial
import time
import mysql.connector
from time import sleep
ser = serial.Serial('/dev/ttyACM0',9600, timeout=1)
ser.flush()

#--------------------------#
#----Gestion Base Mysql----#
DB_SERVER ='127.0.0.1' 
DB_USER='root'     
DB_PWD='root'          
DB_BASE='releves'     

def query_db(sql):
    try:
        db = mysql.connector.connect(
            host = DB_SERVER, 
            user = DB_USER, 
            password = DB_PWD, 
            database = DB_BASE) #Connexion
        cursor = db.cursor() #Curseur
        cursor.execute(sql) #On envoie la requete et on ferme
        db.commit()
        db.close()
    except:
        print("Erreur lors de la requete")

def tempget():
    datebuff = time.strftime('%Y-%m-%d %H:%M:%S')
    line = ser.readline().decode('utf-8').rstrip()
    data = line.split(':')
    jsonPayload = "{" + '"hum":'+ data[0] + ',"temp":'+ data[1] + "}" 
    print(jsonPayload)
    query_db("""INSERT INTO pimeteo (date, temp, hum) VALUES ('%s','%s','%s');
         """ % (datebuff, data[1], data[0]))
    print("La requete sql a bien été envoyée.")
         
#On crée la table si elle n'existe pas
query_db("""CREATE TABLE IF NOT EXISTS pimeteo (`date` datetime NOT NULL,
              temp decimal(3,1) NOT NULL, hum decimal(3,1) NOT NULL) ;""")
try:
 ok = True
 while ok:
     if ser.in_waiting>0:
         tempget()
         sleep(60)
         
except KeyboardInterrupt:
    print("adios.")
    exit()
