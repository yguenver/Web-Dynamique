<?php		

	$hostname = "127.0.0.1";
	$user     = "root";
	$password = "";
	$nom_base_donnees = "l2spi_web_project1";
	/*
	$hostname = "http://info.univ-lemans.fr";
	$user     = "info201a_user";
	$password = "com72";
	$nom_base_donnees = "info201a";
	*/
	

	// Connexion permanente au serveur MySQL : mysql_Pconnect
	$conn = mysql_pconnect($hostname, $user, $password) or die(mysql_error());
	// Choix de la base sur laquelle travailler
	mysql_select_db($nom_base_donnees, $conn);
	
	
?>