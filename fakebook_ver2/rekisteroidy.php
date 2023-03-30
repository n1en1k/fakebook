<?php session_start(); 

require_once('config.php');
require_once('dbopen.php');

$title = "The Fakebook - Profiili-sivu";
 ?>
<?php
include('sivunalku.html');
?>
            	<?php include('navbar.php'); 


 ?>
                <!-- <form method="post" action="login.php">
                	<table cellpadding="3"><tr><td><label for="uid"><span class="cursori">Tunnus</span></label></td><td><label for="passwd"><span class="cursori">Salasana</span></label></td><td></td></tr>
                    <tr><td><input type="text" class="input-login" id="uid" maxlength="32" name="uid" /></td><td><input class="input-login" type="password" maxlength="64" id="passwd" name="passwd" /></td><td><input class="laheta-painike" type="submit" value="Kirjaudu sisään" name="kirjaudu-nappi" /></td></tr>
                	<tr><td><input id="pidasiskir" type="checkbox" name="logged-in" value="tallenna-sessio" /><label for="pidasiskir"><span class="pidasisaankir">Pidä minut sisäänkirjautuneena</span></label></td><td><a href="unohtunus-salasana.php">Unohditko salasanasi?</a></td><td></td></tr>
                </table>
                </form> -->
            </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">

<?php

$etunimi   = $_POST['etunimi'];

$sukunimi   = $_POST['sukunimi'];

$sposti   = $_POST['sposti'];
$spostiuudelleen   = $_POST['sposti-uudelleen'];

$salasana   = $_POST['salasana'];
$salasanauudelleen   = $_POST['salasana-uudelleen'];


$sukupuoli   = $_POST['sukupuoli'];

$paiva   = $_POST['paiva'];

$kuukausi   = $_POST['kuukausi'];

$vuosi   = $_POST['vuosi'];



if($etunimi == "") {
	echo "ET SYÖTTÄNYT TUNNUSTA!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($sukunimi == "") {
	echo "ET SYÖTTÄNYT SUKUNIMEÄSI!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($sposti == "") {
	echo "ET SYÖTTÄNYT SALASANAA!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($spostiuudelleen == "") {
	echo "ET SYÖTTÄNYT sähköpostiasi!";
    	echo "	</div>
	</div>";






include('sivunloppu.html');

    exit();
}



if($sposti == $spostiuudelleen) {
	$tallennettavasposti = mysql_real_escape_string($sposti);

}

else {
	echo "ET SYÖTTÄNYT SAMAA SÄHKÖPOSTIOSOITETTA KAHDESTI!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($salasana == $salasanauudelleen) {
	$tallennettavasalasana = mysql_real_escape_string($salasana);

}

else {
	echo "ET SYÖTTÄNYT SAMAA SALASANAA KAHDESTI!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:



				
							


				
$sql = "INSERT INTO users (
            sposti,
            password
            ) VALUES (
           '$tallennettavasposti',
           PASSWORD('$tallennettavasalasana')
            );"; 



$result = mysql_query($sql);


$kysely = "SELECT userid, sposti FROM users WHERE sposti = '$tallennettavasposti';";

$hammmm= mysql_query($kysely)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


while ($rivi = mysql_fetch_array ($hammmm)) {
$aidee = $rivi['userid'];

$asquual = "INSERT INTO usertiedot (
            id,
			etunimi,
			sukunimi,
			sukupuoli,
			spaiva,
			skuukausi,
			svuosi
            ) VALUES (
           '$aidee',
		   '$etunimi',
		   '$sukunimi',
		   '$sukupuoli',
		   '$paiva',
		   '$kuukausi',
		   '$vuosi'
            );"; 



$resultti = mysql_query($asquual);
}



require_once('dbclose.php');


?>
<h2>Rekisteröinti onnistui!</h2>

			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>