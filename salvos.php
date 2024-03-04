<?php
include ("banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color:#013E7B;
        }
        .lista-banco{
            text-align:center;
            justify-content:center;
            border:1px solid #383840;
            width:50%;
            margin:40px 25%;
            padding:8px;
            border-radius:20px;
            background-color:whitesmoke;
        }
    </style>
    <title>Dados Salvos no banco</title>
</head>
<body>
    <div class="lista-banco">
        <h2>Registros Salvos no Banco de dados</h2>
       <?php
       $query = "SELECT * FROM livro"; 
       $resultado_cadastros = mysqli_query( $conexao, $query );
       while ($row = mysqli_fetch_array( $resultado_cadastros )) 
       { 
             print $row["movimento"] . "<br> " . $row["dia"] . " <br> " . $row["categoria"]. " <br> " . $row["valor"]
             . " <br> " . $row["descricao"]. " <br> "."-------------------------" ."<br>"; 
       }
       
       ?>

    </div>
    <div></div>
    <footer ><a href="inndex.html" style="color:#fff;">Página Inicial</a></footer> 

<footer ><a href="servico.html" style="color:#fff;">Livro Caixa</a></footer>

<footer><a href="dados.php" style="color:#fff;">Valor Livro Caixa</a></footer>
</body>
</html>