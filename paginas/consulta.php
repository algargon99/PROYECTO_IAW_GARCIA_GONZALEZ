

<?php
session_start();
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
if ($result = $connection->query("select * from usuarios where user='$_SESSION[user]'")) {


?>

    

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
   $obj = $result->fetch_object();
        //PRINTING EACH ROW
        
        echo "<p>Id de usuario: ".$obj->id."</p>";
        echo "<p>Nombre de usuario: ".$obj->user."</p>";
        echo "<p>Nombre: ".$obj->nombre."</p>";
        echo "<p>Correo: ".$obj->correo."</p>";
        echo "<p>Fecha de alta: ".$obj->fecha_alta."</p>";
       
    

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
