<?php

function routeur8()
{
	require("modele/modele.php");
	$requete16=getXmlFile();
	$requete17=getDateFact();
	$requete18=setXmlData();
	require("view/viewGenererXml.php");
}

?>