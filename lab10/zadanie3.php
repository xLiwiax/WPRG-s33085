<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            align-items: center;
        }
        .box {
            background: rgba(116, 93, 117, 0.1);
            padding: 15px;
            margin: 20px;
            text-align: center;
        }
        input {
            width: 50%;
            margin: 10px;
        }
        button {
            background:rgb(80, 55, 150);
            color: white;
        }
    </style>
</head>
<body>
<?php
session_start();

$poprawny_login = "admin";
$poprawne_haslo = "haslo123";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: zadanie3.php");
    exit;
}

if (isset($_POST['login']) && isset($_POST['haslo'])) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    if ($login === $poprawny_login && $haslo === $poprawne_haslo) {
        $_SESSION['zalogowany'] = true;
    } else {
        $blad_logowania = true;
    }
}
?>

<div class="box">
    <?php
    if (isset($_SESSION['zalogowany'])) {
        echo '<h1>Zalogowano pomyślnie!</h1>';
        echo '<p>Witaj, ' . htmlspecialchars($poprawny_login) . '!</p>';
        echo '<a href="?logout=1">Wyloguj</a>';

    } elseif (isset($blad_logowania)) {
        echo '<h1 class="error">Niepoprawny login lub hasło.</h1>';
        echo '<a href="">Powrót do logowania</a>';

    } else {
        echo '<h1>Logowanie</h1>';
        echo '<form method="post">';
        echo '<input type="text" name="login" placeholder="Login" required><br>';
        echo '<input type="password" name="haslo" placeholder="Hasło" required><br>';
        echo '<button type="submit">Zaloguj</button>';
        echo '</form>';
    }
    ?>
</div>

</body>
</html>
