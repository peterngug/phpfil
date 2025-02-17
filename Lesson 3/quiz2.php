<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Mass Index</title>
</head>
<body>
    <form method="post" action="">
        <label for="weight">Enter your weight in kg:</label>
        <input type="number" name="weight" required><br><br>
        <label for="height">Enter your height in meters:</label>
        <input type="number" name="height" required><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $bmi = $weight / ($height * $height);
            echo "Your Body Mass Index is: " . $bmi;
        }
        ?>
</body>
</html>
