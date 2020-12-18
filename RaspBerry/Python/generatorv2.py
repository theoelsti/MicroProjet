from datetime import datetime, timedelta
import random

sdate = datetime(2019, 1, 1, 00, 1, 00)
edate = datetime(2020, 12, 2, 23, 2, 40) 
tempint = 20.00
humint = 50.00
delta = edate - sdate     

def temp():
    way = random.randint(0, 1)
    if way:
        newtemp = tempint + random.uniform(0, 1.5)
    else:
        newtemp = tempint - random.uniform(0, 1.5)
    return round(newtemp, 1)
def hum():

    way = random.randint(0, 1)
    if way:
        newhum = humint + random.uniform(0, 5)
    else:
        newhum = humint - random.uniform(0, 5)
    return round(newhum, 1)
def write(query):
    sql_file = open('RaspBerry/SQL/longrandom.sql','a')
    sql_file.write(query)

def daterange(start_date, end_date):
    delta = timedelta(seconds=10)
    while start_date < end_date:
        yield start_date
        start_date += delta

def generate():

    for single_date in daterange(sdate, edate):
        timestamp =single_date.strftime('%Y-%m-%d %H:%M:%S')
        query = """INSERT INTO pimeteo (date, temp, hum) VALUES ('%s','%s','%s');
                """ % (timestamp,temp() ,hum() )
        write(query)
generate()
