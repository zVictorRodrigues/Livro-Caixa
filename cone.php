<?php

include("banco.php");

$movimento = $_POST ['movimento'];
$dia = $_POST ['dia'];
$categoria = $_POST ['categoria'];
$descricao = $_POST ['descricao'];
$valor = $_POST ['valor'];


$sql="INSERT INTO livro(movimento, dia, categoria, descricao, valor) 
            VALUES ('$movimento', '$dia', '$categoria', '$descricao','$valor')";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        .volta span{
            padding: 25px;
            background-color: #013e7b;
            border-radius: 20px;
            font-size: 20px;
            color: #fff;
        }
        .php-cadastro{
            padding: 15px;
        }
        body, .volta{
            text-align:center;
        }
    </style>
</head>
<body>
    
 <div class="php-cadastro">
   <?php
    if(mysqli_query($conexao, $sql)){
        echo "Dados cadastrado com sucesso no Livro";
    }
    else{
        echo "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
    ?>
    </div>   
<br><br><br>
    <div class="volta">
    <a href="dados.php">
            <div>
                <span> Dados salvos</span>
            </div>
        </a>
    </div>
    <br><br><br><br>
    <div class="volta">
    <a href="servico.html">
            <div>
                <span> Livro Caixa</span>
            </div>
        </a>
    </div>
    <br><br><br><br>
    <div class="volta">
    <a href="inndex.html">
            <div>
                <span>Página Inicial</span>
            </div>
        </a>
    </div>
</body>
</html>