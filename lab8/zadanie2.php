<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <title>zadanie2</title>
</head>
<body>
<h1>Zadanie 2</h1>

<form method="post">
    <input type="text" name="ciag" placeholder="Wprowadź ciąg ">
    <input type="submit" value="Wyślij">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ciag = $_POST['ciag'];
    $usun = preg_replace('/[\\\\\/:*?"<>|+\-.]/', '', $ciag);
    echo "<p>Wynik: $usun</p>";
}
?>
</body>
</html>