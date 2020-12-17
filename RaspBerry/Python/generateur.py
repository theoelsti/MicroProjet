import time
import random
import mysql.connector

empty="TRUNCATE TABLE `pimeteo`;"
DB_SERVER ='127.0.0.1' 
DB_USER='root'     
DB_PWD='root'          
DB_BASE='releves'  

tempint = 20.00
humint = 50.00

def reset_file():
     sql_file = open('./RaspBerry/SQL/random.sql','w')
     sql_file.write(" ")
     sql_file.close
def temp():
    way = random.randint(0, 1)
    if way:
        newtemp = tempint + random.uniform(0, 0.9)
    else:
        newtemp = tempint - random.uniform(0, 0.9)
    return round(newtemp, 1)
def hum():

    way = random.randint(0, 1)
    if way:
        newhum = humint + random.uniform(0, 3)
    else:
        newhum = humint - random.uniform(0, 3)
    return round(newhum, 1)
def write(query):
    sql_file = open('./RaspBerry/SQL/random.sql','a')
    sql_file.write(query)
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
        print("SQL query error")
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
def generate(nb):
    for i in range(nb):
        datebuff = time.strftime('%Y-%m-%d %H:%M:%S')
        query = """INSERT INTO pimeteo (date, temp, hum) VALUES ('%s','%s','%s');
            """ % (datebuff,temp() ,hum() )
        write(query)
        query_db(query)
        time.sleep(1)
def setup(nb):
    reset_file()
    empty_base()
    generate(nb)
generatenumber = int(input("Combien de valeurs souhaitez vous générer ? "))
setup(generatenumber)
