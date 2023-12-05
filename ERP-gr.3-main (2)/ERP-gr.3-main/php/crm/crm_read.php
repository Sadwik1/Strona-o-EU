<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/podstrony.css">
    <script src="../../script/index.js" defer></script>
    <link rel="icon" type="image/x-icon" href="../../img/blacks/logo_b.ico">
    <title>DSERP V3 CRM - READ</title>
</head>
<body>
    <header>
        <h1>CRM - READ</h1>
    </header>
    <main>
    <div id="just">
        <?php
        
        include "./utils.php";
        
        foreach(getKlient() as $element){
            if(!$element["klient_id"]) continue;
            echo $element["klient_id"].', '. $element["klient_imie"].', '.$element["klient_email"].', '.(int)$element["klient_status"]."<br>";
        }
        
        ?>
    </div>
    </main>
    <a href="index.php">
    <section id="back" class="btn">
            <p id="backbtn" >↶</p>
        </section>
    </a>
    <footer><p>&copy;DSERP INC</p></footer>
</body>
</html>