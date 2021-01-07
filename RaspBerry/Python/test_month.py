import mysql.connector
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
        print("SQL query error")


def all():
    print(query_db("SELECT * FROM pimeteo;"))
if __name__ == "__main__":
    all()