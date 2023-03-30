<?php session_start(); 

$title = "Fakebook - ERROR";
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
   
	<div style=" margin:auto; margin-top: 20px;;width: 600px; border:1px solid #ccc; border-radius: 5px; padding: 20px;" id="login-div">		
				<h2 style="margin: 0; font-size: 18px; color: #333; border-bottom: 1px solid #ccc; font-weight: bold;">
                <?php
                
                if(!isset($_GET['reason'])) {
                echo "TUNTEMATON ERROR!";
                }
                else {
                $syy = $_GET['reason'];
                
                
                if($syy == 404) {
                echo "ERROR 404! SIVUA EI LÖYDY</h2>";
				$pic = "";
				$txt = "";
				}
                 else if($syy == 500) {
                echo "ERROR 500! SISÄINEN PALVELINVIRHE</h2>";
				$pic = "<img src='http://www.geeksofdoom.com/GoD/img/2011/11/2011-11-20-schwarzeneggerrecall-533x288.png' alt='arnie' />";
				$txt = "<h2>I DON'T DO REQUEST</h2>";
				}
                
                else {
                	echo "ERROR";
					$pic = "";
					$txt = "";
                }
                }
                ?>
				</h2>
               <?php  echo "$txt $pic"; ?>
		</div> <!-- login div -->
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>