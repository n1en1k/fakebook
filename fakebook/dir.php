<?php
// dir.php

// Muuttujat
$fiilu  = (isset($_GET['fiilu'])) ? $_GET['fiilu'] : '';
$action = (isset($_GET['action'])) ? $_GET['action'] : '';
$self   = (isset($_SERVER['PHP_SELF'])) ?
           $_SERVER['PHP_SELF'] : '';

// Selvitet��n nykyinen hakemisto
$dir = dirname ($_SERVER['SCRIPT_FILENAME']) . "/";
if ($action == "show") { // jos seurattu linkki�
   show_source($dir . $fiilu);
} else {
   echo "<ul>";
   $handle=opendir($dir);
   // $file sis. vuorollaan jokaisen tiedoston hakemistosta:
   while ($file = readdir($handle)) {
      // vain tiedostot k�sitell��n:
      if (is_file($dir . $file)) {
         echo "<li>" .
              "<a href='$self?action=show&fiilu=$file'>" .
              "$file</a>";
      }
   }
   echo "</ul>";
}
?> 