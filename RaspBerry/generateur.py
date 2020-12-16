import time
import random
tempint = 20.00
humint = 50.00
def temp():

    way = random.randint(0, 1)
    if way:
        newtemp = tempint + random.uniform(0, 0.5)
    else:
        newtemp = tempint - random.uniform(0, 0.5)
    return newtemp

def hum():

    way = random.randint(0, 1)
    if way:
        newhum = humint + random.uniform(0, 3)
    else:
        newhum = humint - random.uniform(0, 3)
    return newhum
def generate(nb):
    for i in range(nb):
        datebuff = time.strftime('%Y-%m-%d %H:%M:%S')
        query = """INSERT INTO pimeteo (date, temp, hum) VALUES ('%s','%s','%s');
            """ % (datebuff,temp() ,hum() )
        print(query)
        time.sleep(10)
generate(1)