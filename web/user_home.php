<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Faqja Kryesore e Përdoruesit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        a.logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        a.logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mirë se erdhe, <?= htmlspecialchars($username) ?>!</h1>
        <p>Ti je kyçur si përdorues i thjeshtë.</p>
        <a class="logout" href="logout.php">Dil</a>
    </div>
</body>
</html>
