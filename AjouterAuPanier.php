<?php
	session_start();
	//echo 'coucou';
	//echo $_SESSION['login'].'/'.$_GET['NomJeu'];
	if(isset($_SESSION['login']) && isset($_GET['NomJeu']))
	{
		$_SESSION['jeu'] = $_GET['NomJeu'];
		echo 'combien?<br>'.$_SESSION['jeu'];
	}
/*	if(isset($_SESSION['login']) && isset($_POST['AjouterNombre']))
	{
	}*/
	include("MonPanier.php");
?>