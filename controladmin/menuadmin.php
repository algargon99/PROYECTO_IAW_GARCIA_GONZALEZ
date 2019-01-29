

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdknjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="principal.php">BookFace</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navdrop" role="button" data-toggle="dropdown" data-hover="dropdown">Libros<span class="caret"></span></a>          
      <ul class="dropdown-menu">
            <li><a href="../librosadmin/mostrarlibros.php">Mostrar</a></li>
            <li><a href="../librosadmin/crearlibros.php">Crear</a></li>
            <li><a href="../librosadmin/libroaeditar.php">Editar</a></li>
            <li><a href="../librosadmin/borrarlibros.php">Borrar</a></li>
          </ul>
        </li>
        <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navdrop" role="button" data-toggle="dropdown" data-hover="dropdown">Pedidos<span class="caret"></span></a>          
          <ul class="dropdown-menu">
            <li><a href="../pedidosadmin/mostrarpedidos.php">Mostrar</a></li>
            <li><a href="../pedidosadmin/crearpedidos.php">Crear</a></li>
            <li><a href="../pedidosadmin/pedidoaeditar.php">Editar</a></li>
            <li><a href="../pedidosadmin/borrarpedidos.php">Borrar</a></li>
          </ul>
        </li>
        <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navdrop" role="button" data-toggle="dropdown" data-hover="dropdown">Usuarios<span class="caret"></span></a>          
          <ul class="dropdown-menu">
            <li><a href="../usuariosadmin/mostrarusuarios.php">Mostrar</a></li>
            <li><a href="../usuariosadmin/crearusuarios.php">Crear</a></li>
            <li><a href="../usuariosadmin/usuarioaeditar.php">Editar</a></li>
            <li><a href="../usuariosadmin/borrarusuarios.php">Borrar</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../controladmin/perfiladmin.php"><?php echo $_SESSION["user"] ?></a></li>
        <li id="boton"><?php 
        
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