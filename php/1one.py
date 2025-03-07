import mysql.connector  # Importing the MySQL connector module
# Establishing a connection to the MySQL server
mydb = mysql.connector.connect(host="localhost", user="root", passwd="")

# Creating a cursor object to interact with the database
mycursor = mydb.cursor()

# Executing a SQL query to show all databases
mycursor.execute("show databases")

# Iterating over the result set and printing each database name
for i in mycursor:
    print(i)
    