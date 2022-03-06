<?php 
    include('conexao.php'); 

    $sql_clientes  = "SELECT * FROM clientes";
    $query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
    $num_clientes = $query_clientes->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <p>Clientes cadastrados no sistema</p>
    <table border="1" cellpadding="8">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Placa</th>
        </thead>
        <tbody>
            <?php if($num_clientes == 0 ) { ?>
                <tr>
                    <td colspan="5">Nenhum cliente cadastrado</td>
                </tr>
            <?php 
            } else { 
                while($cliente = $query_clientes->fetch_assoc()) {

                    $telefone = "";
                    if(!empty($cliente['telefone'])) {
                        $ddd = substr($cliente['telefone'], 0, 2);
                        $primeira = substr($cliente['telefone'], 2, 5);
                        $segunda = substr($cliente['telefone'], 7);
                        $telefone = "($ddd) $primeira-$segunda";
                    }
            ?>
                <tr>
                    <td><?php echo $cliente['id'];?></td>
                    <td><?php echo $cliente['nome'];?></td>
                    <td><?php echo $telefone;?></td>
                    <td><?php echo $cliente['cpf'];?></td>
                    <td><?php echo $cliente['placa'];?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?php echo $cliente['id'];?>">Editar</a>
                        <a href="deletar_cliente.php?id=<?php echo $cliente['id'];?>">Deletar</a>
                    </td>
                </tr>
            <?php 
                }
            } ?>
        </tbody>
    </table>
    <p>Cadastrar novos clientes!</p>
    <a href="cadastrar_cliente.php">Clique aqui!</a>
</body>
</html>