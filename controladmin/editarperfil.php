
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
        <?php include_once "../controluser/menuuser.php"?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        
            <?php if (!isset($_POST["user"])) : ?>

                <form method="post">
                    <div class="row">

                        <div class="login-form">

                            <div class="main-div">
                        
                            <div class="form-group">


                            <input readonly type="text" class="form-control" name="user" placeholder="Usuario" value="<?php echo $_GET['user']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?php echo $_GET['password']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="nombre" placeholder="Nombre y apellidos" value="<?php echo $_GET['nombre']; ?>">

                            </div>
                            <div class="form-group">

                                <input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $_GET['correo']; ?>">

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

            $contra="select password from usuarios where id='$_GET[cod]'";

            $consultaconcontra="UPDATE usuarios set user='$_POST[user]', password=md5('$_POST[password]'),nombre='$_POST[nombre]',correo='$_POST[correo]' 
            where id=$_GET[cod]";

            $consultasincontra="UPDATE usuarios set user='$_POST[user]',nombre='$_POST[nombre]',correo='$_POST[correo]' 
            where id=$_GET[cod]";

            if ($result = $connection->query($contra)) {
                $obj = $result->fetch_object();
              
                if ($_POST["password"]==$obj->password) {
                    if ($result = $connection->query($consultasincontra)) {
                        header("Location: perfiladmin.php");
                    }
                    else {
                            echo "<h1>Usuario no actulizado</h1>";
                            header("refresh:3;url=editarperfil.php");
                    } 
                } else {
                    if ($result = $connection->query($consultaconcontra)) {
                        header("Location: perfiladmin.php");   
                    }
                    else {
                            echo "<h1>Usuario no actulizado</h1>";
                            header("refresh:3;url=editarperfil.php");
                    }  
                }
            }
                ?>
            
                   
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