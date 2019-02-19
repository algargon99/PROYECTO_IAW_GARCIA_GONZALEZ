<?php
 session_start();
$_SESSION["cart"][$_GET['isbn']]=$_GET['q'];
 
//echo "CANTIDAD: ".$_GET['q']." LIBRO: ".$_GET['isbn'];
foreach ($_SESSION["cart"] as $k => $v) {
    echo $k ."->".$v;
    echo "<br>";
} 
?>
