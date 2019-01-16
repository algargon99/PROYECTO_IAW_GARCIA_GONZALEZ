<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    header("Location: principal.php");
  } else {
    session_destroy();
    header("Location: login.php");
  }


 ?>
