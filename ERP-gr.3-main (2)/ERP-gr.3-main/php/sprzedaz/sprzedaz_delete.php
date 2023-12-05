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
        <h1>CRM sales delete</h1>
    </header>

    <?php
        require "./utils.php";

        if($_POST){
            deleteSprzedaz($_POST["id"]);
        }
    ?>

    <form action="#" method="POST">
        <label for="id">Id:</label><br>
        <input type="text" name="id">
        <br>
        <div id="fbts_end">
        <input type="submit" class="fbts" value="Usun">
        <input type="reset" class="fbts" value="Wyczyść">
        </div>
        <a id="backbtn"href="index.php">↶</a>
    </form>


    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>