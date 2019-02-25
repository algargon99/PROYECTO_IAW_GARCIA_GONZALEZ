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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="row">
        <div>
            <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php if (!isset($_POST["empleado"])) : ?>
        <form method="post">

            <div style="background-color: white; border-radius:10px; padding:10px;">

                <div class="form-group">


                    <?php
                        $connect = new mysqli("localhost", "root", "123456", "proyecto");
                        $connect->set_charset("uft8");

                        //TESTING IF THE CONNECTION WAS RIGHT
                        if ($connect->connect_errno) {
                            printf("Connection failed: %s\n", $connect->connect_error);
                            exit();
                        }

                        //MAKING A SELECT QUERY
                        /* Consultas de selección que devuelven un conjunto de resultados */
                            $q="SELECT * from empleados";
                        if ($resul = $connect->query($q)) {
                            echo "<p>Empleado: <select name='empleado'>";
                            while($o = $resul->fetch_object()) {
                                echo "<option value='".$o->codempleado."'>".$o->nombre." ".$o->apellidos."</option>";    
                            }
                            echo "</select></p>";
                            
                            //Free the result. Avoid High Memory Usages
                            $resul->close();
                            unset($o);
                            unset($connect);
                        }
                        ?>

                </div>

                <div class="form-group">

                    <?php
                        $connect = new mysqli("localhost", "root", "123456", "proyecto");
                        $connect->set_charset("uft8");

                        //TESTING IF THE CONNECTION WAS RIGHT
                        if ($connect->connect_errno) {
                            printf("Connection failed: %s\n", $connect->connect_error);
                            exit();
                        }

                        //MAKING A SELECT QUERY
                        /* Consultas de selección que devuelven un conjunto de resultados */
                            $q="SELECT * from usuarios";
                        if ($resul = $connect->query($q)) {
                            echo "<p>Usuario: <select name='usuario'>";
                            while($o = $resul->fetch_object()) {
                                echo "<option value='".$o->id."'>".$o->user."</option>";    
                            }
                            echo "</select></p>";
                            
                            //Free the result. Avoid High Memory Usages
                            $resul->close();
                            unset($o);
                            unset($connect);
                        }
                        ?>

                </div>


                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
        </div>
        <div class="col-md-4"></div>
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
          $consulta="INSERT into pedidos (fechaentrega,id,codempleado) values
          (date_add(curdate(), interval 1 day),'$_POST[usuario]','$_POST[empleado]')";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result1 = $connection->query($consulta)) {
            header("Location: mostrarpedidos.php");
          } else {
            echo "Wrong Query";
          }
   
    ?>
    <?php endif ?>


</body>

</html>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>