<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaadanie 2</title>
</head>
<body>
<?php
    function wstaw($tablica, $pozycja) {
        if (!is_array($tablica) || !is_int($pozycja) || $pozycja < 0 || $pozycja > count($tablica)) {
            echo "BŁĄD<br>";
            return;
        }

        array_splice($tablica, $pozycja, 0, "$"); 

        print_r($tablica);
    }

    $tab = [1, 2, 3, 4, 5];
    $dolarNa = 2;

    wstaw($tab, $dolarNa);
?>

</body>
</html>