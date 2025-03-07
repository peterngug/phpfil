from tkinter import *

# Define the login function
def login():
    # Get form data
    uname = username.get()
    pwd = password.get()
    
    # Apply empty validation
    if uname == '' or pwd == '':
        message.set("Fill the empty field!!!")
    else:
        # Check if username and password are correct
        if uname == "peter muriithi" and pwd == "2p0e0t5erM":
            message.set("Login success")
        else:
            message.set("Wrong username or password!!!")

# Define the login form function
def Loginform():
    global login_screen
    login_screen = Tk()
    
    # Set title of screen
    login_screen.title("Login Form")
    
    # Set height and width of screen
    login_screen.geometry("300x250")
    
    # Declare variables
    global message
    global username
    global password
    username = StringVar()
    password = StringVar()
    message = StringVar()
    
    # Create layout of login form
    Label(login_screen, width="300", text="Please enter details below", bg="orange", fg="white").pack()
    
    # Username Label
    Label(login_screen, text="Username * ").place(x=20, y=40)
    # Username textbox
    Entry(login_screen, textvariable=username).place(x=90, y=42)
    
    # Password Label
    Label(login_screen, text="Password * ").place(x=20, y=80)
    # Password textbox
    Entry(login_screen, textvariable=password, show="*").place(x=90, y=82)
    
    # Label for displaying login status [success/failed]
    Label(login_screen, text="", textvariable=message).place(x=95, y=100)
    
    # Login button
    Button(login_screen, text="Login", width=10, height=1, bg="orange", command=login).place(x=105, y=130)
    
    login_screen.mainloop()

# Call the Loginform function
Loginform()