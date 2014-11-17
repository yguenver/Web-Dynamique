<html>
  <head>
		<meta content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" media="all" />
    	<title>Productix</title>
  </head>
  <body>
  	<div id="entetePage">
  		<h1><u>Poductix</u></h1>
  		<p>Les produits comme vous ne les avez jamais vu!</p>
  	</div>
		<ul id="menuBarre">
  			<center>
			<li><a href="http://127.0.0.1/L2SPI/WebDesign/Projet/">Accueil</a></li>
			<li><a href="#">Nouveautés</a></li>
			<li>
			<form method="post" name="Trier" >
				<input type="submit" value="Trier Par:" />
				<select name="searchBy">
					<option value="Nom">Nom</option>
					<option value="AgeMin">Age</option>
					<option value="TypeJeux">Genre</option>
					<option value="Id">Nouveautés</option>
				</select>
				<!--<a>Trier par...</a>
				<ol class="Trie">
					<li>Nom</li>
					<li>Age</li>
					<li>Genre</li>
					<li>Date</li>
				</ol>
				-->
			</form>
			</li>
			<li class="right">
			<form method="post" >
				<input type="submit" value="Rechercher:" />
				<select name="selectSearch">
					<option value="Nom">Nom</option>
					<option value="AgeMin">Age</option>
					<option value="TypeJeux">Type de Jeu</option>
				</select>
				<input name="searchVal" />
			</form>
			</li>
			</center>
		</ul>
		<table>
			<?php
				include('connexion.php');
				include('Afficher.php');
			?>
			
		</table>
    </div>
  </body>
</html>
