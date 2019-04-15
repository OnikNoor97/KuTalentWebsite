<?php
 
session_start();
 
session_unset();
 
session_destroy();
 
header("Location: index.php"); //Change this once it is in the server!
 
 
?>