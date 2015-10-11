<?php
//Accès aux données

/*Si le contexte métier s'enrichit (exemple : gestion des auteurs de billets), 
il suffit de créer une nouvelle classe Auteur dérivée de Modele qui s'appuiera sur les services 
communs fournis par sa superclasse*/

abstract class Modele {

  // Objet PDO d'accès à la BD
  private $bdd;

  // Exécute une requête SQL éventuellement paramétrée
  protected function executerRequete($sql, $params = null) {
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql);    // exécution directe
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);  // requête préparée
      $resultat->execute($params);
    }
    return $resultat;
  }

  // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
  private function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      $this->bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
        'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }

}