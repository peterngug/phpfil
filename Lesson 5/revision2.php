<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$DisplayName = $_POST['DisplayName']; // Remove space in the key
$Email = $_POST['Email'];
$gender = $_POST['gender'];

$con = new mysqli("localhost", "root", "", "BSE");

if ($con->connect_error) { // Correct property name
    die("Connection failed: " . $con->connect_error);
}

// Use underscores instead of spaces in column names
$sql = "INSERT INTO Login_detail (Username, Password, Display Name, Email, gender) VALUES ('$Username', '$Password', '$DisplayName', '$Email', '$gender')";
$result = $con->query($sql);

if ($result) {
    echo "<script>
    alert('Record has been added successfully');
    window.location.href = 'revision2.html';
    </script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>