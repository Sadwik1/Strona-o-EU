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
        <h1>CRM HREJTERZY update</h1>
    </header>

    <?php

        require "./utils.php";

        if(!$_POST){
            include "./hr_update_search.html";
        }
        elseif($_POST["mode"] == "search"){

            if(getPracownicy()[findPracownik($_POST["id"])]){
                $imie = getPracownicy()[findPracownik($_POST["id"])]["pracownik_imie"];
                $nazwisko = getPracownicy()[findPracownik($_POST["id"])]["pracownik_nazwisko"];
                $data_ur = getPracownicy()[findPracownik($_POST["id"])]["pracownik_data_ur"];
                $clearance = getPracownicy()[findPracownik($_POST["id"])]["pracownik_clearance"];
                $department = getPracownicy()[findPracownik($_POST["id"])]["pracownik_department"];

                include "./hr_update_add.php";
            }
            else{
                echo "nie ma takiego pracownika";
            }
        }
        elseif($_POST["mode"] == "add"){
            updatePracownik($_POST["id"], $_POST["imie"], $_POST["nazwisko"], $_POST["data_ur"], $_POST["clearance"], $_POST["department"]);
            include "./hr_update_search.html";
        }
    ?>

    <a href="./index.php">go to hr</a>
    <br>
    <a href="../main/index.php">go to main</a>

    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>