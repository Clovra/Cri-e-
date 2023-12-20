<?php

function getLot(){
    $date = date("Y-m-d");
    require_once("sqlConnect.php"); 
    $bdd = getBDD();
    $req = $bdd->query("SELECT * FROM lot WHERE idDatePeche = '$date' and StatusLot= 'vendu'");
    return $req;
}
?>