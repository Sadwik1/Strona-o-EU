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
        <h1>HR</h1>
    </header>

    <?php

        require "./utils.php";

        if($_POST){
            addPracownik($_POST["imie"], $_POST["nazwisko"], $_POST["data_ur"], $_POST["clearance"], $_POST["department"]);
        }

    ?>

    <form action="#" method="POST">
        <label for="imie">Imię:</label>
        <br>
        <input type="text" name="imie">
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <br>
        <input type="text" name="nazwisko">
        <br>
        <label for="data_ur">Data urodzenia:</label>
        <br>
        <input type="date" name="data_ur">
        <br>
        <label for="clearance">Poziom uprawnień:</label>
        <br>
        <input type="text" name="clearance">
        <br>
        <label for="department">Departament:</label>
        <br>
        <input type="text" name="department">
        <br>
        <input type="submit" value="DODAJ PRACOWNIKA"><br>
        <a href="./index.php" id="backbtn">↶</a>
    </form>



    <br>

    <a href="../main/index.php">go to main</a>
    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>