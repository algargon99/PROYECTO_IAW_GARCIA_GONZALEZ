
           <?php if (!isset($_POST["user"])) : ?>
            <form method="post">
            <div class="row">
            <div class="login-form">
            <div class="main-div">
                
                    <div class="form-group">


                        <input type="text" class="form-control" name="user" placeholder="Usuario" value="<?php echo $_GET['user']; ?>">

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
          $consulta="UPDATE usuarios set user='$_POST[user]', password=md5('$_POST[password]'),nombre='$_POST[nombre]',correo='$_POST[correo]' 
          where id=$_GET[id]";


          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
        
                if ($result = $connection->query($consulta)) {
                    header("Location: usuarioaeditar.php");
                }
               else {
                    echo "<h1>Usuario no actulizado</h1>";
                    echo $consulta;
                    //header("refresh:3;url=editarusuarios.php");
                
              }
    ?>
          <?php endif ?>
