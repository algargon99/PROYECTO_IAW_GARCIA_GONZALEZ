<?php 
    $connection = new mysqli("localhost", "root", "123456", "proyecto");
    $connection->set_charset("utf8");

    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    $query="INSERT INTO tienen values(1,$_GET[pedido],$_GET[isbn])";

    if ($result = $connection->query($query)) {
          echo "OK";  
    }
    else {
        echo "Failed";
    }

?>