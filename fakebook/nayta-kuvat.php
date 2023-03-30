<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');             
             
             			$kenen = $_GET['show'];
			$tamaomaid = $_SESSION['id'];
			$onkokavereita = "SELECT * FROM fakebook_friendships WHERE (kohdeid = '$kenen' AND pyytajanid = '$tamaomaid' and status = 'y') OR (kohdeid = '$tamaomaid' AND pyytajanid = '$kenen' AND status = 'y');";
$selvitetaanasiaa = mysql_query($onkokavereita)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
			$rivimaara = mysql_num_rows($selvitetaanasiaa);
			// echo "$rivimaara";
			if($rivimaara == 0 AND ($kenen !== $tamaomaid)) {
				header("location: index.php");
 exit();
			}
             
             
             
             
             
             


$title = "The Fakebook - Kuvat";
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
   <?php   $kenen = $_GET['show'];  
   
   if($kenen == $_SESSION['id']) {
   
   
			echo "<h2 style='margin: 0;'><a href='uppaa-kuva.php'>Lisää kuva</a></h2>";
	}	
					
// seinatykkaykset.php


$mysli = "SELECT * FROM fakebook_kuvat WHERE omistaja = '$kenen';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
$rowcount = mysql_num_rows($mysqli);
if($rowcount == 0) {
	echo "Kuvia ei ole lisätty!";
}
// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
	
    $kuvannimi = $drow['kuvannimi'];
    echo "<a href='isotkuvat/$kuvannimi'><img style='margin: 5px;' src='kuvatthumbs/$kuvannimi' alt='kuva' /></a>";
}


			require_once('dbclose.php');
			?>
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>