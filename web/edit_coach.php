<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: access_denied.php");
    exit;
}

include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Trajneri nuk u gjet.");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM coaches WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$coach = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$coach) {
    die("Trajneri nuk ekziston.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $target = "uploads/" . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $imageName = $coach['image'];
    }

    $stmt = $conn->prepare("UPDATE coaches SET name = :name, description = :description, image = :image WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $imageName);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: coaches_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edito Trajner</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            margin-top: 10px;
            display: block;
            color: #555;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            margin-top: 15px;
            width: 100%;
            background-color: #fea116;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e6940a;
        }

        img {
            max-width: 100px;
            display: block;
            margin-top: 10px;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #0077cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        .card-content {
    min-height: 250px; /* vendose sipas nevojës */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}

.description {
    max-height: 130px;
    overflow: hidden;
    text-overflow: ellipsis;
}
    </style>
</head>
<body>
<div class="form-box">
    <h2>Edito Trajnerin</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Emri:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($coach['name']) ?>" required>

        <label>Përshkrimi:</label>
        <textarea name="description" required><?= htmlspecialchars($coach['description']) ?></textarea>

        <label>Foto aktuale:</label>
        <?php if (!empty($coach['image']) && file_exists('uploads/' . $coach['image'])): ?>
            <img src="uploads/<?= htmlspecialchars($coach['image']) ?>" alt="Foto aktuale">
        <?php else: ?>
            <em>Pa foto aktuale</em>
        <?php endif; ?>

        <label>Zëvendëso foton (opsionale):</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Përditëso</button>
    </form>
    <a href="coaches_dashboard.php">Kthehu te Dashboard</a>
</div>
</body>
</html>
