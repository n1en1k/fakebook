<?php
// luo-uusi-yhteiso.php
session_start();
?>
<?php

$etunimi = $_SESSION['etunimi'];

$sukunimi = $_SESSION['sukunimi'];

$yhteisonimi = $_POST['yhteisonimi'];

$yhteisonkuvaus = $_POST['yhteisonkuvaus'];



require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:



				
							


				
$sql = "INSERT INTO fakebook_yhteisot (
            yhteisonimi,
            tekijaen,
            tekijasn,
            kuvaus
            ) VALUES (
           '$yhteisonimi',
           '$etunimi',
           '$sukunimi',
           '$yhteisonkuvaus'
            );"; 



$result = mysql_query($sql);
require_once('dbclose.php');
header("location: index.php");
?>