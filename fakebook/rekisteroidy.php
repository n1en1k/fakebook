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


$etunimi = trim($etunimi);
$sukunimi = trim($sukunimi);
$sposti = trim($sposti);
$spostiuudelleen = trim($spostiuudelleen);
$salasana = trim($salasana);
$salasanauudelleen = trim($salasanauudelleen);
$sukupuoli = trim($sukupuoli);
$paiva = trim($paiva);
$kuukausi = trim($kuukausi);
$vuosi = trim($vuosi);




$etunimi = htmlspecialchars($etunimi);
$sukunimi = htmlspecialchars($sukunimi);
$sposti = htmlspecialchars($sposti);
$spostiuudelleen = htmlspecialchars($spostiuudelleen);
$salasana = htmlspecialchars($salasana);
$salasanauudelleen = htmlspecialchars($salasanauudelleen);
$sukupuoli = htmlspecialchars($sukupuoli);
$paiva = htmlspecialchars($paiva);
$kuukausi = htmlspecialchars($kuukausi);
$vuosi = htmlspecialchars($vuosi);


$etunimi = mysql_real_escape_string($etunimi);
$sukunimi = mysql_real_escape_string($sukunimi);
$sposti = mysql_real_escape_string($sposti);
$spostiuudelleen = mysql_real_escape_string($spostiuudelleen);
$salasana = mysql_real_escape_string($salasana);
$salasanauudelleen = mysql_real_escape_string($salasanauudelleen);
$sukupuoli = mysql_real_escape_string($sukupuoli);
$paiva = mysql_real_escape_string($paiva);
$kuukausi = mysql_real_escape_string($kuukausi);
$vuosi = mysql_real_escape_string($vuosi);



if($etunimi == "") {
	echo "ET SYÖTTÄNYT ETUNIMEÄSI!";
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
	echo "ET SYÖTTÄNYT SÄHKÖPOSTIASI!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($spostiuudelleen == "") {
	echo "ET SYÖTTÄNYT SÄHKÖPOSTIASI!";
    	echo "	</div>
	</div>";






include('sivunloppu.html');

    exit();
}



if($sposti == $spostiuudelleen) {
	$tallennettavasposti = $sposti;

}

else {
	echo "ET SYÖTTÄNYT SAMAA SÄHKÖPOSTIOSOITETTA KAHDESTI!";
        	echo "	</div>
	</div>";






include('sivunloppu.html');
    exit();
}

if($salasana == $salasanauudelleen) {
	$tallennettavasalasana = $salasana;

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



				
							


				
$sql = "INSERT INTO fakebook_users (
            sposti,
            password,
			etunimi,
			sukunimi,
			syntymapaiva,
			syntymakuukausi,
			syntymavuosi,
			sukupuoli
            ) VALUES (
           '$tallennettavasposti',
           PASSWORD('$tallennettavasalasana'),
		   '$etunimi',
		   '$sukunimi',
		   '$paiva',
		   '$kuukausi',
		   '$vuosi',
		   '$sukupuoli'
            );"; 



$result = mysql_query($sql);
require_once('dbclose.php');


?>
<h2>Rekisteröinti onnistui!</h2>

			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>