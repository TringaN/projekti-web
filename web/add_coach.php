<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: access_denied.php");
    exit;
}

$db = new dbconn();
$conn = $db->startConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $target = 'uploads/' . basename($image);

    if (move_uploaded_file($image_tmp, $target)) {
        $sql = "INSERT INTO coaches (name, description, image) VALUES (:name, :description, :image)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->execute();

        header("Location: coaches_dashboard.php");
        exit;
    } else {
        echo "<p style='color:red;'>Ngarkimi i fotos dështoi!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shto Trajner</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #fea116;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #fea116;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #e99400;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0077cc;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Shto Trajner</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Emri:</label>
            <input type="text" name="name" required>

            <label>Përshkrimi:</label>
            <textarea name="description" rows="5" required></textarea>

            <label>Foto:</label>
            <input type="file" name="image" accept="image/*" required>

            <button type="submit">Shto Trajnerin</button>
        </form>
        <a href="coaches_dashboard.php" class="back-link">← Kthehu te dashboard</a>
    </div>
</body>
</html>
