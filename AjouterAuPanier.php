<?php
	session_start();
	//echo 'coucou';
	//echo $_SESSION['login'].'/'.$_GET['NomJeu'];
	if(isset($_SESSION['login']))
	{		
		if(isset($_GET['NomJeu']))
		$_SESSION['jeu'] = $_GET['NomJeu'];
		
	
/*	if(isset($_POST['reserver']))
		{
			$_SESSION['creneauMin'] = $_POST['creneauMinAnnee'].'-'.$_POST['creneauMinMois'].'-'.$_POST['creneauMinJour'].' '.$_POST['creneauMinHeure'].':'.$_POST['creneauMinMin'].':'.$_POST['creneauMinSec'];
			$_SESSION['creneauMax'] = $_POST['creneauMaxAnnee'].'-'.$_POST['creneauMaxMois'].'-'.$_POST['creneauMaxJour'].' '.$_POST['creneauMaxHeure'].':'.$_POST['creneauMaxMin'].':'.$_POST['creneauMaxSec'];
			$_SESSION['creneauMin'] = date_create($_SESSION['creneauMin']);
			$_SESSION['creneauMax'] = date_create($_SESSION['creneauMax']);
			//echo $_SESSION['creneauMin'];
			include('Ajouter.php');
		}*/
	
			
		if(isset($_POST['_AjoutPanier']))
		{
			include("horaires.php");
		/*}elseif(isset($_POST['_RetirePanier']))
		{
			include("Retirer.php");
			include("MonPanier.php");*/
		} else {
				include("MonPanier.php");
			}
			
	if(isset($_POST['_RetirePanier']))
		{
			include("Retirer.php");
			echo 'avant mon panier.php';
			//include("MonPanier.php");
			echo'avant le header';
			//header("Refresh:0;");
			echo'good123123';

			}
		if(isset($_POST['reserver']))
		{
			$_SESSION['creneauMin'] = $_POST['creneauMinAnnee'].'-'.$_POST['creneauMinMois'].'-'.$_POST['creneauMinJour'].' '.$_POST['creneauMinHeure'].':'.$_POST['creneauMinMin'].':'.$_POST['creneauMinSec'];
			$_SESSION['creneauMax'] = $_POST['creneauMaxAnnee'].'-'.$_POST['creneauMaxMois'].'-'.$_POST['creneauMaxJour'].' '.$_POST['creneauMaxHeure'].':'.$_POST['creneauMaxMin'].':'.$_POST['creneauMaxSec'];
			$_SESSION['creneauMin'] = date_create($_SESSION['creneauMin']);
			$_SESSION['creneauMax'] = date_create($_SESSION['creneauMax']);
			//echo $_SESSION['creneauMin'];
			include('Ajouter.php');
			header("Refresh:0;");
		}
		}//else {include("MonPanier.php");}
?>