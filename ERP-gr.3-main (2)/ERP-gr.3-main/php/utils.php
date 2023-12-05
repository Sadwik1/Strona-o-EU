<?php

// Sortuje rosnąco po pierwszym kluczu w obiekcie -> id
function compareById($element1, $element2){
    return (int)$element1[key($element1)] - (int)$element2[key($element2)];
}

function swap(&$val1, &$val2){
    $buf = $val1;
    $val1 = $val2;
    $val2 = $buf;
}

?>