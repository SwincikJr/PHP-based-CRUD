<?php
    header("Location: http://localhost/gameshop/", true, 301);
    
    $id = $_POST["id"];
    $conn = new mysqli("host:port", "username", "password", "databasename");
    
    if($conn->connect_error){
        die("Erro ao se conectar: " . $conn->connect_error);
    }
    
    $sql = "delete from Product where Id = $id";
    
    $result = $conn->query($sql);

    $conn->close();
?>