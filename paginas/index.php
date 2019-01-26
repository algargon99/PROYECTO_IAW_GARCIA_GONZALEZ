<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") {
    
   header("Location: principal.php");
  } 
  elseif (isset($_SESSION["user"]) && $_SESSION["user"]!="admin"){
    header("Location: principalusuario.php");
  }
  
  else {
    session_destroy();
    header("Location: login.php");
  }


 ?>
