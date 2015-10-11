<?php

include_once("connexion.php");
include_once("Etudiant.php");

class etudiantDAO{
   
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


   function create() {
    /*Not necessary here*/
   }

    function readAll() { 
		global $bdd;
        $getEtud = $bdd->prepare("SELECT * FROM etudiant");
        $getEtud->execute();
        $result = $getEtud->fetchAll();
	
        $tab_etu = Array();
        $cmpt=0;
        foreach( $result as $et){
            $objEt = new Etudiant(1,$et['nom'],$et['prenom'],'','','','');
            $tab_etu[$cmpt] = $objEt;
            $cmpt++;

        }
        return $tab_etu;
    }

   function readEtudiant($id) {
	   global $bdd;
    $getEtud = $bdd->prepare("SELECT nom, prenom FROM etudiant WHERE no_etud = :id");
    $getEtud->bindParam(':id', $id, PDO::PARAM_STR);
    $getEtud->execute();
    $result = $getEtud->fetch();
    return $result;
   }

   function readIdEtudiant($nom,$prenom) {
    global $bdd;
    $getEtud = $bdd->prepare("SELECT no_etud FROM etudiant WHERE nom=:nom AND prenom=:prenom");
    $getEtud->bindParam(':nom', $nom, PDO::PARAM_STR);
    $getEtud->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $getEtud->execute();
    $result = $getEtud->fetch();
    return $result;
   }

   function readEtudiantSection($id) {
       global $bdd;
    $getEtud = $bdd->prepare("SELECT no_etud ,nom, prenom,annee_diplome, email, no_section, enq_mot_de_passe FROM etudiant WHERE no_section = :id");
    $getEtud->bindValue(':id', $id);
    $getEtud->execute();
       $result = $getEtud->fetchAll();
       $tab = array();
       $cmpt = 0;
       foreach ($result as $et){
           $tab[$cmpt] = new Etudiant($et['no_etud'],$et['nom'],$et['prenom'],$et['annee_diplome'],$et['email'],$et['enq_mot_de_passe']);
           $cmpt++;
       }
       return $tab;
   }

   function readEtudiantSoutenance($id) {
       global $bdd;
    $getEtud = $bdd->prepare("SELECT no_etud ,nom, prenom,annee_diplome, email, no_section, enq_mot_de_passe  FROM etudiant, soutenance WHERE etudiant.no_etud = soutenance.no_etud AND soutenance.no_sout=:id");
    $getEtud->bindParam(':id', $id);
    $getEtud->execute();
    $result = $getEtud->fetchAll();
       $tab = array();
       $cmpt = 0;
    foreach ($result as $et){
        $tab[$cmpt] = new Etudiant($et['no_etud'],$et['nom'],$et['prenom'],$et['annee_diplome'],$et['email'],$et['enq_mot_de_passe']);
        $cmpt++;
    }
       return $tab;
   }

   function update() {
    /*Not necessary here*/
   }

   function delete() {
    /*Not necessary here*/
   }
 }