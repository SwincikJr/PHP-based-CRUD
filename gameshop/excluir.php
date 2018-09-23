<?php

    $username = 'teste';
    $password = 'teste';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
        || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password))
    {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="GameShop"');
        exit('Não autorizado');
    }

    header("Location: http://localhost/gameshop/", true, 301);
    
    $id = $_POST["id"];
    $conn = new mysqli("host:port", "username", "password", "database");
    
    if($conn->connect_error){
        die("Erro ao se conectar: " . $conn->connect_error);
    }
    
    $sql = "delete from Product where Id = $id";
    
    $result = $conn->query($sql);

    $conn->close();

?>