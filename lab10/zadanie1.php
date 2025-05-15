
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie1</title>
</head>
<body>
    <?php
    $maxIlOdw = 5;
    if (isset($_POST['reset'])) {
        setcookie('iloscOdw', '', time() - 3600);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_COOKIE['iloscOdw'])) {
        $iloscOdw = $_COOKIE['iloscOdw'] + 1;
    } else {
        $iloscOdw = 1;
    }

    setcookie('iloscOdw', $iloscOdw, time() + 86400);
    ?>

    <!-- ////////////////////////////////////////////////////////////// -->
    <h1>Licznik odwiedzin</h1>
    <p>Odwiedziłeś tę stronę <?= $iloscOdw ?> razy.</p>

    <?php
        if ($iloscOdw >= $maxIlOdw) {
        echo '<p> Osiągnąłeś limit ' . $maxIlOdw . ' odwiedzin!</p>';
        }
    ?>

    <form method="post">
        <button type="submit" name="reset">Zresetuj licznik</button>
    </form>
</body>
</html>
