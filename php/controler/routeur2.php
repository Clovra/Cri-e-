<?php

function routeur2()
{
		require("modele/modele.php");
		$requete3=getStatuEquarissage();
		require("view/viewEquarissage.php");
}

?>