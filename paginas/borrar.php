
           <?php if (!isset($_POST["boton"])) : ?>
            <form method="post">
            <div class="row">
            <div class="login-form">
            <div class="main-div">
                
                   <h2>¿Quieres borrar el usuario <?php $_GET["user"] ?>?</h2>
                    <input type="submit" name="boton" class="btn btn-primary" value="Borrar usuario">

                
                </div>
            </div>
            </div>
            </form>
            <?php echo $_SESSION['user'];?>
           
          
           <?php else:?>
           <?php /*

           start_session();
           $connection = new mysqli("localhost", "root", "123456", "proyecto");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="DELETE from usuarios where id='$_GET[id]'";


          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
        
                if ($result = $connection->query($consulta)) {
                    echo "<h1>Usuario eliminado</h1>";

                    //header("refresh:3;Location: borrarusuarios.php");

                }
               else {
                    echo "<h1>Usuario no eliminado</h1>";
                
              }
          */ ?> 
          <?php endif ?>
