<?php

include('conexao.php');
$id = intval($_GET['id']);


function limpar_texto($str){
    return preg_replace("/[^0-9]/","",$str);
}

$erro = false;
    if(count($_POST) > 0){

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $placa = $_POST['placa'];

        if(empty($nome)){
            $erro = "Preencha o campo Nome";
        }

        if(empty($telefone)){
            $erro = "Preencha o campo Telefone";
        }

        if(!empty($telefone)){
            $telefone = limpar_texto($telefone);
            if(strlen($telefone) != 11)
                $erro = "O telefone deve ser preenchido da seguinte forma: (00) 98888-8888";
        }

        if(empty($cpf)){
            $erro = "Preencha o campo CPF";
        }

        if(empty($placa)){
            $erro = "Preencha o campo Placa";
        }

        if($erro){
            echo "<p><b>ERROR:$erro</p></b>";
        } else {
            $sql_code = "UPDATE clientes
            SET nome = '$nome',
                telefone = '$telefone',
                cpf = '$cpf',
                placa = '$placa'
                WHERE id = '$id'";

            $work = $mysqli->query($sql_code) or die ($mysqli->error);
            if($work){
            echo "<p><b>Cliente atualizado com Sucesso!</b></p>";
            unset($_POST);
            }
        }
    }

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'"; 
$query_cliente = $mysqli->query($sql_cliente) or die ($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/clientes.php">Voltar para a lista de clientes!</a>
    <form method="POST" action=" ">
        <p>
            <label>Nome:</label>
            <input value="<?php echo $cliente['nome'];?>" name="nome" type="text"><br>
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php echo formatar_telefone ($cliente['telefone']);?>" placeholder="(00) 98888-8888" name="telefone" type="text"><br>
        </p>
        <p>
            <label>CPF:</label>
            <input value="<?php echo $cliente['cpf'];?>" name="cpf" type="text"><br>
        </p>
        <p>
            <label>Placa do Carro:</label>
            <input value="<?php echo $cliente['placa'];?>" name="placa" type="text"><br>
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>
    </form>
</body>
</html>