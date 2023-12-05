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
        <h1>CRM sales update</h1>
    </header>

    <?php

        require "./utils.php";

        if(!$_POST){
            include "./sprzedaz_update_search.html";
        }
        elseif($_POST["mode"] == "search"){

            if(getSprzedaz()[findSprzedaz($_POST["id"])]){
                $produkt = getSprzedaz()[findSprzedaz($_POST["id"])]["sprzedaz_produkt"];
                $cena = getSprzedaz()[findSprzedaz($_POST["id"])]["sprzedaz_cena"];
                $data = getSprzedaz()[findSprzedaz($_POST["id"])]["sprzedaz_data"];

                include "./sprzedaz_update_add.php";
            }
            else{
                echo "nie ma takiej sprzedazy";
            }
        }
        elseif($_POST["mode"] == "add"){
            updateSprzedaz($_POST["id"], $_POST["produkt"], $_POST["cena"], $_POST["data"]);
            include "./sprzedaz_update_search.html";

        }


    ?>

<a id="back" id="backbtn"href="index.php">↶</a>


    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>