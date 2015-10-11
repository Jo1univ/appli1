<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 01/10/2015
 * Time: 01:32
 */
?>
<div class="form-group" id="div_connexion">
			<form role="form" action="" method="POST">
				<label for="identifiant">Identifiant</label>
				<select style="width:200px;" class="form-control" id="identifiant" name="id" required>
					<option style="display:none;" value="">&nbsp;</option>
					<option> Valentin EZZAHI</option>
					<option> Thomas MEDER</option>
					<option> Jordan RAIMONDI</option>
					<option> Yannick FERREIRA</option>
				</select>
				<label for="mot_de_passe">Mot de passe</label>
				<input style="width:200px;" class="form-control" id="mot_de_passe" type="text" name="pass" required>
				<!-- <input class="btn btn-default" type="submit" value="Valider"> -->
				<a href="#openModal">Valider</a>
				<div id="openModal" class="modalDialog">
					<div>
					<a href="#close" title="Close" class="close">X</a>
					<h2>Choix du module</h2>
					<p>Souhaitez-vous accéder au module de pénalités ou de soutenances ? test test</p>
					<p>
						<button class="btn btn-default" onClick="location.href='../penalites.html'">Pénalités</button>
						<button class="btn btn-default" onClick="location.href='../soutenances.html'">Soutenances</button>
					</p>
					</div>
				</div>
			</form>
		</div>