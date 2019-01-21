<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "admin", "123456", "proyecto");
$connection->set_charset("uft8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
  $query="SELECT * from clientes";
if ($result = $connection->query($query)) {

    printf("<p>The select query returned %d rows.</p>", $result->num_rows);

?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table style="border:1px solid black">
    <thead>
      <tr>
        <th>CodCliente</th>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Telefono</th>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
          echo "<td>".$obj->codcliente."</td>";
          echo "<td>".$obj->dni."</td>";
          echo "<td>".$obj->nombre."</td>";
          echo "<td>".$obj->apellidos."</td>";
          echo "<td>".$obj->direccion."</td>";
          echo "<td>".$obj->telefono."</td>";
        echo "</tr>";
    }

    
    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
</body>
</html>




          