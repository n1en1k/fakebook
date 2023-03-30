<?php session_start(); 
	/*  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }
*/
/* lisaaseinaan.php */
?>



<?php
require_once('config.php');
require_once('dbopen.php');


$id = $_POST['id'];

$hostid = $_POST['hostid'];


$seinaviesti = $_POST['seinaviesti'];


$lisaajanetunimi = $_SESSION['etunimi'];
$lisaajansukunimi = $_SESSION['sukunimi'];
$tekijaid = $_SESSION['id'];


$sql = "INSERT INTO seina (
            id,
            hostid,
			tekijaid,
			seinaetunimi,
            seinasukunimi,
			tilapaivitys
            ) VALUES (
           '$id',
           '$hostid',
		   '$tekijaid',
		   '$lisaajanetunimi',
           '$lisaajansukunimi',
		   '$seinaviesti'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');

header("location: profile.php?show=$id");

?>