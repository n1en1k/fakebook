<?php
/* wall.php */
?>

<?php
require_once('config.php');
require_once('dbopen.php');

?>
<form method="post" action="lisaakaikkienseinaan.php">


<input type="hidden" name="hostid" value="0" />

<input type="text" maxlength="320" class="seina-input" style="margin-left:0;" value="Kirjoita sein&auml;lle" onclick="value=''" name="seinaviesti" />
<input type="submit" class="lisaa-kommenttibutton" value="Lis&auml;&auml; sein&auml;lle" name="kirjoita" />

</form>
<?php
naytaseina(0);




function naytaseina($isantaid)
{
$sequence = "SELECT viestinid, hostid, tekijaid, seinaetunimi, seinasukunimi, tilapaivitys, youtube, DATE_FORMAT(paivitysaika, '%d.%m.%Y %H:%i') AS naytapaivitysaika FROM seinakaikille WHERE hostid = '$isantaid' ORDER BY paivitysaika DESC";
$resultti= mysql_query($sequence)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

echo "<ul>";
echo "<li>";
// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($resultti)) {
	echo "<h4><a href='profile.php?show={$rivi['tekijaid']}'>{$rivi['seinaetunimi']} {$rivi['seinasukunimi']}</a></h4>";
		
		if($rivi['youtube'] !== "") {
		$youtubeiidd = $rivi['youtube'];
		 			 echo "<iframe class='youtube-player' type='text/html' width='280' height='172' src='http://www.youtube.com/embed/$youtubeiidd' frameborder='0'>
</iframe>";
		 }	 

		 
		 $tilapaiv = $rivi['tilapaivitys'];	
		 $tilapai = htmlspecialchars($tilapaiv);	
        echo "<p>$tilapai</p>" .
		 "<h5>{$rivi['naytapaivitysaika']}</h5>";
 if($rivi['tekijaid'] == $_SESSION['id']) { 
		 
		 
		 $viestinid = $rivi['viestinid'];
		 
		 echo "
		 <h5><a href=\"#\" style=\"padding: 5px;\"
	onclick=\"javascript:showConfirm('Vahvista poisto','Haluatko varmasti poistaa?','Kyll&auml;','delkaikkienseina.php?del=$viestinid','En','index.php')\">(poista viesti)</a></h5>";
		 
		 
		 
	/*	 echo "<a style='padding: 5px;' href='delseina.php?del=" . $rivi['viestid'] . "' " .


"onclick=\"return confirm(" . "'Haluatko varmasti poistaa kyseisen viestin?'" . ")\">(poista viesti)</a>";*/
 }


// echo "</h5>";

		if($isantaid !== 0) {
		echo "<hr />";
		
		}
		else {
		
		}
		
		
		echo "<div class='seinadivi'>";
		  if($isantaid == 0) {
		  naytaseina($rivi['viestinid']);
	}
		if($isantaid == 0) {
		teelomake($rivi['viestinid']);
		
		}
		else {
		}
		
		echo "</div>";
}

echo "</li>";
echo "</ul>";	

}

function teelomake($hostid)
{
	?>
<form method="post" action="kommentinlisayskaikkienseinaan.php">


<input type="hidden" name="hostid" value="<?php echo"$hostid";?>" />

<input type="text" maxlength="320" class="seina-input" value="Kirjoita kommentti" onclick="value=''" name="kommentti" />
<input type="submit" class="lisaa-kommenttibutton" value="Lis&auml;&auml; kommentti" name="lisaa" />

</form>
<?php }

require_once('dbclose.php');
?>