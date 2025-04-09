<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zadanie 1</title>
</head>
<body>
  <h2>Zadanie 1</h2>

  <?php
    function print_primes($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            echo "Błąd.<br>";
            return;
        }
        $a = (int)$a;
        $b = (int)$b;
        $start = min($a, $b);
        $end = max($a, $b);

        $primes = [];
        for ($i = max(2, $start); $i <= $end; $i++) {
            $isPrime = true;
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j === 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                $primes[] = $i;
            }
        }
        echo "Liczby pierwsze: " . implode(", ", $primes) . "<br>";
    }

    print_primes(5, 10);
    print_primes(10, 5); 
    print_primes(5.5, 10); 
    print_primes(-5, 10); 
    print_primes("prime", 10);
  ?>
</body>
</html>
