<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zadanie 3</title>
</head>
<body>
  <h2>Zadanie 3</h2>

  <?php
    function sequences_n($start, $step, $count) {
        if (!is_numeric($start) || !is_numeric($step) || !is_numeric($count)) {
            echo "Błąd: Wszystkie argumenty muszą być liczbami.<br>";
            return;
        }

        $start = (float)$start;
        $step = (float)$step;
        $count = (int)$count;

        if ($count <= 0) {
            echo "Błąd: Liczba elementów musi być większa od zera.<br>";
            return;
        }

        // Ciąg ar
        $last_arith = $start + ($count - 1) * $step;
        $sum_arith = ($start + $last_arith) * $count / 2;

        // Ciąg geo
        $sum_geom = 0;
        for ($i = 0; $i < $count; $i++) {
            $sum_geom += $start * pow($step, $i);
        }

        echo "Ciąg arytmetyczny - suma: $sum_arith<br>";
        echo "Ciąg geometryczny - suma: $sum_geom<br><br>";
    }


    sequences_n(5, 2, 10);
    sequences_n(5, -2, 10);
    sequences_n(-5, 2, 10);
    sequences_n(5, 2.5, 10);
    sequences_n(5, 2.5, -10);
    sequences_n("start", 2, 10);
  ?>
</body>
</html>
