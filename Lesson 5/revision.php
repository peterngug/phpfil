<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$male = $_POST['Male'];
$female = $_POST['Female'];
$address = $_POST['address'];
$email = $_POST['email'];

$con = new mysqli("localhost", "root", "", "BSE");

if ($con->connect_error) {
   die("Connection failed:" . $con->connect_error);
}
 $sql = "INSERT INTO ADRESS (first_name ,last_name, male,female , email) VALUES ('$first_name', '$last_name', '$Male','$Female', '$email')";
    $result = $con->query($sql);

    if( $result){
        echo "<script>
        alert('Record successfully added');
        window.location.href = 'revision.html';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
?>