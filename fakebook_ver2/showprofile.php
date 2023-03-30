<?php
/* showprofile.php */
?>

<?php

$naytaprofiili = $_GET['show'];



// PERUSTIEDOT



// Otetaan data talteen:


require_once('config.php');
require_once('dbopen.php');
				
							


				
 $fdfs = "SELECT users.userid, users.sposti, usertiedot.*
            FROM users, usertiedot
            WHERE userid = '$naytaprofiili';"; 




 $asdfasdf = mysql_query($fdfs) or die('Kysely epäonnistui. ' . mysql_error());  

while ($fdsadfafasdfasdfsadf = mysql_fetch_array ($asdfasdf)) {
   
        $etunimi = $fdsadfafasdfasdfsadf['etunimi'];
        $sukunimi = $fdsadfafasdfasdfsadf['sukunimi'];
		
		$sposti = $fdsadfafasdfasdfsadf['sposti'];
		
		$syntymapaiva = $fdsadfafasdfasdfsadf['spaiva'];
		
		$syntymakuukausi = $fdsadfafasdfasdfsadf['skuukausi'];
		
		$syntymavuosi = $fdsadfafasdfasdfsadf['svuosi'];
		
		$profkuva = $fdsadfafasdfasdfsadf['profiilikuva'];
		
		echo "<h2>$etunimi $sukunimi</h2>";
		echo "<h5>Syntynyt: $syntymapaiva. $syntymakuukausi" . "ta" . " $syntymavuosi</h5>";
		
		if($profkuva == "") {
		
		}
		else {
		echo "<img style='border: none;' width='150' height='200' src=\"profiilikuvat/{$fdsadfafasdfasdfsadf['profiilikuva']}\" alt='profiilikuva' /><br /><br />";
		}
		$kuva = $fdsadfafasdfasdfsadf['ilme'];
		
		$selite = preg_replace("/\\.[^.\\s]{3,4}$/", "", $kuva);
		if($kuva == "")
		{
		echo "<h4 style='margin: 0;'>Tunnetila: <b>$selite</b></h4><img src='ilmeeni-kuvat/valinpitamaton.gif' alt='Valinpitamaton' />";
	}
	else {
		echo "<h4 style='margin: 0;'>Tunnetila:  <b>$selite</b></h4><img src='ilmeeni-kuvat/$kuva' alt='$kuva' />";
	}
	echo "<br /><a href='mika-on-ilme.php'>Mik&auml; ihme on tunnetila?</a><br /><br />";
}


?>