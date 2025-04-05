<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

// Merr të gjithë përdoruesit
$stmt = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Përdoruesit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4f46e5;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .back-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 10px 20px;
            background-color: #0077cc;
            color: white;
            border-radius: 5px;
            width: 200px;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>

<h2>Lista e Përdoruesve të Regjistruar</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Roli</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="dashboard.php" class="back-btn">Kthehu te Dashboard</a>

</body>
</html>
