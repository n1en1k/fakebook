<?php
/* wall.php */
?>

<?php
$naytaprofiili = $_GET['show']; 

?>
<form method="post" action="lisaaseinaan.php">


<input type="hidden" name="hostid" value="0" />
<input type="hidden" name="id" value="<?php echo "$naytaprofiili"; ?>" />
<input type="text" maxlength="320" class="seina-input" style="margin-left:0;" value="Kirjoita sein&auml;lle" onclick="value=''" name="seinaviesti" />
<input type="submit" class="lisaa-kommenttibutton" value="Lis&auml;&auml; sein&auml;lle" name="kirjoita" />

</form>
<?php
naytaseina(0,$naytaprofiili);




function naytaseina($isantaid,$ehto)
{
$sequence = "SELECT id, viestid, hostid, tekijaid, seinaetunimi, seinasukunimi, tilapaivitys, kuvanimi, youtube, DATE_FORMAT(paivitysaika, '%d.%m.%Y %H:%i') AS naytapaivitysaika FROM seina WHERE id = '$ehto' AND hostid = '$isantaid' ORDER BY paivitysaika DESC";
$resultti= mysql_query($sequence)
    or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());

echo "<ul>";
echo "<li>";
// K‰yd‰‰n rivej‰ niin kauan kuin niit‰ riitt‰‰
while ($rivi = mysql_fetch_array ($resultti)) {
$solo = "&quot;";


$aide = $rivi['viestid'];

echo	 "<h4><a href='profile.php?show={$rivi['tekijaid']}'>{$rivi['seinaetunimi']} {$rivi['seinasukunimi']}</a></h4>";
    if($rivi['kuvanimi'] !== "") {
		 	echo "<a href='img/{$rivi['kuvanimi']}'><img src='thumbs/{$rivi['kuvanimi']}' alt='kuva' /></a>";
		 }		
		
		if($rivi['youtube'] !== "") {
		$youtubeiidd = $rivi['youtube'];
		 			 echo "<iframe class='youtube-player' type='text/html' width='280' height='172' src='http://www.youtube.com/embed/$youtubeiidd' frameborder='0'>
</iframe>";
		 }	 

		 
		 $tilapaiv = $rivi['tilapaivitys'];	
		 $tilapai = htmlspecialchars($tilapaiv);	
        echo "<p>$tilapai</p>" .
		 "<h5>{$rivi['naytapaivitysaika']}</h5>";
	 $omaiidd = $_SESSION['id'];
	 $mysli = "SELECT tykkaysid, seinaviestid, tykkaajaid, tyyppi FROM seinatykkaykset WHERE tykkaajaid = '$omaiidd' AND seinaviestid = '$aide';";
$mysqli= mysql_query($mysli)
    or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());
	$num_rows = mysql_num_rows($mysqli);
			 	if($num_rows !== 1) { echo "<a style='padding: 5px;' href='littipeukku.php?viestinid=$aide'><img src='images/fakebook-tykkaa.png' alt='tykkaa' /></a>";
	 	 echo "<a style='padding: 5px;' href='littirage.php?viestinid=$aide'><img src='images/fakebook-entykkaa.png' alt='EN tykkaa' /></a>";
}
	while ($sllolo = mysql_fetch_array ($mysqli)) {

		
		 if($num_rows == 1) {
		  $tyyppi = $sllolo['tyyppi'];
		 	if($tyyppi == "p") {
						echo "<a href='profile.php?show={$_SESSION['id']}'><img src='images/fakebook-tykkasit.jpg' alt='tykkasit' /></a>";
						
							 $sdfsadfasdfsdfsad = "SELECT tykkaysid, seinaviestid, tykkaajaid, tyyppi FROM seinatykkaykset WHERE seinaviestid = '$aide' AND tyyppi = 'p';";
							$asdfjkfjdkfjdkjf= mysql_query($sdfsadfasdfsdfsad)
								or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());
								$numbersloloh = mysql_num_rows($asdfjkfjdkfjdkjf);
								echo "<b style='font-size: 10px; font-weight: normal;'> $numbersloloh Tykk&auml;&auml;</b>";
								
										 $dfdfdfa = "SELECT tykkaysid, seinaviestid, tykkaajaid, tyyppi FROM seinatykkaykset WHERE seinaviestid = '$aide' AND tyyppi = 'n';";
							$ssdfdfsdfsdfsdfsdfdfs = mysql_query($dfdfdfa)
								or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());
								$numberslolo = mysql_num_rows($ssdfdfsdfsdfsdfsdfdfs);
								echo "<b style='font-size: 10px; font-weight: normal;'>, $numberslolo Ei tykk&auml;&auml;</b>";
						
						
						}
						else {
						echo "<a href='profile.php?show={$_SESSION['id']}'><img src='images/fakebook-ettykannyt.jpg' alt='et-tykannyt' /></a>";
						
						 $sdfsadfasdfsdfsad = "SELECT tykkaysid, seinaviestid, tykkaajaid, tyyppi FROM seinatykkaykset WHERE seinaviestid = '$aide' AND tyyppi = 'p';";
							$asdfjkfjdkfjdkjf= mysql_query($sdfsadfasdfsdfsad)
								or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());
								$numbersloloh = mysql_num_rows($asdfjkfjdkfjdkjf);
								echo "<b style='font-size: 10px; font-weight: normal;'> $numbersloloh Tykk&auml;&auml;</b>";
								
										 $dfdfdfa = "SELECT tykkaysid, seinaviestid, tykkaajaid, tyyppi FROM seinatykkaykset WHERE seinaviestid = '$aide' AND tyyppi = 'n';";
							$ssdfdfsdfsdfsdfsdfdfs = mysql_query($dfdfdfa)
								or die("Kyselyss‰ tapahtui virhe.: " . mysql_error());
								$numberslolo = mysql_num_rows($ssdfdfsdfsdfsdfsdfdfs);
								echo "<b style='font-size: 10px; font-weight: normal;'>, $numberslolo Ei tykk&auml;&auml;</b>";
						}
		 }

		 
		 
		 
		 
		 }
		 if(($rivi['id'] == $_SESSION['id']) OR ($rivi['tekijaid'] == $_SESSION['id'])) { 
		 
		 
		 $viestinid = $rivi['viestid'];
		 $profileid = $rivi['id'];
		 echo "
		 <h5><a href=\"#\" style=\"padding: 5px;\"
	onclick=\"javascript:showConfirm('Vahvista poisto','Haluatko varmasti poistaa?','Kyll&auml;','delseina.php?del=$viestinid','En','profile.php?show=$profileid')\">(poista viesti)</a></h5>";
		 
		 
		 
	/*	 echo "<a style='padding: 5px;' href='delseina.php?del=" . $rivi['viestid'] . "' " .


"onclick=\"return confirm(" . "'Haluatko varmasti poistaa kyseisen viestin?'" . ")\">(poista viesti)</a>";*/
 }
// echo "</h5>";

		if($isantaid !== 0) {
		echo "<hr />";
		
		}
		else {
		
		}
		$shuppo = $rivi['id'];
		
		echo "<div class='seinadivi'>";
		  if($isantaid == 0) {
		  naytaseina($rivi['viestid'],$shuppo);
	}
		if($isantaid == 0) {
		teelomake($rivi['viestid'],$shuppo);
		
		}
		else {
		}
		
		echo "</div>";
}

echo "</li>";
echo "</ul>";	

}

function teelomake($hostid,$id)
{
	?>
<form method="post" action="kommentinlisaysseinaan.php">


<input type="hidden" name="hostid" value="<?php echo"$hostid";?>" />
<input type="hidden" name="id" value="<?php echo"$id";?>" />
<input type="text" maxlength="320" class="seina-input" value="Kirjoita kommentti" onclick="value=''" name="kommentti" />
<input type="submit" class="lisaa-kommenttibutton" value="Lis&auml;&auml; kommentti" name="lisaa" />

</form>
<?php }


?>