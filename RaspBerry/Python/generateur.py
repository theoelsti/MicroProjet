import time
import random
import mysql.connector
from datetime import datetime, timedelta
empty="TRUNCATE TABLE `pimeteo`;"
DB_SERVER ='localhost' 
DB_USER='root'     
DB_PWD='root'          
DB_BASE='releves'  

sdate = datetime(2020, 7, 14, 00, 0, 00)
edate = datetime(2021, 1, 7, 23, 0, 00) 
tempint = 20.00
humint = 50.00
resint = 21.00
delta = edate - sdate   

def reset_file():
     sql_file = open('random.sql','w')
     #sql_file.write(" ")
     sql_file.close
def temp():
    way = random.randint(0, 1)
    if way:
        newtemp = tempint + random.uniform(0, 10)
    else:
        newtemp = tempint - random.uniform(0, 10)
    return round(newtemp, 1)
def res():
    way = random.randint(0, 1)
    if way:
        newres = resint + random.uniform(0, 10)
    else:
        newres = resint - random.uniform(0, 10)
    return round(newres, 1)
def hum():
    way = random.randint(0, 1)
    if way:
        newhum = humint + random.uniform(0, 20)
    else:
        newhum = humint - random.uniform(0, 20)
    return round(newhum, 1)

#def write(query):
    #sql_file = open('../SQL/random.sql','a')
    #sql_file.write(query)
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
def daterange(start_date, end_date):
    delta = timedelta(minutes=10)
    while start_date < end_date:
        yield start_date
        start_date += delta
def generate():
    for single_date in daterange(sdate, edate):
        timestamp =single_date.strftime('%Y-%m-%d %H:%M:%S')
        query = """INSERT INTO pimeteo (date, temp, hum, res) VALUES ('%s','%s','%s', '%s');
                """ % (timestamp,temp() ,hum(), res() )
        query_db(query)
def setup():
    #reset_file()
    empty_base()
    generate()
setup()
