<?php 
class Encadrant extends Personne{
	private $exprecom;
	private $incatif;
	private $encadrement;
		
	function __construct($id,$nom,$prenom,$mail,$exprecom, $inactif, $encadrement){
		parent::__construct($id,$nom,$prenom,$mail);
		$this->exprecom = $exprecom ;
		$this->inactif = $inactif ;
		$this->encadrement = $encadrement ;
	}
		
	function isInatcif(){
		return $this->inactif ;
	}

	function isExprecom(){
		return $this->exprecom ;
	}
	function isEncadrement(){
		return $this->encadrement ;
	}
		
	}
?>