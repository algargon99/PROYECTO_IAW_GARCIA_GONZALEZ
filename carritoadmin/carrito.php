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

if (isset($_SESSION["user"])&&$_SESSION["user"]=="admin") {
?>
<div class="row">
        <div>
        <?php include_once "../controladmin/menuadmin.php"?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" style='background-color: white; border-radius:10px;'>

     <?php 
     
     if (isset($_SESSION["cart"]) && $_SESSION["cart"]!=[]) { ?>   
    <form action="compra.php" method="post"> 
    
    <table class='table custab'>
    
        <thead>
            <tr>
                <th>Título</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Precio por nombre de libro</th>

     
            </tr>
        </thead>
        <tbody>
            <?php

                foreach ($_SESSION["cart"] as $k => $v) {
                    
                    $connection = new mysqli("localhost", "root", "123456", "proyecto");
                    $connection->set_charset("utf8");

                    if ($connection->connect_errno) {
                        printf("Connection failed: %s\n", $connection->connect_error);
                        exit();
                    }
                    if ($result = $connection->query("select * from libros where isbn=$k;")) {
                        $obj = $result->fetch_object();
                            $query2="INSERT into tienen values ($v,$connection->insert_id,$k)";
                            echo "<tr><td>".$obj->titulo."</td><td>".$obj->precio."€</td><td>".$v."</td><td>".$obj->precio*$v."€</td></tr>";

                    $result->close();
                    unset($obj);
                    unset($connection);
                
                }
                }
            ?>
        </tbody>
    </table>
    <div class="text-right">  
    <input type="submit" class="btn" name="compra" value="Comprar todo">
    </div>
    </form>
    <?php } else{ ?>
                <center><h2>Tu carrito está vacio</h2></center>
    <?php
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