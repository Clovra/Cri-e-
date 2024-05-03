<?php

function routeur10()
{
	require("modele/modele.php");
	$requete20=getAllSpacies();
	require("view/viewEspece.php");
}

?>