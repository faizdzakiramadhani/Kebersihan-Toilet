<?php 
// kick user ke login
session_start();

session_destroy();  // hancurkan semua session

header('location: login.php')
?>