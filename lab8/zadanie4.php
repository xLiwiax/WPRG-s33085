<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <title>zadanie4</title>
</head>
<body>
    <h1>Zadanie 4 </h1>

    <form method="post">
        <input type="text" name="tekst" placeholder="Wprowadź ciąg znaków">
        <input type="submit" value="Wyslij">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tekst = $_POST["tekst"];
            $samogloski = preg_match_all('/[aeiou]/', $tekst);
            echo "<p>Liczba samogłosek: $samogloski</p>";
        }
    ?>
</body>
</html>