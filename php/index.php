<?php
require ("view/header.php");

if (isset($_GET["uc"])){
    $action = $_GET["uc"];
   
}
else{
    $action = "home";
}

// les differentes pages et les fonctions qu'elles declenchent

    switch ($action) {
        case "select":
            require("controler/routeur1.php");
            routeur1();
            break;
        case "equarissage":
            require("controler/routeur2.php");
            routeur2();
            break;
        case "home":
            require("controler/routeur3.php");
            routeur3();
            break;
        case "association":
            require("controler/routeur4.php");
            routeur4();
            break;
        case "bloquer":
            require("controler/routeur5.php");
            routeur5();
            break;
        case "deblock":
            require("controler/routeur6.php");
            routeur6();
            break;
        case "mail":
            require("controler/routeur7.php");
            routeur7();
            break;
        case "xml":
            require("controler/routeur8.php");
            routeur8();
            break;
        case "graph":
            require("controler/routeur9.php");
            routeur9();
            break;
        case "espece":
            require("controler/routeur10.php");
            routeur10();
            break;
        case "batal":
            require("controler/routeur11.php");
            routeur11();
            break;
        case "ajoutasso":
            require("controler/routeur12.php");
            routeur12();
            break;
        case "ajoutacheteur":
            require("controler/routeur13.php");
            routeur13();
            break;
    }


?>