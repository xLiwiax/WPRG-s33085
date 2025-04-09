<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zadanie 5</title>
</head>
<body>
  <h2>Zadanie 5</h2>

  <?php
    function is_pangram($text) {
        $text = strtolower($text); // małe litery
        $alphabet = range('a', 'z');

        foreach ($alphabet as $letter) {
            if (strpos($text, $letter) === false) {
                echo "false<br>";
                return;
            }
        }

        echo "true<br>";
    }


    is_pangram("The quick brown fox jumps over the lazy dog");
    is_pangram("Chce sushi");
  ?>
</body>
</html>
