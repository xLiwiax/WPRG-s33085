<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
    <style>
        body { 
            font-family: Arial; 
            padding: 40px; 
            background: #f4f4f4; 
        }
        form { margin-bottom: 20px; }
        button { 
            padding: 10px 20px; 
            margin-right: 10px; 
        }
        .message { 
            padding: 10px; 
            margin-top: 10px; 
            background: #fff; 
        }
    </style>
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'testdb';

    $conn = new mysqli($host, $user, $pass, $dbname);
    $info = "";

    if (isset($_POST['create'])) {
        $sql = "CREATE TABLE IF NOT EXISTS Student (
            StudentID INT AUTO_INCREMENT PRIMARY KEY,
            Firstname VARCHAR(255) NOT NULL,
            Secondname VARCHAR(255) NOT NULL,
            Salary INT,
            DateOfBirth DATE
        )";

        $info = $conn->query($sql) ? "Tabela została utworzona." : " Błąd: " . $conn->error;
    }

    if (isset($_POST['drop'])) {
        $sql = "DROP TABLE IF EXISTS Student";
        $info = $conn->query($sql) ? "Tabela została usunięta." : " Błąd: " . $conn->error;
    }
?>
    <h2>Zadanie 1: Tworzenie i usuwanie tabeli</h2>
    <form method="post">
        <button name="create">Utwórz tabelę</button>
        <button name="drop" style="background:red;color:white;">Usuń tabelę</button>
    </form>
    <?php
        if ($info) {
            echo "<div class='message'>$info</div>";
        }
    ?>
</body>
</html>
