<?php
session_start();
//lisaa-kaveriksi.php?hyvaksyttava=$kaverisuhdeid

require_once('config.php');
require_once('dbopen.php');
if(!isset($_REQUEST['hyvaksyttava'])) header('location: index.php');



$hyvaksytty = $_GET['hyvaksyttava'];

$sql = "UPDATE fakebook_friendships 
            SET status = 'y'
			WHERE kaverisuhdeid = '$hyvaksytty';
			"; 



$result = mysql_query($sql);


require_once('dbclose.php');
header("location: index.php");
?>

