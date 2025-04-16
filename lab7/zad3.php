<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
    <?php
        function utTablice($a, $b, $c, $d) {
            if ($c < $a) {
                echo "BŁĄD: a < c <br>";
                return;
            }
            $wynik = [];

            for ($i = $a; $i <= $c; $i++) {
                if ($i === $a) {
                    $wynik[$i] = $b;
                } elseif ($i === $c) {
                    $wynik[$i] = $d;
                } else {
                    $wynik[$i] = 0;
                }
            }
    
            echo "<pre>";
            print_r($wynik);
            echo "</pre>";
        }

        utTablice(3, 7, 10, 20);
    ?>

</body>
</html>