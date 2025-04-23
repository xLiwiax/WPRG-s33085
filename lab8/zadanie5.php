<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <title>zadanie5</title>
</head>
<body>
    <h1>Zadanie 5 </h1>

    <form method="post">
        <input type="text" name="tekst" placeholder="Wprowadź ciąg znaków">
        <input type="submit" value="Wyslij">
    </form>

    <?php 
        if(isset($_POST["tekst"])){
            $tekst = $_POST["tekst"];
            $tekst_po_przecinku =  explode(",",$tekst)[1];
            echo "Ilość cyfr po \",\" to " . strlen($tekst_po_przecinku);
        }
    ?>
</body>
</html>