<?php ob_start(); ?>

<?php session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") { ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../CSS/menuadmin.css">        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <div class="row">
        <div>
        <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>
    
    <div>
    
    <?php if (!isset($_POST["dni"])) : ?>
            <form method="post">
            <div class="row">
            <div class="login-form">
            <div class="main-div">
                
                    <div class="form-group">


                        <input type="text" class="form-control" name="dni" placeholder="DNI">

                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Empleado">

                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos del Empleado">

                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="direccion" placeholder="Dirección">

                    </div>
                    <div class="form-group">

                        <input type="number" class="form-control" name="telefono" placeholder="Teléfono">

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Crear</button>

                </form>
                </div>
            </div>
            </div>
            </div>
            </div>
            
           
          
           <?php else:?>
           <?php
           $connection = new mysqli("localhost", "root", "123456", "proyecto");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="INSERT into empleados (dni,nombre,apellidos,direccion,telefono,fechacontratacion) values
          ('$_POST[dni]','$_POST[nombre]','$_POST[apellidos]','$_POST[direccion]','$_POST[telefono]',curdate())";

          $consulta2="select * from empleados where dni='$_POST[dni]'";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result2 = $connection->query($consulta2)) {
            
              //No rows returned
              if ($result2->num_rows===0) {
                if ($result1 = $connection->query($consulta)) {
                    header("Location: mostrarempleados.php");
                }
              } else {
                    echo "<h1>Emppleado ya registrado; ingrese otro empleado</h1>";
                    header("refresh:3;url=crearempleados.php");
                
              }

          } else {
            echo "Wrong Query";
          }
   
    ?>
          <?php endif ?>


    </div>
</body>
</html>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>