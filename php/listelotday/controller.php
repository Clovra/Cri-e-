<?php
function routeur2(){
    require('modele.php');
    $req=getLot();
    require('v_listeLot.php');
    }
?>
