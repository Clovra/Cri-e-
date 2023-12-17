<?php
// function routeur1(){
//     require('modele.php');
//     //$req=getLivresColl();
//     require('v_newLivre.php');
//     }

function routeur2(){
    require('modele.php');
    $req=getLot();
    require('v_listeLot.php');
    }

?>