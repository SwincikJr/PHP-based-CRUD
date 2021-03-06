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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php

        include("novoForm.php");

        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        $preco = isset($_GET['preco']) ? $_GET['preco'] : "";
        $descricao = isset($_GET['descricao']) ? $_GET['descricao'] : "";
        $error = isset($_GET['error']) ? $_GET['error'] : false;

        renderizaNovoForm(null, $nome, $preco, $descricao, $error, true);
        
    ?>
</body>
</html>