import mysql.connector  # Importing the MySQL connector module
import tkinter as tk    # Importing tkinter module
from tkinter import *   # Importing all classes and functions from tkinter

# Creating a tkinter window
my_w = tk.Tk()
my_w.geometry("400x250")

# Establishing a connection to the MySQL server with specified database
my_connect = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="kyu"
)

# Creating a cursor object to interact with the database
my_conn = my_connect.cursor()

# Executing a SQL query to select the first 10 rows from the "unit" table
my_conn.execute("SELECT * FROM unit")

i = 0  # Counter for row index
# Iterating over each row fetched from the database
for data in my_conn:
    # Iterating over each column value in the fetched row
    for j in range(len(data)):
        # Creating an Entry widget for each column value and placing it in the window
        e = Entry(my_w, width=40, fg='blue')
        e.grid(row=i, column=j)
        # Inserting the column value into the Entry widget
        e.insert(END, data[j])
    i += 1  # Incrementing the row index

my_w.mainloop()  # Running the tkinter event loop to display the window