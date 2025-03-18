import mysql.connector
from faker import Faker 
import random

f = Faker()
dataBase = mysql.connector.connect(
host ="localhost",
user ="root",
passwd ="1974",
database = "iraq"
)


cursorObject = dataBase.cursor()

for i in range(200):
    sql = "INSERT INTO  person(paname , page,befit, note)\
    VALUES (%s,%s, %s,%s)"
    val = (f.name(),random.randint(10,70), 300 , "this is my oop") 
    cursorObject.execute(sql, val)
    dataBase.commit()