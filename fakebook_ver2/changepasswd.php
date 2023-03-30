
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
			
       	<table cellspacing="5"><form action="changedapass.php" method="post">
                    <tr>
                    	<td align="right">Vanha salasana:</td><td align="left" width="65%"><input class="reggaus-input" type="password" name="vanhapass" maxlength="36" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Uusi salasana:</td><td align="left" width="65%"><input class="reggaus-input" type="password" name="uuspass" maxlength="36" /></td>
                    </tr>
                     <tr>
                    	<td align="right">Uusi salasana uudelleen:</td><td align="left"><input class="reggaus-input" type="password" name="uuspassuud" maxlength="36" /></td>
                    </tr>
                     
                  
                  
                  

                   <tr>
                   	<td colspan="2" align="center"><input type="hidden" value="<?php $changepasswdid = $_POST['changepasswdid']; echo "$changepasswdid"; ?>" name="muokkauskohde" /><input type="submit" class="laheta-painike" style="height: 35px; width: 150px;" value="Tallenna" name="tallenna-mutokset" /></td>
                   </tr> </form>
				   </table>
				  
				  
<p>Jos vaihto onnistuu, päädyt etusivulle, jos epäonnistuu, joudut virhesivulle!</p>


            		</div>
	</div>

<?php
include('sivunloppu.html');
?>