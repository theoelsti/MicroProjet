import mysql.connector
oldTime = ""
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="releves"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT date FROM pimeteo")

myresult = mycursor.fetchall()
dates = [] 
for x in myresult:
    for d in x:
        if(oldTime != str(d)[0:10]):
            tempshum = mycursor.execute("SELECT temp, hum FROM pimeteo where date like \"%" + str(d)[0:10] + "%\";")
            tempshum = mycursor.fetchall()
           
            for d in tempshum:
                print(d[0])

            dates.append(str(d)[0:10])
        oldTime = str(d)[0:10]
print(len(dates))