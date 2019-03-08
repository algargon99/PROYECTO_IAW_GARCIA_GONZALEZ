
<?php ob_start(); ?>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

        
            <?php if (!isset($_POST["usuario"])) : ?>

                <form method="post">
                    <div class="row">
                        <div class="login-form main-div" style="background-color: white; border-radius:10px;padding:20px;">
                                <div class="form-group">
                                    Número de pedido <input readonly type="text" class="form-control" id="pedido" name="codpedido" value="<?php echo $_GET['cod']; ?>">

                                </div>
                                <div class="form-group">
                                    Fecha de entrega <input type="text" class="form-control" name="fechaentrega" value="<?php echo $_GET['fechaentrega']; ?>">
                                </div>
                                <div class="form-group">
                                <?php
                                        $connection = new mysqli("localhost", "root", "123456", "proyecto");
                                        $connection->set_charset("uft8");

                                        if ($connection->connect_errno) {
                                            printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                        }
                                        
                                            $q="SELECT * from usuarios";

                                        if ($result = $connection->query($q)) {
                                            echo "<p>Usuario: <select name='usuario'>"; 
                                            while($obj = $result->fetch_object()) {
                                                echo "<option value='$obj->id'>".$obj->user."</option>";    
                                            }
                                            echo "</select></p>";
                                            
                                            $result->close();
                                            unset($obj);
                                            unset($connection);
                                        }
                                        ?>    
                                </div>
                                <div class="form-group">
                                    <?php
                                        $connection = new mysqli("localhost", "root", "123456", "proyecto");
                                        $connection->set_charset("uft8");

                                        if ($connection->connect_errno) {
                                            printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                        }
                                        
                                            $q="SELECT * from empleados";
                                        if ($result = $connection->query($q)) {
                                            echo "<p>Empleado: <select name='empleado'>";
                                            while($obj = $result->fetch_object()) {
                                                echo "<option value='$obj->codempleado'>".$obj->nombre." ".$obj->apellidos."</option>";    
                                            }
                                            echo "</select></p>";
                                            
                                            $result->close();
                                            unset($obj);
                                            unset($connection);
                                        }
                                    ?>                                
                                </div>
                                <div class="form-group">
                                <p>Libros actuales:</p>
                                <div class="row">
                                <?php
                                        $connection = new mysqli("localhost", "root", "123456", "proyecto");
                                        $connection->set_charset("uft8");

                                        if ($connection->connect_errno) {
                                            printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                        }                                  
                                        $query="select * from tienen t join libros l on l.isbn=t.isbn where codpedido=$_GET[cod]";                                    
                                        if ($result = $connection->query($query)) {                                       
                                        while($obj = $result->fetch_object()) {   
                                            echo "<div class='row'><div class='col-md-1' id='$obj->isbn'><a href=''><img class='imagen' style='width:20px;' src='../CSS/cruzroja.jpg'></img></a></div><div class='col-md-4'> <input readonly class='form-control' value='$obj->isbn' type='text' name='$obj->isbn' id='$obj->isbn'></div><div class='col-md-3'>$obj->titulo</div><div class='col-md-4'><input class='form-control' value='$obj->cantidad' type='text' name='$obj->cantidad' id='$obj->isbn'></div></div>";                                        
                                            
                                        } 
                                      
                                            $result->close();
                                            unset($obj);
                                            unset($connection);
                                        }
                                    ?> 
                                    
                                   <br><br>

                                    <p>Otros libros:</p>
                                    <?php
                                        $connection = new mysqli("localhost", "root", "123456", "proyecto");
                                        $connection->set_charset("uft8");

                                        if ($connection->connect_errno) {
                                            printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                        }                                  
                                        $query="select * from libros where isbn not in (select l.isbn from tienen t join libros l on l.isbn=t.isbn where codpedido=$_GET[cod]);";                                    
                                        if ($result = $connection->query($query)) {                                       
                                        while($obj = $result->fetch_object()) {   
                                            echo "<div><button value=$obj->isbn class='add' id=$obj->isbn>$obj->titulo</button></div>";                                        
                                        }
                                            $result->close();
                                            unset($obj);
                                            unset($connection);
                                        }
                                    ?> 
                                </div>
                                <div class="text-right">
                                    <input type="submit" style="margin-top:10px;"  type="submit" class="btn btn-primary" value="Editar">
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
                
                
            
            
            <?php else:?>
           <?php  

            $connection = new mysqli("localhost", "root", "123456", "proyecto");


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
        
            
            $consulta="UPDATE pedidos set codpedido=$_POST[codpedido], fechaentrega='$_POST[fechaentrega]',
            id=$_POST[usuario],codempleado=$_POST[empleado] where codpedido=$_GET[cod]";

            $query1="select * from tienen t join libros l on l.isbn=t.isbn where codpedido=$_GET[cod]";  
 
                    if ($result = $connection->query($consulta)) {

                        if ($result2 = $connection->query($query1)) {
                            while($obj = $result2->fetch_object()) {
                                $libro=$obj->isbn;
                                $query="update tienen set 
                                cantidad=$_POST[$libro], 
                                isbn=$_POST[$libro] 
                                where codpedido=$_GET[cod]";
                                if ($result3 = $connection->query($query)) {

                                }
                            }
                        }
                    
                    if ($result2 = $connection->query($query1)) {
                        while($obj = $result->fetch_object()) {
                            $libro=$obj->isbn;
                            $query="update tienen set 
                            cantidad=$_POST[$libro], 
                            isbn=$_POST[$libro] 
                            where codpedido=$_GET[cod]";
                            if ($result3 = $connection->query($query)) {

                            }
                        }    
                        header("Location: mostrarpedidos.php");
                    }
                else {                    
                        //header("Location: editarpedidos.php");
                        echo $consulta;


                }   ?> 
            <?php endif ?>

        </div>
        <div class="col-md-2"></div>
    </div>

<?php } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>

<script>

$(function() {
    $(".add").click(function(event){
    event.preventDefault();
    var libro = $(this).val();
    console.log(libro);
    var pedido =$("#pedido").val();
    console.log(pedido);
    var url = "./insertareditar.php"+"?isbn="+libro+"&pedido="+pedido;
    
    $.ajax({
            url: url,
            type: "get",
            data: {
              "pedido": pedido,
              "isbn": libro
            }
    }
        ).done(function(data) {
            console.log(data);
            location.reload();
          });
        });

    $(".imagen").click(function(event){
    event.preventDefault();
    var libro = $(this).parent().parent().attr("id");
    console.log(libro);
    var pedido =$("#pedido").val();
    console.log(pedido);
    var url = "./borrareditar.php"+"?isbn="+libro+"&pedido="+pedido;
    
    $.ajax({
            url: url,
            type: "get",
            data: {
              "pedido": pedido,
              "isbn": libro
            }
    }
        ).done(function(data) {
            console.log(data);
            location.reload();
          });
        });


});





</script>
</body>
</html>