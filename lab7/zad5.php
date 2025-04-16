<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 5</title>
</head>
<body>
    <h1>Kalkulator</h1>

    <hr>

    <h2>Prosty</h2>
    <form method="post">
        <input type="number" name="num1" required> 
        <select name="operator">
            <option value="dodawanie">+</option>
            <option value="odejmowanie">-</option>
            <option value="mnozenie">*</option>
            <option value="dzielenie">/</option>
        </select>
        <input type="number" name="num2" required>
        <input type="submit" name="oblicz" value="Oblicz">
    </form>

    <hr>

    <h2>Zaawansowany</h2>
    <form method="post">
        <input type="number" name="liczba" required>
        <select name="operatorZaaw">
            <option value="sin">Sinus</option>
            <option value="cos">Cosinus</option>
            <option value="tan">Tangens</option>
            <option value="bindec">Binarne &#8702; Dziesiętne</option>
            <option value="decbin">Dziesiętne &#8702; Binarne</option>
            <option value="dechex">Dziesiętne &#8702; Szesnastkowe</option>
            <option value="hexdec">Szesnastkowe &#8702; Dziesiętne</option>
        </select>
        <input type="submit" name="obliczZaaw" value="Oblicz">
    </form>

    <hr>

    <?php
    if (isset($_POST['oblicz'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        switch ($operator) {
            case "dodawanie":
                $wynik = $num1 + $num2;
                break;
            case "odejmowanie":
                $wynik = $num1 - $num2;
                break;
            case "mnozenie":
                $wynik = $num1 * $num2;
                break;
            case "dzielenie":
                if ($num2 == 0) {
                    $wynik = "Błąd: Dzielenie przez zero!";
                } else {
                    $wynik = $num1 / $num2;
                }
                break;
        }
        echo "<p>Wynik: $wynik</p>";
    }

    if (isset($_POST['obliczZaaw'])) {
        $liczba = $_POST['liczba'];
        $op = $_POST['operatorZaaw'];
        $wynik2 = "-";

        switch ($op) {
            case "sin":
                $wynik2 = sin(deg2rad($liczba));
                break;
            case "cos":
                $wynik2 = cos(deg2rad($liczba));
                break;
            case "tan":
                $wynik2 = tan(deg2rad($liczba));
                break;
            case "bindec":
                if (preg_match('/^[01]+$/', $liczba)) {
                    $wynik2 = bindec($liczba);
                } else {
                    $wynik2 = "Błąd: to nie bin";
                }
                break;
            case "decbin":
                if (is_numeric($liczba)) {
                    $wynik2 = decbin((int)$liczba);
                }
                break;
            case "dechex":
                if (is_numeric($liczba)) {
                    $wynik2 = dechex((int)$liczba);
                }
                break;
            case "hexdec":
                if (ctype_xdigit($liczba)) {
                    $wynik2 = hexdec($liczba);
                } else {
                    $wynik2 = "Błąd: to nie jest hex";
                }
                break;
        }
        echo "<p>Wynik: $wynik2</p>";
    }
    ?>
</body>
</html>
