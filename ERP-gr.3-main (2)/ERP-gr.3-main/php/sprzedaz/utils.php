<?php
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

require "../utils.php";



function getSprzedaz(){
    $sprzedaz = array();
    $sprzedaz_handle = fopen("./sprzedaz.csv", "r");
    
    if(!$sprzedaz_handle) return "Handle error!";
    
    $counter_comma = 0;
    $counter_line = 0;
    
    do{
        $line = fgets($sprzedaz_handle);
        $counter_comma = 0;

            // avoid warning :P
        $sprzedaz[$counter_line] = array(
            "sprzedaz_id" => "",
            "sprzedaz_produkt" => "",
            "sprzedaz_cena" => "",
            "sprzedaz_data" => ""
        );        

        for($i = 0; $i < strlen($line); $i++){
            if($line[$i] == ",") $counter_comma++;
            else if($line[$i] != "\n"){
                
                switch($counter_comma){
                    case 0:
                        $sprzedaz[$counter_line]["sprzedaz_id"] .= $line[$i];
                        break;
                    case 1:
                        $sprzedaz[$counter_line]["sprzedaz_produkt"] .= $line[$i];
                        break;
                    case 2:
                        $sprzedaz[$counter_line]["sprzedaz_cena"] .= $line[$i];
                        break;
                    case 3:
                        $sprzedaz[$counter_line]["sprzedaz_data"] .= $line[$i];
                        break;
                }
            }
        }
        $counter_line++;
    }while(!feof($sprzedaz_handle));

    fclose($sprzedaz_handle);

    usort($sprzedaz, 'compareById');
    return $sprzedaz;
}

function getSprzedazId(){
    $idArr = array();
    foreach(getSprzedaz() as $element){
        array_push($idArr, $element["sprzedaz_id"]);
    }
    return $idArr;
}

function addSprzedaz($produkt, $cena, $data){

    $idArr = getSprzedazId();

    $id = rand(1,100);
    if(in_array($id, $idArr)){
        do{
            $id++;
        }while(in_array($id, $idArr));
    }

    $sprzedaz_handle = fopen("./sprzedaz.csv", "a");
    $value = "\n".$id.','.$produkt.','.$cena.','.$data;

    fwrite($sprzedaz_handle, $value);

    fclose($sprzedaz_handle);
}

function writeSprzedaz($sprzedaz){
    $sprzedaz_handle = fopen("./sprzedaz.csv","w");

    $content = "";
    for($i = 0; $i < sizeof($sprzedaz); $i++){
        if(!$sprzedaz[$i]["sprzedaz_id"]) continue;
        $content .= $sprzedaz[$i]["sprzedaz_id"].",";        
        $content .= $sprzedaz[$i]["sprzedaz_produkt"].",";        
        $content .= $sprzedaz[$i]["sprzedaz_cena"].",";        
        $content .= $sprzedaz[$i]["sprzedaz_data"]."\n";        
    }

    fwrite($sprzedaz_handle, $content);
    fclose($sprzedaz_handle);  
}

function findSprzedaz($id){
    $count = 0;
    $found = false;
    while($count < sizeof(getSprzedaz())){
        if(getSprzedaz()[$count]["sprzedaz_id"] == $id){
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

function deleteSprzedaz($id){
    if(!findSprzedaz($id)) return;

    $sprzedaz = getSprzedaz();
    unset($sprzedaz[findSprzedaz($id)]);
    $sprzedaz = array_values($sprzedaz);

    writeSprzedaz($sprzedaz);
}

function updateSprzedaz($id, $produkt, $cena, $data){
    if(!findSprzedaz($id)) return;

    $sprzedaz = getSprzedaz();

    $sprzedaz[findSprzedaz($id)]["sprzedaz_produkt"] = $produkt;
    $sprzedaz[findSprzedaz($id)]["sprzedaz_cena"] = $cena;
    $sprzedaz[findSprzedaz($id)]["sprzedaz_data"] = $data;

    writeSprzedaz($sprzedaz);
}

function qMaxSprzedaz(){
    return getSprzedaz()[array_search(max(array_column(getSprzedaz(), "sprzedaz_cena")), array_column(getSprzedaz(), "sprzedaz_cena"))];
}

function qMaxProdukt(){
    $produktMap = array();
    foreach(getSprzedaz() as $element){
        if(!array_key_exists($element["sprzedaz_produkt"],$produktMap)){
            $produktMap[$element["sprzedaz_produkt"]] = $element["sprzedaz_cena"];
        }
        else{
            $produktMap[$element["sprzedaz_produkt"]] += $element["sprzedaz_cena"];
        }
    }
    arsort($produktMap);
    return array(array_key_first($produktMap) => $produktMap[array_key_first($produktMap)]);
}

function qCountSprzedaz(&$date1, &$date2){
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $date1 > $date2 ? swap($date1, $date2) : null;
    $countSprzedaz = 0;

    foreach(getSprzedaz() as $element){
        if(strtotime($element["sprzedaz_data"]) >= $date1 && strtotime($element["sprzedaz_data"]) <= $date2){
            $countSprzedaz++;
        }
    }

    return $countSprzedaz;
}

function qSumSprzedaz(&$date1, &$date2){
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $date1 > $date2 ? swap($date1, $date2) : null;
    $sumSprzedaz = 0;

    foreach(getSprzedaz() as $element){
        if(strtotime($element["sprzedaz_data"]) >= $date1 && strtotime($element["sprzedaz_data"]) <= $date2){
            $sumSprzedaz += $element["sprzedaz_cena"];
        }
    }

    return $sumSprzedaz;
}

?>