<?php

session_start(); 
/* muutatietoja.php */
?>

<?php
if(!isset($_POST['muokprof'])) header('location: index.php');

$etunimi   = $_POST['etunimi'];

$sukunimi   = $_POST['sukunimi'];

$etunimi = mysql_real_escape_string($etunimi);
$etunimi = htmlspecialchars($etunimi);

$sukunimi = mysql_real_escape_string($sukunimi);
$sukunimi = htmlspecialchars($sukunimi);




if($etunimi == "") {
	echo "ET SYÖTTÄNYT TUNNUSTA!";
    exit();
}

if($sukunimi == "") {
	echo "ET SYÖTTÄNYT SUKUNIMEÄSI!";
    exit();
}





$aidee = $_POST['iiiideeeee'];

$aidee = mysql_real_escape_string($aidee);
$aidee = htmlspecialchars($aidee);


require_once('config.php');
require_once('dbopen.php');

				
$sql = "UPDATE fakebook_users
			SET etunimi = '$etunimi', sukunimi = '$sukunimi'
            WHERE id = '$aidee';"; 



$result = mysql_query($sql);
$_SESSION['etunimi'] = $etunimi;
$_SESSION['sukunimi'] = $sukunimi;

require_once('dbclose.php');
header("location: profile.php?show=$aidee");
?>