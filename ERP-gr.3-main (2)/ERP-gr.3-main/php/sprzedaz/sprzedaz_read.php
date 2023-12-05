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
        <h1>DSERP V3 read</h1>
    </header>
    <main>
        <p>TEMPLATE: id --- produkt --- cena --- data</p>
        <br>
        <?php
        
        include "./utils.php";
        
        foreach(getSprzedaz() as $element){

            if(!$element["sprzedaz_id"]) continue;

            echo $element["sprzedaz_id"].', '. $element["sprzedaz_produkt"].', '.$element["sprzedaz_cena"].', '.$element["sprzedaz_data"]."<br>";
        }
        
        ?>
        <a id="back" id="backbtn"href="index.php">↶</a>
    </main>

    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>