<?php

    include ("novoForm.php");
    include ("redireciona.php");

    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $preco = isset($_POST['preco']) ? $_POST['preco'] : "";
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";

    if (!empty($id) && !empty($nome) && !empty($preco) && !empty($descricao))
    {
        $conn = new mysqli("host:port", "username", "password", "databasename");
    
        if($conn->connect_error){
            die("Erro ao se conectar: " . $conn->connect_error);
        }
    
        $sql = "update Product set Nome = '$nome', Preco = $preco, Descricao = '$descricao' where Id = $id";
    
        $result = $conn->query($sql)
            or die("Falha ao tentar atualizar banco de dados...");

        $conn->close();

        redirectToPage("http://localhost/gameshop/index.php?msg=Produto%20atualizado%20com%20sucesso!");
    } 
    else
    {
        renderizaNovoForm($id, $nome, $preco, $descricao, true, false);
    } 

?>