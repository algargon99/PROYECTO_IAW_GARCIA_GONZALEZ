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
    
<?php
 session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]!="admin") {
?>
    <div class="row">
        <div>
        <?php include_once "../controluser/menuuser.php"?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background-color: white; border-radius:10px; ">
    
    <?php

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "user", "2asirtriana", "proyecto");
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result = $connection->query("select * from libros where isbn='$_GET[cod]'")) {


?>

    

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
   $obj = $result->fetch_object();
        //PRINTING EACH ROW
        echo "<table class='table custab'";
        echo "<tr><td><b>ISBN: </b></td><td>$obj->isbn</td></tr>";
        echo "<tr><td><b>Título del libro: </b></td><td>$obj->titulo</td></tr>";
        echo "<tr><td><b>Autor del libro: </b></td><td>$obj->autor</td></tr>";
        echo "<tr><td><b>Editorial : </b></td><td>$obj->editorial</td></tr>";
        echo "<tr><td><b>Número de páginas: </b></td><td>$obj->numpag</td></tr>";
        echo "<tr><td><b>Encuadernación: </b></td><td>$obj->encuadernacion</td></tr>";
        echo "<tr><td><b>Precio: </b></td><td>$obj->precio €</td></tr>";
        echo "</table>";
    
        echo "<div class='text-right'>";
        echo "<a class='btn btn-primary' id='comprar' href='comprarlibro.php?cod=$obj->isbn'>Comprar</a>";
    echo "</div>";
    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
} else {
    session_destroy();
    header("Location: ../login.php");
  }
?>
</div>
<div class="col-md-3"></div>
</div>
</body>
</html>
