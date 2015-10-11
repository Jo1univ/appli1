<?php 

require_once 'Controleur/ControleurAccueil.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
  }

  // Traite une requête entrante
  public function routerRequete() {
     if (isset($_GET['action'])) {
		if ($_GET['action'] == 'billet') {
			$idBillet = intval($this->getParametre($_GET, 'id'));
			if ($idBillet != 0) {
				$this->ctrlBillet->billet($idBillet);
			}
			else throw new Exception("Identifiant de billet non valide");
		}
        else throw new Exception("Action non valide");
	 }
     else {  // aucune action définie : affichage de l'accueil
		$this->ctrlAccueil->accueil();
	 }
 }

  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }

  
  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}