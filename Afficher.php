<?php
				if(isset($_POST['']))
				{
					$valSearch = $_POST['searchVal'];
					$selSearch = $_POST['selectSearch'];
					$searchBy = $_POST['searchBy'];
				}else 
				{
					$valSearch = NULL;
					$selSearch = NULL;
					$searchBy = NULL;
				}
				//echo $valSearch."<br>".$selSearch."<br>".$searchBy."<br>";
				
				$indice = 0;
				
					if($valSearch != NULL)
					{
						if($selSearch == "Nom")
							$req = "SELECT * FROM jeux WHERE UPPER(".$selSearch.') = UPPER("'.$valSearch.'")';
						if($selSearch == "AgeMin")
						{
							$req = "SELECT * FROM jeux WHERE ".$selSearch.' <= '.intval($valSearch).' AND AgeMax >= '.intval($valSearch);
						}
						if($selSearch == "TypeJeux")
							$req = "SELECT * FROM jeux WHERE UPPER(".$selSearch.') LIKE UPPER("%'.$valSearch.'%")';
						}else {
							$req = "SELECT * FROM jeux";
						}
						if($searchBy != NULL)
						{
							if($searchBy != "Id")
							{
								$req = $req.' ORDER BY '.$searchBy.' ASC';
							}else {
								$req = $req.' ORDER BY '.$searchBy.' DESC';
							}
						}else $req = $req." ORDER BY Id DESC";
						//echo $req;
					$result = mysql_query($req);
					echo "<table><tr>";
					
						/*$dataset = mysql_fetch_assoc($result);
						echo $dataset["Nom"]."<br>";
						if($indice %5 == 0 ) {echo '</tr><tr>';}
						echo '<td><p>';
						$indice++;
						
						echo "<b><u>".$dataset["Nom"]."</b></u><br>";
						echo '<img src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Nom"].'"/><br>';
						if($dataset["AgeMax"] != NULL)
						{
							echo "de ".$dataset["AgeMin"]." � ".$dataset["AgeMax"]." ans<br>";
						}else {
								echo "� partir de ".$dataset["AgeMin"]." ans<br>";
							}
						echo $dataset["TypeJeux"];*/
					
					while($dataset = mysql_fetch_array($result))
					{
						//$dataset = mysql_fetch_assoc($result);
						//echo $dataset["Nom"]."<br>";
						if($indice %4 == 0 ) {echo '</tr><tr>';}
						echo '<td><p';
						$indice++;
						if($selSearch == "Nom" && $valSearch != NULL){echo ' style="font-size: 50px"';}
						echo '>';
						
						echo '<a class="nomJeu" href="?searchBy=Nom&selectSearch=Nom&searchVal='.$dataset["Nom"].'&&IMG=500"'; 
						echo "<b><u>".$dataset["Nom"]."</b></u><br>";
						echo '<img class="imgListe"';
						if($selSearch == "Nom" && $valSearch != NULL){echo ' style="height: 500px"';}
						echo ' src="IMG/'.$dataset["NomImage"].'" alt="'.$dataset["Nom"].'"/><br>';
						echo '</a>';
						if($dataset["AgeMax"] != 777)
						{
							echo "<u>de ".$dataset["AgeMin"]." � ".$dataset["AgeMax"]." ans</u><br>";
						}else {
								echo "<u>� partir de ".$dataset["AgeMin"]." ans</u><br>";
							}
						if($dataset["TypeJeux"] != NULL)
							echo '<b>'.$dataset["TypeJeux"].'</b><br>';
						echo $dataset["Description"].'</p>';
					}
					echo "</tr></table>";
					
					if($indice == 0)
						echo "Aucune donn�e dans la base correspondante";
					
					
					
					//Utilise le fichier local: "data.base"
				/*$leFichier = fopen("data.base", "r");
				if($leFichier != NULL)
				{
					$element = 0;
					
					echo '<tr>';
					$indice = 0;
					while(!feof($leFichier) &&(strcmp($element, "##") != 0))
					{
						$element = trim(fPOSTs($leFichier));
						if($indice %5 == 0 ) {echo '</tr><tr>';}
						echo '<td><p>';
							$indice++;
						if(!feof($leFichier) && (strcmp($element, "//") != 0) && (strcmp($element, "##") != 0))
						{
							echo'<b><u>'.$element.'</u></b>';
							$element = trim(fPOSTs($leFichier));
						}
						while(!feof($leFichier) && (strcmp($element, "//") != 0) && (strcmp($element, "##") != 0))
						{
								echo "<br>".$element;
							$element = trim(fPOSTs($leFichier));
						}
						echo '</p></td>';
					}
					echo '</tr>';
				}*/
			?>