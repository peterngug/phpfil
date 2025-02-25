<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $study_hours = $_POST['study_hours'];

    // Determine the grade based on study hours
    if ($study_hours >= 40) {
        $grade = 'A';
    } elseif ($study_hours >= 30) {
        $grade = 'B';
    } elseif ($study_hours >= 20) {
        $grade = 'C';
    } elseif ($study_hours >= 10) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }

    // Database connection
    $con = new mysqli("localhost", "root", "", "students");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO students_details (user_id, full_name, email, study_hours, predicted_grade) 
            VALUES ('$user_id', '$full_name', '$email', '$study_hours', '$grade')";
    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Record successfully added. Student Performance: Grade $grade');
                window.location.href = 'Students.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the database connection
    $con->close();
} else {
    die("Form not submitted.");
}
?>