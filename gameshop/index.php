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

        if(isset($_GET['msg'])){
            echo $_GET['msg'] . "<br />";
        }

    ?>

    <a href="novo.php">Criar novo produto...</a>
    
    <?php   
        
        $conn = new mysqli("host:port", "username", "password", "databasename");
    
        if($conn->connect_error){
            die("Erro ao se conectar: " . $conn->connect_error);
        }
    
        $sql = "select * from Product";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0)
        {
            ?>

                <table>

                    <thead>
                        <td>Nome</td>
                        <td>Preço</td>
                        <td>Descrição</td>
                        <td></td>
                    </thead>

                    <tbody>

            <?php
            while($row = mysqli_fetch_array($result))
            {
                ?>

                    <tr class="div-product">
                        <td class="product-name"> <?php echo $row['Nome'] ?> </td>
                        <td class="product-price"> R$: <?php echo $row['Preco'] ?> </td>
                        <td class="product-description"> <?php echo $row['Descricao'] ?> </td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['Id'] ?>">Editar</a>
                            <form type="submit" action="excluir.php" method="post">
                                <input hidden name="id" value=<?php echo $row['Id'] ?> />
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php
            }

            ?>
                    </tbody>
                </table>

            <?php
        } 
        else 
        {
            echo "Não há dados a serem exibidos...";
        }
    
        $conn->close();
            
    ?>
</body>
</html>