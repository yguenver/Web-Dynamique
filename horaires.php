<?php
	//echo 'faut danser';
	//include('Afficher.php');
	//	session_start();
	if(!isset($_SESSION['login'])) { session_start();include('connexion.php');}
	//include('AjouterAuPanier.php')
	//include('connexion.php');
	//include ('connexionLogin.php');
?>
<html>
  <head>
		<meta content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" media="all" />
    	<title>Productix</title>
  </head>
  <body>
  <div id="menuConnex"><form name="Connexion" method="post" action="index.php" action="deconnexion.php">
  <div class="bienvenu">Bienvenu <?php echo $_SESSION['login'] ?>
  <input type="submit" name="disconnect" value="Deconnexion" /></div>
  <!--<a href="MonPanier.php" type="submit" name="connect" >Connexion</a>-->
  </form>
  </div>
  	<div id="entetePage">
  		<h1><u>Poductix</u></h1>
  		<p>Les produits comme vous ne les avez jamais vu!</p>
  	</div>
		<ul id="menuBarre">
  			<center>
			<li>
				<form id="Accueil" name="Accueil" method="post" class="menu" >
					<input type="submit" name="Accueil" class="menu" value="Accueil" />
				</form>
			<!--<a href="">Accueil</a></li> <!-- onclick= document.getElementById("Nouveaute").submit()-->
			<li>
				<form id="Nouveautes" name="Nouveautes" method="post" class="menu" >
					<input type="submit" name="Nouveaute" class="menu" value="Nouveautés" />
				</form>
				<!--<a href="#" onclick='Nouveaute.submit()'>Nouveautés</a>-->
			</li>
			<li>
			<form method="post" name="Trier" >
				<input type="submit" name="Trier" value="Trier Par:" class="menu" />
				<select name="searchBy">
					<option value="Jeu">Nom</option>
					<option value="AgeMin">Age</option>
					<option value="TypeJeux">Genre</option>
					<option value="DateDeSortie">Nouveautés</option>
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
				<input type="submit" name="Rechercher" value="Rechercher:" class="menu" />
				<select name="selectSearch">
					<option value="Nom">Nom</option>
					<option value="AgeMin">Age</option>
					<option value="TypeJeux">Type de Jeu</option>
				</select>
				<input type="text" name="searchVal" />
			</form>
			</li>
			</center>
		</ul>
		<center>
		<form method="post" action="AjouterAuPanier.php">
			Horaires de réservation: <br>entre 
			<select name="creneauMinAnnee">
				<?php
					$Today = date_create('Now');
					$In50Years = date_create('Now');
					$In50Years = date_modify($In50Years, '+50 years');
					for($i = date_format($Today, "Y"); $i <= date_format($In50Years, "Y"); $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMinMois">
				<?php
					for($i = 01; $i <= 12; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMinJour">
				<?php
					for($i = 01; $i <= 31; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMinHeure">
				<?php
					for($i = 00; $i <= 23; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMinMin">
				<?php
					for($i = 00; $i <= 59; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMinSec">
				<?php
					for($i = 00; $i <= 59; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			 <br>et 
			
			<select name="creneauMaxAnnee">
				<?php
					$Today = date_create('Now');
					$In50Years = date_create('Now');
					$In50Years = date_modify($In50Years, '+50 years');
					for($i = date_format($Today, "Y"); $i <= date_format($In50Years, "Y"); $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMaxMois">
				<?php
					for($i = 01; $i <= 12; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMaxJour">
				<?php
					for($i = 01; $i <= 31; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMaxHeure">
				<?php
					for($i = 00; $i <= 23; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMaxMin">
				<?php
					for($i = 00; $i <= 59; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<select name="creneauMaxSec">
				<?php
					for($i = 00; $i <= 59; $i++)
					{echo'<option value="'.$i.'" >'.$i.'</option>';}
				?>
			</select>
			<br><input type="submit" name="reserver" value="Réserver">
		</form>
		</center>
    	</div>
  	</body>
</html>
