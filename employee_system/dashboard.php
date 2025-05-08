<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$query = "SELECT * FROM employees";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            padding: 20px;
            background-color: #34495e;
            color: white;
            margin: 0;
        }

        a {
            display: inline-block;
            margin: 20px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background-color: #1f618d;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            margin-right: 10px;
            color: #2980b9;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Employee Management Dashboard</h2>

    <a href="add_employee.php">➕ Add Employee</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['department']); ?></td>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td><?php echo htmlspecialchars($row['salary']); ?></td>
                <td>
                    <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_employee.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
