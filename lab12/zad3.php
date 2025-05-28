
<!DOCTYPE html>
<html>
<head>
    <title>Zadanie 3</title>
    <style>
        body { font-family: sans-serif; 
            background: #f5f6fa; 
            padding: 40px; 
        }
        form { 
            background: white; 
            padding: 20px; 
            max-width: 400px; 
            margin: auto;
        }
        input, button { 
            width: 100%; 
            padding: 10px; 
            margin: 5px 0; 
        }
        h2 { text-align: center; }
        .message { 
            background: #e0ffe0; 
            padding: 10px; 
            border-left: 5px solid green; 
            margin-bottom: 10px; }
    </style>
</head>
<body>

    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=testdb", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("CREATE TABLE IF NOT EXISTS Users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100),
            email VARCHAR(100),
            password VARCHAR(255),
            age INT,
            city VARCHAR(100)
        )");

        $msg = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO Users (username, email, password, age, city) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['username'], $_POST['email'], $hash, $_POST['age'], $_POST['city']
            ]);
            $msg = " Rejestracja zakończona sukcesem!";
        }

        $count = $pdo->query("SELECT COUNT(*) FROM Users")->fetchColumn();
    ?>

    <h2>Rejestracja</h2>

    <?php
        if ($msg) {
            echo "<div class='message'>{$msg}</div>";
        }
    ?>

    <form method="post">
        <input name="username" placeholder="Nazwa użytkownika" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Hasło" required>
        <input name="age" type="number" placeholder="Wiek" required>
        <input name="city" placeholder="Miasto" required>
        <button type="submit">Zarejestruj</button>
    </form>

    <?php
        echo "<p style='text-align:center; margin-top: 20px;'>Liczba zarejestrowanych: <strong>$count</strong></p>";
    ?>
</body>
</html>
