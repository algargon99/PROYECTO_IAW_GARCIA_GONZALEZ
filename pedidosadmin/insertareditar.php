<?php 
    $connection = new mysqli("localhost", "root", "123456", "proyecto");
    $connection->set_charset("utf8");

    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    $query="INSERT INTO tienen (codpedido,isbn) values($_GET[codpedido],$_GET[isbn])";

    if ($result = $connection->query($query)) {
            
    }

?>