
<?php ob_start(); ?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../CSS/menuadmin.css">        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") { ?>
    <div class="row">
        <div>
        <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        
            <?php if (!isset($_POST["dni"])) : ?>

                <form method="post">
                    <div class="row">

                        <div class="login-form">

                            <div class="main-div">
                        
                            <div class="form-group">


                            <input type="text" class="form-control" name="dni" placeholder="Empleado" value="<?php echo $_GET['dni']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $_GET['nombre']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $_GET['apellidos']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $_GET['direccion']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $_GET['telefono']; ?>">

                            </div>
                            
                            <button type="submit" class="btn btn-primary">Editar</button>
                            </div>

                        </div>

                    </div>
                </form>
                    
                
                
            
            
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
            $consulta="UPDATE empleados set dni='$_POST[dni]', nombre='$_POST[nombre]',apellidos='$_POST[apellidos]',direccion='$_POST[direccion]',telefono='$_POST[telefono]'
            where codempleado=$_GET[cod]";


            //Test if the query was correct
            //SQL Injection Possible
            //Check http://php.net/manual/es/mysqli.prepare.php for more security
            
                    if ($result = $connection->query($consulta)) {
                        header("Location: empleadoaeditar.php");
                        
                    }
                else {
                        echo "<h1>Empleado no actulizado</h1>";
                    
                        header("refresh:3;url=editarempleados.php");
                } ?>
            <?php endif ?>

        </div>
        <div class="col-md-2"></div>
    </div>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>

</body>
</html>