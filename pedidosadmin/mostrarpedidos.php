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
<?php session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") {
?>
<div class="row">
        <div>
        <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
<?php

//Open the session

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "123456", "proyecto");
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

$query="select * from pedidos p join usuarios u on u.id=p.id ";
$query1="select count(*) cantidad from pedidos";

if ($result = $connection->query($query1)) {
    $obj = $result->fetch_object(); 
    
    if ($obj->cantidad==0) {
        echo "<div style='padding:10px;background-color: white; border-radius:10px;'><h1><center>No tienes ningún pedido</center></h1></div>";
    } else {
        
   
if ($result = $connection->query($query)) {

    ?>
     <table class='table custab' style='background-color: white; border-radius:10px;'>
    <thead>
      <tr>
        <th>Numero de Pedido</th>
        <th>Fecha de Entrega</th>
<<<<<<< HEAD
        <th>Usuario</th>         
=======
        <th>Usuario</th>
>>>>>>> 287debcd67b2fe268ba05d521b0763e7ae04437f
       </tr>
    </thead>

<?php

    
    while($obj = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>".$obj->codpedido."</td>";
        echo "<td>".$obj->fechaentrega."</td>";
        echo "<td>".$obj->user."</td>";
        echo "<td><a href='pedido.php?cod=$obj->codpedido'>Datos del pedido</a></td>";
        echo "</tr>";
    }

    $result->close();
    unset($obj);
    unset($connection);
}
}
} 
} else {
    session_destroy();
    header("Location: ../login.php");
  }


?>
</div>
    <div class="col-md-2"></div>
    </div>
</body>
</html>