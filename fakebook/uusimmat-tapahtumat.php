<?php
/* uusimmat-tapahtumat.php */
?>

<?php
require_once('config.php');
require_once('dbopen.php');
$id = $_SESSION['id'];


 ?>
 <br />
 <a style='border: 1px solid #000;
	background-color: #5f7bb4;
	font-weight: bold;
	color: #fff; padding: 7px; font-size: 13px;' href="lisaa-kuva-tilapaivitys.php">Lisää kuvatilapäivitys</a><br /><br />
<form method="post" action="lisaaseinaan.php">


<input type="hidden" name="hostid" value="0" />
<input type="hidden" name="id" value="<?php echo "$id"; ?>" />
<input type="text" maxlength="320" class="seina-input" style="margin-left:0;" value="Kirjoita sein&auml;llesi" onclick="value=''" name="seinaviesti" />
<input type="submit" class="lisaa-kommenttibutton" value="Lis&auml;&auml; sein&auml;lle" name="kirjoita" />

</form>
<?php

/*naytaseina(0);




function naytaseina($isantaid)
{
$sequence = "SELECT id, viestid, hostid, tekijaid, seinaetunimi, seinasukunimi, tilapaivitys, kuvanimi, DATE_FORMAT(paivitysaika, '%d.%m.%Y %H:%i') AS naytapaivitysaika FROM seina WHERE hostid = '$isantaid' ORDER BY paivitysaika DESC LIMIT 0, 5;";
$resultti= mysql_query($sequence)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

echo "<ul>";
echo "<li>";
// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($resultti)) {
$aide = $rivi['viestid'];
$solo = "&quot;";
echo	 "<h4><a href='profile.php?show={$rivi['tekijaid']}'>{$rivi['seinaetunimi']} {$rivi['seinasukunimi']}</a></h4>";				
         if($rivi['kuvanimi'] !== "") {
		 	echo "<a href='img/{$rivi['kuvanimi']}'><img src='thumbs/{$rivi['kuvanimi']}' alt='kuva' /></a>";
		 }
		 echo "<p>{$rivi['tilapaivitys']}</p>" .
		 "<h5>{$rivi['naytapaivitysaika']}</h5>";
		 		 echo "<h5><a style='padding: 3px;' href='littipeukku.php?viestinid=$aide'>N&auml;yt&auml; viestille Littipeukkua</a>";
		 if(($rivi['id'] == $_SESSION['id']) OR ($rivi['tekijaid'] == $_SESSION['id'])) { echo "<a style='padding: 3px;' href='delseina.php?del=" . $rivi['viestid'] . "' " .


"onclick=\"return confirm(" . "'Haluatko varmasti poistaa kyseisen viestin?'" . ")\">(poista)</a>"; }
echo "</h5>";
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
*/
require_once('dbclose.php');
?>