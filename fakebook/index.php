<?php session_start(); 
//setcookie("fakebook", "");
//setcookie("fakebook", "", time() - 60 * 10);

if (isset($_COOKIE['fakebook'])) {
$_SESSION['appnikon-fakebook_islogged'] = true; 
			 $_SESSION['etunimi'] = $_COOKIE['fakebooketu'];
		  $_SESSION['sukunimi'] = $_COOKIE['fakebooksuku'];
		  $_SESSION['id'] = $_COOKIE['fakebookid'];
}

if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
$title = "Tervetuloa Fakebookkiin - Kirjaudu sisään, rekisteröidy tai lue lisää";
}
else {
$title = "Fakebook - Etusivu";
}
 ?>
<?php
include('sivunalku.html');
?>
<script type="text/javascript">
   function formfocus() {
      document.getElementById('username').focus();
   }
   window.onload = formfocus;
</script>

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
     <?php // Kirjautuneet eivat paase rekisteroitymaan uudelleen
            
if (!isset($_SESSION['appnikon-fakebook_islogged']) || $_SESSION['appnikon-fakebook_islogged'] !== true) { 
echo '
	<div id="banneriwrappi">
    	<div id="banneri">
        	<div id="rekisteroidy">
         
         

         
            <h2>Rekisteröidy</h2>
            <h3>Se on ilmaista nyt ja aina.</h3>
            <hr />

	<form name="registration" action="rekisteroidy.php" onsubmit="return validateForm()" method="post">
                	
					<table cellspacing="3">
                    <tr>
                    	<td align="right"><label for="enimi"><span class="cursori">Etunimi:</span></label></td><td align="left" width="65%"><input id="enimi" class="reggaus-input" type="text" name="etunimi" maxlength="64" /></td>
                    </tr>
                     <tr>
                    	<td align="right"><label for="snimi"><span class="cursori">Sukunimi:</span></label></td><td align="left"><input id="snimi" class="reggaus-input" type="text" name="sukunimi" maxlength="84" /></td>
                    </tr>
                     <tr>
                    	<td align="right"><label for="spost"><span class="cursori">Sähköpostiosoitteesi:</span></label></td><td align="left"><input id="spost" class="reggaus-input" type="text" name="sposti" maxlength="36" /></td>
                    </tr>
                     <tr>
                    	<td align="right"><label for="spostiu"><span class="cursori">Sähköpostiosoitteesi uudelleen:</span></label></td><td align="left"><input id="spostiu" class="reggaus-input" type="text" name="sposti-uudelleen" maxlength="36" /></td>
                    </tr>
                    <tr>
                    	<td align="right"><label for="passw"><span class="cursori">Salasana:</span></label></td><td align="left"><input id="passw" class="reggaus-input" type="password" name="salasana" maxlength="64" /></td>
                    </tr>
                     <tr>
                    	<td align="right"><label for="passu"><span class="cursori">Salasana uudelleen:</span></label></td><td align="left"><input id="passu" class="reggaus-input" type="password" name="salasana-uudelleen" maxlength="64" /></td>
                    </tr>
                     <tr>
                    	<td align="right">Olen:</td><td align="left"><select class="alaspudotus-reggaus" name="sukupuoli"><option value="" selected="selected">Valitse sukupuoli</option><option value="Mies">Mies</option><option value="Nainen">Nainen</option></select></td>
                    </tr>
                      <tr>
                    	<td align="right">Syntymäaika:</td><td align="left"><select class="alaspudotus-reggaus" name="paiva" size="1">
	<option value="" selected="selected">Päivä</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>

<select class="alaspudotus-reggaus" name="kuukausi">
	<option value="" selected="selected">Kuukausi</option>
	<option value="tammikuu">Tammikuu</option>
	<option value="helmikuu">Helmikuu</option>
	<option value="maaliskuu">Maaliskuu</option>
	<option value="huhtikuu">Huhtikuu</option>
	<option value="toukokuu">Toukokuu</option>
	<option value="kes&auml;kuu">Kesäkuu</option>
	<option value="hein&auml;kuu">Heinäkuu</option>
	<option value="elokuu">Elokuu</option>
	<option value="syyskuu">Syyskuu</option>
	<option value="lokakuu">Lokakuu</option>
	<option value="marraskuu">Marraskuu</option>
	<option value="joulukuu">Joulukuu</option>
</select>

<select class="alaspudotus-reggaus" name="vuosi">
	<option value="" selected="selected">Vuosi</option>
   <!-- <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
	<option value="2004">2004</option>
	<option value="2003">2003</option>
	<option value="2002">2002</option>
	<option value="2001">2001</option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option> -->
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	<option value="1970">1970</option>
	<option value="1969">1969</option>
	<option value="1968">1968</option>
	<option value="1967">1967</option>
	<option value="1966">1966</option>
	<option value="1965">1965</option>
	<option value="1964">1964</option>
	<option value="1963">1963</option>
	<option value="1962">1962</option>
	<option value="1961">1961</option>
	<option value="1960">1960</option>
	<option value="1959">1959</option>
	<option value="1958">1958</option>
	<option value="1957">1957</option>
	<option value="1956">1956</option>
	<option value="1955">1955</option>
	<option value="1954">1954</option>
	<option value="1953">1953</option>
	<option value="1952">1952</option>
	<option value="1951">1951</option>
	<option value="1950">1950</option>
	<option value="1949">1949</option>
	<option value="1948">1948</option>
	<option value="1947">1947</option>
	<option value="1946">1946</option>
	<option value="1945">1945</option>
	<option value="1944">1944</option>
	<option value="1943">1943</option>
	<option value="1942">1942</option>
	<option value="1941">1941</option>
	<option value="1940">1940</option>
	<option value="1939">1939</option>
	<option value="1938">1938</option>
	<option value="1937">1937</option>
	<option value="1936">1936</option>
	<option value="1935">1935</option>
	<option value="1934">1934</option>
	<option value="1933">1933</option>
	<option value="1932">1932</option>
	<option value="1931">1931</option>
	<option value="1930">1930</option>
	<option value="1929">1929</option>
	<option value="1928">1928</option>
	<option value="1927">1927</option>
	<option value="1926">1926</option>
	<option value="1925">1925</option>
	<option value="1924">1924</option>
	<option value="1923">1923</option>
	<option value="1922">1922</option>
	<option value="1921">1921</option>
	<option value="1920">1920</option>
	<option value="1919">1919</option>
	<option value="1918">1918</option>
	<option value="1917">1917</option>
	<option value="1916">1916</option>
	<option value="1915">1915</option>
	<option value="1914">1914</option>
	<option value="1913">1913</option>
	<option value="1912">1912</option>
	<option value="1911">1911</option>
	<option value="1910">1910</option>
	<option value="1909">1909</option>
	<option value="1908">1908</option>
	<option value="1907">1907</option>
	<option value="1906">1906</option>
	<option value="1905">1905</option>
	<option value="1904">1904</option>
	<option value="1903">1903</option>
	<option value="1902">1902</option>
	<option value="1901">1901</option>
	<option value="1900">1900</option></select>
    				</td>
                   </tr>
                   <tr><td>&nbsp;</td><td><a href="lisaa-infoa.php" target="_blank">Miksi minun pitää antaa syntymäaikani?</a></td></tr>
                      <tr>
                   	<td>&nbsp;</td><td><p style="margin: 0; font-size: 10px; color: #555;">Klikkaamalla Rekisteröidy -painiketta vahvistat, että olet lukenut ja hyväksynyt <a href="unohtunut-salasana.php">Käyttöehdot</a> ja <a href="unohtunut-salasana.php">Yksityisyydensuojan</a>.</p></td>
                   </tr>
				   <tr>
                   	<td colspan="2" align="center"><input type="submit" class="laheta-painike" style="margin-top: 10px; 	   -moz-box-shadow:    inset 0 1px 32px #8a9cc2;
   -webkit-box-shadow: inset 0 1px 2px #8a9cc2;
   box-shadow:         inset 0 1px 2px #8a9cc2;
	background-color: #5d76aa; height: 32px; width: 150px; background-color: #73ac59; font-weight: bold; border: 1px solid #457331; font-size: 13px;" value="Rekisteröidy" name="reggausnappi" /></td>
                   </tr>
				  
				   
                    </table>
					
                </form>

            </div>
            <div id="markkinointikuva">
            	 <h2>Fakebookin avulla pidät yhteyttä elämäsi ihmisiin.</h2>
          		
            </div>
        </div>
    </div>
					';
				
				} else { // näytetään kirjautuneille omat sivut 

echo '
	<div id="contentwrap">
		<div id="content"><br />
					<h4 style="margin: 0;"><a style="border: 1px solid #000;
	background-color: #5f7bb4;
	font-weight: bold; margin: 0;
	color: #fff; padding: 7px; font-size: 18px;" href="luo-yhteiso.php">Luo yhteisö</a></h4>';
					
					

		//	include('uusimmat-tapahtumat.php');
			echo '<h2 style="margin: 0; margin-top: 40px;">Yhteinen Seinä kaikille Fakebookkaajille</h2>';
			include('wallforall.php');
		echo '</div>
	</div>

';



} 

?>
<?php
include('sivunloppu.html');
?>