<?php

//include('connexionLogin');
include('Connexion.php');

function ShowMyProducts() {
	//session_start();

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
						
						$calculNb = "SELECT COUNT(*) FROM jeux";
							if($Where != NULL){$calculNb = $calculNb.$Where;}
							$Select .= $Order;
						$nbResult = mysql_result(mysql_query($calculNb), 0);
						
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
						echo '<table><tr>';
						while($dataset = mysql_fetch_array($result))
						{
							//echo 'good';
							if($indice %4 == 0 ) {echo '</tr><tr>';}
							echo '<td>';
							$indice++;
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
							echo '<form method="post" name="Afficher1Produit"> <a class="nomJeu" type="submit" href="?Selection='.$dataset["Jeu"].'" >';
							/////echo '<a class="nomJeu" href="" onclick="document.getElementByName(\'LienProduit\').submit;" >'; 
							/////ou
							/////echo '<a class="nomJeu" type="submit" name="AfficherProd_'.$dataset["Jeu"].'" >'; 
							if($nbResult == 1){echo '<h2>';}
							echo "<b><u>";
							echo $dataset["Jeu"]."</b></u><br>";
							if($nbResult == 1){echo '</h2>';}
							
							echo '<img class="imgListe"';
							if($nbResult == 1){echo ' style="height: 300px"';}
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
							if(isset($_SESSION['login']) && $resultat != NULL) {
									echo '<br><input type="submit" value="Retirer du panier" name="'/*.$dataset["Jeu"]*/.'_RetirePanier" />';
								}
							echo '</form></td>';
						}
						echo "</p></tr></table>";
						
						if($indice == 0)
							echo "Aucune donnée dans la base correspondante";
	//}
}
?>