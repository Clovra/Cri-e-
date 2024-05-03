<?php

function routeur4()
{
	require("modele/modele.php");
	$requete4=getLotNonVendu();
	require("view/viewAssociation.php");
}

?>