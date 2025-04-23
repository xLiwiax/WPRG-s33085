<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie1</title>

</head>
<body>
<div class="container">
    <h1>Zadanie 1</h1>

    <form method="post">
        <input type="text" name="tekst" placeholder="Wprowadź ciąg znaków">
        <input type="submit" value="Wyślij">
    </form>

    <br><hr>

    <?php
        if(isset($_POST["tekst"])){
            $tekst = $_POST["tekst"];

            echo "<div class='result'>";
            echo "Dużymi literami: " . strtoupper($tekst) . "<br>";
            echo "Małymi literami: " . strtolower($tekst) . "<br>";
            echo "Pierwsza litera wielka: " . ucfirst(strtolower($tekst)) . "<br>";
            echo "Każde słowo z wielkiej litery: " . ucwords(strtolower($tekst));
            echo "</div>";
        }
    ?>
</div>
</body>
</html>
