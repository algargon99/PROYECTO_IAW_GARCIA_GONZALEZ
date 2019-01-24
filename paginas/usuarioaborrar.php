
<html>
<head><title>CONSULTA</title></head>
<body>
<?php

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "123456", "proyecto");
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result = $connection->query("select * from usuarios;")) {


?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table style="border:1px solid black">
    <thead>
      <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Fecha Alta</th>      
       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td>".$obj->id."</td>";
        echo "<td>".$obj->user."</td>";
        echo "<td>".$obj->nombre."</td>";
        echo "<td>".$obj->correo."</td>";
        echo "<td>".$obj->fecha_alta."</td>";
        echo "<td><a href=borraruser.php?id=$obj->id&user=$obj->user>Borrar usuario</a></td>";

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