<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-3.3.5-dist/css/bootstrap.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div class="navbar-fixed-top">  
			<a href="">LP SIL</a>
			<a id="lien_connexion" href="login.html">Connexion</a>
        </div>
		<div class="container">
			<div class="container_principal">
				<div class="bandeau_licence">
					<h1>Licence Professionnelle<br/>Systèmes Informatiques et Logiciels</h1>
					<img id="logo_iut_metz" src="img/Logo_IUT_Metz.Info_UL.small.png" alt="logo iut metz"/>
				</div>
				<div id="contenu">
					<?= $contenu ?>
				</div>
				<hr></hr>
				<footer>
					<a class="lien_bleu" href="https://dptinfo.iut.univ-metz.fr/">
						<small>Département Informatique, IUT de Metz</small>
					</a>
				</footer>
			</div>
		</div>
    </body>
</html>