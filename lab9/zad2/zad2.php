<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>
<body>
    <h1>Operacje na katalogach</h1>
    <form method="POST">
        <label for="sciezka">Ścieżka:</label>
        <input type="text" id="sciezka" name="sciezka" placeholder="./" required><br><br>

        <label for="nazwa_katalogu">Nazwa katalogu:</label>
        <input type="text" id="nazwa_katalogu" name="nazwa_katalogu" required><br><br>

        <label for="operacja">Operacja:</label>
        <select id="operacja" name="operacja">
            <option value="odczyt">Odczyt</option>
            <option value="utworz">Utwórz</option>
            <option value="usun">Usuń</option>
        </select><br><br>

        <input type="submit" value="Wykonaj">
    </form>

<?php
function wykonajOperacjeNaKatalogu($sciezka, $nazwaKatalogu, $operacja = "odczyt") {
    if (substr($sciezka, -1) !== "/") {
        $sciezka .= "/";
    }

    $pelnaSciezka = $sciezka . $nazwaKatalogu;

    if ($operacja === "odczyt") {
        if (!is_dir($pelnaSciezka)) {
            return "Katalog nie istnieje.";
        }

        $elementy = scandir($pelnaSciezka);
        $wynik = "Zawartość katalogu:<ul>";

        foreach ($elementy as $element) {
            if ($element !== "." && $element !== "..") {
                $wynik .= "<li>$element</li>";
            }
        }

        $wynik .= "</ul>";
        return $wynik;

    } elseif ($operacja === "utworz") {
        if (is_dir($pelnaSciezka)) {
            return "Katalog już istnieje.";
        }

        if (mkdir($pelnaSciezka, 0777, true)) {
            return "Katalog został utworzony.";
        } else {
            return "Nie udało się utworzyć katalogu.";
        }

    } elseif ($operacja === "usun") {
        if (!is_dir($pelnaSciezka)) {
            return "Katalog nie istnieje.";
        }

        $zawartosc = scandir($pelnaSciezka);
        if (count($zawartosc) > 2) {
            return "Katalog nie jest pusty, nie można go usunąć.";
        }

        if (rmdir($pelnaSciezka)) {
            return "Katalog został usunięty.";
        } else {
            return "Nie udało się usunąć katalogu.";
        }
    } else {
        return "Nieznana operacja.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sciezka = $_POST['sciezka'];
    $nazwaKatalogu = $_POST['nazwa_katalogu'];
    $operacja = $_POST['operacja'];

    $rezultat = wykonajOperacjeNaKatalogu($sciezka, $nazwaKatalogu, $operacja);
    echo"<hr>";
    echo "Rezultat:<br>" . $rezultat;
}
?>
</body>
</html>
