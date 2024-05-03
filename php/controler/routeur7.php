<?php

function routeur7()
{
	require("modele/modele.php");
	$requete11=getLotVendu();
	$requete12=getCustomerForMail();
	$requete13=sendFacture();
	$requete14=getMail();
	require("view/viewFactureParMail.php");
}

?>