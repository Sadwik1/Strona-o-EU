<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/index.css">
    <script src="../../script/index.js" defer></script>
    <link rel="icon" type="image/x-icon" href="../img/blacks/logo_b.ico">
    <title>DSERP V3</title>
</head>
<body>
    <header>
        <h1>DSERP V3 HREJTERZY QUERY</h1>
    </header>
    <main>
        <?php
        
        include "./utils.php";
        
        // 1 - qMaxSprzedaz
        // 2 - qMaxProdukt
        // 3 - qCountSprzedaz
        // 4 - qSumSprzedaz

        if($_POST){
            switch($_POST["id"]){
                case 1:
                    echo "Najbardziej dochodowa transakcja to: <br>";
                    echo "Produkt: ".qMaxSprzedaz()["sprzedaz_produkt"]."<br>";
                    echo "Wartość: ".qMaxSprzedaz()["sprzedaz_cena"]."<br>";
                    echo "Data: ".qMaxSprzedaz()["sprzedaz_data"]."<br>";
                    break;
                case 2:
                    echo "Najbardziej dochodowy produkt to: ".array_key_first(qMaxProdukt())." z dochodem ".qMaxProdukt()[array_key_first(qMaxProdukt())]."zł";
                    break;
                case 3:
                    // echo "Workin on it...";
                    echo "Ilość transakcji między ".$_POST["date1"]." a ".$_POST["date2"]." to: ".qCountSprzedaz($_POST["date1"],$_POST["date2"]);
                    break;
                case 4:
                    echo "Całkowity dochód między ".$_POST["date1"]." a ".$_POST["date2"]." to: ".qSumSprzedaz($_POST["date1"],$_POST["date2"]);
                    break;
            }
        }

        ?>

        <?php
            include "./sprzedaz_query_select.html";
        ?>
    </main>

    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>