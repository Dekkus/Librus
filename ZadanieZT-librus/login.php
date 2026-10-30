<?php
session_start();

$blad = "";

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];

    if ($login == "admin" && $haslo == "1234") {
        $_SESSION["uzytkownik"] = $login;

        if (isset($_POST["zapamietaj"])) {
            setcookie("login", $login, time() + 7 * 24 * 60 * 60);
        }

        header("Location: panel.php");
        exit();
    } else {
        $blad = "Błędny login lub hasło!";
    }
}

$zapisanyLogin = "";
if (isset($_COOKIE["login"])) {
    $zapisanyLogin = $_COOKIE["login"];
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
    <h1>Logowanie</h1>

    <form method="post" action="login.php">
        <label>Login:</label>
        <input type="text" name="login" value="<?php echo $zapisanyLogin; ?>"><br><br>

        <label>Hasło:</label>
        <input type="password" name="haslo"><br><br>

        <input type="checkbox" name="zapamietaj"> Zapamiętaj mnie<br><br>

        <input type="submit" value="Zaloguj">
    </form>

    <p style="color:red;"><?php echo $blad; ?></p>
</body>
</html>