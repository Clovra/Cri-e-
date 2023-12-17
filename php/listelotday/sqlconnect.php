<?php
    function getBDD (){
        $user = 'root';
        $pass = '';
        $bdd = new PDO('mysql:host=localhost;dbname=bddcriee', $user, $pass);
        return $bdd ;
    }
?>