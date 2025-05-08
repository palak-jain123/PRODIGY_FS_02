<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'pari' && $password == 'pari2000') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        /* Login form container */
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        /* Title styling */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #2575fc;
        }

        /* Submit button */
        button {
            width: 100%;
            padding: 12px;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #6a11cb;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Link styling */
        a {
            color: #2575fc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Login Form -->
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>

        <!-- Error message if credentials are wrong -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($username != 'pari' || $password != 'pari2000')) {
            echo "<div class='error-message'>Invalid credentials. Please try again.</div>";
        }
        ?>
    </div>

</body>
</html>
