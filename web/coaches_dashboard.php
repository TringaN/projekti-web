<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: access_denied.php");
    exit;
}

include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

// Fshij trajnerin nëse jepet ID në URL
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];

    // Fshi foton nëse ekziston
    $stmt = $conn->prepare("SELECT image FROM coaches WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $coach = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($coach && !empty($coach['image']) && file_exists("uploads/" . $coach['image'])) {
        unlink("uploads/" . $coach['image']);
    }

    // Fshi nga databaza
    $stmt = $conn->prepare("DELETE FROM coaches WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: coaches_dashboard.php");
    exit;
}

// Merr trajnerët
$stmt = $conn->prepare("SELECT * FROM coaches ORDER BY created_at DESC");
$stmt->execute();
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Trajnerët</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
        }
        th {
            background: #fea116;
            color: #fff;
        }
        img {
            width: 100px;
            height: auto;
        }
        a.button {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        a.add-btn {
            display: inline-block;
            margin: 10px auto;
            padding: 10px 20px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .center {
            text-align: center;
        }
        .action-buttons {
    display: flex;
    gap: 8px;
}

.edit-btn {
    background:orange;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
}

.delete-btn {
    background: red;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
}

    </style>
</head>
<body>

<h2>Trajnerët e Regjistruar</h2>

<div class="center">
    <a href="add_coach.php" class="add-btn">+ Shto Trajner të Ri</a>
</div>

<?php if (count($coaches) > 0): ?>
    <table>
        <tr>
            <th>Emri</th>
            <th>Përshkrimi</th>
            <th>Foto</th>
            <th></th>
            
        </tr>
        <?php foreach ($coaches as $coach): ?>
        <tr>
            <td><?= htmlspecialchars($coach['name']) ?></td>
            <td><?= nl2br(htmlspecialchars($coach['description'])) ?></td>
            <td>
                <?php if (!empty($coach['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($coach['image']) ?>" alt="">
                <?php else: ?>
                    <em>Pa foto</em>
                <?php endif; ?>
            </td>
            <td class="action-buttons">
   <a href="edit_coach.php?id=<?= $coach['id'] ?>" class=" edit-btn">Edito</a>
   <a href="?delete=<?= $coach['id'] ?>" class="button delete-btn" onclick="return confirm('A je i sigurt që dëshiron ta fshish këtë trajner?')">Fshij</a>
</td>

        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p class="center">Asnjë trajner nuk është regjistruar ende.</p>
<?php endif; ?>

</body>
</html>
