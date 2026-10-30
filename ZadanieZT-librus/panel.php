<?php
session_start();

if (!isset($_SESSION["uzytkownik"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<body>
    <h1>Witaj, <?php echo $_SESSION["uzytkownik"]; ?>!</h1>
    <a href="logout.php">Wyloguj</a>
</body>
</html>