<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 07/10/2015
 * Time: 01:44
 */
?>
<html>
<form>
    <input type="text" value="" id="noterap"/>
    <input type="text" value="" id="notetech"/>
    <input type="text" value="" id="notesout"/>
    </br> </br>
    <input type="text" value="" id="noteexpcom"/>
    <input type="text" value="" id="notestage"/>
</form>

</html>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script>

function a(){
    return  (Math.random()%(1000*(0-20)+1))/1000.+0;
}

function b(){
    return  (Math.random()%(1000*(0-20)+1))/1000.+0;
}

function calcul(calculEx, calculStage){

    var exp = /^[0-9]{2}[\.,]{1}[0-9]{2}$/; //expression regulière pour tester si ce qui est contenu dans les input correspond à xx.xx ou xx,xx où x un chiffre
    if (($('#noterap').val().match(exp)) && ($('#notetech').val().match(exp)) && ($('#notesout').val().match(exp))){

        $('#noteexpcom').val(calculEx);
        $('#notestage').val(calculStage);

    }

}
$(document).ready(function() {

       $('#noterap').on('keyup',function(){calcul(a,b);});
        $('#notetech').on('keyup',function(){calcul(a,b);});
        $('#notesout').on('keyup',function(){calcul(a,b);});

});


</script>