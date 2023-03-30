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




				
$sql = "DELETE FROM seinakaikille 
			WHERE viestinid = '$poistet';
			"; 


$result = mysql_query($sql);
require_once('dbclose.php');


header("location: index.php");
?>