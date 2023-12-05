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
        <h1>CRM HREJTERZY delete</h1>
    </header>

    <?php
        require "./utils.php";

        if($_POST){
            deletePracownik($_POST["id"]);
        }
    ?>

    <form action="#" method="POST">
        <label for="id">Id:</label><br>
        <input type="text" name="id">
        <br>
        <input type="submit" value="USUN PRACOWNIKA">
    </form>

    <a href="./index.php">go to hr</a>
    <br>

    <a href="../main/index.php">go to main</a>
    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>