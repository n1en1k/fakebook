
<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
/* save-new-password.php
*/






require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:
$vanhapass = $_POST['vanhapass'];

$vanhapass = mysql_real_escape_string($vanhapass);
$vanhapass = htmlspecialchars($vanhapass);



if($vanhapass == "") {
	header('location: fail.php'); exit();
}
				
$uuspass = $_POST['uuspass'];

$uuspass = mysql_real_escape_string($uuspass);
$uuspass = htmlspecialchars($uuspass);

if($uuspass == "") {
	header('location: fail.php'); exit();
}

$uuspassuud = $_POST['uuspassuud'];

$uuspassuud = mysql_real_escape_string($uuspassuud);
$uuspassuud = htmlspecialchars($uuspassuud);

if($uuspassuud == "") {
	header('location: fail.php'); exit();
}

if($uuspassuud == $uuspass) {

}

else {
header('location: fail.php'); exit();
}

$muokkauskohde = $_POST['muokkauskohde'];
$muokkauskohde = mysql_real_escape_string($muokkauskohde);
$muokkauskohde = htmlspecialchars($muokkauskohde);

$query = "SELECT * FROM fakebook_users WHERE id = '$muokkauskohde' AND password = PASSWORD('$vanhapass');";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

$rowmaara = mysql_num_rows($result);

if($rowmaara == 1) {
	
}

else {
header('location: fail.php'); exit();
}


				
$sql = "UPDATE fakebook_users 
            SET password = PASSWORD('$uuspass')
			WHERE id = '$muokkauskohde';
			"; 


$result = mysql_query($sql);


require_once('dbclose.php');
header("location: index.php");






?>