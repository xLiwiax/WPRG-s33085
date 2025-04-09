<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zadanie 2</title>
</head>
<body>
  <h2>Zadanie 2</h2>

  <?php
    function numbers($num) {
        if (!is_numeric($num)) {
            echo "Błąd: Niepoprawna wartość wejściowa – $num<br>";
            return;
        }

        // Dla wartości ujemnych i floatów – bierzemy tylko cyfry
        $digits = preg_replace('/\D/', '', strval($num)); // Usuwamy wszystko poza cyframi

        // Jeśli po filtrze nie ma cyfr
        if ($digits === '') {
            echo "Błąd: Brak cyfr w podanej wartości – $num<br>";
            return;
        }

        do {
            $sum = 0;
            for ($i = 0; $i < strlen($digits); $i++) {
                $sum += (int)$digits[$i];
            }
            $digits = (string)$sum;
        } while ($sum >= 10);

        echo "Wynik dla $num to: $sum<br>";
    }

    // Przykładowe użycia:
    numbers(5210);
    numbers(-5210);
    numbers(5210.5);
    numbers("numbers");
  ?>
</body>
</html>
