<?php
class Notation{
   private $id ;
    private $penalite1;
	private $penalite2;
	private $noteSoutenance;
	private $noteRapport;
	private $noteTechnique;
	private $noteAnglais;
	private $noteStage;
	private $noteExpCom;
	
	public function __construct(){
		$ctp = func_num_args();
		$args = func_get_args();
		switch($ctp)
		{
			case 9:
				$this->Const9($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7],$args[8]);
            break;
			default:
				break;
		}


	}

	public function Const9($id, $pen1, $pen2,$soutenance,$rapport, $technique,$anglais,$stage, $exp){
		$this->id = $id;
		$this->penalite1 = $pen1;
		$this->penalite2 = $pen2;
		$this->noteSoutenance = $soutenance ;
		$this->noteRapport = $rapport ;
		$this->noteTechnique = $technique ;
		$this->noteAnglais = $anglais ;
		$this->noteStage = $stage ;
		$this->noteExpCom = $exp ;

	}
	
	function getId(){
		return $this->id ;
	}
	
	function getPenalite1(){
		return $this->penalite1 ;
	}
	
	function getPenalite2(){
		return $this->penalite2 ;
	}
	
	function getNoteSoutenance(){
		return $this->noteSoutenance ;
	}
	
	function getNoteRapport(){
		return $this->noteRapport ;
	}
	
	function getNoteTechnique(){
		return $this->noteTechnique;
	}
	
	function getNoteAnglais(){
		return $this->noteAnglais ;
	}

	/**
	 * @return mixed
	 */
	public function getNoteExpCom()
	{
		return $this->noteExpCom;
	}

	/**
	 * @return mixed
	 */
	public function getNoteStage()
	{
		return $this->noteStage;
	}

	/**
	 * @param mixed $penalite1
	 */
	public function setPenalite1($penalite1)
	{
		$this->penalite1 = $penalite1;
	}

	/**
	 * @param mixed $penalite2
	 */
	public function setPenalite2($penalite2)
	{
		$this->penalite2 = $penalite2;
	}

	/**
	 * @param mixed $noteSoutenance
	 */
	public function setNoteSoutenance($noteSoutenance)
	{
		$this->noteSoutenance = $noteSoutenance;
	}

	/**
	 * @param mixed $noteRapport
	 */
	public function setNoteRapport($noteRapport)
	{
		$this->noteRapport = $noteRapport;
	}

	/**
	 * @param mixed $noteTechnique
	 */
	public function setNoteTechnique($noteTechnique)
	{
		$this->noteTechnique = $noteTechnique;
	}

	/**
	 * @param mixed $noteAnglais
	 */
	public function setNoteAnglais($noteAnglais)
	{
		$this->noteAnglais = $noteAnglais;
	}

	/**
	 * @param mixed $noteStage
	 */
	public function setNoteStage($noteStage)
	{
		$this->noteStage = $noteStage;
	}

	/**
	 * @param mixed $noteExpCom
	 */
	public function setNoteExpCom($noteExpCom)
	{
		$this->noteExpCom = $noteExpCom;
	}
	
	function calculNoteExpcom($coefR, $coefS){
		//calcul de la note d'expre. com.  : moyenne des notes de soutenance et d'anglais
		$rap = getNoteRapport();
		$stnce = getNoteSoutenance();
		$crap = $coefR->getVal();
		$cstnce = $coefS->getVal();
		
		return ($rap * $crap + $stnce * $cstnce)/ ($crap+$stnce) ;
	}
	
	function calculNoteStage($coefS, $coefR, $coefT){
		//calcul de la note d'expre. com.  : moyenne des notes de soutenance et d'anglais
        $rap = getNoteRapport();
        $stnce = getNoteSoutenance();
        $tech = getNoteTechnique();
        $ctech = $coefT->getVal();
        $crap = $coefR->getVal();
        $cstnce = $coefS->getVal();
		
		return ($rap * $crap + $stnce * $cstnce + $tech * $ctech)/ ($crap+$stnce+$tech) ;
	}
	
	
}
?>