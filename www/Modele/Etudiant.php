<?php 

include "Personne.php";
class Etudiant extends Personne{ 
		private $anneediplome;
		
		function __construct($id,$nom,$prenom,$mail,$annee,$mdp){
			parent::__construct($id,$nom,$prenom,$mail,$mdp);
			$this->anneediplome = $annee ;

		}
		
		function getAnnee(){
			return $this->anneediplome ;
		}
		
	}
?>