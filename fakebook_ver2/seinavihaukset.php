<?php
// seinavihaukset.php
$kenen = $_GET['show']; 

$mysli = "SELECT tykkaysid, seinaviestid, tykkaajaid FROM seinatykkaykset WHERE tykkaajaid = '$kenen' AND tyyppi = 'n';";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

// Käydään rivejä niin kauan kuin niitä riittää
while ($drow = mysql_fetch_array ($mysqli)) {
		$mikaviesti = $drow['seinaviestid'];
	
			$my = "SELECT * FROM seina WHERE viestid = '$mikaviesti';";
                    $myqli= mysql_query($my)
                        or die("Kyselyssä tapahtui virhe.: " . mysql_error());
                    
                    // Käydään rivejä niin kauan kuin niitä riittää
                    while ($srow = mysql_fetch_array ($myqli)) {
                    
					$tekija = $srow['tekijaid'];
                    $mussutus = $srow['tilapaivitys'];
$mussu = htmlspecialchars($mussutus);
					$id = $srow['id'];
					echo "<p style='margin: 5px;padding: 3px; background-color: #6f8dcc; color: #fff; font-size: 12px;'><a style='color: #fff; font-size: 12px; margin: 5px;' href='profile.php?show=$id'>$mussu</a></p>";
	}
}

?>