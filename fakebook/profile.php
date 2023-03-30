<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Profiili-sivu";
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
			

			
			<div style=" float:left; width:200px;" id="profiilikuva">
                      					<?php
					
					if(!isset($_GET['show'])){
					echo "<h2>Et ole valinnut näytettävää profiilia!</h2>";
			}
			 else {
			 include('showprofile.php'); 
			}
					 ?>
				
				<?php /* JOS OLET OMASSA PROFIILISSA, MUOKKAUSLOMAKE, JOS TOISEN, LISAA KAVERIKSI */
					 
					 
			if(!isset($_GET['show'])){
			}
			 else {
			 include('profile-navi.php'); 
			}
				 ?>	
      
					
            </div>
            <div style="float:right;" id="sloloooooh">
            <div id="profiililisatiedot">
            <?php // include("showuserinfo.php"); ?>
            </div>
            <?php
			
			$kenen = $_GET['show'];
			$tamaomaid = $_SESSION['id'];
			$onkokavereita = "SELECT * FROM fakebook_friendships WHERE (kohdeid = '$kenen' AND pyytajanid = '$tamaomaid' and status = 'y') OR (kohdeid = '$tamaomaid' AND pyytajanid = '$kenen' AND status = 'y');";
$selvitetaanasiaa = mysql_query($onkokavereita)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
			$rivimaara = mysql_num_rows($selvitetaanasiaa);
			// echo "$rivimaara";
			if($rivimaara == 0 AND ($kenen !== $tamaomaid)) {
				echo "Jotta näkisit enemmän tietoja, teidän täytyy olla kavereita!";
		echo "				</div>
	</div>";

include('sivunloppu.html');
 exit();
			}
			else if($rivimaara == 0 AND ($kenen == $tamaomaid)) {
				// echo "Oma profiili";
			}
			
			else {
				// echo "olette kavereita";
			 }
			?>
           
            
			<?php if(!isset($_GET['show'])){
			}
			 else {
			 echo "<h2>Tykkäykset ja vihaukset</h2>";
             	echo "<h6><a href=\"javascript:ReverseDisplay('tykkaaeitykkaa')\">-Näytä tykkaykset ja vihaukset / Piilota-</a></h6>";
			echo "<div id='tykkaaeitykkaa' style='display:none;'>";
		echo "<table><tr><td><img src='images/fakebook-liketunnus.jpg' alt='LIKE' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Käyttäjä on tykännyt seuraavista seinäviesteistä:</h3></td></tr></table>";
			echo "<h6><a href=\"javascript:ReverseDisplay('seinatykkaykset')\">-Näytä tykätyt seinäviestit / Piilota-</a></h6>";
			echo "<div id='seinatykkaykset' style='margin: 10px 0;display:none;'>";
			
			include('seinatykkaykset.php');
			echo "</div>";
			echo "<table><tr><td><img src='images/fakebook-disliketunnus.jpg' alt='DISLIKE' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Käyttäjä ei ole tykännyt seuraavista seinäviesteistä:</h3></td></tr></table>";
		echo "<h6><a href=\"javascript:ReverseDisplay('seinaeitykkaykset')\">-Näytä ei tykatyt seinäviestit / Piilota-</a></h6>";
			echo "<div id='seinaeitykkaykset' style='margin: 10px 0;display:none;'>";
			include('seinavihaukset.php');
		echo "</div>";
		
		
echo "<table><tr><td><img src='images/fakebook-liketunnus.jpg' alt='LIKE' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Käyttäjä on tykännyt seuraavista yhteisöistä:</h3></td></tr></table>";
		echo "<h6><a href=\"javascript:ReverseDisplay('yhteisotykkaykset')\">-Näytä tykätyt yhteisöt / Piilota-</a></h6>";
			echo "<div id='yhteisotykkaykset' style='margin: 10px 0;display:none;'>";			
// seinatykkaykset.php
$kenen = $_GET['show']; 

$mysli = "SELECT * FROM yhteisotykkaykset WHERE tykkaajaid = '$kenen' AND tyyppi = 'p';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
		$mikaviesti = $drow['kohdeid'];
	
			$my = "SELECT * FROM fakebook_yhteisot WHERE yhteisoid = '$mikaviesti';";
                    $myqli= mysql_query($my)
                        or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                    
                    // Käydään rivejä niin kauan kuin niitä riittää
                    while ($srow = mysql_fetch_array ($myqli)) {
                    
					$tekija = $srow['yhteisoid'];
                    $mussu = $srow['yhteisonimi'];
					echo "<p style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px;'><a style='color: #fff; font-size: 12px; margin: 5px;' href='yhteiso.php?show=$tekija'>$mussu</a></p>";
	}
}
$sd = mysql_num_rows($mysqli);

if($sd == 0) {
	echo "<p>Käyttäjä ei ole tykännyt yhteisöistä!</p>";
}
echo "</div>";

echo "<table><tr><td><img src='images/fakebook-disliketunnus.jpg' alt='DISLIKE' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Käyttäjä ei ole tykännyt seuraavista yhteisöistä:</h3></td></tr></table>";
	echo "<h6><a href=\"javascript:ReverseDisplay('yhteisovihaukset')\">-Näytä ei tykätyt yhteisöt / Piilota-</a></h6>";
			echo "<div id='yhteisovihaukset' style='margin: 10px 0;display:none;'>";					
// seinatykkaykset.php
$kenen = $_GET['show']; 

$mysli = "SELECT * FROM yhteisotykkaykset WHERE tykkaajaid = '$kenen' AND tyyppi = 'n';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

$numberofrows = mysql_num_rows($mysqli);

if($numberofrows == 0) {
	echo "<p>Käyttäjä ei ole vihannut yhteisöjä!</p>";
}

// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
		$mikaviesti = $drow['kohdeid'];
	
			$my = "SELECT * FROM fakebook_yhteisot WHERE yhteisoid = '$mikaviesti';";
                    $myqli= mysql_query($my)
                        or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                    
                    // Käydään rivejä niin kauan kuin niitä riittää
                    while ($srow = mysql_fetch_array ($myqli)) {
                    
					$tekija = $srow['yhteisoid'];
                    $mussu = $srow['yhteisonimi'];
					echo "<p style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px; '><a style='color: #fff; font-size: 12px; margin: 5px;' href='yhteiso.php?show=$tekija'>$mussu</a></p>";
	}
}

echo "</div>";

echo "</div>";
			echo "<h2 style='margin: 0; margin-bottom: 20px; margin-top: 20px;'>Seinä:</h2>";
			 $iidd = $_GET['show'];
	
 			echo "<a style='border: 1px solid #000;
	background-color: #5f7bb4;
	font-weight: bold;
	color: #fff; padding: 7px; font-size: 13px;' href='lisaa-kuva-tilapaivitys.php?kenen=$iidd'>Lisää kuvatilapäivitys</a><br /><br />";
			 echo "<h4>Jos haluat tehdä Youtube-upotuksen, tilapäivityksen tulee alkaa seuraavasti:</h4><h4>http://www.youtube</h4><br />";
			 include('wall.php'); 
			
			
			

			
			
			
			
			}
			require_once('dbclose.php');
			?>
			</div>
		</div>
	</div>





<?php
include('sivunloppu.html');
?>