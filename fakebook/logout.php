<?php 
session_start(); 

if (isset($_SESSION['appnikon-fakebook_islogged'])) { 
    unset($_SESSION['appnikon-fakebook_islogged']); 
} 



header("Location: http://" . $_SERVER['HTTP_HOST'] 
                           . dirname($_SERVER['PHP_SELF']) . '/' 
                           . "index.php"); 
?>