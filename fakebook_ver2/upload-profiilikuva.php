<?php
require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:
$omistaja   = (isset($_REQUEST['id']))   ?
                $_REQUEST['id'] : ''; 
				

$username = "nienik";
$datadir = "/profiilikuvat/";
$uploaddir = "/home/$username/public_html/php-mysql/fakebook" . "$datadir";
$uploadfile = $uploaddir . $_FILES['filetto']['name'];
$webdir = "/~$username" . $datadir;


if (move_uploaded_file($_FILES['filetto']['tmp_name'], $uploadfile)) {
 
} else {
   print "Tiedoston kopioiminen epäonnistui, Muuta informaatiota:\n";
}
/* print_r($_FILES); */
				
				
$kuvannimi = "{$_FILES['filetto']['name']}";				


system("mogrify -resize 150x200 /home/nienik/public_html/php-mysql/fakebook/profiilikuvat/$kuvannimi");

				
$sql = "UPDATE fakebook_users SET profiilikuva = '$kuvannimi' WHERE id = '$omistaja';"; 


$result = mysql_query($sql);
require_once('dbclose.php');

header('location: index.php');
?>