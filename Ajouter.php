<?php
 mysql_query("INSERT INTO paniers VALUES ('".$_SESSION['jeu']."', '".$_SESSION['login']."', '". date_format($_SESSION['creneauMin'], "Y-m-d H:i:s")."', '". date_format($_SESSION['creneauMax'], "Y-m-d H:i:s")."')");
?>