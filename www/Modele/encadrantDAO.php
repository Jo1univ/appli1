<?php

include("connexion.php");

 class encadrantDAO{
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
    /*Not needed here*/
   }

   function readAll() {
       global $bdd;
    $getEnc = $bdd->prepare("SELECT * FROM encadrant");
    $getEnc->execute();
    $result = $getEnc->fetchAll();
       $tab_enc = Array();
       $cmpt = 0;
       foreach($result as $enc){
           $e = new Encadrant('1',$enc['nomenc'],$enc['prenomenc'],'','','','');
           $tab_enc[$cmpt] = $e ;
       }
    return $tab_enc;
   }

   function readEncadrant($id) {
    $getEnc = $dbConnect->prepare("SELECT nomenc,prenomenc FROM encadrant WHERE no_enc = :id");
    $getEnc->bindParam(':id', $id, PDO::PARAM_VARCHAR);
    $getEnc->execute();
    $result = $GetEnc->fetch();
    return $result;
   }

   function readEncadrantMdp($mdp) {
    $getEnc = $dbConnect->prepare("SELECT nomenc,prenomenc FROM encadrant WHERE mdp_encadrant = :mdp");
    $getEnc->bindParam(':mdp', $id, PDO::PARAM_VARCHAR);
    $getEnc->execute();
    $result = $GetEnc->fetch();
    return $result;
   }

   function update() {
    /*Not needed here*/
   }

   function delete() {
    /*Not needed here*/
   }
 }