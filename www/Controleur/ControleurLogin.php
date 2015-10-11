<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 28/09/2015
 * Time: 04:47
 */

class ControleurLogin{
    private $vue;

    function __construct($vuefile){//chemin vers le fichier de la vue
        $this->vue = $vuefile;
    }

    function getVue(){//renvoie un tableau qui contient le contenu du fichier ligne par ligne
       return file($this->vue);

    }

    function afficheVue(){

        return($this->getVue());
    }

    function getLogin(){

        return $_POST['txt_login'];
    }

    function getMdp(){

        return $_POST['txt_mdp'];
    }

    function checkLog($encDAO){


    }
}
?>