<?php

/* search-ohjelma.php
*/

$etsi   = (isset($_REQUEST['etsi']))   ?
                $_REQUEST['etsi'] : ''; 




if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 15; 

//Kysely
$query = "SELECT id, sposti, etunimi, sukunimi FROM fakebook_users WHERE etunimi LIKE '%$etsi%' OR sukunimi LIKE '%$etsi%'  ORDER BY sukunimi LIMIT $start_from, 15;";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());



// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<div class='etsitulos'><a style='color: #fff;' href='profile.php?show={$rivi['id']}'><h3>{$rivi['etunimi']} {$rivi['sukunimi']}</a></h3></div>";
} 




$sql = "SELECT COUNT(id) FROM fakebook_users;"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 15); 

$_GET['page'] = (isset($_GET['page']))   ?
                $_GET['page'] : ''; 


if($_GET['page'] == "") {
 echo "<a style='color: #60d3ff;' href='search.php?page=1'>1</a> "; 
 
 }
 
else if($_GET['page'] == "1") {
 echo "<a style='color: #60d3ff;' href='search.php?page=1'>1</a> "; 
 
 }
  else {
				echo "<a href='search.php?page=1'>1</a> "; 
			}
 
for ($i=2; $i<=$total_pages; $i++) { 
            
			
			if($i == $_GET['page']) {
			echo "<a style='color: #60d3ff;' href='search.php?page=".$i."'>".$i."</a> "; 

			}
			
			else {
				echo "<a href='search.php?page=".$i."'>".$i."</a> "; 
			}

}




?>