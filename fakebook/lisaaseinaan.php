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

$seinaviesti = htmlspecialchars($seinaviesti);

$seinaviesti = mysql_real_escape_string($seinaviesti);

$lisaajanetunimi = $_SESSION['etunimi'];
$lisaajansukunimi = $_SESSION['sukunimi'];
$tekijaid = $_SESSION['id'];

$ifyoutube = substr($seinaviesti, 0, 18);  // 

if($ifyoutube == "http://www.youtube") {
	$url = $seinaviesti;
	// we get the unique video id from the url by matching the pattern
preg_match("/v=([^&]+)/i", $url, $matches);
$youtubeid = $matches[1];

}
else {
	$youtubeid = "";
}
/* $url = 'http://www.youtube.com/watch?v=pDxn0Xfqkgw';
 
 we get the unique video id from the url by matching the pattern
preg_match("/v=([^&]+)/i", $url, $matches);
$id = $matches[1];
*/


$sql = "INSERT INTO seina (
            id,
            hostid,
			tekijaid,
			seinaetunimi,
            seinasukunimi,
			tilapaivitys,
			youtube
            ) VALUES (
           '$id',
           '$hostid',
		   '$tekijaid',
		   '$lisaajanetunimi',
           '$lisaajansukunimi',
		   '$seinaviesti',
		   '$youtubeid'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');

header("location: profile.php?show=$id");

?>