<?php session_start(); 
	  if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
				header('location: index.php');
			 }

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




$id = htmlspecialchars($id);
$hostid = htmlspecialchars($hostid);
$seinaviesti = htmlspecialchars($seinaviesti);



$id = mysql_real_escape_string($id);
$hostid = mysql_real_escape_string($hostid);
$seinaviesti = mysql_real_escape_string($seinaviesti);











$username = "nienik";
$datadir = "/img/";
$uploaddir = "/home/$username/public_html/php-mysql/fakebook" . "$datadir";
$uploadfile = $uploaddir . $_FILES['filetto']['name'];
$webdir = "/~$username" . $datadir;


if (move_uploaded_file($_FILES['filetto']['tmp_name'], $uploadfile)) {
 
} else {
   print "Tiedoston kopioiminen epäonnistui, Muuta informaatiota:\n";
}
/* print_r($_FILES); */
				
				
$kuvanimi = "{$_FILES['filetto']['name']}";				

$kuvanimi = htmlspecialchars($kuvanimi);

$kuvanimi = mysql_real_escape_string($kuvanimi);


system("cp /home/nienik/public_html/php-mysql/fakebook/img/$kuvanimi /home/nienik/public_html/php-mysql/fakebook/thumbs");

system("mogrify -resize 200x200 /home/nienik/public_html/php-mysql/fakebook/thumbs/$kuvanimi");



$sql = "INSERT INTO seina (
            id,
            hostid,
			tekijaid,
			seinaetunimi,
            seinasukunimi,
			tilapaivitys,
            kuvanimi
            ) VALUES (
           '$id',
           '$hostid',
		   '$tekijaid',
		   '$lisaajanetunimi',
           '$lisaajansukunimi',
		   '$seinaviesti',
           '$kuvanimi'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');

header("location: index.php");

?>