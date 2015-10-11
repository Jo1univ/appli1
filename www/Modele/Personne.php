<?php 
class Personne
{
		private $id;
		public $nom;
		private $prenom;
		private $mail;
		private $mdp;
		
		function __construct($id,$nom,$prenom,$mail,$mdp){
			$this->id = $id;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->mail = $mail;
			$this->mdp = $mdp;

		}
		
		function getId(){
			return $this->id ;
		}
		
		function getNom(){
			return $this->nom ;
		}
		
		function getprenom(){
			return $this->prenom ;
		}
		
		function getmail(){
			return $this->mail ;
		}
		
		function getMdp(){
			return $this->mdp ;
		}
		
	}
?>