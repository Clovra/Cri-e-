<?php

function routeur1()
{
	
		require("modele/modele.php");
		$requete1=getPeche();
		$requete2=getStatuFacture();
		require("view/viewFactureSelonDate.php");
		

}

?>