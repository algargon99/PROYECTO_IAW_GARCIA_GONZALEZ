<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") {
    
   header("Location: ./controladmin/principal.php");
  } 
  elseif (isset($_SESSION["user"]) && $_SESSION["user"]!="admin"){
   header("Location: ./controluser/principalusuario.php");
  }
  
  else {
    session_destroy();
    header("Location: login.php");
  }


 ?>
