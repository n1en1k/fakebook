<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Kuvatilap&auml;ivityksen lis&auml;ys";
 ?>
<?php
include('sivunalku.html');
?>
            	<?php include('navbar.php'); 


 ?>
                <!-- <form method="post" action="login.php">
                	<table cellpadding="3"><tr><td><label for="uid"><span class="cursori">Tunnus</span></label></td><td><label for="passwd"><span class="cursori">Salasana</span></label></td><td></td></tr>
                    <tr><td><input type="text" class="input-login" id="uid" maxlength="32" name="uid" /></td><td><input class="input-login" type="password" maxlength="64" id="passwd" name="passwd" /></td><td><input class="laheta-painike" type="submit" value="Kirjaudu sis‰‰n" name="kirjaudu-nappi" /></td></tr>
                	<tr><td><input id="pidasiskir" type="checkbox" name="logged-in" value="tallenna-sessio" /><label for="pidasiskir"><span class="pidasisaankir">Pid‰ minut sis‰‰nkirjautuneena</span></label></td><td><a href="unohtunus-salasana.php">Unohditko salasanasi?</a></td><td></td></tr>
                </table>
                </form> -->
            </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
			<div id="personal-data">
				<div id="personal-data-name">
                <h2>Tee kuvatilap&auml;ivitys</h2>
                </div>
				<div id="navi">
                	</div>
			</div>
<?php 
if(isset($_GET['kenen'])) {
$id = $_GET['kenen'];
}
else {
$id = $_SESSION['id'];
}


 ?>
<form enctype="multipart/form-data" method="post" action="tallenna-kuvan-kanssa.php">


<input type="hidden" name="hostid" value="0" />
<input type="hidden" name="id" value="<?php echo "$id"; ?>" />
<h4>Valitse kuva:</h4>
<input name="filetto" type="file" /><br /><br />
<input type="text" maxlength="320" class="seina-input" style="margin-left:0;" value="Kirjoita sein&auml;llesi kuvateksti" onclick="value=''" name="seinaviesti" />
<input type="submit" class="laheta-painike" value="Lis&auml;&auml; sein&auml;lle" name="kirjoita" />

</form>

		</div>
	</div>





<?php
include('sivunloppu.html');
?>

