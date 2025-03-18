# importing required libraries
import mysql.connector



dataBase = mysql.connector.connect(
host ="localhost",
user ="root",
passwd ="1974",
database = "school_system"
)

# Disconnecting from the server

def getages():
    return(f"{random.randint(1980,1999)}-{random.randint(1,12)}-{random.randint(1,31)}")


def getpass():
    return(f"{random.randint(0,20)}{random.randint(0,20)}{random.randint(0,20)}{random.randint(0,20)}{random.randint(0,20)}")

def getspec():
    lis = ["Arabic","English","Mathmatic","History","physics","chemestry"]
    return(random.choice(lis))

def getgrade():
    return(random.randint(50,100))


cursorObject = dataBase.cursor()

for i in range(22,41):
    sql = "INSERT INTO  grade(sid,mathmatic,arabic,english,physics,history,chemestry)\
    VALUES (%s,%s,%s,%s,%s,%s,%s)"
    val = (i,getgrade(),getgrade(),getgrade(),getgrade(),getgrade(),getgrade()) 
    cursorObject.execute(sql, val)
    dataBase.commit()



dataBase.close()
