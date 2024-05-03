<?php

function getBDD() {
    try{
        $bdd = new PDO ("mysql:host=localhost;dbname=bddcriee;charset=utf8","root","");
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch (Exception $e) {
        $msg = 'ERREUR PDO dans' . $e -> getFile() . 'L.' . $e -> getLine() . ' : ' . $e -> getMessage();
        die($msg);
    }
}
?>