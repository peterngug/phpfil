import mysql.connector  # Importing the MySQL connector module
import tkinter as tk    # Importing tkinter module
from tkinter import *   # Importing all classes and functions from tkinter

# Function to save data to the database
def save_data():
    unit_code = entry_unit_code.get()  # Get the value from UNITCODE Entry widget
    unit_name = entry_unit_name.get()  # Get the value from UNITNAME Entry widget
    
    # Insert data into the database
    my_conn.execute("INSERT INTO unit (UNITCODE, UNITNAME) VALUES (%s, %s)", (unit_code, unit_name))
    my_connect.commit()  # Committing the transaction to the database
    
    # Clear the Entry widgets after saving
    entry_unit_code.delete(0, 'end')
    entry_unit_name.delete(0, 'end')

# Creating a tkinter window
my_w = tk.Tk()
my_w.geometry("600x400")

# Establishing a connection to the MySQL server with specified database
my_connect = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="kyu"
)

# Creating a cursor object to interact with the database
my_conn = my_connect.cursor()

# Labels for column headings
Label(my_w, width=30, text='UNITCODE', borderwidth=2, relief='ridge', anchor='w', bg='yellow').grid(row=0, column=0)
Label(my_w, width=30, text='UNITNAME', borderwidth=2, relief='ridge', anchor='w', bg='yellow').grid(row=0, column=1)

# Entry widgets for user input
entry_unit_code = Entry(my_w, width=35, fg='blue')
entry_unit_code.grid(row=1, column=0)
entry_unit_name = Entry(my_w, width=35, fg='blue')
entry_unit_name.grid(row=1, column=1)

# Button to save data
save_button = Button(my_w, text="Save", command=save_data)
save_button.grid(row=2, columnspan=2)

# Display existing data from the database
i = 3
my_conn.execute("SELECT * FROM unit LIMIT 10")
for student in my_conn:
    for j in range(len(student)):
        e = Entry(my_w, width=35, fg='blue')
        e.grid(row=i, column=j)
        e.insert(END, student[j])
    i += 1

my_w.mainloop()  # Running the tkinter event loop to display the window