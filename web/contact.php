<?php
include 'dbconn.php';

$db = new dbconn();
$conn = $db->startConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validim i thjeshtë
    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo "<p style='color: lightgreen; text-align:center;'>Mesazhi u dërgua me sukses!</p>";
        } else {
            echo "<p style='color: red; text-align:center;'>Gabim gjatë dërgimit të mesazhit.</p>";
        }
    } else {
        echo "<p style='color: red; text-align:center;'>Ju lutem plotësoni të gjitha fushat.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index.html">
</head>
<body>
    <div class="container">
        <div class="left-column">
            <div class="Contact">
                <h2 style="color: #fff;">Get in Touch</h2>
                <form action ="contact.php" method = "POST">
                    <label for="name" style="color: #fff;">Your Name:</label>
                    <input type="text" name="name" required>
                    <label for="email" style="color: #fff;">Your Email:</label>
                    <input type="email" name="email" required>
                    <label for="message" style="color: #fff;">Message:</label>
                    <textarea name="message" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="right-column">
            <div class="content">
                <h1>Contact Us</h1>
                <p>For questions or assistance , contact us anytime. We're here to help!</p>
                <h2>Contact Information</h2>
                <p>Email: contact@example.com</p>
                <p>Phone: (123) 456-3350</p>
                <p>Address:St.Whitney Smith 400, Santa Cruz, Ca,9505</p>
            </div>
        </div>
    </div>
</body>
</html>