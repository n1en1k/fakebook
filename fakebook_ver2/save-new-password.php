<?php session_start(); 
   if (!isset($_SESSION['appnikon-fakebook_islogged'])) { }
		  
		  else if (isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] == true) { 
		 	header('location: index.php'); exit();
		 }
$title = "Fakebook - Uusi salasana";
 ?>
<?php
include('sivunalku.html');
?>
          	<?php // include('navbar.php'); 


 ?>




         </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">


<?php


if(!isset($_REQUEST['sposti'])) header('location: fail.php');



require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:
$sposti = $_POST['sposti'];

if($sposti == "") {
	header('location: fail.php'); exit();
}
				
$paiva = $_POST['paiva'];

if($paiva == "") {
	header('location: fail.php'); exit();
}

$kuukausi = $_POST['kuukausi'];

if($kuukausi == "") {
	header('location: fail.php'); exit();
}

$vuosi = $_POST['vuosi'];

if($vuosi == "") {
	header('location: fail.php'); exit();
}


$query = "SELECT sposti, syntymapaiva, syntymakuukausi, syntymavuosi FROM fakebook_users WHERE sposti = '$sposti'";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());



// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   
         $spaiva = $rivi['syntymapaiva'];
		 $skuukausi = $rivi['syntymakuukausi'];
		 $svuosi = $rivi['syntymavuosi'];
		 
		 if($spaiva == $paiva) {
		 	
		 }
		 
		 else {
		 	header('location: fail.php'); exit();
		 }
		 
		  if($skuukausi == $kuukausi) {
		 	
		 }
		 
		 else {
		 	header('location: fail.php'); exit();
		 }
		 
		   if($svuosi == $vuosi) {
		 	
		 }
		 
		 else {
		 	header('location: fail.php'); exit();
		 }
} 



$a = rand(0, 100);
$b = rand(0, 100);
$c = rand(0, 100);
$d = rand(0, 100);
$e = rand(0, 100);



$newpass = $a . $b . $c . $d . $e;

				
$sql = "UPDATE fakebook_users 
            SET password = PASSWORD('$newpass')
			WHERE sposti = '$sposti';
			"; 


$result = mysql_query($sql);


require_once('dbclose.php');
echo "Uusi salasana on salasanasi on: <b>$newpass</b>";






?>
	
    <p>Kopioi t&auml;m&auml; salasana, kirjaudu sen avulla ja mene kirjautumisen j&auml;lkeen "muokkaa profiilia" sivulle ja sielt&auml; "vaihda salasana". Siell&auml; sy&ouml;t&auml;t t&auml;m&auml;n salasanan "vanha salasana" -kohtaan ja valitset uuden salasanan. <a href="login.php">Kirjautumaan</a></p>
    	</div>
	</div>





<?php
include('sivunloppu.html');
?>