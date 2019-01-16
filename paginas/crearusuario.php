<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <?php if (!isset($_POST["user"])): ?>

            <form method="post">

                Nombre usuario: <input type="text" name="user" required>
                Contraseña: <input type="password" name="password" required>
                Nombre: <input type="text" name="nombre" required>
                Correo: <input type="text" name="correo" required>
                <input type="submit" value="Insertar">

            </form>
        <?php else: ?>

    <?php

        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "123456", "proyecto");
        $connection->set_charset("utf8");

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */



        $query = "insert into usuarios (user,password,nombre,correo,fecha_alta) values ('$_POST[user]',md5('$_POST[password]'),'$_POST[nombre]','$_POST[correo]',curdate())";


        if ($result = $connection->query($query) ) {

    
            header("Location: principal.php");
        
        
        } 
        else { 
                echo "<h1>Error en consulta</h1>";
        }



        unset($connection);

    ?>

        <?php endif?>

</body>
</html>