<?php
/* showprofile.php */
?>

<?php
$naytaprofiili = $_GET['show'];


// PERUSTIEDOT



// Otetaan data talteen:



				
							


				
 $sql = "SELECT id, sposti, etunimi, sukunimi, syntymapaiva, syntymakuukausi, syntymavuosi, sukupuoli, ilme, profiilikuva
            FROM fakebook_users 
            WHERE id = '$naytaprofiili';"; 





$result = mysql_query($sql);
while ($rivi = mysql_fetch_array ($result)) {
   
        $etunimi = $rivi['etunimi'];
        $sukunimi = $rivi['sukunimi'];
		
		$sposti = $rivi['sposti'];
		
		$syntymapaiva = $rivi['syntymapaiva'];
		
		$syntymakuukausi = $rivi['syntymakuukausi'];
		
		$syntymavuosi = $rivi['syntymavuosi'];
		
		$sukupuoli = $rivi['sukupuoli'];
		
		$profkuva = $rivi['profiilikuva'];
		
		echo "<h2>$etunimi $sukunimi</h2>";
		
		echo "<h5>Syntynyt: $syntymapaiva. $syntymakuukausi" . "ta" . " $syntymavuosi</h5>";
		echo "<h5>Sukupuoli: $sukupuoli</h5>";
		if($profkuva == "") {
		
		}
		else {
		echo "<img style='border: none;' width='150' height='200' src=\"profiilikuvat/{$rivi['profiilikuva']}\" alt='profiilikuva' /><br /><br />";
		}
		$kuva = $rivi['ilme'];
		
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