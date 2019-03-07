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
    
    <?php if (!isset($_POST["titulo"])) : ?>
            <form method="post"  enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="login-form">
            <div class="main-div col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo" placeholder="Título del libro">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="autor" placeholder="Autor del libro">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="editorial" placeholder="Editorial del libro">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="numpag" placeholder="Número de páginas">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="encuadernacion" placeholder="Encuadernación">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="precio" placeholder="Precio (sin €)">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" placeholder="Seleccionar una imagen">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>

                </form>
                </div>
            </div>
            </div>
            <div class="col-md-4"></div>
            </div>
            

            </div>
            
           
          
           <?php else:?>
           <?php

                var_dump($_FILES);

                //Temp file. Where the uploaded file is stored temporary
                $tmp_file = $_FILES['image']['tmp_name'];

                //Dir where we are going to store the file
                $target_dir = "../imagenes/";

                //Full name of the file.
                $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

                //Can we upload the file
                $valid= true;

                //Check if the file already exists
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $valid = false;
                }

                //Check the size of the file. Up to 2Mb
                if ($_FILES['image']['size'] > (2048000)) {
			            $valid = false;
			            echo 'Oops!  Your file\'s size is to large.';
		            }

                //Check the file extension: We need an image not any other different type of file
                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
                if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                  $valid = false;
                  echo "Only JPG, JPEG, PNG & GIF files are allowed";
                }


                if ($valid) {

                  var_dump($target_file);
                  //Put the file in its place
                  move_uploaded_file($tmp_file, $target_file);

                }

           $connection = new mysqli("localhost", "root", "123456", "proyecto");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="INSERT into libros (titulo,autor,editorial,numpag,encuadernacion,precio,rutaimagen) values
          ('$_POST[titulo]','$_POST[autor]','$_POST[editorial]','$_POST[numpag]','$_POST[encuadernacion]','$_POST[precio]','$target_file')";

          $consulta2="select * from libros where titulo='$_POST[titulo]'";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result2 = $connection->query($consulta2)) {
            
              //No rows returned
              if ($result2->num_rows===0) {
                if ($result1 = $connection->query($consulta)) {
                    header("Location: mostrarlibros.php");
                    
                }
              } else {
                    header("Location: crearlibros.php");
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


 