<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 06/10/2015
 * Time: 22:51
 */
//génération d'un fichier excel qui contient les notes de stage et d'expre com pour tous les élèves d'un promo
$_POST['id_section']=4;
$_POST['type_note']= 'ang';

include_once('../etudiantDAO.php');
include_once('../notationDAO.php');
require_once('../../Contenu/PHPExcel/Classes/PHPExcel.php');

$section = $_POST['id_section'];
$type_notes = $_POST['type_note']; // type definit le document à creer, si'il s'agit de l'excel pour l'anglais, ou bien de celui pour le stage
$nom = 'stage';

$etDao = new etudiantDAO();
$etudiants = $etDao->readEtudiantSection($section);

//print_r($etudiants);

$classeur = new PHPExcel;

$classeur->getProperties()->setCreator("");

$classeur->setActiveSheetIndex(0);

$feuille=$classeur->getActiveSheet();



// ajout des données dans la feuille de calcul

$feuille->setTitle('note de la promo');
if ($type_note = 'ang') {

    $feuille->setCellValueByColumnAndRow(0, 1, 'Etudiant');  //renseigne le titre des colonnes
    $feuille->setCellValueByColumnAndRow(1, 1, 'Note d\'anglais');  //renseigne le titre des colonnes
    $cmpt = 2;
    foreach ($etudiants as $e) {
        $notationdao = new notationDAO();
        $notation = $notationdao->readNotationByIdEtu($e->getId());
        $feuille->setCellValueByColumnAndRow(0, $cmpt, $e->getNom() . ' ' . $e->getPrenom());
        $feuille->setCellValueByColumnAndRow(1, $cmpt, $notation->getNoteAnglais());
        $cmpt++;
    }
}
else {

    $feuille->setCellValueByColumnAndRow(0, 1, 'Etudiant');
    $feuille->setCellValueByColumnAndRow(1, 1, 'Note d\'Exprecom');
    $feuille->setCellValueByColumnAndRow(2, 1, 'Note de Stage');
    $cmpt = 2;
    foreach ($etudiants as $e) {
        $notationdao = new notationDAO();
        $notation = $notationdao->readNotationByIdEtu($e->getId());
        $feuille->setCellValueByColumnAndRow(0, $cmpt, $e->getNom() . ' ' . $e->getPrenom());
        $feuille->setCellValueByColumnAndRow(1, $cmpt, $notation->getNoteExpcom());
        $feuille->setCellValueByColumnAndRow(2, $cmpt, $notation->getNoteStage());
        $cmpt++;
    }
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="'.$nom.'.xlsx"');

header('Cache-Control: max-age=0');

$writer = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007');

$writer->save('php://output');

?>