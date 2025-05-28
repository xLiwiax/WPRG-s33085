<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
    <style>
        body {
            font-family: sans-serif;
            background:rgb(227, 230, 231);
            padding: 40px;
        }
        form, table {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        input, select, button {
            padding: 8px;
            margin: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=testdb", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$pdo->exec("
    CREATE TABLE IF NOT EXISTS Person (
        Person_id INT AUTO_INCREMENT PRIMARY KEY,
        Person_firstname VARCHAR(255),
        Person_secondname VARCHAR(255)
    );
    CREATE TABLE IF NOT EXISTS Cars (
        Cars_id INT AUTO_INCREMENT PRIMARY KEY,
        Cars_model VARCHAR(255),
        Cars_price FLOAT,
        Cars_day_of_buy DATETIME,
        Person_id INT,
        FOREIGN KEY (Person_id) REFERENCES Person(Person_id)
    );
");

////////////////////////////////////
if (isset($_POST['add_person'])) {
    $stmt = $pdo->prepare("INSERT INTO Person (Person_firstname, Person_secondname) VALUES (?, ?)");
    $stmt->execute([$_POST['firstname'], $_POST['lastname']]);
}

if (isset($_POST['add_car'])) {
    $stmt = $pdo->prepare("INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $_POST['model'],
        $_POST['price'],
        $_POST['day_of_buy'],
        $_POST['person_id']
    ]);
}

///////////////////////////////////////////////////////////////////
$people = $pdo->query("SELECT * FROM Person")->fetchAll();
$cars = $pdo->query("
    SELECT 
        Cars.Cars_id, 
        Cars.Cars_model, 
        Cars.Cars_price, 
        Cars.Cars_day_of_buy, 
        Person.Person_firstname, 
        Person.Person_secondname 
    FROM Cars 
    JOIN Person ON Cars.Person_id = Person.Person_id
")->fetchAll();
?>

<h2>Dodaj osobę</h2>
<form method="post">
    <input name="firstname" placeholder="Imię" required>
    <input name="lastname" placeholder="Nazwisko" required>
    <button name="add_person">Dodaj osobę</button>
</form>

<h2>Dodaj samochód</h2>
<form method="post">
    <input name="model" placeholder="Model" required>
    <input name="price" type="number" step="0.01" placeholder="Cena (PLN)" required>
    <input name="day_of_buy" type="datetime-local" required>
    <select name="person_id">
        <?php foreach ($people as $p): ?>
            <option value="<?= $p['Person_id'] ?>">
                <?= $p['Person_firstname'] . " " . $p['Person_secondname'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button name="add_car">Dodaj samochód</button>
</form>

<h2>Lista samochodów</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Cena (PLN)</th>
        <th>Data zakupu</th>
        <th>Właściciel</th>
    </tr>
    <?php
        foreach ($cars as $c) {
            echo "<tr>";
            echo "<td>{$c['Cars_id']}</td>";
            echo "<td>" . htmlspecialchars($c['Cars_model']) . "</td>";
            echo "<td>" . number_format($c['Cars_price'], 2, ',', ' ') . " zł</td>";
            echo "<td>{$c['Cars_day_of_buy']}</td>";
            echo "<td>{$c['Person_firstname']} {$c['Person_secondname']}</td>";
            echo "</tr>";
        }
    ?>

</table>

</body>
</html>
