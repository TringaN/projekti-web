<?php

session_start();

// Kontrollo nëse përdoruesi është i kyçur dhe është admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <ul>
        <li><a href="contact_messages.php.php">Shiko Mesazhet e Contact Form</a></li>
        <li><a href="messages.php">Shiko Mesazhet e login Form</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
>
