<?php
// Retrieve POST data from the form submission
$UNITCODE = $_POST['UNITCODE'];
$UNITNAME = $_POST['UNITNAME'];

// Create a new MySQLi connection to the database
$con = new mysqli("localhost", "root", "", "BSE");

// Check if the connection to the database was successful
if ($con->connect_error) {
    // If the connection failed, stop the script and print the error
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL query to insert the data into the UNIT table
$sql = "INSERT INTO UNIT (UNITCODE, UNITNAME) VALUES ('$UNITCODE', '$UNITNAME')";

// Execute the SQL query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    // If the query was successful, output a JavaScript alert and redirect to 1register.php
    echo "<script>
            alert('Record successfully added');
            window.location.href = '1sql.html';
          </script>";
} else {
    // If there was an error with the query, print the error
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>