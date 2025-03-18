# importing required libraries
import mysql.connector
from faker import Faker
import os
f = Faker()
def clearscreen():
    """this function for the clear screen"""
    os.system("clear")

dataBase = mysql.connector.connect(
host ="localhost",
user ="root",
passwd ="1974",
database="school_system"
)
cursorObject = dataBase.cursor()





class Menu:
    def Menu1(self):
        print("\n\n")
        choice1 = input("""
welcome in school managment system
----------------------                       
1-search for student 
2-Student grade                       
3-add student
4-get student account
5-show all student in specafic level
6-delete student 
7-add techer 
8-get techer details
9-delete techer
10-modify student

----------------------input:""")
        return choice1
    
class Student:
    st_id = 0
    def search(self):
        try:
            sname = input("Enter Student Name:")
            cursorObject.execute(f"""select * from student where sname="{sname}" """)
            c = cursorObject.fetchone()
            self.st_id = c[0]
            print("---------------------------")

            print(f"Student ID:{c[0]}")
            print(f"Student Name:{c[1]}")
            print(f"Student DOB:{c[2]}")
            print(f"Student level:{c[3]}")
            print(f"Student disabality:{bool(c[4])}")
        except:
            print("The name you inserted is not exist!")

    def getgrade(self):
        try:
            sname = input("Enter Student Name:")
            cursorObject.execute(f"""select sid from student where sname="{sname}" """)
            c = cursorObject.fetchone()
            sid = c[0]
            cursorObject.execute(f"""select * from grade where sid={sid}""")
            grade = cursorObject.fetchone()
            print(f"Mathmatic:{grade[2]} , Arabic:{grade[3]} , English:{grade[4]}")
            print(f"Physics:{grade[5]} , History:{grade[6]} , Chemestry:{grade[7]}")
        except:
            print("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
            print("The name you inserted is not exist!")

        cursorObject.execute(f"""select * from student_account""")

    def add_student(self):

        sname = input("Enter Student Name:")
        sdob = input("Enter Student dob(yy-mm-dd):")
        slevel = input("Enter Student level:")
    
        sql = "INSERT INTO student (sname, sdob, slevel)\
        VALUES ( %s, %s, %s)"
        val = (sname, sdob, slevel)
        cursorObject.execute(sql, val)
        dataBase.commit()
        print("added succesfully")


        cursorObject.execute(f"""select sid from student where sname="{sname}" """)
        fetch = cursorObject.fetchone()
        sid = fetch[0]

        sphone = input("Enter student Phone:")
        semail = input("Enter student Email:")
        sql = "INSERT INTO student_account (sid, susername, spasswd, sphone, semail)\
        VALUES (%s, %s, %s, %s, %s)"
        val = (sid,f.user_name(),f.password(),sphone,semail)  
        cursorObject.execute(sql, val)
        dataBase.commit()
        print("The student is has been added")
    def get_by_level(self):
        level = input("Enter the level you want:")
        cursorObject.execute(f"""select * from student where slevel="{level}" """)
        student = cursorObject.fetchall()
        for i in student:
            print(i)
     

    def get_student_account(self):
        try:
            sname = input("Enter student name:")
            cursorObject.execute(f"""select sid from student where sname="{sname}" """)
            fetch = cursorObject.fetchone()
            sid = fetch[0]

            cursorObject.execute(f"""select * from student_account where sid={sid} """)
            fetch = cursorObject.fetchone()
            print("---------------------------")
            print(f"Student ID:{fetch[0]}")
            print(f"seq id:{fetch[1]}")
            print(f"Student username:{fetch[2]}")
            print(f"Student passwd:{fetch[3]}")
            print(f"Student phone:{fetch[4]}")
            print(f"Student email:{fetch[5]}")
        except:
            print("The name you inserted is not exist!")
    def delete_student(self):
        try:

            sname = input("Enter Student name to delete:")
            cursorObject.execute(f"""select sid from student where sname="{sname}" """)
            fetch = cursorObject.fetchone()
            sid = fetch[0]
            cursorObject.execute(f"""delete from student where sid={sid}""")
            cursorObject.execute(f"""delete from student_account where sid={sid}""")
            cursorObject.execute(f"""delete from grade where sid={sid}""")
            dataBase.commit()
            print("The student has been delete from database:")
        except:
            print("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
            print("The name you inserted is not exist!")

 
    
class Techer:
    def add_techer(self):
        
        tname = input("Enter Techer Name:")
        tdob = input("Enter Techer dob(yy-mm-dd):")
        tyears = input("Enter Techer years work:")
        tspec = input("Enter Techer specalist:")
        sql = "INSERT INTO techer (tname, tdob, tyears,tspec)\
        VALUES ( %s, %s, %s,%s)"
        val = (tname, tdob, tyears,tspec)
        cursorObject.execute(sql, val)
        dataBase.commit()
        print("added succesfully")
        cursorObject.execute(f"""select tid from techer where tname="{tname}" """)
        fetch = cursorObject.fetchone()
        tid = fetch[0]
        sphone = input("Enter techer Phone:")
        semail = input("Enter techer Email:")
        sql = "INSERT INTO techer_account (tid, tusername, tpasswd, tphone, temail)\
        VALUES (%s, %s, %s, %s, %s)"
        val = (tid,f.user_name(),f.password(),sphone,semail)  
        cursorObject.execute(sql, val)
        dataBase.commit()
        print("The techer is has been added")

    def delete_techer(self):
        try:
            tname = input("Enter techer name to delete:")
            cursorObject.execute(f"""select tid from techer where tname="{tname}" """)
            fetch = cursorObject.fetchone()
            tid = fetch[0]
            cursorObject.execute(f"""delete from techer where tid={tid}""")
            cursorObject.execute(f"""delete from techer_account where tid={tid}""")
            dataBase.commit()
            print("The techer has been delete from database:")
        except:
            print("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
            print("The name you inserted is not exist!")
    def get_techer_detalis(self):
        try:
            tname = input("Enter techer Name:")
            cursorObject.execute(f"""select * from techer where tname="{tname}" """)
            c = cursorObject.fetchone()
            print("Techer detalis")
            print("---------------------------")
            print(f"Techer ID:{c[0]}")
            print(f"Techer Name:{c[1]}")
            print(f"Techer DOB:{c[2]}")
            print(f"Techer years:{c[3]}")
            print(f"Techer specalist:{c[4]}")
            print('\n')
            print("Techer Account Details")
           
            cursorObject.execute(f"""select tid from techer where tname="{tname}" """)
            fetch = cursorObject.fetchone()
            tid = fetch[0]

            cursorObject.execute(f"""select * from techer_account where tid={tid} """)
            fetch = cursorObject.fetchone()
            print("---------------------------")
            print(f"Techer ID:{fetch[0]}")
            print(f"seq id:{fetch[1]}")
            print(f"Techer username:{fetch[2]}")
            print(f"Techer passwd:{fetch[3]}")
            print(f"Techer phone:{fetch[4]}")
            print(f"Techer email:{fetch[5]}")

        except:
            print("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
            print("The name you inserted is not exist")
class Admin:
    
    def modifyStudent(self):
        try:  
            sname = input("Enter Student name:")
            cursorObject.execute(f"""select * from student where sname="{sname}" """)
            fetch = cursorObject.fetchone()
            sid  = fetch[0]
            ask = input("modify student details or student account info(1 or 2):")
            if ask == '1':
                print("---------------------------")
                print(f"Student ID:{fetch[0]}")
                print(f"1-Student Name:{fetch[1]}")
                print(f"2-Student DOB:{fetch[2]}")
                print(f"3-Student level:{fetch[3]}")
                ask2 = input("Which info do you want to change(1-4)?:")
                if ask2 == '1':
                    newdata = input("Enter new name:")
                    cursorObject.execute(f"""update student set sname="{newdata}" where sid={sid} """)
                    dataBase.commit()
                    print("The name has been changed successfully")
                elif ask2 == '2':
                    newdob = input("Enter new dob(yy-mm-dd):")
                    cursorObject.execute(f"""update student set sdob="{newdob}" where sid={sid} """)
                    dataBase.commit()
                    print("The dob has been changed successfully")
                elif ask2 == '3':
                    newlevel = input("Enter new level:")
                    cursorObject.execute(f"""update student set slevel="{newlevel}" where sid={sid} """)
                    dataBase.commit()
                    print("The level has been changed successfully")
            elif ask == '2':
                cursorObject.execute(f"""select * from student_account where sid={sid} """)
                fetch = cursorObject.fetchone()
                print("---------------------------")
                print(f"Student ID:{fetch[0]}")
                print(f"seq id:{fetch[1]}")
                print(f"1-Student username:{fetch[2]}")
                print(f"2-Student passwd:{fetch[3]}")
                print(f"3-Student phone:{fetch[4]}")
                print(f"4-Student email:{fetch[5]}")
                ac = input("Select number data to modify(1-4):")
                if ac == '1':
                    newdata = input("Enter new username:")
                    cursorObject.execute(f"""update student_account set susername="{newdata}" where sid={sid} """)
                    dataBase.commit()
                    print("The username has been changed successfully")
                elif ac == '2':
                    newpass = input("Enter new passwd:")
                    cursorObject.execute(f"""update student_account set spasswd="{newpass}" where sid={sid} """)
                    dataBase.commit()
                    print("The passwd has been changed successfully")
                elif ac == '3':
                    newphone = input("Enter new phone:")
                    cursorObject.execute(f"""update student_account set sphone="{newphone}" where sid={sid} """)
                    dataBase.commit()
                    print("The phone number has been changed successfully")
               
                elif ac == '4':
                    newemail = input("Enter new email:")
                    cursorObject.execute(f"""update student_account set semail="{newemail}" where sid={sid} """)
                    dataBase.commit()
                    print("The email has been changed successfully")
                
                

        except:
            print("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
            print("The name you inserted is not exist!")



            
class Start:
   def __init__(self):
        self.student = Student()
        self.techer = Techer()
        self.menu = Menu()
        self.admin = Admin()


   def begin(self):
       
        choices = self.menu.Menu1()
        if choices == '1':
            clearscreen()
            self.student.search()
        elif choices == '2':
            clearscreen()
            self.student.getgrade()
        elif choices =='3':
            clearscreen()
            self.student.add_student()
        elif choices == '4':
            clearscreen()
            self.student.get_student_account()
        elif choices == '5':
            clearscreen()
            self.student.get_by_level()
        elif choices == '6':
            clearscreen()
            self.student.delete_student()
        elif choices == '7':
            clearscreen()
            self.techer.add_techer()
        elif choices== '8':
            clearscreen()
            self.techer.get_techer_detalis()
        elif choices == '9':
            clearscreen()
            self.techer.delete_techer()
        elif choices == '10':    
            clearscreen()
            self.admin.modifyStudent()
      
        else:
            print("inviled choice try again")

        
    
# Disconnecting from the server


Ridha = Start()
Ridha.begin()

dataBase.close()



