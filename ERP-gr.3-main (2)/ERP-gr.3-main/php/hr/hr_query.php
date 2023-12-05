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
        
        // 1 - qNajstarszyNajmlodszy
        // 2 - qAvgWiek
        // 3 - qUrodziny
        // 4 - qCountClearance
        // 5 - qCountDepartment

        if($_POST){
            switch($_POST["id"]){
                case 1:
                    echo "Najmłodszy: ".qNajstarszyNajmlodszy()[0];
                    echo "<br>";
                    echo "Najstarszy: ".qNajstarszyNajmlodszy()[1];
                    break;
                case 2:
                    echo "Średni wiek wszystkich pracowników to: ".qAvgWiek()." lat(a)";
                    break;
                case 3:
                    echo "Pracownicy z urodzinami w ciągu 2 tygodni od ".$_POST["date"].": <br>";
                    foreach(qUrodziny($_POST["date"]) as $element){
                        echo $element."<br>";
                    }
                    break;
                case 4:
                    echo "Ilość pracowników o poziomie uprawnień co najmniej ".$_POST["clearance"]." to: ".qCountClearance($_POST["clearance"]);
                    break;
                case 5:
                    echo "Ilość pracowników w każdym departamencie: <br>";
                    foreach(qCountDepartment() as $key => $value){
                        echo $key." --- ".$value."<br>";
                    }
                    break;
            }
        }

        ?>

        <?php
            include "./hr_query_select.html";
        ?>
    </main>
    <a href="./index.php">go to hr</a>
    <br>
    <a href="../main/index.php">go to main</a>

    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>