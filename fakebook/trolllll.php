<?php
session_start();
require_once('config.php');
require_once('dbopen.php');

$ownid = $_SESSION['id'];

	 $mysli = "SELECT * FROM fakebook_friendships WHERE kohdeid = '$ownid' AND status = 'y';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	// $num_rows = mysql_num_rows($mysqli);
	
	while ($row = mysql_fetch_array ($mysqli)) {

		  $pyytajanid = $row['pyytajanid'];
          
          
          			 $fffff = "SELECT * FROM seina WHERE id = '$pyytajanid' ORDER BY paivitysaika DESC;";
                        $sdfsdf= mysql_query($fffff)
                            or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                            // $num_rows = mysql_num_rows($mysqli);
                            
                            while ($asdfsdaf = mysql_fetch_array ($sdfsdf)) {
                        				 echo "<p>{$asdfsdaf['tilapaivitys']}</p>";
                                 
       							   }
          
          
          }
          
          
          require_once('dbclose.php');
          ?>