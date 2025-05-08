<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    require 'config.php';
    $id = $_GET['id'];

    // Fetch employee details
    $result = $conn->query("SELECT * FROM employees WHERE id = $id");
    $employee = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $query = "UPDATE employees SET name='$name', email='$email', phone='$phone', department='$department', position='$position', salary='$salary', hire_date='$hire_date' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        echo "Employee updated successfully. <a href='dashboard.php'>Back to dashboard</a>";
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
    <title>Edit Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Employee</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>
    <input type="email" name="email" value="<?php echo $employee['email']; ?>" required><br>
    <input type="text" name="phone" value="<?php echo $employee['phone']; ?>" required><br>
    <input type="text" name="department" value="<?php echo $employee['department']; ?>" required><br>
    <input type="text" name="position" value="<?php echo $employee['position']; ?>" required><br>
    <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" required><br>
    <input type="date" name="hire_date" value="<?php echo $employee['hire_date']; ?>" required><br>
    <button type="submit">Update Employee</button>
</form>

</body>
</html>
