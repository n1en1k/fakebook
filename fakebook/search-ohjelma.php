<?php

/* search-ohjelma.php
*/

$etsi   = (isset($_REQUEST['etsi']))   ?
                $_REQUEST['etsi'] : ''; 



$etsi = trim($etsi);
$etsi = htmlspecialchars($etsi);
$etsi = mysql_real_escape_string($etsi);



//Kysely
$query = "SELECT id, sposti, etunimi, sukunimi FROM fakebook_users WHERE etunimi LIKE '%$etsi%' OR sukunimi LIKE '%$etsi%'  ORDER BY sukunimi;";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());



// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<div class='etsitulos'><a style='color: #fff;' href='profile.php?show={$rivi['id']}'><h3>{$rivi['etunimi']} {$rivi['sukunimi']}</a></h3></div>";
} 

?>