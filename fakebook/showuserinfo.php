<?php
/* showuserinfo.php */
?>

<?php
$naytaprofiili = $_GET['show'];


// PERUSTIEDOT



// Otetaan data talteen:



				
							


				
 $sdfssfdasql = "SELECT *
            FROM fakebook_userinfo 
            WHERE userid = '$naytaprofiili';"; 



$fffdfsdfsd = mysql_query($sdfssfdasql);
$loytyykotietoja = mysql_num_rows($fffdfsdfsd);

if($loytyykotietoja !== 1) {
echo "<h4>Lisätietoja ei ole saatavilla!</h4>";
}
else {
while ($asdfsadfsadfds = mysql_fetch_array ($result)) {
   
        $lempinimih = $asdfsadfsadfds['lempinimi'];
        $asuinpaikkah = $asdfsadfsadfds['asuinpaikka'];
        $koultyoh = $asdfsadfsadfds['koultyo'];
        $siviilisaatyh = $asdfsadfsadfds['siviilisaaty'];
        $lempurhtiimih = $asdfsadfsadfds['lempurhtiimi'];
        
        $lempinimi = htmlspecialchars($lempinimih);
        $asuinpaikka = htmlspecialchars($asuinpaikkah);
        $koultyo = htmlspecialchars($koultyoh);
        $siviilisaaty = htmlspecialchars($siviilisaatyh);
        $lempurhtiimi = htmlspecialchars($lempurhtiimih);
		if($lempinimi == "") {
			echo "<h4>Lisätietoja ei ole saatavilla!</h4>";
		}
		else {
		echo "<h3>Lisätietoja:</h3>";
        echo "<table>";
		echo "<tr><td valign='top'>Lempinimi:</td><td>$lempinimi</td></tr>";
        echo "<tr><td valign='top'>Asuinpaikka:</td><td>$asuinpaikka</td></tr>";
        echo "<tr><td valign='top'>Koulutus ja työhistoria:</td><td>$koultyo</td></tr>";
        echo "<tr><td valign='top'>Siviilisääty:</td><td>$siviilisaaty</td></tr>";
        echo "<tr><td valign='top'>Lempi urheilutiimi:</td><td>$lempurhtiimi</td></tr>";
        
        echo "</table>";
		}
		
}
}

?>