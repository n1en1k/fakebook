<?php
//laheta-kaveripyynto.php
session_start();


require_once('config.php');
require_once('dbopen.php');

$kohde = $_POST['id'];
$pyytaja = $_SESSION['id'];

$sql = "INSERT INTO fakebook_friendships (
            pyytajanid,
            kohdeid
            ) VALUES (
           '$pyytaja',
           '$kohde'
            )"; 


$result = mysql_query($sql);



require_once('dbclose.php');

header("location: index.php");
?>
