<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }


$title = "The Fakebook - Vaihda profiilikuva";
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
	<h2>Profiilikuvan vaihto</h2>
					<?php
					$myid = $_SESSION['id'];
					?>
			<form enctype="multipart/form-data" action="upload-profiilikuva.php" method="post">
            <input type="hidden" name="id" value="<?php echo "$myid"; ?>" />
            <br />
            <input type="file" name="filetto" />
            <br /> <br />
            <input type="submit" class="laheta-painike" value="Tallenna" />
            
            </form>

			
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>