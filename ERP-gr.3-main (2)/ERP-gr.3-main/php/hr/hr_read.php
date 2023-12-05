<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/index.css">
    <script src="../../script/index.js" defer></script>
    <link rel="icon" type="image/x-icon" href="../../img/blacks/logo_b.ico">
    <title>DSERP V3</title>
</head>
<body>
    <header>
        <h1>DSERP V3 HREJTERZY read</h1>
    </header>
    <main>
        <p>TEMPLATE: id --- produkt --- cena --- data</p>
        <br>
        <?php
        
        include "./utils.php";
        
        foreach(getPracownicy() as $element){

            if(!$element["pracownik_id"]) continue;

            echo $element["pracownik_id"].', '. $element["pracownik_imie"].', '.$element["pracownik_nazwisko"].', '.$element["pracownik_data_ur"].', '.$element["pracownik_clearance"].', '.$element["pracownik_department"]."<br>";
        }
        
        ?>
    </main>
    <a href="./index.php">go to hr</a>
    <br>
    <a href="../main/index.php">go to main</a>

    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>