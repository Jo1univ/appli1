<?php

include_once("connexion.php");
//include("commentairesDAO.php")
include_once("etudiantDAO.php");
include_once("Notation.php");
class notationDAO{
   var $conn;
  
    /*public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new PDO(
                    'mysql:host=localhost;dbname=pdo_example', 
                    'root', 
                    'root'
                );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        }
    }*/


  //Create
   function createNote($libelle,$coefficient) {
    for($i=0;$i<=4;$i++){
      createCom('');
    }
    $maxIdCom=readMaxIdCom();
    $idComStage=$maxIdCom-4;
    $idComExpCom=$maxIdCom-3;
    $idComEng=$maxIdCom-2;
    $idComPenalite1=$maxIdCom-1;
    $idComPenalite2=$maxIdCom;
    $create = $bdd->prepare("INSERT INTO notation (no_note,note_soutenance,note_rapport, note_technique,note_stage,no_com_stage,note_expCom,no_com_expCom,note_eng,no_com_eng,penalite1,no_com_penalite1,penalite2,no_com_penalite1) 
      VALUES (0,'','','','',:idComStage,'',:idComExpCom,'',:idComEng,0,:idComPenalite1,0,:idComPenalite2)");
    $create->bindParam(':idComStage', $idComStage, PDO::PARAM_INT);
    $create->bindParam(':idComExpCom', $idComExpCom, PDO::PARAM_INT);
    $create->bindParam(':idComEng', $idComEng, PDO::PARAM_INT);
    $create->bindParam(':idComPenalite1', $idComPenalite1, PDO::PARAM_INT);
    $create->bindParam(':idComPenalite2', $idComPenalite2, PDO::PARAM_INT);
    $create->execute();
   }



   //Read
   function read3Note($id) {
    $getNote = $bdd->prepare("SELECT note_soutenance, note_rapport, note_technique FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $pos++;
    }
    return $result;
   }

   function read3NoteEtudiant($nom,$prenom) {
    $idEtud=readIdEtudiant($nom,$prenom);
    $getNote = $bdd->prepare("SELECT note_soutenance, note_rapport, note_technique AS note FROM notation, stage, etudiant WHERE notation.no_stage = stage.no_stage AND stage.no_etud = etudiant.no_etud AND no_note = :id");
    $getNote->bindParam(':id', $idEtud, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $pos++;
    }
    return $result;
   }

    function readNotationByIdEtu($id){
        global $bdd;
        //$etudiants = new etudiantDAO();
       // $idEtud=$etudiants->readIdEtudiant($nom,$prenom);
        $getNote = $bdd->prepare("SELECT note_soutenance, note_rapport, note_technique, note_stage, note_expCom, note_eng FROM notation, stage, etudiant WHERE notation.no_stage = stage.no_stage AND stage.no_etud = etudiant.no_etud AND etudiant.no_etud = :id");
        $getNote->bindValue(':id', $id);
        $getNote->execute();
        $res = $getNote->fetch();
        $notation = new Notation();
        $notation->setNoteSoutenance($res['note_soutenance']);
        $notation->setNoteRapport($res['note_rapport']);
        $notation->setNoteTechnique($res['note_technique']);
        $notation->setNoteStage($res['note_stage']);
        $notation->setNoteExpCom($res['note_expCom']);
        $notation->setNoteAnglais($res['note_eng']);
        return $notation;

    }

   function readNoteEng($nom,$prenom) {
    global $bdd;
    $etudiants = new etudiantDAO();
    $idEtud=$etudiants->readIdEtudiant($nom,$prenom);
    $getNote = $bdd->prepare("SELECT note_eng AS note FROM notation, stage, etudiant WHERE notation.no_stage = stage.no_stage AND stage.no_etud = etudiant.no_etud AND etudiant.no_etud = :id");
    $getNote->bindParam(':id', $idEtud[0], PDO::PARAM_INT);
    $getNote->execute();
    $res = $getNote->fetch();
	  return $res[0];
   }

   function readNoteStage($nom,$prenom) {
    global $bdd;
    $etudiants = new etudiantDAO();
    $idEtud=$etudiants->readIdEtudiant($nom,$prenom);
    $getNote = $bdd->prepare("SELECT note_stage AS note FROM notation, stage, etudiant WHERE notation.no_stage = stage.no_stage AND stage.no_etud = etudiant.no_etud AND etudiant.no_etud = :id");
    $getNote->bindParam(':id', $idEtud[0], PDO::PARAM_INT);
    $getNote->execute();
    $res = $getNote->fetch();
	 return $res[0];
   }

   function readNoteExpCom($nom,$prenom) {
     global $bdd;
    $etudiants = new etudiantDAO();
    $idEtud=$etudiants->readIdEtudiant($nom,$prenom);
    $getNote = $bdd->prepare("SELECT note_expCom AS note FROM notation, stage, etudiant WHERE notation.no_stage = stage.no_stage AND stage.no_etud = etudiant.no_etud AND etudiant.no_etud = :id");
    $getNote->bindParam(':id', $idEtud[0], PDO::PARAM_INT);
    $getNote->execute();
    $res = $getNote->fetch();
	 return $res[0];
   }

   function readPenalite($id) {
    global $bdd;
    $etudiants = new etudiantDAO();
    $idEtud=$etudiants->readIdEtudiant($nom,$prenom);
    $getNote = $bdd->prepare("SELECT penalite1, penalite2 AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $pos++;
    }
    return $result;
   }

   function readCommentStage($id) {
    $getNote = $bdd->prepare("SELECT no_com_stage AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $result = readCom($result);
      $pos++;
    }
    return $result;
   }

   function readCommentEng($id) {
    $getNote = $bdd->prepare("SELECT no_com_eng AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $result = readCom($result);
      $pos++;
    }
    
    return $result;
   }

   function readCommentExpCom($id) {
    $getNote = $bdd->prepare("SELECT no_com_expCom AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $result = readCom($result);
      $pos++;
    }
    return $result;
   }

   function readCommentPenalite1($id) {
    $getNote = $bdd->prepare("SELECT no_com_penalite1 AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $result = readCom($result);
      $pos++;
    }
    return $result;
   }

   function readCommentPenalite2($id) {
    $getNote = $bdd->prepare("SELECT no_com_penalite2 AS note FROM notation WHERE no_note = :id");
    $getNote->bindParam(':id', $id, PDO::PARAM_INT);
    $getNote->execute();
    while($tab=$getNote->fetch()){
      $result[$pos]=$tab['note'];
      $result = readCom($result);
      $pos++;
    }
    return $result;
   }



   //Update
   function updateComStage($id,$commentaire) {
    $idCom=readCommentStage($id);
    updateCom($idCom,$commentaire);
   }

   function updateComExpCom($id,$commentaire) {
    $idCom=readCommentExpCom($id);
    updateCom($idCom,$commentaire);
   }

   function updateComEng($id,$commentaire) {
    $idCom=readCommentEng($id);
    updateCom($idCom,$commentaire);
   }

   function updateComPenalite1($id,$commentaire) {
    $idCom=readCommentPenalite1($id); 
    updateCom($idCom,$commentaire);
   }

   function updateComPenalite2($id,$commentaire) {
    $idCom=readCommentPenalite2($id); 
    updateCom($idCom,$commentaire);
   }

   function updateNoteTechnique($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_technique = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updateNoteRapport($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_rapport = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updateNoteSoutenance($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_soutenance = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updateNoteStage($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_stage = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updateNoteExpCom($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_expCom = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updateNoteEng($id,$note){
    $update = $bdd->prepare("UPDATE notation SET note_eng = $note WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updatePenalite1($id,$penalite){
    $update = $bdd->prepare("UPDATE notation SET penalite1 = $penalite WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   function updatePenalite2($id,$penalite){
    $update = $bdd->prepare("UPDATE notation SET penalite1 = $penalite WHERE no_note = :id");
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
   }

   //Delete
   function deleteNote($id) {
    $delete = $bdd->prepare("DELETE notation FROM notation WHERE no_note = :id");
    $delete->bindParam(':id', $id, PDO::PARAM_INT);
    $delete->execute();
   }
 }