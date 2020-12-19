from datetime import datetime, timedelta
import random

sdate = datetime(2019, 1, 1, 00, 0, 00)
edate = datetime(2020, 12, 2, 23, 0 , 00) 
tempint = 20.00
humint = 50.00
delta = edate - sdate     

def temp(): 
    way = random.randint(0, 1)
    if way:
        newtemp = tempint + random.uniform(0, 4)
    else:
        newtemp = tempint - random.uniform(0, 4)
    return round(newtemp, 1)
def hum():

    way = random.randint(0, 1)
    if way:
        newhum = humint + random.uniform(0, 15)
    else:
        newhum = humint - random.uniform(0, 15)
    return round(newhum, 1)
def write(query):
    sql_file = open('RaspBerry/SQL/longrandom.sql','a')
    sql_file.write(query)
def daterange(start_date, end_date):
    delta = timedelta(hours=1)
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
