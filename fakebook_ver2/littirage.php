<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }

/* tykkaa-littirage.php */
?>


<?php
require_once('config.php');
require_once('dbopen.php');
 
$viestinid = $_GET['viestinid'];

$omaid = $_SESSION['id'];

$lisays = "INSERT INTO seinatykkaykset (
seinaviestid,
tykkaajaid,
tyyppi
)
VALUES (
'$viestinid',
'$omaid',
'n'
);";

$result = mysql_query($lisays);
require_once('dbclose.php');
header("location: profile.php?show=$omaid");
?>