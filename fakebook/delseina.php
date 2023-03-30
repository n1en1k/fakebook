<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }

/* lisaakemmentti.php */
?>
<?php
if(!isset($_GET['poistettava'])) header('location: index.php');

$poistet = $_GET['del'];



require_once('config.php');
require_once('dbopen.php');

$sequence = "SELECT * FROM seina WHERE viestid = '$poistet'";
$resultti= mysql_query($sequence)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($row = mysql_fetch_array ($resultti)) {
	$derp = $_SESSION['id'];
	$en = $_SESSION['etunimi'];
	$sn = $_SESSION['sukunimi'];
	if(($row['id'] == $_SESSION['id']) OR ($row['tekijaid'] == $_SESSION['id'])) {
    	
    }
    else {
	header("location: index.php"); exit();
    }
}







				
$sql = "DELETE FROM seina 
			WHERE viestid = '$poistet';
			"; 


$result = mysql_query($sql);
require_once('dbclose.php');


header("location: profile.php?show=$derp");
?>