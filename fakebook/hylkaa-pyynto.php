<?php
session_start();
//lisaa-kaveriksi.php?hyvaksyttava=$kaverisuhdeid

require_once('config.php');
require_once('dbopen.php');
if(!isset($_REQUEST['hylattava'])) header('location: index.php');



$poistet = $_GET['hylattava'];

$sql = "DELETE FROM fakebook_friendships 
			WHERE kaverisuhdeid = '$poistet';
			"; 


$result = mysql_query($sql);


require_once('dbclose.php');
header("location: index.php");
?>

