<?php 
setcookie("fakebook", "");
setcookie("fakebook", "", time() - 60 * 10);

header("location: logout.php");
?>