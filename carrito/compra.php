<?php session_start();
ob_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../CSS/menuadmin.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>


    </head>

<body>

    <?php
    
        

        $connection = new mysqli("localhost", "root", "123456", "proyecto");
        $connection->set_charset("utf8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        

            $query1="INSERT into pedidos (fechaentrega,id) values (date_add(curdate(), interval 1 day),'$_SESSION[id]')";
            if ($result1=$connection->query($query1)) {
            
                $pedido = $connection->insert_id;

                foreach ($_SESSION["cart"] as $k => $v) {
            
                    $query2="INSERT into tienen values ($v,$pedido,$k)";
                    if ($result2=$connection->query($query2)) {
                        
                    }
                }
            }
        
        $_SESSION["cart"]=[];
     

        unset($obj);
        unset($connection);

        if (isset($_SESSION["user"]) && $_SESSION["user"]=="admin") {
            header("Location: ../controladmin/principal.php");
        }

        else {
            header("Location: ../controluser/principalusuario.php");
        }
?>

</body>

</html>