<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Access Denied</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #111;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 60px;
            color: #f00;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 400px;
        }

        a {
            background: #0ef;
            color: #000;
            padding: 10px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 0 10px #0ef;
            transition: 0.3s ease;
        }

        a:hover {
            box-shadow: 0 0 20px #0ef;
            background: #00c9c8;
        }
    </style>
</head>
<body>
    <h1>⛔ Access Denied</h1>
    <p>Na vjen keq, por nuk ke leje për të hyrë në këtë faqe.<br>Ju lutem kthehuni te faqja kryesore ose identifikohuni me një llogari të autorizuar.</p>
    <a href="login.php">Kthehu te Login</a>
</body>
</html>
