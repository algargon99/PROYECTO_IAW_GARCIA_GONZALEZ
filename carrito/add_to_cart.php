<?php
 session_start();
$_SESSION["cart"][$_GET['q']]=$_GET['isbn'];
 
//echo "CANTIDAD: ".$_GET['q']." LIBRO: ".$_GET['isbn'];
  
echo $_SESSION["cart"];
?>
