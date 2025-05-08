<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <h1>Wprowadź swoją datę urodzenia</h1>
    <form method="GET">
        <label for="dataUrodzenia">Data urodzenia:</label>
        <input type="date" id="dataUrodzenia" name="dataUrodzenia" required>
        <br><br>
        <input type="submit" value="Wyślij">
    </form>

<?php
function dzienTygodnia($data) {
    $dni = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
    return $dni[date('w', strtotime($data))];
}

function obliczWiek($data) {
    $czasUrodzenia = strtotime($data);
    $teraz = time();

    $rokUrodzenia = date("Y", $czasUrodzenia);
    $mdUrodzenia = date("md", $czasUrodzenia);
    $rokTeraz = date("Y", $teraz);
    $mdTeraz = date("md", $teraz);

    $wiek = $rokTeraz - $rokUrodzenia;
    if ($mdTeraz < $mdUrodzenia) {
        $wiek--; 
    }

    return $wiek;
}

function dniDoUrodzin($data) {
    $dzis = getdate();
    $urodziny = getdate(strtotime($data));

    $urodzinyTenRok = mktime(0, 0, 0, $urodziny['mon'], $urodziny['mday'], $dzis['year']);
    $dataTeraz = time();

    if ($urodzinyTenRok < $dataTeraz) {
        $urodzinyNastepnyRok = mktime(0, 0, 0, $urodziny['mon'], $urodziny['mday'], $dzis['year'] + 1);
        $dni = round(($urodzinyNastepnyRok - $dataTeraz) / 86400);
    } else {
        $dni = round(($urodzinyTenRok - $dataTeraz) / 86400);
    }

    return $dni;
}

if (isset($_GET['dataUrodzenia'])) {
    $data = $_GET['dataUrodzenia'];

    echo "<hr>";
    echo "Data urodzin: " . $data . "<br>";
    echo "Dzień tygodnia: " . dzienTygodnia($data) . "<br>";
    echo "Ukończony wiek: " . obliczWiek($data) . "<br>";
    echo "Dni do najbliższych urodzin: " . dniDoUrodzin($data);
} else {
    echo "Nie podano daty urodzenia.";
}
?>

</body>
</html>
