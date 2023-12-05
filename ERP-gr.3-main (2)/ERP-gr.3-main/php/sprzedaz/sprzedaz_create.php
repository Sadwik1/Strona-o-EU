<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/podstrony.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>CRM</h1>
    </header>

    <?php

        require "./utils.php";

        if($_POST){
            addSprzedaz($_POST["produkt"], $_POST["cena"], $_POST["data"]);
        }



    ?>

    <form action="#" method="POST">
        <label for="produkt">Produkt:</label>
        <br>
        <input type="text" name="produkt">
        <br>
        <label for="cena">Kwota:</label>
        <br>
        <input type="text" name="cena">
        <br>
        <label for="data">Data transakcji:</label>
        <br>
        <input type="date" name="data">
        <br>
        <div id="fbts_end">
        <input type="submit" class="fbts" value="Dodaj">
        <input type="reset" class="fbts" value="Wyczyść">
        </div>
        
        <a id="backbtn"href="index.php">↶</a>
        
    </form>


    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>