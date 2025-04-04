<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

$stmt = $conn->query("SELECT * FROM contacts");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Mesazhet e Contact Form</h2>
<ul>
    <?php foreach ($messages as $msg): ?>
        <li><?php echo $msg['name'] . " - " . $msg['email'] . " - " . $msg['message']; ?></li>
    <?php endforeach; ?>
</ul>
<a href="dashboard.php">Kthehu në Dashboard</a>
