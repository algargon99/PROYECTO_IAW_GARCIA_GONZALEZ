

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
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Libros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../Libros/mostrarlibros.php">Mostrar</a></li>
            <li><a href="../Libros/crearlibros.php">Crear</a></li>
            <li><a href="../Libros/libroaeditar.php">Editar</a></li>
            <li><a href="../Libros/borrarlibros.php">Borrar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../Pedidos/mostrarpedidos.php">Mostrar</a></li>
            <li><a href="../Pedidos/crearpedidos.php">Crear</a></li>
            <li><a href="../Pedidos/pedidoaeditar.php">Editar</a></li>
            <li><a href="../Pedidos/borrarpedidos.php">Borrar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../Usuarios/mostrarusuarios.php">Mostrar</a></li>
            <li><a href="../Usuarios/crearusuarios.php">Crear</a></li>
            <li><a href="../Usuarios/usuarioaeditar.php">Editar</a></li>
            <li><a href="../Usuarios/borrarusuarios.php">Borrar</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="perfiladmin.php"><?php echo $_SESSION["user"] ?></a></li>
        <li id="boton"><?php include_once "cerrarsesion.php" ?></li>
      </ul>
    </div>
  </div>
</nav>