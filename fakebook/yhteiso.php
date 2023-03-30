<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Yhteis&ouml;-sivu";
 ?>
<?php
include('sivunalku.html');
?>
            	<?php include('navbar.php'); 


 ?>
                <!-- <form method="post" action="login.php">
                	<table cellpadding="3"><tr><td><label for="uid"><span class="cursori">Tunnus</span></label></td><td><label for="passwd"><span class="cursori">Salasana</span></label></td><td></td></tr>
                    <tr><td><input type="text" class="input-login" id="uid" maxlength="32" name="uid" /></td><td><input class="input-login" type="password" maxlength="64" id="passwd" name="passwd" /></td><td><input class="laheta-painike" type="submit" value="Kirjaudu sisään" name="kirjaudu-nappi" /></td></tr>
                	<tr><td><input id="pidasiskir" type="checkbox" name="logged-in" value="tallenna-sessio" /><label for="pidasiskir"><span class="pidasisaankir">Pidä minut sisäänkirjautuneena</span></label></td><td><a href="unohtunus-salasana.php">Unohditko salasanasi?</a></td><td></td></tr>
                </table>
                </form> -->
            </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
			
					<?php
					if(!isset($_GET['show'])){
					echo "<h2>Et ole valinnut näytettävää yhteisöä!</h2>";
			}
			 else {
			/* include('showprofile.php'); */
			}
					 ?>
			
				<?php /* JOS OLET OMASSA PROFIILISSA, MUOKKAUSLOMAKE, JOS TOISEN, LISAA KAVERIKSI */
					 
					 
			if(!isset($_GET['show'])){
			}
			 else {
			/* include('yhteiso-navi.php'); */
			}
				 ?>
					
		
			
			<?php if(!isset($_GET['show'])){
			}
			 else {
             
	
	

	$nayta = $_GET['show'];
	
	
	$myid = $_SESSION['id'];
	
	 $mysli = "SELECT id, kohdeid, tykkaajaid, tyyppi FROM yhteisotykkaykset WHERE kohdeid = '$nayta' AND tykkaajaid = '$myid';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	$num_rows = mysql_num_rows($mysqli);
			 	if($num_rows == 0) { 	echo "<h4 style='margin-bottom: 20px;'><a style='padding: 3px; margin-bottom: 20px;' href='littipeukku-y.php?yhteiso=$nayta'><img src='images/fakebook-tykkaa.png' alt='tykkaa' /></a>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='padding: 3px; margin-bottom: 20px;' href='littirage-y.php?yhteiso=$nayta'><img src='images/fakebook-entykkaa.png' alt='entykkaa' /></a><h4>";

}
	while ($sllolo = mysql_fetch_array ($mysqli)) {
	
		
		 if($num_rows == 1) {
		  $tyyppi = $sllolo['tyyppi'];
		 	if($tyyppi == "p") {
						echo "<a href='profile.php?show={$_SESSION['id']}'><img src='images/fakebook-tykkasit.jpg' alt='tykkasit' /></a>";
						}
						else {
						echo "<a href='profile.php?show={$_SESSION['id']}'><img src='images/fakebook-ettykannyt.jpg' alt='et-tykannyt' /></a>";
						}
		 }
	
	}
	
	
	
	
	
	
			 
	
	
	
			 
			 $sekvenssi = "SELECT * FROM fakebook_yhteisot WHERE yhteisoid = '$nayta';";
$resultt = mysql_query($sekvenssi)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($resultt)) {
 $yhteisoid = $rivi['yhteisoid'];
			 $nimi = $rivi['yhteisonimi'];
			 $tekijaen = $rivi['tekijaen'];
			 $tekijasn = $rivi['tekijasn'];
			 $kuvaus = $rivi['kuvaus'];
			 		echo "<h2 style='font-size: 28px; margin: 0;'>$nimi</h2>";
			 		echo "<h4>Tekijä: $tekijaen $tekijasn</h4>";
					echo "<p style='margin: 10px;'>$kuvaus</p>";
					
			 }
		
			// include('yhteison-valinta.php');
			
			echo "<h3><a href='yhteiso-nayta-kuvat.php?show=$nayta'>Kuvat</a></h3>";
			 
			echo "<h4 style='font-size: 20px; margin: 0;'>Tykkääjät:</h4>";
			$mysli = "SELECT id, kohdeid, tykkaajaid FROM yhteisotykkaykset WHERE kohdeid = '$nayta' AND tyyppi = 'p';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
		$mikaviesti = $drow['tykkaajaid'];
	
			$my = "SELECT * FROM fakebook_users WHERE id = '$mikaviesti';";
                    $myqli= mysql_query($my)
                        or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                    
                    // Käydään rivejä niin kauan kuin niitä riittää
                    while ($srow = mysql_fetch_array ($myqli)) {
                    
					$etunimi = $srow['etunimi'];
                    $sukunimi = $srow['sukunimi'];
					echo "<div style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px;'><a style='color: #fff; font-size: 12px; margin: 5px;' href='profile.php?show=$mikaviesti'>$etunimi $sukunimi</a></div>";
	}
}




echo "<h4 style='font-size: 20px; margin: 0;'>Vihaajat:</h4>";
			$mysli = "SELECT id, kohdeid, tykkaajaid FROM yhteisotykkaykset WHERE kohdeid = '$nayta' AND tyyppi = 'n';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
		$mikaviesti = $drow['tykkaajaid'];
	
			$my = "SELECT * FROM fakebook_users WHERE id = '$mikaviesti';";
                    $myqli= mysql_query($my)
                        or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                    
                    // Käydään rivejä niin kauan kuin niitä riittää
                    while ($srow = mysql_fetch_array ($myqli)) {
                    
					$etunimi = $srow['etunimi'];
                    $sukunimi = $srow['sukunimi'];
					echo "<div style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px;'><a style='color: #fff; font-size: 12px; margin: 5px;' href='profile.php?show=$mikaviesti'>$etunimi $sukunimi</a></div>";
	}
}

			}
			require_once('dbclose.php');
			?>
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>