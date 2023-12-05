<?php
// /*---------------------
// odbieranie form klienta
// ---------------------*/
// $klient_id_exists[];
// do {
//   $klient_id = rand(1,100);
// } while ($klient_id != $klient_id_exists);
// $klient_imie = htmlentities($_POST['imie']);
// $klient_email = htmlentities($_POST['email']);
// $klient_status = htmlentities($_POST['status']);
// /*----------------------
// odbieranie form sprzedaz
// ----------------------*/
// $sprzedaz_id_exists[];
// do {
//   $sprzedaz_id = rand(1,100);
// } while ($sprzedaz_id != $sprzedaz_id_exists);
// $sprzedaz_produkt = htmlentities($_POST['produkt']);
// $sprzedaz_cena = htmlentities($_POST['cena']);
// $sprzedaz_data = htmlentities($_POST['data']);
// /*-----------------------
// odbieranie form pracownik
// -----------------------*/
// $pracownik_id_exists[];
// do {
//   $pracownik_id = rand(1,100);
// } while ($pracownik_id != $pracownik_id_exists);
// $pracownik_imie = htmlentities($_POST['imie']);
// $pracownik_nazwisko = htmlentities($_POST['nazwisko']);
// $pracownik_data_ur = htmlentities($_POST['data_ur']);
// $pracownik_clearence = htmlentities($_POST['clearence']);
// $pracownik_department = htmlentities($_POST['department']);

require "../utils.php";

function getKlient(){
    $klienci = array();
    $klienci_handle = fopen("./klienci.csv", "r");
    
    if(!$klienci_handle) return "Handle error!";
    
    $counter_comma = 0;
    $counter_line = 0;
    
    do{
        $line = fgets($klienci_handle);
        $counter_comma = 0;

            // avoid warning :P
        $klienci[$counter_line] = array(
            "klient_id" => "",
            "klient_imie" => "",
            "klient_email" => "",
            "klient_status" => ""
        );        

        for($i = 0; $i < strlen($line); $i++){
            if($line[$i] == ",") $counter_comma++;
            else if($line[$i] != "\n"){
                
                switch($counter_comma){
                    case 0:
                        $klienci[$counter_line]["klient_id"] .= $line[$i];
                        break;
                    case 1:
                        $klienci[$counter_line]["klient_imie"] .= $line[$i];
                        break;
                    case 2:
                        $klienci[$counter_line]["klient_email"] .= $line[$i];
                        break;
                    case 3:
                        $klienci[$counter_line]["klient_status"] = $line[$i];
                        break;
                }
            }
        }
        $counter_line++;
    }while(!feof($klienci_handle));

    fclose($klienci_handle);

    usort($klienci, 'compareById');
    return $klienci;
}

function getKlientId(){
    $idArr = array();
    foreach(getKlient() as $element){
        array_push($idArr, $element["klient_id"]);
    }
    return $idArr;
}

function addKlient($imie, $email, $status){

    $idArr = getKlientId();

    $id = rand(1,100);
    if(in_array($id, $idArr)){
        do{
            $id++;
        }while(in_array($id, $idArr));
    }

    $klienci_handle = fopen("./klienci.csv", "a");
    $value = "\n".$id.','.$imie.','.$email.','.(int)$status;

    fwrite($klienci_handle, $value);

    fclose($klienci_handle);
}

function writeKlient($klienci){
    $klienci_handle = fopen("./klienci.csv","w");

    $content = "";
    for($i = 0; $i < sizeof($klienci); $i++){
        if(!$klienci[$i]["klient_id"]) continue;
        $content .= $klienci[$i]["klient_id"].",";        
        $content .= $klienci[$i]["klient_imie"].",";        
        $content .= $klienci[$i]["klient_email"].",";        
        $content .= (int)$klienci[$i]["klient_status"]."\n";        
    }

    fwrite($klienci_handle, $content);
    fclose($klienci_handle);  
}

function findKlient($id){
    $count = 0;
    $found = false;
    while($count < sizeof(getKlient())){
        if(getKlient()[$count]["klient_id"] == $id){
            $found = true;
            break;
        } 
        $count++;
    }    
    if($found){
        return $count;
    }
    return $found;
}

function deleteKlient($id){
    if(!findKlient($id)) return;

    $klienci = getKlient();
    unset($klienci[findKlient($id)]);
    $klienci = array_values($klienci);

    writeKlient($klienci);
}

function updateKlient($id, $imie, $email, $status){
    $klienci = getKlient();
    // echo $klienci[findKlient($id)]["imie"];
    // echo $klienci[findKlient($id)]["email"];
    // echo $klienci[findKlient($id)]["status"];

    $klienci[findKlient($id)]["klient_imie"] = $imie;
    $klienci[findKlient($id)]["klient_email"] = $email;
    $klienci[findKlient($id)]["klient_status"] = $status;

    writeKlient($klienci);
}

function qEmail(){
    return(array_column(getKlient(),"klient_email"));
}
?>