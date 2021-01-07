import mysql.connector
oldTime = ""
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="releves"
)
def _sum(arr):  
    sum=0
    for i in arr: 
        sum = sum + i 
mycursor = mydb.cursor()

mycursor.execute("SELECT date FROM pimeteo")

myresult = mycursor.fetchall()
dates = [] 
tempsum = 0
for x in myresult:
    for d in x:
        temps = [] 
        if(oldTime != str(d)[0:10]):
            tempshum = mycursor.execute("SELECT temp FROM pimeteo where date like \"%" + str(d)[0:10] + "%\";")
            tempshum = mycursor.fetchall()
            length = len(tempshum)
            
            for d in tempshum:
                tempsum += float(d[0])
            print(tempsum / length)
            
        dates.append(str(d)[0:10])
        oldTime = str(d)[0:10]
    tempsum = 0
print(len(dates))