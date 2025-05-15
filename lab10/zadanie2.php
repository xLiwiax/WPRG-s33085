<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie2</title>
    </head>
    <body>
        <form method="POST">
            <label for="glos">Co wolisz?</label>
            <select name="glos">
                <option value="kawa">Kawa</option>
                <option value="herbata">Herbata</option>
                <option value="woda">woda</option>
            </select>
            <input type="submit" value="Wyślij">
        </form>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);


            if(isset($_COOKIE['glos'])){
                echo 'już zagłowosałeś';
            }else if(isset($_POST['glos'])){
                setcookie('glos',$_POST['glos'],time()+30);
                echo 'głoś wysłany';
            }
        ?>
    </body>
</html>