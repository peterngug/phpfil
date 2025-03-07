import mysql.connector  # Import MySQL connector module

# Connect to MySQL Server (Make sure XAMPP MySQL is running)
conn = mysql.connector.connect(
    host="localhost",  # MySQL server hostname
    user="root",  # MySQL root user (default in XAMPP)
    password=""   # Default XAMPP has no password
)

cursor = conn.cursor()  # Create a cursor object to execute SQL queries

# Create database 'kyu' if it does not exist
cursor.execute("CREATE DATABASE IF NOT EXISTS kyu")

# Connect to the 'kyu' database
conn.database = "kyu"

# Create table 'unit' if it does not exist
cursor.execute("""
CREATE TABLE IF NOT EXISTS unit (
    UNITCODE VARCHAR(10) PRIMARY KEY,  # UNITCODE is the primary key
    UNITNAME VARCHAR(255) NOT NULL  # UNITNAME must have a value
)
""")

# SQL query to insert records into the 'unit' table
query = "INSERT INTO unit (UNITCODE, UNITNAME) VALUES (%s, %s)"
data = [
    ("SSE2304", "Server Side Programming"),  # First record
    ("SSE2307", "Embedded System")  # Second record
]

try:
    cursor.executemany(query, data)  # Execute multiple insert queries
    conn.commit()  # Commit the transaction
    print("Records inserted successfully.")
except mysql.connector.IntegrityError:
    print("Records already exist.")  # Handle duplicate entries

# Close the cursor and connection
cursor.close()
conn.close()