<?php
$pilihan = 3;

switch($pilihan){
    case 1:
        echo "hebat";
        break;
    case 2:
        echo "jelek";
        break;
    default:
        echo "wow";
}

for($i = 1; $i <= 20; $i++){
    echo $i;
}

$buah = ["apel", "jeruk", "mangga"];
for($i = 0; $i < count($buah); $i++){
    echo $buah[$i];
}



?>