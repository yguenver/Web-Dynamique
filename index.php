<html>
  <head>
		<meta content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" media="all" />
    	<title>Site Web</title>
  </head>
  <body>
  	<div id="entetePage">
  		<h1><u>Poductix</u></h1>
  		<p>Les produits comme vous ne les avez jamais vu!</p>
  	</div>
		<ul id="menuBarre">
  			<center>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Promotions</a></li>
			</center>
		</ul>
		<table>
			<?php				
				$leFichier = fopen("data.base", "r");
				if($leFichier != NULL)
				{
					$element = 0;
					
					echo '<tr>';
					$indice = 0;
					while(!feof($leFichier) &&(strcmp($element, "##") != 0))
					{
						$element = trim(fgets($leFichier));
						if($indice %5 == 0 ) {echo '</tr><tr>';}
						echo '<td><p>';
							$indice++;
						if(!feof($leFichier) && (strcmp($element, "//") != 0) && (strcmp($element, "##") != 0))
						{
							echo'<b><u>'.$element.'</u></b>';
							$element = trim(fgets($leFichier));
						}
						while(!feof($leFichier) && (strcmp($element, "//") != 0) && (strcmp($element, "##") != 0))
						{
								echo "<br>".$element;
							$element = trim(fgets($leFichier));
						}
						echo '</p></td>';
					}
					echo '</tr>';
				}
			?>
			
		</table>
    </div>
  </body>
</html>
