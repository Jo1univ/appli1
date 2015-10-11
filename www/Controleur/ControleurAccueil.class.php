<?php

include "../Modele/etudiantDAO.php";
$etudiants = new etudiantDAO();
$res = $etudiants->readAll();
foreach($res as $et) {
	echo $et->getNom();
}
include "../Vue/vueAccueil.php";
include "../Vue/gabarit.php";