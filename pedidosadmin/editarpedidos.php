
<?php ob_start(); ?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../CSS/menuadmin.css">        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") { ?>
    <div class="row">
        <div>
        <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        
            <?php if (!isset($_POST["titulo"])) : ?>

                <form method="post">
                    <div class="row">
                        <div class="login-form">
                            <div class="main-div">
                            <div class="form-group">
                                <input type="text" class="form-control" name="codpedido" value="<?php echo $_GET['cod']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="fechaentrega" value="<?php echo $_GET['fechaentrega']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="codempleado" value="<?php echo $_GET['codempleado']; ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Editar</button>
                            </div>

                        </div>

                    </div>
                </form>
                    
                
                
            
            
            <?php else:?>
            <?php
            $connection = new mysqli("localhost", "root", "123456", "proyecto");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $consulta="UPDATE pedidos set codpedido='$_POST[codpedido]', fechaentrega='$_POST[fechaentrega]',
            id='$_POST[id]',codempleado='$_POST[codempleado]'where codpedido=$_GET[cod]";


                    if ($result = $connection->query($consulta)) {
                        header("Location: ./pedidoaeditar.php");
                        
                    }
                else {                    
                        header("Location: editarpedidos.php");
                } ?>
            <?php endif ?>

        </div>
        <div class="col-md-2"></div>
    </div>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>

</body>
</html>