import mysql.connector  # Importing the MySQL connector module
import tkinter as tk    # Importing tkinter module
from tkinter import *   # Importing all classes and functions from tkinter

# Function to search data in the database
def search_data():
    unit_code = entry_search.get()  # Get the value from UNITCODE search Entry widget
    my_conn.execute("SELECT * FROM unit WHERE UNITCODE = %s", (unit_code,))
    result = my_conn.fetchone()
    
    # Clear the existing data in the display
    for widget in frame_display.winfo_children():
        widget.destroy()
    
    if result:
        # Display result in labels
        Label(frame_display, text='UNITCODE:', font=('Arial', 12, 'bold')).grid(row=0, column=0, padx=10, pady=5)
        Label(frame_display, text=result[0], font=('Arial', 12)).grid(row=0, column=1, padx=10, pady=5)
        Label(frame_display, text='UNITNAME:', font=('Arial', 12, 'bold')).grid(row=1, column=0, padx=10, pady=5)
        Label(frame_display, text=result[1], font=('Arial', 12)).grid(row=1, column=1, padx=10, pady=5)
    else:
        Label(frame_display, text='No record found', font=('Arial', 12, 'bold'), fg='red').grid(row=0, column=0, columnspan=2, padx=10, pady=5)

# Function to clear search field and result
def clear_search():
    entry_search.delete(0, 'end')  # Clear search input
    for widget in frame_display.winfo_children():
        widget.destroy()  # Clear displayed result

# Creating a tkinter window
my_w = tk.Tk()
my_w.geometry("500x300")
my_w.title("Unit Search")

# Establishing a connection to the MySQL server with specified database
my_connect = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="kyu"
)

# Creating a cursor object to interact with the database
my_conn = my_connect.cursor()

# Frame for search input
frame_search = Frame(my_w)
frame_search.pack(pady=10)

Label(frame_search, text="Enter UNITCODE:", font=('Arial', 12, 'bold')).grid(row=0, column=0, padx=10, pady=5)
entry_search = Entry(frame_search, width=20, font=('Arial', 12))
entry_search.grid(row=0, column=1, padx=10, pady=5)

# Search button
btn_search = Button(frame_search, text="Search", font=('Arial', 12), command=search_data)
btn_search.grid(row=0, column=2, padx=10, pady=5)

# Clear button
btn_clear = Button(frame_search, text="Clear", font=('Arial', 12), command=clear_search)
btn_clear.grid(row=0, column=3, padx=10, pady=5)

# Frame for displaying search result
frame_display = Frame(my_w)
frame_display.pack(pady=20)

my_w.mainloop()  # Running the tkinter event loop to display the window