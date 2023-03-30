<?php

/* search-ohjelma.php
*/

$etsi   = (isset($_REQUEST['etsi']))   ?
                $_REQUEST['etsi'] : ''; 




if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 15; 

//Kysely
$query = "SELECT yhteisoid, yhteisonimi, tekijaen, tekijasn FROM fakebook_yhteisot WHERE tekijaen LIKE '%$etsi%' OR tekijasn LIKE '%$etsi%' OR yhteisonimi LIKE '%$etsi%'  ORDER BY yhteisonimi;";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());



// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<div class='etsitulos'><a style='color: #fff;' href='yhteiso.php?show={$rivi['yhteisoid']}'><h3>{$rivi['yhteisonimi']}</a></h3></div>";
} 






?>