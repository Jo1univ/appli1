<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 05/10/2015
 * Time: 06:15
 */
include_once('encadrantDAO.php');

$daoE = new encadrantDAO();
$tab = $daoE->readAll(); //crée une table de tous les encadrants
$tabJson = array() ;
$cmpt = 0;
$outp = "[";
//foreach($tab as $enc){
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"id":"'  . $tab[0]->id . '",';
        $outp .= '"nom":"'   . $tab[0]->nom        . '",';
        $outp .= '"prenom":"'. $tab[0]->prenom     . '",';
      $outp .= '"mail":"'  . $tab[0]->mail . '",';
      $outp .= '"mdp":"'   . $tab[0]->mdp       . '"}';
$outp .="]";

echo $outp;
//}
?>