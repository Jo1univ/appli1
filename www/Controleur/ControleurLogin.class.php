<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 01/10/2015
 * Time: 00:52
 */
class ControleurLogin{
    private $vue;

    function __construct($vuefile){//chemin vers le fichier de la vue
        $this->vue = $vuefile;
    }

    function getVue(){
        return $this->vue ;

    }

   function afficheVue(){

       include_once($this->getVue());
   }

    function getLogin(){

    return $_POST['txt_login'];
    }

    function getMdp(){

        return $_POST['txt_mdp'];
    }

    function checkLog(){


    }
}
?>