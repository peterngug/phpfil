<?php
// Retrieve POST data from the form submission
$IDNUMBER = $_POST['IDNUMBER'];
$NAME = $_POST['NAME'];
$DATEOFCOMING = $_POST['DATEOFCOMING'];

// Create a new MySQLi connection to the database
$con = new mysqli("localhost", "root", "", "BSE");

// Check if the connection to the database was successful
if ($con->connect_error) {
    // If the connection failed, stop the script and print the error
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL query to insert the data into the new table (assuming a table named ATTENDANCE for storing the information)
$sql = "INSERT INTO Registration (IDNUMBER, NAME, DATEOFCOMING) VALUES ('$IDNUMBER', '$NAME', '$DATEOFCOMING')";

// Execute the SQL query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    // If the query was successful, output a JavaScript alert and redirect to 2date.php
    echo "<script>
            alert('Record successfully added');
            window.location.href = 'id_name.html';
          </script>";
} else {
    // If there was an error with the query, print the error
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>