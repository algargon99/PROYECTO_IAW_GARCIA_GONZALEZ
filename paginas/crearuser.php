
           <?php if (!isset($_POST["user"])) : ?>
            <form method="post">
            <div class="row">
            <div class="login-form">
            <div class="main-div">
                
                    <div class="form-group">


                        <input type="text" class="form-control" name="user" placeholder="Usuario">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="password" placeholder="Contraseña">

                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="nombre" placeholder="Nombre y apellidos">

                    </div>
                    <div class="form-group">

                        <input type="email" class="form-control" name="correo" placeholder="Correo">

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
                    header("Location: mostarusuarios.php");
                }
              } else {
                    echo "<h1>Usuario ya registrado; ingrese otro usuario</h1>";
                    header("refresh:3;url=crearusuarios.php");
                
              }

          } else {
            echo "Wrong Query";
          }
   
    ?>
          <?php endif ?>
