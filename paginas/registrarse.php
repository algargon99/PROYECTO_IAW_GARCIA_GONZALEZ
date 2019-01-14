<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php if (!isset($_POST["usuario"])) : ?>
     
<form method="post">
  <fieldset>
      <legend>Insertar cliente</legend>
      <span>Usuario: </span><input type="text" maxlength="5" name="Usuario" required><p>
      <span>Contraseña: </span><input type="password" name="Password" required><p>
      <span>Correo: </span><input type="email" name="Correo"><p>
     
      <input type="submit" value="Crear cliente">
  </fieldset>
 </form>

<?php else: ?>
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
$query="insert into clientes (Usuario,Password,Correo ) values ('".$_POST['Usuario']."','".$_POST['Password']."','".$_POST['Correo']."')";
if ($result = $connection->query($query)) {
    header("location: registro.php");
}

?>

  <?php
    
    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
    <?php endif ?>

</body>
</html>




          