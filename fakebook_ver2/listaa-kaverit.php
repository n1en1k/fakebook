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
<?php
// näytä kaveripyynnöt

require_once('config.php');
require_once('dbopen.php');

$ownid = $_SESSION['id'];

	 $mysli = "SELECT * FROM fakebook_friendships WHERE kohdeid = '$ownid' AND status = 'y';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	// $num_rows = mysql_num_rows($mysqli);
	
	echo "<table cellpadding='5' border='1'><tr><td><b>Kaverin etunimi</b></td><td><b>Kaverin sukunimi</b></td>
</tr>";
	while ($row = mysql_fetch_array ($mysqli)) {

		  $pyytajanid = $row['pyytajanid'];
		//  $kohdeid = $row['kohdeid'];
		  
//		echo "$pyytajanid";
			
			/* echo "<tr>
							<td><a href='profile.php?show={$row['pyytajanid']}'>nimi</a></td><td><a href='profile.php?show={$row['kohdeid']}'>nimi</a></td>
							</tr>"; */
							
			
					 $myssli = "SELECT * FROM fakebook_users WHERE id = '$pyytajanid';";
						$myssqli= mysql_query($myssli)
							or die("Kyselyssä tapahtui virhe.: " . mysql_error());
							
							while ($trow = mysql_fetch_array ($myssqli)) {
							
							echo "<tr>
							<td><a href='profile.php?show={$trow['id']}'>{$trow['etunimi']}</a></td><td><a href='profile.php?show={$trow['id']}'>{$trow['sukunimi']}</a></td>
							</tr>";
							
					
		  
		 
									}

}

	 $mysssli = "SELECT * FROM fakebook_friendships WHERE pyytajanid = '$ownid' AND status = 'y';";
$mysssqli= mysql_query($mysssli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	// $num_rows = mysql_num_rows($mysssqli);
	

	while ($brow = mysql_fetch_array ($mysssqli)) {

		//  $pyytajanid = $row['pyytajanid'];
		  $kohdeid = $brow['kohdeid'];
		  
	
			// echo "$pyytajanid";
			/* echo "<tr>
							<td><a href='profile.php?show={$row['pyytajanid']}'>nimi</a></td><td><a href='profile.php?show={$row['kohdeid']}'>nimi</a></td>
							</tr>"; */
							
			
					 $myssssli = "SELECT * FROM fakebook_users WHERE id = '$kohdeid';";
						$myssssssqli= mysql_query($myssssli)
							or die("Kyselyssä tapahtui virhe.: " . mysql_error());
							
							while ($drow = mysql_fetch_array ($myssssssqli)) {
							
							echo "<tr>
							<td><a href='profile.php?show={$drow['id']}'>{$drow['etunimi']}</a></td><td><a href='profile.php?show={$drow['id']}'>{$drow['sukunimi']}</a></td>
							</tr>";
							
					
		  
		 
									}

}






//SELECT * FROM fakebook_friendships WHERE pyytajanid = '$ownid' AND status = 'y'



echo "</table>";
require_once('dbclose.php');

?>
		</div>
	</div>





<?php
include('sivunloppu.html');
?>