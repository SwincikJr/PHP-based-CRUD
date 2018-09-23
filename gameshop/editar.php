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
        include("redireciona.php");

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $conn = new mysqli("host:port", "username", "password", "database");
    
        if($conn->connect_error){
            die("Erro ao se conectar: " . $conn->connect_error);
        }
    
        $sql = "select * from Product where Id = $id";
    
        $result = $conn->query($sql);

        $conn->close();

        if ($result->num_rows == 1)
        {
            $row = mysqli_fetch_array($result);
            $nome = $row['Nome'];
            $preco = $row['Preco'];
            $descricao = $row['Descricao'];
            $error = isset($_GET['error']) ? $_GET['error'] : false;

            renderizaNovoForm($id, $nome, $preco, $descricao, $error, false);
        } 
        else 
        {
            redirectToPage("http://localhost/gameshop/index.php?msg=Algo%20de%20errado%20aconteceu!");
        }
        
    ?>
</body>
</html>