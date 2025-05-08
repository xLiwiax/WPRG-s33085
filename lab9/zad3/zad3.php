<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>

<?php
    $plik = "licznik.txt";

    if (!file_exists($plik)) {
        file_put_contents($plik, "1");
    }
    
    $liczbaOdwiedzin = (int) file_get_contents($plik);
    $liczbaOdwiedzin++;
    file_put_contents($plik, $liczbaOdwiedzin);

    echo "Liczba odwiedzin: $liczbaOdwiedzin";
?>
</body>
</html>
