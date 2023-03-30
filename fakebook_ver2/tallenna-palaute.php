

<?php


/*
tallenna-palute.php
*/



require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:
$nimi   = (isset($_REQUEST['nimi']))   ?
                $_REQUEST['nimi'] : ''; 


$email   = (isset($_REQUEST['email']))   ?
                $_REQUEST['email'] : ''; 


$otsikko   = (isset($_REQUEST['otsikko']))   ?
                $_REQUEST['otsikko'] : ''; 
				

$kommentti   = (isset($_REQUEST['commenttextarea']))   ?
                $_REQUEST['commenttextarea'] : ''; 


				
$sql = "INSERT INTO fakebook_palaute (
            lahettaja,
            email,
			otsikko,
            kommentti
            ) VALUES (
           '$nimi',
           '$email',
		   '$otsikko',
           '$kommentti'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');

header('location: index.php');
?>