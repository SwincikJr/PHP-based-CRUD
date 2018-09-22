<?php

    function renderizaNovoForm($id ,$nome, $preco, $descricao, $error, $novoItem)
    {

        if (isset($id) && !empty($id))
        {
            $inputHidden = "<input type='hidden' name=id value='$id' />";
        }
        else 
        {
            $inputHidden = "";
        }

        if($error)
        {
            echo "Favor, preencha os dados corretamente...";
        }

        if ($novoItem)
        {
            $valueButton = "Criar";
            $urlAction = "insertProduct.php";
        }
        else 
        {
            $valueButton = "Salvar";
            $urlAction = "updateProduct.php";
        }

        echo "<form method='post' action='$urlAction'>"
                . $inputHidden
                . "<label for='nome'>Nome</label>"
                . "<input id='nome' type='text' name='nome' value='$nome' />"
                . "<label for='preco'>Preço (R$)</label>"
                . "<input id='preco' type='text' name='preco' value='$preco' />"
                . "<label for='descricao'>Descrição</label>"
                . "<textarea id='descricao' rows='4' cols='50' name='descricao' value='$descricao'>"
                    . "$descricao"
                . "</textarea>"
                . "<button type='submit'>$valueButton</button>"
                . "<a href='/gameshop'>Cancelar</a>"
        . "</form>";
    }

?>