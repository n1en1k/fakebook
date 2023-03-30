
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

if(!isset($_POST['muokprof'])) header('location: index.php');
 ?>





            </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
			<div id="personal-data">
				<div id="personal-data-name">
                	<h2>Tietojen muuttaminen</h2>
				</div>
				<div id="navi">
                   <form method="post" action="changepasswd.php">
                   <input type="hidden" name="changepasswdid" value="<?php $muokattavapr = $_POST['id']; echo "$muokattavapr"; ?>" />
                <input type="submit" class="laheta-painike" style="height: 35px; width: 150px;" value="Vaihda Salasana" name="vaihda-salasana" />
                </form>
                	</div>
			</div>


<?php
/* muokkaa-profiilia.php */



$muokattavaprof = $_POST['id'];

require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:



				
							


				
$sql = "SELECT 
            id,
			etunimi,
			sukunimi FROM fakebook_users WHERE id = '$muokattavaprof';"; 



$result = mysql_query($sql);

while ($rivi = mysql_fetch_array ($result)) {

  echo '        
  	<form action="muutatietoja.php" method="post">
       	<table cellspacing="5">
                    <tr>
                    	<td align="right">Etunimi:</td><td align="left" width="65%"><input class="reggaus-input" type="text" name="etunimi" maxlength="64" value="' . $rivi['etunimi'] . '" /></td>
                    </tr>
                     <tr>
                    	<td align="right">Sukunimi:</td><td align="left"><input class="reggaus-input" type="text" name="sukunimi" maxlength="84" value="' . $rivi['sukunimi'] . '" /></td>
                    </tr>
                     
                  
                  
                  

                   <tr>
                   	<td colspan="2" align="center"> <input type="hidden" value="' . $rivi['id'] . '" name="iiiideeeee" /><input type="submit" class="laheta-painike" style="height: 35px; width: 150px;" value="Tallenna" name="tallenna-mutokset" /></td>
                   </tr>
				   </table>
				  
				   </form>
				   ';
}
require_once('dbclose.php');
?>
            		</div>
	</div>

<?php
include('sivunloppu.html');
?>