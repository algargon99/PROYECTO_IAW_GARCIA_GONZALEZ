<?php ob_start(); ?>

<?php session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") {
     ?>

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
    
    <?php if (!isset($_POST["borrar"])) : ?>
            <form method="post">
            <div class="row">
            <div class="login-form">
            <div class="main-div row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color: white; border-radius: 10px;">
                    <center><h2>¿Quieres borrar el pedido <?php echo $_GET["cod"]; ?>?</h2></center>
                    <center><input type="submit" name="borrar" class="btn btn-primary" value="Borrar pedido" style="margin-bottom: 5px;"></center>
                </div>
                <div class="col-md-4"></div>

                
                </div>
            </div>
            </div>
            </form>
           
          
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
          $consulta="DELETE from pedidos where codpedido='$_GET[cod]'";

        
                if ($result = $connection->query($consulta)) {
                    echo "<div class='col-md-4'></div>";
                    echo "<div class='col-md-4' style='background-color: white; border-radius: 10px;'>";
                    echo "<center><h1>Pedido eliminado</h1><center>";
                    echo "</div>";
                    echo "<div class='col-md-4'></div>";

                    header("refresh:1;url=borrarpedidos.php");
                    

                }
               else {
                    echo "<h1>Pedidos no eliminado</h1>";
                    echo $consulta;
                
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