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

    include("novoForm.php");
    include("redireciona.php");
    
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $preco = isset($_POST['preco']) ? $_POST['preco'] : "";
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
    
    if (empty($nome) || empty($preco) || empty($descricao))
    {
        renderizaNovoForm(null, $nome, $preco, $descricao, true, true);
    } 
    else 
    {
        $conn = new mysqli("host:port", "username", "password", "database");
    
        if($conn->connect_error){
           die("Erro ao se conectar: " . $conn->connect_error);
        }
    
        $sql = "insert into Product (Criado, Nome, Preco, Descricao) values (current_date(), '$nome', '$preco', '$descricao')"
            or die("Erro ao tentar inserir novo produto...");

        $result = $conn->query($sql);

        $conn->close();

        $url = "http://localhost/gameshop/index.php?msg=Novo%20produto%20adicionado%20com%20sucesso!";
        redirectToPage($url);
    }
?>