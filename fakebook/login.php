<?php session_start(); 

$title = "Fakebook - Kirjaudu sisään";
 ?>
<?php
include('sivunalku.html');
?>
          	<?php // include('navbar.php'); 


 ?>





                <?php
				
          if (!isset($_SESSION['appnikon-fakebook_islogged'])) { }
		  
		  else if (isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] == true) { 
		 	header('location: index.php'); exit();
		 }
				
$errmsg = ''; 
if (isset($_REQUEST['sposti']) AND isset($_REQUEST['passwd'])) { 
require_once('config.php');
require_once('dbopen.php');

   $sposti = mysql_real_escape_string($_REQUEST['sposti']); 
   $passwd = mysql_real_escape_string($_REQUEST['passwd']); 
  $sposti = htmlspecialchars($_REQUEST['sposti']); 
   $passwd = htmlspecialchars($_REQUEST['passwd']); 

   $sql = "SELECT id, sposti, password, etunimi, sukunimi 
            FROM fakebook_users 
            WHERE sposti = '$sposti' AND password = PASSWORD('$passwd')"; 
     
    $result = mysql_query($sql) or die('Kysely epäonnistui. ' . mysql_error());  
     
    if (mysql_num_rows($result) == 1) { 
	
        $_SESSION['appnikon-fakebook_islogged'] = true; 
        $_SESSION['sposti'] = $_POST['sposti'];
		 while ($rivi = mysql_fetch_array ($result)) {
   
        $etuniminen = $rivi['etunimi'];
        $sukuniminen = $rivi['sukunimi'];
		$id = $rivi['id'];
		 
		 
		 $_SESSION['etunimi'] = $etuniminen;
		  $_SESSION['sukunimi'] = $sukuniminen;
		  $_SESSION['id'] = $id;
		$pidasiskir = $_POST['logged-in'];
		if($pidasiskir == "tallenna-sessio"){
		setcookie ("fakebook", "fakebookloggedin" ,time()+86400);
		setcookie ("fakebooketu", "$etuniminen" ,time()+86400);
		setcookie ("fakebooksuku", "$sukuniminen" ,time()+86400);
		setcookie ("fakebookid", "$id" ,time()+86400);
		}

 }
         header('location: index.php'); 
        exit; 
    } else { 
        $errmsg = '
		<div style="margin-top: 20px;background-color: #ffebe8; border: 1px solid #dd3c0f; width: 578; padding: 10px;" id="failed-login">
			<h7 style="margin: 0; font-size: 14px; color: #333; font-weight: bold;">Virheellinen käyttäjännus tai salasana</h7>
			<p style="margin: 5px 0; font-color: #555; font-size: 12px;">Antamaasi käyttäjännusta ei ole liitetty mihinkään käyttäjätiliin. Voit yrittää tyhjentää selaimesi välimuistin ja evästeet.</p>
			<p style="margin: 5px 0; font-color: #555; font-size: 12px;">Jos olet unohtanut salasanasi, voit nollata sen <a href="unohtunutsalasana.php"><b style="font-size: 13px; color: #dd3c0f; font-weight: normal;">täältä.</b></a></p>
		</div>
		
		'; 
		$syotettysposti = $sposti;
    } 
    require_once('dbclose.php'); 
} 
?> 




         </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
   
	<div style=" margin:auto; margin-top: 20px;;width: 600px; border:1px solid #ccc; border-radius: 5px; padding: 20px;" id="login-div">		
				<h2 style="margin: 0; font-size: 18px; color: #333; border-bottom: 1px solid #ccc; font-weight: bold;">Fakebook kirjautuminen</h2>
			
		
			<?php 
if ($errmsg != '')echo $errmsg; 
?> 

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
<table cellspacing="5" cellpadding="3" style="margin-top: 20px;" align="center">
<tr>
	<td><b style="color: #777; font-size: 12px;">Sähköposti:</b></td><td><input class="form-login" type="text" value="<?php if ($errmsg != '')echo $syotettysposti; ?>" name="sposti" maxlength="36" size="36" /></td>
</tr>
<tr>
<td><b style="color: #777; font-size: 12px;">Salasana:</b></td><td><input class="form-login" type="password" name="passwd" maxlength="30" size="36" /></td>
</tr>
<tr>
<td>&nbsp;</td><td><input id="pidasi" type="checkbox" name="logged-in" value="tallenna-sessio" /><b style="color: #777; font-size: 11px;"><label for="pidasi">Pidä minut sisäänkirjautuneena</label></b></td>
</tr>
<tr>
<td>&nbsp;</td><td><input class="laheta-painike" type='submit' name='action' value='Kirjaudu sisään' /> <b style="font-weight: normal; font-size: 12px;">tai</b> <a href="rekisteroimislomake.php"><b style="font-size: 12px;">Rekisteröidy</b></a></td> 
</tr>
<tr>
<td>&nbsp;</td><td><a href="unohtunutsalasana.php"><b style="font-size: 13px; font-weight: normal;">Unohtunut salasana?</b></a></td>
</tr>
</table>

</form>
		</div> <!-- login div -->
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>