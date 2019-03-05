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
    
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

<?php

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "123456", "proyecto");
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

$query="select e.nombre n, e.apellidos a , p.*, u.user nombreusuario 
from pedidos p 
join usuarios u on u.id=p.id 
left join empleados e on p.codempleado=e.codempleado";

if ($result = $connection->query($query)) {

   echo " <table class='table custab' style='background-color: white; border-radius:10px;'>";
    ?>
    <thead>
      <tr>
        <th>Codigo de Pedido</th>
        <th>Fecha de Entrega</th>
        <th>Cliente</th>
        <th>Empleado</th>   
       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td>".$obj->codpedido."</td>";
        echo "<td>".$obj->fechaentrega."</td>";
        echo "<td>".$obj->nombreusuario."</td>";
        if ($obj->n!=NULL && $obj->a!=NULL) {
            echo "<td>$obj->n $obj->a</td>";        
        } else {
            echo "<td>-</td>";
        }
        echo "<td><a href='editarpedidos.php?cod=$obj->codpedido&fechaentrega=$obj->fechaentrega&id=$obj->id&codempleado=$obj->codempleado'>Editar pedido</a></td>";

        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>

    </div>
    <div class="col-md-2"></div>
    </div>

</body>
</html>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>