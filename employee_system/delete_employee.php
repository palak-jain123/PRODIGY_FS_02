<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    require 'config.php';
    $id = $_GET['id'];

    // Delete employee record
    $conn->query("DELETE FROM employees WHERE id = $id");
    header("Location: dashboard.php");
}
?>
