<?php
				include('connexion.php');

?>
<html>
  <head>
		<meta content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" media="all" />
    	<title>Productix</title>
  </head>
  <body>
  <div id="menuConnex"><form name="Connexion" method="post" id="Connexion" action="connexionLogin.php">
  <input type="text" name="login" value="Login" />   
  <input type="password" name="mdp" value="Password" /> 
  <input type="hidden" name="connect"/>
  <!--<a href="MonPanier.php"  >--><input type="submit" name="connect" value="Connexion" /><!--</a>-->
 <!-- <a href="" onclick='document.getElementById("Connexion").submit' >Connexion</a>-->
  </form>
  </div>
  	<div id="entetePage">
  		<h1><u>Poductix</u></h1>
  		<p>Les produits comme vous ne les avez jamais vu!</p>
  	</div>
		<ul id="menuBarre">
  			<center>
			<li><a href="index.php">Accueil</a></li> <!-- onclick= document.getElementById("Nouveaute").submit()-->
			</center>
		</ul>
		<center>
			<form action="connexionLogin.php" name="connexion1" method="post">
				Login:			<input type="text" name="login" value="Login"><br>
				Mot de passe:	<input type="password" name="mdp" value="Password" >
				<input type="submit" name="connecter" value="Se Connecter">
			</form>
		</center>
    	<!--</div>-->
  	</body>
</html>
