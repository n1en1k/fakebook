<?php session_start();    

	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('index.php');
			 }

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>The Fakebook - Search</title>
<link href="fakebook-styles.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="container">
	<div id="headerwrap">
    	<div id="header">
        	<div id="headerotsikko">
            	<h1><a href="index.php">fakebook</a></h1>
            </div>
            <div id="headerlogin">
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
			
					<h2 style="margin: 0; margin-bottom: 20px;">Löydetyt käyttäjät</h2>
				
			<?php
			require_once('config.php');
require_once('dbopen.php');
			 include('search-ohjelma.php'); ?>
            
            <h2 style="margin: 0; margin-bottom: 20px; margin-top: 20px;">Löydetyt yhteisöt</h2>
            
			<?php
			include('search-yhteiso.php');
			require_once('dbclose.php');
			?>
		</div>
	</div>


<?php
include('sivunloppu.html');
?>