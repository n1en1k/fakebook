<?php
// profile-navi
?>
<?php
$naytaprofiili = $_GET['show'];


// PERUSTIEDOT



// Otetaan data talteen:



				
							


				
 $ssql = "SELECT id  
            FROM fakebook_users 
            WHERE id = '$naytaprofiili'"; 



$ddd = mysql_query($ssql)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
while ($derp = mysql_fetch_array ($ddd)) {
   
        $slalo = $derp['id'];
     if($slalo == $_SESSION['id']) {
	 	echo "<form action='muokkaa-profiilia.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Muokkaa profiilia' name='muokprof' />
					</form>";
					
				/*	echo "<form style='margin-top: 5px;' action='muutalisatietoja.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='hammmm' />
						<input type='submit' class='profilenavbutton' value='Muuta lis&auml;tietoja' name='sloloh' />
					</form>"; */
			echo		"<form style='margin-top: 5px;' action='ilmeen-vaihto-form.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Vaihda tunnetilaa' name='muuta-ilmetta' />
					</form>";
					echo		"<form style='margin-top: 5px;' action='listaa-kaveripyynnot.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Katso kaveripyynn&ouml;t' name='muuta-ilmetta' />
					</form>";
					echo		"<form style='margin-top: 5px;' action='listaa-kaverit.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Omat Kaverit' name='muuta-ilmetta' />
					</form>";
					
						echo		"<form style='margin-top: 5px;' action='nayta-kuvat.php?show=$naytaprofiili' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Omat Kuvat' name='muuta-ilmetta' />
					</form>";
					
					echo		"<form style='margin-top: 5px;' action='profiilikuvalisays.php' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Profiilikuva' name='profiilikuvalisays' />
					</form>";
					
	 }
	

	else {
	
	
$ownid = $naytaprofiili;
$myid = $_SESSION['id'];

	 $mysli = "SELECT * FROM fakebook_friendships WHERE (kohdeid = '$ownid' AND pyytajanid = '$myid') OR (kohdeid = '$myid' AND pyytajanid = '$ownid');";
$mysqli= mysql_query($mysli)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());
	
	$num_rows = mysql_num_rows($mysqli);
	if($num_rows == 0)
					{
					echo "<form action='laheta-kaveripyynto.php' method='post'>
										<input type='hidden' value='$naytaprofiili' name='id' />
										<input type='submit' class='profilenavbutton' value='L&auml;het&auml; kaveripyynt&ouml;' name='lisaakaveriksi' />
									</form>";
					}

	while ($row = mysql_fetch_array ($mysqli)) {
	$kaverinid = $row['kaverisuhdeid'];
	if($num_rows == 0)
					{
					echo "<form action='laheta-kaveripyynto.php' method='post'>
										<input type='hidden' value='$naytaprofiili' name='id' />
										<input type='submit' class='profilenavbutton' value='L&auml;het&auml; kaveripyynt&ouml;' name='lisaakaveriksi' />
									</form>";
					}

					else {
						if($row['status'] == "n") {
						echo "<form action='#' method='post'>
										<input type='hidden' value='$naytaprofiili' name='id' />
										<input type='button' class='profilenavbutton' value='Kaveripyynt&ouml; laitettu' name='lahetettypyynto' />
									</form>";
					}
					
						else if($row['status'] == "y") {
						echo "<form action='poista-kaveri.php' method='post'>
										<input type='hidden' value='$kaverinid' name='id' />
										<input type='submit' class='profilenavbutton' value='Poista kavereista' name='poistakaveri' />
									</form>";
										echo		"<form style='margin-top: 5px;' action='nayta-kuvat.php?show=$naytaprofiili' method='post'>
						<input type='hidden' value='{$_SESSION['id']}' name='id' />
						<input type='submit' class='profilenavbutton' value='Katso Kuvia' name='muuta-ilmetta' />
					</form>";
						}
					}
					}
	/*	while ($row = mysql_fetch_array ($mysqli)) {
		

					
				}	*/
}
}
?>