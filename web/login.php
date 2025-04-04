<?php
session_start();
include 'dbconn.php';

$db = new dbconn();
$conn = $db->startConnection();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: dashboard.php");
            exit(); // ⛔ SHUMË E RËNDËSISHME!
        } else {
            header("Location: user_home.php");
            exit(); // ⛔ SHUMË E RËNDËSISHME!
        }
    } else {
        $error = "Username ose Password gabim!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
     <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?> 
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
