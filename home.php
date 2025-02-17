<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Level Checker</title>
</head>
<body>
    <h1>Grade Level Checker</h1>
    <form method="post" action="">
        <label for="grade">Enter Grade:</label>
        <input type="number" id="grade" name="grade" required>
        <button type="submit">Check Level</button>
    </form>

    <?php
    function getEducationalLevel($grade) {
        if ($grade >= 1 && $grade <= 3) {
            return "Lower Primary";
        } elseif ($grade >= 4 && $grade <= 6) {
            return "Upper Primary";
        } elseif ($grade >= 7 && $grade <= 9) {
            return "Junior Secondary";
        } elseif ($grade >= 10 && $grade <= 12) {
            return "Upper Secondary";
        } elseif ($grade >= 13 && $grade <= 15) {
            return "Higher Education";
        } else {
            return "Unknown Grade";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grade = intval($_POST["grade"]);
        echo "<p>Grade $grade: " . getEducationalLevel($grade) . "</p>";
    }
    ?>
</body>
</html>