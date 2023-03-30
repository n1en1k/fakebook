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

	 $mysli = "SELECT * FROM fakebook_friendships WHERE kohdeid = '$ownid' AND status = 'n';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	$num_rows = mysql_num_rows($mysqli);
	if($num_rows == 0) {
		echo "Sinulle ei ole kaveripyyntöjä!";
	}
	else {
	echo "<table cellpadding='5' border='1'><tr><td><b>Pyytäjän etunimi</b></td><td><b>pyytäjän sukunimi</b></td><td><b>Hyväksy</b></td><td><b>Hylkää</b></td>
</tr>";
	while ($row = mysql_fetch_array ($mysqli)) {

		  $pyytajanid = $row['pyytajanid'];
		  $kaverisuhdeid = $row['kaverisuhdeid'];
						 $mysli = "SELECT * FROM fakebook_users WHERE id = '$pyytajanid';";
						$mysqli= mysql_query($mysli)
							or die("Kyselyssä tapahtui virhe.: " . mysql_error());
							
							while ($row = mysql_fetch_array ($mysqli)) {
							
							echo "<tr>
							<td>{$row['etunimi']}</td><td>{$row['sukunimi']}</td><td><a onclick=\"return confirm(" . "'Haluatko varmasti hyväksyä kyseisen kaveripyynnön?'" . ")\" href=\"lisaa-kaveriksi.php?hyvaksyttava=$kaverisuhdeid\">HYVÄKSY KAVERIKSI</a></td><td><a onclick=\"return confirm(" . "'Haluatko varmasti hylätä kyseisen kaveripyynnön?'" . ")\" href=\"hylkaa-pyynto.php?hylattava=$kaverisuhdeid\">HYLKÄÄ KAVERIPYYNTÖ</a></td>
							</tr>";
							
					}
		  
		 
		 }
echo "</table>";
}

require_once('dbclose.php');

?>
		</div>
	</div>





<?php
include('sivunloppu.html');
?>