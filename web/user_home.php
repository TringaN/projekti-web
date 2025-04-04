<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

?>

<h2>Mirë se erdhe, <?php echo $_SESSION['user']; ?>!</h2>
<p>Ti je kyçur si përdorues i thjeshtë.</p>
<a href="logout.php">Dil</a>
