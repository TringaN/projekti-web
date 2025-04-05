<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .dashboard a {
            display: block;
            margin: 12px 0;
            padding: 12px;
            background-color: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .dashboard a:hover {
            background-color: #4338ca;
        }

        .logout-btn {
            background-color: #e74c3c !important;
        }

        .logout-btn:hover {
            background-color: #c0392b !important;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>

        <a href="contact_messages.php">Shiko Mesazhet e Contact Form</a>
        <a href="coaches_dashboard.php">Menaxho Trajnerët</a>
        <a href="users_dashboard.php">Shiko Përdoruesit</a>
        <!-- <a href="messages.php">Login Form</a> -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
