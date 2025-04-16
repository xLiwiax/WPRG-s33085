<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>
<body>
    <form action="zad4.php" method="post">
        <label for="imie">Imie: </label>
        <input type="text" name="imie" id="imie"><br>

        <label for="nazwisko">Nazwisko: </label>
        <input type="text" name="nazwisko" id="nazwisko"><br>

        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email"><br>

        <label for="haslo">Hasło: </label>
        <input type="password" name="haslo" id="haslo"><br>
        <label for="haslo2">Potwierdź hasło:</label>
        <input type="password" name="haslo2" id="haslo2"><br>

        <label for="wiek">Wiek: </label>
        <input type="number" name="wiek" id="wiek"><br>

        <input type="submit" value="Zarejestuj się"><br>
    </form>
    <?php   
      
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $email = $_POST["email"];
        $haslo = $_POST["haslo"];
        $wiek = $_POST["wiek"];

        echo "<h2>Dane z formularza:</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Pole</th><th>Wartość</th></tr>";
        echo "<tr><td>Imię</td><td>$imie</td></tr>";
        echo "<tr><td>Nazwisko</td><td>$nazwisko</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>Hasło</td><td>$haslo</td></tr>";
        echo "<tr><td>Wiek</td><td>$wiek</td></tr>";
        echo "</table>";
    }

    ?>
</body>
</html>