<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <title>zadanie3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color:rgb(145, 140, 221);
        }
        .container {
            background-color: white;
            padding: 25px;
            width: 500px;
            margin: auto;
            border-radius: 15px;
            box-shadow: 0 0 10px white;
        }
        label, select, input {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }
        #submit {
            background-color:rgb(134, 17, 119);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 10px;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Zadanie 3 </h1>

    <form method="post">
        <label for="tekst">Wprowadź ciąg znaków:</label>
        <input type="text" id="tekst" name="tekst">

        <label for="operacja">Wybierz operację:</label>
        <select id="operacja" name="operacja">
            <option value="odwr">Odwróć ciąg</option>
            <option value="duze">Wszystkie wielkie litery</option>
            <option value="male">Wszystkie małe litery</option>
            <option value="dl">Liczba znaków</option>
            <option value="bezzb">Usuń białe znaki z końców</option>
        </select>

        <input type="submit" value="Wykonaj" id="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tekst = $_POST['tekst'];
        $operacja = $_POST['operacja'];

        $wynik = '';
        switch ($operacja) {
            case 'odwr':
                $wynik = strrev($tekst);
                break;
            case 'duze':
                $wynik = strtoupper($tekst);
                break;
            case 'male':
                $wynik = strtolower($tekst);
                break;
            case 'dl':
                $wynik = strlen($tekst);
                break;
            case 'bezzb':
                $wynik = trim($tekst);
                break;
            default:
                $wynik = ':)';
    }

    echo "<div class='result'>Wynik: " . htmlspecialchars($wynik) . "</div>";
}
?>

</div>
</body>
</html>
