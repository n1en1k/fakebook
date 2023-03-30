<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }

/* lisaakemmentti.php */
?>



<?php
require_once('config.php');
require_once('dbopen.php');





$hostid = $_POST['hostid'];


$kommentti = $_POST['kommentti'];


$kommentti = htmlspecialchars($kommentti);

$kommentti = mysql_real_escape_string($kommentti);


$lisaajanetunimi = $_SESSION['etunimi'];
$lisaajansukunimi = $_SESSION['sukunimi'];
$tekijaid = $_SESSION['id'];

$sql = "INSERT INTO seinakaikille (
            hostid,
			tekijaid,
			seinaetunimi,
            seinasukunimi,
			tilapaivitys
            ) VALUES (
           '$hostid',
		   '$tekijaid',
		   '$lisaajanetunimi',
           '$lisaajansukunimi',
		   '$kommentti'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');
$mene = "index.php";
header("location: $mene");

?>