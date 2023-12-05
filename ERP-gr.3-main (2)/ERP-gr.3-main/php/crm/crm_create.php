<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../img/blacks/logo_b.ico">
    <link rel="stylesheet" href="../../style/podstrony.css">

    <title>DSERP V3 CRM - CREATE</title>
</head>
<body>
    <header>
        <h1>CRM - CREATE</h1>
    </header>

    <?php

        require "./utils.php";

        if($_POST){
            addKlient($_POST["imie"], $_POST["email"], $_POST["status"]);
        }



    ?>
<div id="container">
    <form action="#" method="POST">
        <label for="imie">Imię:</label><br>
        <input type="text" name="imie" placeholder="Paweł"><br>
        <label for="email">E-mail:</label><br>
        <input type="text" name="email" placeholder="nierodka@wp.pl"><br>
        <label for="status">Subskrypcja:    </label>
        <input type="checkbox" name="status" value="1">

        <div id="fbts_end">
        <input type="submit" class="fbts" value="Dodaj">
        <input type="reset" class="fbts" value="Wyczyść">
        </div>
        <a href="./index.php" id="backbtn">↶</a>
    </form>
   

    </div>

    <!-- <a href="./index.php">go to crm</a>
    <br>

    <a href="../main/index.php">go to main</a> -->
    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>