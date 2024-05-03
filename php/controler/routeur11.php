<?php

function routeur11()
{
	require("modele/modele.php");
	$requete21=getShipData();
	require("view/viewBateau.php");
}

?>