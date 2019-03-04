
<?php ob_start(); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdknjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="../controluser/principalusuario.php">BookFace</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li>
      <a class="nav-link" href="../librosuser/mostrarlibros.php" role="button">Libros</a>          
        </li>
        <li>
        <a class="nav-link" href="../pedidosuser/mostrarpedidos.php" role="button">Pedidos</a>          
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="contador"><?php echo sizeof($_SESSION["cart"])?></li>
        <li><a href="../carrito/carrito.php"><img id="carrito" src="../CSS/carrito.png" ></a></li>
        <li id="user"><a id="nombre" href="../controluser/perfiluser.php"><?php echo $_SESSION["user"] ?></a></li>
        <li id="boton">
        <?php 
        
        if (!isset($_POST["cerrar"])) : ?>
        <form method="post">
            <p><input class="btn" type="submit" name="cerrar" value="Cerrar sesión"></p>
        </form>

      <?php else: ?>

        <?php
            session_destroy();
            header("Location: ../login.php");

        ?>

      <?php endif?></li>
      </ul>
    </div>
  </div>
</nav>