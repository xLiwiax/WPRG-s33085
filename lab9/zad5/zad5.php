<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 5</title>
</head>
<body>
    <h1>Strona </h1>
    <?php
        $plik = "listaip.txt";
        $adresIP = $_SERVER['REMOTE_ADDR'];

        if (file_exists($plik)) {
            $listaIP = file($plik, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (in_array($adresIP, $listaIP)) {
                include("strona1.php");
            } else {
                include("strona2.php");
            }
        } else {
            echo "Brak pliku z listą IP.";
        }
    ?>

</body>
</html>
