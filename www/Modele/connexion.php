<?php

//$base = 'distant';
$base = 'local';


try {
	switch($base){
		case 'local' :
			$bdd= new PDO('mysql:host=localhost;dbname=raimondi1u_projet_notation','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true));
			break;

		case 'distant':
			$bdd= new PDO('mysql:host=infodb2.iut.univ-metz.fr;dbname=raimondi1u_projet_notation','raimondi1u_appli','31306060',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true));
			break;

		case 'distant2':
			$bdd= new PDO('mysql:host=mysql.hostinger.fr;dbname=u913005698_user','u913005698_pro','groupe2jtvy',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true));
			break;
	}

	$bdd->exec("SET CHARACTER SET utf8");
	//echo"<p>Vous êtes connecté à la base de données.</p>";
}
catch (Exception $exception)
{
	die($exception->getMessage());
}

?>