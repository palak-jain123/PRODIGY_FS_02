<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $query = "INSERT INTO employees (name, email, phone, department, position, salary, hire_date) VALUES ('$name', '$email', '$phone', '$department', '$position', '$salary', '$hire_date')";
    if ($conn->query($query) === TRUE) {
        echo "New employee added successfully. <a href='dashboard.php'>Back to dashboard</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add New Employee</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Employee Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="text" name="department" placeholder="Department" required><br>
    <input type="text" name="position" placeholder="Position" required><br>
    <input type="number" name="salary" placeholder="Salary" required><br>
    <input type="date" name="hire_date" placeholder="Hire Date" required><br>
    <button type="submit">Add Employee</button>
</form>

</body>
</html>
