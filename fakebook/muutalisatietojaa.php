<?php

session_start(); 
/* muutatietoja.php */
?>

<?php

$lempinimi   = $_POST['lempinimi'];

$asuinpaikka   = $_POST['asuinpaikka'];

$koultyo   = $_POST['koultyo'];

$siviilisaaty   = $_POST['siviilisaaty'];

$lempurhtiimi   = $_POST['lempurhtiimi'];


$ennestaanolemassa   = $_POST['ennestaanolemassa'];







$aidee = $_POST['iidd'];

require_once('config.php');
require_once('dbopen.php');

if($ennestaanolemassa == "yaa") {				
$sql = "UPDATE fakebook_userinfo
			SET lempinimi='$lempinimi', asuinpaikka='$asuinpaikka', koultyo='$koultyo', siviilisaaty='$siviilisaaty', lempurhtiimi='$lempurhtiimi'
            WHERE id = '$aidee';"; 



$result = mysql_query($sql);
}

else {
$sql = "INSERT INTO fakebook_userinfo (
			userid,
            lempinimi,
            asuinpaikka,
			koultyo,
			siviilisaaty,
			lempurhtiimi
            ) VALUES (
			'$aidee',
           '$lempinimi',
           '$asuinpaikka',
		   '$koultyo',
		   '$siviilisaaty',
		   '$lempurhtiimi'
            );"; 



$result = mysql_query($sql);


}
require_once('dbclose.php');
header("location: profile.php?show=$aidee");
?>