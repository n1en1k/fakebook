<?php // Kirjautumattomat pääsevät kirjautumaan 
   


if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
?><script type="text/javascript">
   function formfocus() {
      document.getElementById('sposti').focus();
   }
   window.onload = formfocus;
</script>
<?php
echo '    
<form method="post" action="login.php">
                	<table cellpadding="1"><tr><td><label for="sposti"><span class="cursori">Sähköposti</span></label></td><td><label for="passwd"><span class="cursori">Salasana</span></label></td><td></td></tr>
                    <tr><td><input type="text" class="input-login" id="sposti" maxlength="36" name="sposti" /></td><td><input class="input-login" type="password" maxlength="64" id="passwd" name="passwd" /></td><td><input class="login-png" type="submit" value="&nbsp;" name="kirjaudu-nappi" /></td></tr>
                	<tr><td><input id="pidasiskir" type="checkbox" name="logged-in" value="tallenna-sessio" /><label for="pidasiskir"><span class="pidasisaankir">Pidä minut sisäänkirjautuneena&emsp;</span></label></td><td><a href="unohtunutsalasana.php">Unohditko salasanasi?</a></td><td></td></tr>
                </table>
                </form> ';
} else { // ja kirjautuneet uloskirjautumaan 


echo "<form method='get' action='search.php'>
                	<table cellpadding='3'>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
                    <tr>
						<td><input type='text' class='input-search' value='Etsi' onclick=\"value='';\" id='etsi' maxlength='36' name='etsi' /><input class='searchsubmit' type='submit' value='&nbsp;' name='etsinta-nappi' /></td>
						<td><a href='profile.php?show={$_SESSION['id']}'><b class='navbar-valkoinen'> {$_SESSION['etunimi']} {$_SESSION['sukunimi']} </b></a></td>
						<td><a href='index.php'><b class='navbar-valkoinen'> Etusivu </b></a></td>
						";
						
						if (isset($_COOKIE['fakebook'])) {
							echo "<td><a href='keep-me-logged-in.php'><b class='navbar-valkoinen'>Tallensit istunnon</b></a></td>";
						}
						else {
						echo "<td><a href='logout.php'><b class='navbar-valkoinen'> Kirjaudu Ulos </b></a></td>";
						}
					echo "</tr>
                	<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
                </table>
                </form> ";


} 

?>
