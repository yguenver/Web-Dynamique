<?php

//include('connexionLogin');
include('Connexion.php');

function ShowMyProducts() {
	//session_start();
if($_SESSION['login'] != "arthur")
{
	//$LeClient = NULL;
	$Where = NULL;
	
	//$LeClient = seConnecter();
	/*if(!empty($_POST['login']) && !empty($_POST['mdp']))
	{
		$loginClient = $_POST['login'];
		$mdpClient = $_POST['mdp'];
		$Where = " WHERE Login = '".$loginClient."';";
		$Select = "SELECT * FROM client".$Where;
		/*echo $Select;
		$result = mysql_query($Select);
		$LeClient = mysql_fetch_assoc($result);*/
		if(isset($_SESSION['login']))
		{
			$loginClient = $_SESSION['login'];
			//echo $loginClient.'<br>';
			//echo  mysql_result(mysql_query("SELECT Mdp FROM client WHERE Login = '".$loginClient."'"), 0);
			/*if($LeClient = mysql_result(mysql_query("SELECT Mdp FROM client".$Where), 0) == $mdpClient)
			{
				echo "Bienvenu ".$loginClient;
				//include('MonPanier.php');
			}*/
			
						//$LastWeek = date_create('Now');
						//$LastWeek = date_modify($LastWeek, '-1 week');
					
					
		}
		
	//}
						$dateToday = date_create('Now');
						$LastWeek = date_create('Now');
						$LastWeek = date_modify($LastWeek, '-1 week');
						
						$Select = "SELECT * FROM jeux";
						if(isset($_SESSION['login'])) {
							$Where = " INNER JOIN paniers USING (Jeu) WHERE Client = '".$loginClient."'";
							$Select .= $Where;
							}
				
				if(isset($_POST['Rechercher']))
				{
					if(!empty($_POST['searchVal']))
					{
						$valSearch = $_POST['searchVal'];
						$selSearch = $_POST['selectSearch'];
						
						switch($selSearch) {
							case "Jeu":
								$Where = " AND UPPER(".$selSearch.') = UPPER("'.$valSearch.'")';
								break;
							case "AgeMin":
								$Where = " AND ".$selSearch.' <= '.intval($valSearch).' AND AgeMax >= '.intval($valSearch);
								break;
							case "TypeJeux":
								$Where = " AND UPPER(".$selSearch.') LIKE UPPER("%'.$valSearch.'%")';
								break;
						}
					}
					
				}
					
					if(isset($_POST['Nouveaute']))
					{
						$Select = "SELECT * FROM jeux WHERE DateDeSortie >= '".date_format($LastWeek, 'Y-m-d')."'";//date_modify(NOW(), '-1 week')
					}
						
							
					if(isset($_POST['Trier']))
					{
						$searchBy = $_POST['searchBy'];
						if($searchBy != "DateDeSortie")
						{
							$Order = " ORDER BY UPPER(".$searchBy.") ASC";
						}else {
							$Order = " ORDER BY ".$searchBy." DESC";
						}
					}else $Order = " ORDER BY DateDeSortie DESC";
					
					if(isset($_POST['Accueil']))
					{
						$Select = "SELECT * FROM jeux";
					}
						
							if($Select == "SELECT * FROM jeux INNER JOIN paniers USING (Jeu) WHERE Client = '".$loginClient."'")
							echo "<center><u>Vos Réservations</u></center>";
						
						//$calculNb = "SELECT COUNT(*) FROM jeux";
							//if($Where != NULL){$calculNb = $calculNb.$Where;}
							$Select .= $Order;
						//$nbResult = mysql_result(mysql_query($calculNb), 0);
						
						//$produitsClients = "SELECT * FROM paniers".$Where;
						//$mesProduits = mysql_fetch_assoc(mysql_query($produitsClients));
							
						$result = mysql_query($Select);
						
						//echo $Where.' / '.$calculNb.' / '.$nbResult.'<br>'.$Select.'<br>'.$result;
					
						$indice = 0;	

						
						/*if(isset($_SESSION['jeu']))
						{
							$Produit = "SELECT * FROM jeux WHERE Jeu ='".$_SESSION['jeu']."'";
							$dataset= mysql_fetch_assoc(mysql_query($Produit));
							echo '<br><br>'.$Produit.'<br>'.$dataset.'<br><br>';
							echo '<table><tr><td>';
							if(!isset($_POST['AjouterNombre']))
							{
								echo '<form method="post" action="AjouterAuPanier.php" >Ajouter combien: <input type="text" name="NombreProduit">';
								echo '<input type="submit" name="AjouterNombre" value="Ajouter"></form>';
							}else 
							{
								$INSERT = "INSERT INTO ";
							}
							if($dataset['DateDeSortie'] >= date_format($dateToday, 'Y-m-d'))
							{
								echo '<p style="position: absoluteheight: 50px;">';
								echo '<img class="attachment" src="IMG/AVenir.png" ';
								if($nbResult == 1){echo ' style="height: 150px"';}//else {echo '"';}
								echo' >';
							}elseif($dataset['DateDeSortie'] >= date_format($LastWeek, 'Y-m-d'))
							{
								echo '<p style="position: absoluteheight: 50px;">';
								echo '<img class="attachment" src="IMG/New.png" ';
								if($nbResult == 1){echo ' style="height: 150px"';}//else {echo '"';}
								echo' >';
							}
						//if($nbResult == 1){echo ' style="font-size: 50px;" ';}
							echo '<p>';
							/////echo '<a class="nomJeu" href="" onclick="document.getElementByName(\'LienProduit\').submit;" >'; 
							/////ou
							/////echo '<a class="nomJeu" type="submit" name="AfficherProd_'.$dataset["Jeu"].'" >'; 
							echo "<b><u>";
							echo $dataset["Jeu"]."</b></u><br>";
							
							echo '<img class="imgListe"';
							echo ' src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Jeu"].'" onclick="Selectionner($Select)" /><br>';
							/*echo '<input type="submit" style="height: 100px;"';
							if($nbResult == 1){echo ' style="height: 500px"';}
							echo ' src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Jeu"].'" name="AfficherProduit_"/ value="result"><br>';
							///////////etoile/
							if($dataset["AgeMax"] != 666)
							{
								echo "<u>de ".$dataset["AgeMin"]." à ".$dataset["AgeMax"]." ans</u><br>";
							}else {
									echo "<u>à partir de ".$dataset["AgeMin"]." ans</u><br>";
								}
							if($dataset["TypeJeux"] != NULL)
								echo '<b>'.$dataset["TypeJeux"].'</b><br>';
							echo $dataset["Description"].'</p>';
							echo '</form></td>';
						}*/
						
							$nbJeu = 0;
							if(isset($_SESSION['login']))
							{
								$selection = "SELECT COUNT(*) FROM paniers WHERE Client = '".$_SESSION['login']."'";
								$nbJeu = mysql_result(mysql_query($selection),0 );
							}
							

							$mesJeux = "SELECT Jeu FROM paniers WHERE Client = '".$_SESSION['login']."'";				
							
						echo '<table><tr>';
						while($dataset = mysql_fetch_array($result))
						{
							$index = 0;			
						
						$selectLudo = "SELECT * FROM jeuxludotheque WHERE NbJeuxDispos > 0 AND Nom = '".$dataset['Jeu']."'";
						$selectJeuxLudo = mysql_fetch_array(mysql_query($selectLudo));
							//echo 'good';
							if($indice %4 == 0 ) {echo '</tr><tr>';}
							echo '<td>';
							$indice++;
							if($dataset['DateDeSortie'] >= date_format($dateToday, 'Y-m-d'))
							{
								echo '<p style="position: absoluteheight: 50px;">';
								echo '<img class="attachment" src="IMG/AVenir.png" ';
								//if($nbResult == 1){echo ' style="height: 150px"';}//else {echo '"';}
								echo' >';
							}elseif($dataset['DateDeSortie'] >= date_format($LastWeek, 'Y-m-d'))
							{
								echo '<p style="position: absoluteheight: 50px;">';
								echo '<img class="attachment" src="IMG/New.png" ';
								//if($nbResult == 1){echo ' style="height: 150px"';}//else {echo '"';}
								echo' >';
							}elseif($selectJeuxLudo == 0)
							{
								echo '<img class="attachment" src="IMG/None.png" alt="Plus en stock" ';
								//if($nbResult == 1){echo ' style="height: 150px"';}
								echo' >';
							}
						//if($nbResult == 1){echo ' style="font-size: 50px;" ';}
							echo '<p>';
							echo '<form method="post" name="Afficher1Produit"> <a class="nomJeu" type="submit" href="?Selection='.$dataset["Jeu"].'" >';
							/////echo '<a class="nomJeu" href="" onclick="document.getElementByName(\'LienProduit\').submit;" >'; 
							/////ou
							/////echo '<a class="nomJeu" type="submit" name="AfficherProd_'.$dataset["Jeu"].'" >'; 
							//if($nbResult == 1){echo '<h2>';}
							echo "<b><u>";
							echo $dataset["Jeu"]."</b></u><br>";
							//if($nbResult == 1){echo '</h2>';}
							
							echo '<img class="imgListe"';
							//if($nbResult == 1){echo ' style="height: 300px"';}
							echo ' src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Jeu"].'" onclick="Selectionner($Select)" /><br>';
							/*echo '<input type="submit" style="height: 100px;"';
							if($nbResult == 1){echo ' style="height: 500px"';}
							echo ' src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Jeu"].'" name="AfficherProduit_"/ value="result"><br>';
							*/
							echo '</a></form>';
							if($dataset["AgeMax"] != 666)
							{
								echo "<u>de ".$dataset["AgeMin"]." à ".$dataset["AgeMax"]." ans</u><br>";
							}else {
									echo "<u>à partir de ".$dataset["AgeMin"]." ans</u><br>";
								}
							if($dataset["TypeJeux"] != NULL)
								echo '<b>'.$dataset["TypeJeux"].'</b><br>';
							echo $dataset["Description"].'</p>';
							echo '<form method="post" ';
							if(isset($_SESSION['login']))
							{
									echo ' action="AjouterAuPanier.php?NomJeu='.$dataset["Jeu"].'" >';
									if(isset($dataset['CreneauMin']))
								echo '<u>Créneaux de réservation:</u> <br>de '.$dataset['CreneauMin'].' à '.$dataset['CreneauMax'];
							$selection = "SELECT * FROM paniers WHERE Jeu = '".$dataset['Jeu']."' AND Client = '".$_SESSION['login']."'";
							//echo $selection;
							$resultat = mysql_fetch_assoc(mysql_query($selection));
							}else {echo ' action="pageConnexion.php"';}
							$selection123 = "SELECT Jeu FROM jeux WHERE Jeu IN(".$mesJeux.") AND Jeu = '".$dataset['Jeu']."'";
							$lesJeux = mysql_fetch_assoc(mysql_query($selection123));
								if(isset($_SESSION['login']) && $lesJeux['Jeu'] != NULL /*&& $dataset['Jeu'] == $lesJeux['Jeu'] /*!= NULL*/) {
									echo '<br><input type="submit" value="Retirer du panier" name="'/*.$dataset["Jeu"]*/.'_RetirePanier" />';
									$index = 1;
								}
								if($nbJeu < 3 && $index==0 && $selectJeuxLudo != 0) {
									echo '<br><input type="submit" value="Ajouter au panier" name="'/*.$dataset["Jeu"]*/.'_AjoutPanier" />';
									}
							echo '</form></td>';
						}
						echo "</p></tr></table>";
					
						if($indice == 0)
							echo "Aucune donnée dans la base correspondante";
	//}
}else //if login = arthur 
{
	if(isset($_POST['AjoutJeux']))
	{
		echo '<center><u>Ajouter un Jeu:</u><form method="post" name="AjoutDeJeu" >';
		echo '<br>Nom: <input type="text" name="NomJeuAjout" />';
		echo '<br>Age minimum: <input type="text" name="AgeMinJeuAjout" />';
		echo '<br>Age maximum: <input type="text" name="AgeMaxJeuAjout" />';
		echo '<br>Type jeu: <input type="text" name="TypeJeuAjout" value="famille, cartes..." />';
		echo '<br>Description: <input type="textarea" name="DescriptionJeuAjout" style="widht=100px; height = 100px;" />';
		echo '<br>Date de sortie: <input type="text" name="DateSortieJeuAjout" value="1999-12-31" />';
		echo '<br>Nombre de Jeux: <input type="text" name="NbJeuAjout"  />';
		echo '<br>Nombre de Jeux disponibles: <input type="text" name="NbDispoJeuAjout" />';
		echo '<br><input type="submit" name="AjouterLeJeu" value="Ajouter le jeu" />';
	}
	if(isset($_POST['ModifJeux']))
	{
		echo '<center><u>Modifier un Jeu:</u><form method="post" name="AjoutDeJeu" >';
		echo '<br>Nom: <input type="text" name="NomJeuModif" />';
		echo '<br>Age minimum: <input type="text" name="AgeMinJeuModif" />';
		echo '<br>Age maximum: <input type="text" name="AgeMaxJeuModif" />';
		echo '<br>Type jeu: <input type="text" name="TypeJeuModif" value="famille, cartes..." />';
		echo '<br>Description: <input type="textarea" name="DescriptionJeuModif" style="widht=100px; height = 100px;" />';
		echo '<br>Date de sortie: <input type="text" name="DateSortieJeuModif" value="1999-12-31" />';
		echo '<br>Nombre de Jeux: <input type="text" name="NbJeuModif"  />';
		echo '<br>Nombre de Jeux disponibles: <input type="text" name="NbDispoJeuModif" />';
		echo '<br><input type="submit" name="ModifierLeJeu" value="Modifier le jeu" />';
	}
	include('Afficher.php');
}
	if(isset($_POST['AjouterLeJeu']) && (!empty($_POST['NomJeuAjout'])) && !empty($_POST['AgeMinJeuAjout']) && !empty($_POST['AgeMaxJeuAjout']) && !empty($_POST['TypeJeuAjout']) && !empty($_POST['DateSortieJeuAjout']) && !empty($_POST['NbJeuAjout']) && !empty($_POST['NbDispoJeuAjout']))
	{
		$insertLudo = "INSERT INTO jeuxludotheque VALUES('".$_POST['NomJeuAjout']."', '". intval($_POST['NbJeuAjout'])."', '". intval($_POST['NbDispoJeuAjout'])."')";
		$insertJeu = "INSERT INTO jeux VALUES('".$_POST['NomJeuAjout']."', '". strtoupper($_POST['NomJeuAjout']).".png', '". intval($_POST['AgeMinJeuAjout'])."', '".intval($_POST['AgeMaxJeuAjout'])."', '".$_POST['TypeJeuAjout']."', '".$_POST['DescriptionJeuAjout']."', '". $_POST['DateSortieJeuAjout']."')";
		echo $insertLudo;
		echo '<br>'.$insertJeu;
		mysql_query($insertLudo);
		mysql_query($insertJeu);
	}
	if(isset($_POST['ModifierLeJeu']) && !empty($_POST['NomJeuModif']))
	{
		$updateLudo = "UPDATE jeuxludotheque SET";
		if($_POST['NbJeuModif'] != NULL){$updateLudo .= " NbJeux = '".$_POST['NbJeuModif']."'" ;}
		if($_POST['NbDispoJeuModif'] != NULL){$updateLudo .= " NbJeuxDispos = '".$_POST['NbDispoJeuModif']."'" ;}
		$updateLudo .= " WHERE Nom = '".$_POST['NomJeuModif']."'";
		if($updateLudo != "UPDATE jeuxludotheque SET WHERE Nom = '".$_POST['NomJeuModif']."'")
			mysql_query($updateLudo);
		
		$updateJeu = "UPDATE jeux SET";
		if($_POST['AgeMinJeuModif'] != NULL){$updateJeu .= " AgeMin = '".$_POST['AgeMinJeuModif']."'" ;}
		if($_POST['AgeMaxJeuModif'] != NULL){$updateJeu .= " AgeMax = '".$_POST['AgeMaxJeuModif']."'" ;}
		if($_POST['TypeJeuModif'] != NULL){$updateJeu .= " TypeJeux = '".$_POST['TypeJeuModif']."'" ;}
		if($_POST['DescriptionJeuModif'] != NULL){$updateJeu .= " Description = '".$_POST['DescriptionJeuModif']."'" ;}
		if($_POST['DateSortieJeuModif'] != NULL){$updateJeu .= " DateDeSortie = '".$_POST['DateSortieJeuModif']."'" ;}
		$updateJeu .= " WHERE Jeu = '".$_POST['NomJeuModif']."'";
		if($updateJeu != "UPDATE jeuxludotheque SET WHERE Jeu = '".$_POST['NomJeuModif']."'")
			mysql_query($updateJeu);
	}
}
?>