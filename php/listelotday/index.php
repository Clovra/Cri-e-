<?php
include "header.php";
require('controller.php');
if (isset($_GET["uc"])){
 $action = $_GET["uc"];
}

else{

 $action = "accueil";
}switch ($action) {
    case "listelot":
    routeur2();
    break;
   } 
?>