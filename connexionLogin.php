<?php
	session_start();
	include('connexion.php');
	if(!isset($_SESSION['login']))
	{
		if(!empty($_POST['login']) && !empty($_POST['mdp']))
		{
			$loginClient = $_POST['login'];
			$mdpClient = $_POST['mdp'];
			$Where = " WHERE Login = '".$loginClient."';";
			$Select = "SELECT * FROM client".$Where;
			echo $Select;
			$result = mysql_query($Select);
			$LeClient = mysql_fetch_assoc($result);
			if($LeClient != NULL)
			{
				//echo $loginClient.'<br>';
				//echo  mysql_result(mysql_query("SELECT Mdp FROM client WHERE Login = '".$loginClient."'"), 0);
				if($LeClient = mysql_result(mysql_query("SELECT Mdp FROM client".$Where), 0) == $mdpClient)
				{
					$_SESSION['login'] = $_POST['login'];
					//echo "Bienvenu ".$loginClient;
					include('MonPanier.php');
				}
			}else {include('pageConnexion.php');}
		}
	}else {include ('MonPanier.php');}
	
?>