<?php
// dbopen.php

// Tietokantatyypin testaaminen mahdollistaa my�hemmin
// my�s muiden tietokantatuotteiden k�ytt��notoon
if ($dbtype == "mysql") {
   $conn = mysql_connect($dbhost, $dbuser, $dbpass)
       or die('Ei voida yhdist��: ' . mysql_error());
   mysql_select_db($dbname, $conn);
}
?>

