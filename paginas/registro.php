<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
           <?php if (!isset($_POST["user"])) : ?>
           <?php          

           echo "<p>NOMBRE DE USUARIO <input type='text' name='user'></p>";
           echo "<p>CONTRASEÑA <input type='password' name='password'></p>";
           echo "<p>NOMBRE <input type='text' name='nombre'></p>";
           echo "<p>CORREO <input type='mail' name='correo'></p>";
       
           echo "<p><input type='submit' value='Entrar'></p>";
           echo "<br>";
           
           
           
           ?>
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
          $consulta="insert into usuarios (user,password,nombre,correo,fecha_alta) values
          ('$_POST[user]',md5('$_POST[password]'),'$_POST[nombre]','$_POST[correo]',curdate())";

          $consulta2="select * from usuarios where user=$_POST[nombre]";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta2)) {
            
              //No rows returned
              if ($result->num_rows===0) {
                if ($result = $connection->query($consulta1)) {
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