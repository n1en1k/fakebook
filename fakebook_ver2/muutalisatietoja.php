
<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Muokkaa profiilia";
 ?>
<?php
include('sivunalku.html');
?>
            	<?php include('navbar.php'); 


 ?>





            </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
			
                	<h2>Lisätietojen muuttaminen</h2>
			

<?php
/* muokkaa-profiilia.php */

if (!isset($_POST['hammmm'])) header("location: index.php");

$muokattavaprof = $_POST['hammmm'];

require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:



				
							


				
$fsdf = "SELECT * FROM fakebook_userinfo WHERE userid = '$muokattavaprof';"; 


$asdfasdf = mysql_query($fsdf)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
$numrows = mysql_num_rows($asdfasdf);

if($numrows !== 1) {

  echo '        
  	<form action="muutalisatietojaa.php" method="post">
       	<table cellspacing="5">
                    <tr>
                    	<td align="right">Lempinimi:</td><td align="left" width="65%"><input class="reggaus-input" type="text" name="lempinimi" maxlength="64" /></td>
                    </tr>
                     <tr>
                    	<td align="right">asuinpaikka:</td><td align="left"><input class="reggaus-input" type="text" name="asuinpaikka" maxlength="400" /></td>
                    </tr>
                     
                   <tr>
                    	<td align="right">Koulutus ja työhistoria:</td><td align="left"><input class="reggaus-input" type="text" name="koultyo" maxlength="4000" /></td>
                    </tr>
                   <tr>
                    	<td align="right">siviilisääty:</td><td align="left"><input class="reggaus-input" type="text" name="siviilisaaty" maxlength="30" /></td>
                    </tr>
                    
                       <tr>
                    	<td align="right">Lempi urheilutiimi:</td><td align="left"><input class="reggaus-input" type="text" name="lempurhtiimi" maxlength="400" /></td>
                    </tr>
                  

                   <tr>
                   	<td colspan="2" align="center">
					<input type="hidden" value="nei" name="ennestaanolemassa" />
					 <input type="hidden" value="' . $muokattavaprof . '" name="iidd" /><input type="submit" class="laheta-painike" style="height: 35px; width: 150px;" value="Tallenna" name="tallenna-mutokset" /></td>
                   </tr>
				   </table>
				  
				   </form>
				   ';





}

else {
while ($rivi = mysql_fetch_array ($asdfasdf)) {


  echo '        
  	<form action="muutalisatietojaa.php" method="post">
       	<table cellspacing="5">
                    <tr>
                    	<td align="right">Lempinimi:</td><td align="left" width="65%"><input class="reggaus-input" type="text" name="lempinimi" maxlength="64" value="' . $rivi['lempinimi'] . '" /></td>
                    </tr>
                     <tr>
                    	<td align="right">asuinpaikka:</td><td align="left"><input class="reggaus-input" type="text" name="asuinpaikka" maxlength="84" value="' . $rivi['asuinpaikka'] . '" /></td>
                    </tr>
                     
                   <tr>
                    	<td align="right">Koulutus ja työhistoria:</td><td align="left"><input class="reggaus-input" type="text" name="koultyo" maxlength="84" value="' . $rivi['koultyo'] . '" /></td>
                    </tr>
                   <tr>
                    	<td align="right">siviilisääty:</td><td align="left"><input class="reggaus-input" type="text" name="siviilisaaty" maxlength="84" value="' . $rivi['siviilisaaty'] . '" /></td>
                    </tr>
                    
                       <tr>
                    	<td align="right">Lempi urheilutiimi:</td><td align="left"><input class="reggaus-input" type="text" name="lempurhtiimi" maxlength="84" value="' . $rivi['lempurhtiimi'] . '" /></td>
                    </tr>
                  

                   <tr>
                   	<td colspan="2" align="center">
					<input type="hidden" value="yaa" name="ennestaanolemassa" />
					 <input type="hidden" value="' . $muokattavaprof . '" name="iidd" /><input type="submit" class="laheta-painike" style="height: 35px; width: 150px;" value="Tallenna" name="tallenna-mutokset" /></td>
                   </tr>
				   </table>
				  
				   </form>
				   ';
}
}
require_once('dbclose.php');
?>
            		</div>
	</div>

<?php
include('sivunloppu.html');
?>