
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdknjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


      <?php if (!isset($_POST["boton"])) : ?>
        <form method="post">
            <p><input class="btn" type="submit" name="boton" value="Cerrar sesión"></p>
        </form>

      <?php else: ?>

        <?php
            session_destroy();
            header("Location: /login.php");
        ?>

      <?php endif ?>

