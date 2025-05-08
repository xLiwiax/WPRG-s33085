<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>

<?php
    $plik = "linki.txt";

    if (file_exists($plik)) {
        $linie = file($plik, FILE_IGNORE_NEW_LINES);

        echo "<h1>Lista odnośników:</h1><ul>";

        foreach ($linie as $linia) {
            list($adres, $opis) = explode(";", $linia);
            echo "<li><a href='$adres' target='_blank'>$opis</a></li>";
        }

        echo "</ul>";
    } else {
        echo "Plik z odnośnikami nie istnieje.";
    }
?>

</body>
</html>
