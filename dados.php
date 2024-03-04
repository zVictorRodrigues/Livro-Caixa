<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align:center;
            background-color:#013E7B;
        }
        table{
            width:80%;
            margin:40px 10%;

        }
        div{
            background-color:whitesmoke;
            border-radius:20px;
            width:50%;
            margin:40px 25%;
            text-align:center;
            justify-content:center;
            padding:8px;
        }
        .soma-movi{
            padding: 25px 7px;
            background-color: #013e7b;
            border-radius: 20px;
            font-size: 20px;
            color: #8dc63f;
        }
    </style>
    <title>Dados Recentes / Saldo</title>
</head>
<body>

    <div>
        <h2>Ultimos dados Salvos</h2>
    <table border=1>
    <tr>
        <th>Movimento</th>
        <th>Dia</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Valor</th>
    </tr>
<?php
$conexao =mysqli_connect('localhost', 'root', '', 'caixa') or die ('Erro ao conectar com o banco');
$sql = "SELECT movimento, dia, categoria, descricao,  valor FROM livro WHERE movimento = 'entrada'";
$resultado = mysqli_query($conexao,$sql) or die ('Erro ao tentar listar');

while ($registro = mysqli_fetch_array($resultado)){

    $movimento = $registro['movimento'];
    $dia = $registro['dia'];
    $categoria = $registro['categoria'];
    $descricao = $registro['descricao'];
    $valor = $registro['valor'];
    $valor = number_format($valor, 2, ',','');
}
?>
    <tr>
       <h2>Entrada</h2>
        <td><?php echo $movimento ?></td>
        <td><?php echo $dia ?></td>
        <td><?php echo $categoria ?></td>
        <td><?php echo $descricao ?></td>
        <td><?php echo "R$ ".$valor ?></td>
    </tr>
<?php
mysqli_close($conexao);
?>
</table>
<br>
<table border=1>
    <tr>
        <th>Movimento</th>
        <th>Dia</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Valor</th>
    </tr>
    <?php
    $conexao =mysqli_connect('localhost', 'root', '', 'caixa') or die ('Erro ao conectar com o banco');
    $sql = "SELECT movimento, dia, categoria, descricao,  valor FROM livro WHERE movimento = 'despesa'";
    $resultado = mysqli_query($conexao,$sql) or die ('Erro ao tentar listar');
    
    while ($registro = mysqli_fetch_array($resultado)){
    
        $movimento = $registro['movimento'];
        $dia = $registro['dia'];
        $categoria = $registro['categoria'];
        $descricao = $registro['descricao'];
        $valor = $registro['valor'] * -1;
        $valor = number_format($valor, 2, ',','');
    }
    ?>
    <tr>
       <h2>Despesas</h2>
        <td><?php echo $movimento ?></td>
        <td><?php echo $dia ?></td>
        <td><?php echo $categoria ?></td>
        <td><?php echo $descricao ?></td>
        <td><?php echo "R$ ".$valor ?></td>
    </tr>
    <?php
    mysqli_close($conexao);
    ?>
</table>
<br>
<?php
     $conexao = mysqli_connect('localhost','root','','caixa'); 
     $resultado = mysqli_query($conexao, "SELECT sum(valor) FROM livro");
     $linhas = mysqli_num_rows($resultado);
     ?> 
   <div class="soma-movi">
       <span>Valor caixa</span>
       <br>
   <?php
    while($linhas = mysqli_fetch_array($resultado)){
        echo "R$ ".$linhas['sum(valor)'].'<br/>';             
       }
     ?>
     </div>
     </div>

    <footer ><a href="inndex.html" style="color:#fff;">Página Inicial</a></footer>

    <footer ><a href="servico.html" style="color:#fff;">Livro Caixa</a></footer>
    
    <footer><a href="salvos.php" style="color:#fff;">Dados Salvos</a></footer>

</body>
</html>