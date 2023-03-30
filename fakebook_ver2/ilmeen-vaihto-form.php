<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Ilmeen-vaihto";
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
			<h2 style="margin: 0; margin-bottom: 20px;">Vaihda ilmettä</h2>
			
<table>
<form action="vaihda-ilme.php" method="post">
<tr align="center">
<td>Hymyilevä</td>
<td>Välinpitämätön</td>
<td>Ärsyyntynyt</td>
<td>Loukattu</td>
<td>Turhautunut</td>
<td>Mahtava tunne</td>
<td>Ragequit</td>
</tr>
<tr align="center">
<td><img width="100" height="100" src="ilmeeni-kuvat/hymyileva.jpg" alt="hymyileva" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/valinpitamaton.gif" alt="valinpitamaton" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/arsyyntynyt.jpg" alt="arsyyntynyt" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/loukattu.jpg" alt="loukattu" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/turhautunut.png" alt="turhautunut" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/mahtava-tunne.jpg" alt="mahtava tunne" /></td>
<td><img width="100" height="100" src="ilmeeni-kuvat/ragequit.jpg" alt="ragequit" /></td>
</tr>
<tr align="center">
<td><input type="radio" name="ilmeeni" value="hymyileva.jpg" /></td>
<td><input type="radio" name="ilmeeni" value="valinpitamaton.gif" /></td>
<td><input type="radio" name="ilmeeni" value="arsyyntynyt.jpg" /></td>
<td><input type="radio" name="ilmeeni" value="loukattu.jpg" /></td>
<td><input type="radio" name="ilmeeni" value="turhautunut.png" /></td>
<td><input type="radio" name="ilmeeni" value="mahtava-tunne.jpg" /></td>
<td><input type="radio" name="ilmeeni" value="ragequit.jpg" /></td>
</tr>
<tr>
<td>&nbsp;</td></tr>
<tr align="center">
<td colspan="7"><input class="laheta-painike" type="submit" name="napsukka" value="Vaihda" /></td>
</tr>
<!-- 
Tom cruise = hymyilevä
ketä kiinnostaa = välinpitämätön.gif
GennaroGattuso = Ärsyyntynyt
Gattuso = Loukattu




arnoldfacepalm = turhautunut.png

arnoldsavuilla = Mahtava tunne
arnoldmad = Ragequit -->
</form>
</table>


		</div>
	</div>





<?php
include('sivunloppu.html');
?>