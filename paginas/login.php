<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="login.css">  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
  <body id="LoginForm">

    <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "user", "2asirtriana", "proyecto");
          

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from usuarios where
          user='$_POST[user]' and password=md5('$_POST[password]')";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {
              //No rows returned
              if ($result->num_rows===0) { 
                echo "<script type='text/javascript'>alert('Login Inválido');</script>";
              } else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["language"]="es";
                
                
                header("Location: index.php");
              }

          } else {
            echo $consulta;
            echo "Wrong Query";
          }
      }
    ?>


  
    <div class="container">
        <h1 style="color: white; font-size: 50px;">BookFace</h1>
        <div class="row">
            <div class="login-form col-md-12">
                <div class="main-div">
                    <div class="panel">
                <h2>Inicio de Sesión</h2>
                <p>Introduce tu usuario y contraseña</p>
                </div>
                    <form  method="post" id="Login">

                        <div class="form-group">


                            <input type="text" class="form-control" name="user" placeholder="Usuario">

                        </div>

                        <div class="form-group">

                            <input type="password" class="form-control" name="password" placeholder="Contraseña">

                        </div>
                        
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <div id="registrar">
                        ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>