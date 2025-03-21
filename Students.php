<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to generate the navigation menu
function generateNavMenu($pages) {
    echo '<nav><ul>';
    foreach ($pages as $page => $url) {
        echo "<li><a href='$url'>$page</a></li>";
    }
    echo '</ul></nav>';
}

// Define the available pages
$pages = [
    'Home' => 'index.php',
    'Students' => 'Students.php',
    'About' => 'about.php',
    'Contact' => 'contact.php'
];

// Generate the navigation menu
generateNavMenu($pages);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $study_hours = $_POST['study_hours'];
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

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
    $sql = "INSERT INTO students_details (user_id, full_name, email, study_hours, predicted_grade,photo) 
            VALUES ('$user_id', '$full_name', '$email', '$study_hours', '$grade','$imgContent')";
    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Record successfully added. Student Performance: Grade $grade');
                window.location.href = 'gallery.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    if ($conn->query($sql) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the database connection
    $con->close();
} else {
    die("Form not submitted.");
}

?>