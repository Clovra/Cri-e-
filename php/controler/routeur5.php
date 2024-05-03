<?php

function routeur5()
{
	require("modele/modele.php");
	$requete5=getLotNonPayer();
	$requete6=getCustomerForBlock();
	$requete7=setBlock();
	$requete8=getCustomerBlocked();
	$requete9=setDeblockCustomer();
	$requete10=getDeblockCustomer();
	require("view/viewBloquage.php");
}

?>