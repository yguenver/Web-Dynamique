<?php

function SelectNew()
{
	echo 'selection';
}


function AfficherProducts() {
	$LeClient = NULL;

if(isset($_POST['connect']))
{
	if(!empty($_POST['login']) && !empty($_POST['mdp']))
	$loginClient = $_POST['login'];
	$mdpClient = $_POST['mdp'];
	if($LeClient = mysql_fetch_assoc(mysql_query("SELECT * FROM client WHERE Login = '".$loginClient."'")))
	{
		//echo $loginClient.'<br>';
		//echo  mysql_result(mysql_query("SELECT Mdp FROM client WHERE Login = '".$loginClient."'"), 0);
		if($LeClient = mysql_result(mysql_query("SELECT Mdp FROM client WHERE Login = '".$loginClient."'"), 0) == $mdpClient)
		{
			echo "Bienvenu ".$loginClient;
			include('MonPanier.php');
		}
	}
}
	
	if($LeClient != NULL)
	{
		$Select = "SELECT * FROM jeux";
		//$Where = " WHERE Jeu IN mysql_fetch_array(mysql_query( SELECT Jeux FROM paniers WHERE Login = '".$loginClient."'))";
		$Where = " INNER JOIN paniers USING (Jeu)"/* WHERE Client = '".$loginClient."'"*/;
		
		$Select.= $Where;
		echo '<br>samba<br>'.$Select;
		//include ('MonPanier.php');
	}else 
	{
	
	$Select = "SELECT * FROM jeux";
	//$Select = "SELECT * FROM FC_grp2_Jeux";
	$Where = NULL;
				if(isset($_POST['Rechercher']))
				{
					if(!empty($_POST['searchVal']))
					{
						$valSearch = $_POST['searchVal'];
						$selSearch = $_POST['selectSearch'];
						
						switch($selSearch) {
							case "Jeu":
								$Where = " WHERE UPPER(".$selSearch.') = UPPER("'.$valSearch.'")';
								break;
							case "AgeMin":
								$Where = " WHERE ".$selSearch.' <= '.intval($valSearch).' AND AgeMax >= '.intval($valSearch);
								break;
							case "TypeJeux":
								$Where = " WHERE UPPER(".$selSearch.') LIKE UPPER("%'.$valSearch.'%")';
								break;
						}
					}
					
				}
				
				/*if($Where != NULL){$Select = $Select.$Where;}
					$Select = $Select.$Order;*/
				 
				$indice = 0;
				
				
				if(isset($_GET['Selection']))
				{
					$Where = " WHERE Jeu = '".$_GET['Selection']."'";
					$Select = "SELECT * FROM jeux";
				}
				
			if($Where != NULL){$Select .= $Where;}
	}
					$dateToday = date_create('Now');
					$LastWeek = date_create('Now');
					$LastWeek = date_modify($LastWeek, '-1 week');
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
				
				
				//echo $Where;				
				$Select .= $Order;
				
					$result = mysql_query($Select);
					echo "<table><tr>";
					
						$calculNb = "SELECT COUNT(*) FROM jeux";
						if($Where != NULL){$calculNb = $calculNb.$Where;}
				 		$calculNb = $calculNb.$Order;
					$nbResult = mysql_result(mysql_query($calculNb), 0);
						
				//echo $Where.' / '.$calculNb.' / '.$nbResult.'<br>'.$Select;
					$indice = 0;	
					while($dataset = mysql_fetch_array($result))
					{
						if($indice %4 == 0 ) {echo '</tr><tr>';}
						echo '<td>';
						$indice++;
						if($dataset['DateDeSortie'] >= date_format($dateToday, 'Y-m-d'))
						{
							echo '<p style="position: absoluteheight: 50px;">';
							echo '<img class="attachment" src="IMG/AVenir.png" ';
							if($nbResult == 1){echo ' style="height: 150px"';}else {echo '"';}
							echo' >';
						}elseif($dataset['DateDeSortie'] >= date_format($LastWeek, 'Y-m-d'))
						{
							echo '<p style="position: absoluteheight: 50px;">';
							echo '<img class="attachment" src="IMG/New.png" ';
							if($nbResult == 1){echo ' style="height: 150px"';}else {echo '"';}
							echo' >';
						}
					//if($nbResult == 1){echo ' style="font-size: 50px;" ';}
						echo '<p>';
						echo '<form method="post" name="Afficher1Produit"> <a class="nomJeu" type="submit" href="?Selection='.$dataset["Jeu"].'" >';
						/////echo '<a class="nomJeu" href="" onclick="document.getElementByName(\'LienProduit\').submit;" >'; 
						/////ou
						/////echo '<a class="nomJeu" type="submit" name="AfficherProd_'.$dataset["Jeu"].'" >'; 
						echo "<b><u>";
						if($nbResult == 1){echo '<h2>';}
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
							echo "<u>de ".$dataset["AgeMin"]." � ".$dataset["AgeMax"]." ans</u><br>";
						}else {
								echo "<u>� partir de ".$dataset["AgeMin"]." ans</u><br>";
							}
						if($dataset["TypeJeux"] != NULL)
							echo '<b>'.$dataset["TypeJeux"].'</b><br>';
						echo $dataset["Description"].'</p>';
						echo '<form method="post" action="MonPanier.php?Selection='.$dataset["Jeu"].'"><input type="submit" value="';
						if($LeClient == NULL){echo 'Ajouter au panier" name="'.$dataset["Jeu"].'_AjoutPanier" />';}else {
							echo 'Retirer du panier" name="'/*.$dataset["Jeu"]*/.'_RetirePanier" />';}
						echo '</form>';
					}
					echo "</tr></table>";
					
					if($indice == 0)
						echo "Aucune donn�e dans la base correspondante";
						
		}
?>