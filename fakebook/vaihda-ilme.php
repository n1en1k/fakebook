<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }

/* vaihda-ilme.php */
?>

<?php

$ilme = $_POST['ilmeeni'];

$aidee = $_SESSION['id'];

require_once('config.php');
require_once('dbopen.php');

				
$sql = "UPDATE fakebook_users
			SET ilme = '$ilme'
            WHERE id = '$aidee';"; 



$result = mysql_query($sql);
require_once('dbclose.php');
header("location: profile.php?show=$aidee");
?>