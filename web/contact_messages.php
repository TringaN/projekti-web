<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: access_denied.php");
    exit;
}

include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

// Fshirja e mesazhit
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = :id");
    $stmt->bindParam(':id', $deleteId);
    $stmt->execute();
    header("Location: contact_messages.php");
    exit;
}

// Merr të gjitha mesazhet
$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mesazhet nga Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #fea116;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        a.button {
            padding: 6px 10px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<h2>Mesazhet nga Contact Us</h2>

<?php if (count($messages) > 0): ?>
    <table>
        <tr>
            <th>Emri</th>
            <th>Email</th>
            <th>Mesazhi</th>
            <th>Dërguar më</th>
            <th>Veprime</th>
        </tr>
        <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?= htmlspecialchars($msg['name']) ?></td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                <td><?= $msg['created_at'] ?></td>
                <td>
                    <a href="?delete=<?= $msg['id'] ?>" class="button" onclick="return confirm('A je i sigurt që dëshiron ta fshish këtë mesazh?')">Fshij</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p style="text-align:center;">Nuk ka mesazhe të regjistruara ende.</p>
<?php endif; ?>

</body>
</html>
