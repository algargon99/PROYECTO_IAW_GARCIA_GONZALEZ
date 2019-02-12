<?php session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") { ?>
<?php ob_start(); ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/menuadmin.css">


</head>
<body>
<div class="row">
<?php include_once "menuadmin.php" ?>
</div>
<div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4" style='background-color: white; border-radius:10px;'>
        <h2>Novedades</h2>
        <br>
        <?php
            $connection = new mysqli("localhost", "root", "123456", "proyecto");
            $connection->set_charset("utf8");
            
            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            if ($result = $connection->query("select * from libros order by isbn desc limit 1;")) {
            
                ?>
            
            <?php
            
                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo "<center><h3>".$obj->titulo."</h3></center>";
                    echo "<center><h4>".$obj->autor."</h4></center>";
                    echo "<center><h4>".$obj->precio." €</h4></center>";
                    echo "<br>";
                    echo "<p><a href='../librosadmin/libro.php?cod=$obj->isbn'>Datos del libro</a><p>";
                }
            
                //Free the result. Avoid High Memory Usages
                $result->close();
                unset($obj);
                unset($connection);
            
            } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
            else {
                session_destroy();
                header("Location: ../login.php");
              }
            
        ?>
     </div>
     <div class="col-md-4"></div>

</div>

</body>
</html>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>