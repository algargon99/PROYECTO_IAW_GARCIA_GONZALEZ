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
    <div class="col-md-8" style='background-color: white; border-radius:10px;'>
     <?php if (isset($_SESSION["cart"])) { ?>   
    <table class='table custab' style='background-color: white; border-radius:10px;'>
    
        <thead>
            <tr>
                <th>Título</th>
                <th>Cantidad</th>            
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($_SESSION["cart"] as $k => $v) {
                    echo "<td>".$k."</td><td>".$v."</td>";
                }
            ?>
        </tbody>
    </table> 
    <?php } else{ ?>
                <h2>No tienes ningún libro en tu carrito</h2>
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