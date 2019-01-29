<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./CSS/registro.css">  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
           <?php if (!isset($_POST["user"])) : ?>
            <form method="post">
        
        
            <div class="container">
            <h1 class="form-heading">BookFace</h1>
            <div class="row">
            <div class="login-form col-md-12">
            <div class="main-div">
                <div class="panel">
            <h2>Crea tu cuenta</h2>
            </div>
                    <div class="form-group">


                        <input type="text" class="form-control" name="user" placeholder="Usuario" required>

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>

                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="nombre" placeholder="Nombre y apellidos" required>

                    </div>
                    <div class="form-group">

                        <input type="email" class="form-control" name="correo" placeholder="Correo">

                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>

                </form>
                </div>
                <form action="login.php">
                    <input class="btn" id="salir" type="submit" value="Salir">
                </form>
            </div>
            </div>
            </div>
            </div>
            
           
          
           <?php else:?>
           <?php
           $connection = new mysqli("localhost", "user", "2asirtriana", "proyecto");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="INSERT into usuarios (user,password,nombre,correo,fecha_alta) values
          ('$_POST[user]',md5('$_POST[password]'),'$_POST[nombre]','$_POST[correo]',curdate())";

          $consulta2="select * from usuarios where user='$_POST[user]'";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta2)) {
            
              //No rows returned
              if ($result->num_rows===0) {
                if ($result = $connection->query($consulta)) {
                    echo $consulta;
                    header("Location: login.php");
                }
              } else {
                    echo "<h1>Usuario ya registrado; ingrese otro usuario</h1>";
                    header("refresh:3;url=registro.php");
                
              }

          } else {
            echo "Wrong Query";
          }
   
    ?>
          <?php endif ?>

</body>
</html>