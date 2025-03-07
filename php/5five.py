import mysql.connector  # Importing the MySQL connector module

# Establishing a connection to the MySQL server with specified database
mydb = mysql.connector.connect(host="localhost", user="root", passwd="", database="kyu")

# Creating a cursor object to interact with the database
mycursor = mydb.cursor()

# Executing a SQL query to select the first row from the "Unit" table
mycursor.execute("Select * from Unit")

# Fetching the first row from the executed query and storing it in the variable GEORGE
GEORGE = mycursor.fetchone()

# Iterating over each element in the fetched row and printing it
for i in GEORGE:
    print(i)