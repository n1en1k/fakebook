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
			echo "<h2>Tykkäykset ja vihaukset</h2>";
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
             
		echo "<table><tr><td><img src='images/littipeukku.jpg' alt='littipeukku' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Littipeukkua on n&auml;ytetty seuraaville seinäviesteille:</h3></td></tr></table>";
		
			include('seinatykkaykset.php');
		
			echo "<table><tr><td><img src='images/littirage.jpg' alt='littipeukku' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Littiragea on n&auml;ytetty seuraaville seinäviesteille:</h3></td></tr></table>";
		
			include('seinavihaukset.php');
		
		
		
echo "<table><tr><td><img src='images/littipeukku.jpg' alt='littipeukku' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Littipeukkua on n&auml;ytetty seuraaville yhteisöille:</h3></td></tr></table>";
					
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



echo "<table><tr><td><img src='images/littirage.jpg' alt='littipeukku' /></td><td><h3 style='margin: 0; margin-bottom: 20px;'>Littiragea on n&auml;ytetty seuraaville yhteisöille:</h3></td></tr></table>";
					
// seinatykkaykset.php
$kenen = $_GET['show']; 

$mysli = "SELECT * FROM yhteisotykkaykset WHERE tykkaajaid = '$kenen' AND tyyppi = 'n';";
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
					echo "<p style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px; '><a style='color: #fff; font-size: 12px; margin: 5px;' href='yhteiso.php?show=$tekija'>$mussu</a></p>";
	}
}

			echo "<h2 style='margin: 0; margin-bottom: 20px; margin-top: 20px;'>Seinä:</h2>";
			 $iidd = $_GET['show'];
	
 			echo "<a style='border: 1px solid #000;
	background-color: #5f7bb4;
	font-weight: bold;
	color: #fff; padding: 7px; font-size: 13px;' href='lisaa-kuva-tilapaivitys.php?kenen=$iidd'>Lisää kuvatilapäivitys</a><br /><br />";
			 
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