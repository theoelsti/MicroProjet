import time
import random

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
def generate(nb):
    for i in range(nb):
        datebuff = time.strftime('%Y-%m-%d %H:%M:%S')
        query = """INSERT INTO pimeteo (date, temp, hum) VALUES ('%s','%s','%s');
            """ % (datebuff,temp() ,hum() )
        write(query)
       
        time.sleep(1)
def setup(nb):
    reset_file()
    generate(nb)
generatenumber = int(input("Combien de valeurs souhaitez vous générer ? "))
setup(generatenumber)
