<!DOCTYPE html>
<html>
<head>
    <title>Employee Wage Calculator</title>
</head>
<body>
    <h2>Employee Wage Calculator</h2>
    <form method="post">
        <label for="hours">Enter Number of Hours Worked:</label>
        <input type="number" id="hours" name="hours" required><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $hours = $_POST['hours'];
        $hourly_rate = 100; // Example hourly rate
        $lunch_allowance = 200;

        $basic_salary = $hours * $hourly_rate;
        $gross_salary = $basic_salary + $lunch_allowance;
        $tax = 0.30 * $gross_salary;
        $net_pay = $gross_salary - $tax;

        echo "<h3>Salary Details:</h3>";
        echo "Basic Salary: $" . $basic_salary . "<br>";
        echo "Lunch Allowance: $" . $lunch_allowance . "<br>";
        echo "Gross Salary: $" . $gross_salary . "<br>";
        echo "Tax (30%): $" . $tax . "<br>";
        echo "Net Pay: $" . $net_pay . "<br>";
    }
    ?>
</body>
</html>

