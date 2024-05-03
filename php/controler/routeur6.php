<?php

function routeur6()
{
	require("modele/modele.php");
	$requete8=getCustomerBlocked();
	$requete9=setDeblockCustomer();
	$requete10=getDeblockCustomer();
	require("view/viewDebloquage.php");
}

?>