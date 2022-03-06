<?php

function limpar_texto($str){
    return preg_replace("/[^0-9]/","",$str);
}

$erro = false;
    if(count($_POST) > 0){

        include('conexao.php');

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
            $sql_code = "INSERT INTO clientes (nome, telefone, cpf, placa) VALUES ('$nome','$telefone','$cpf','$placa')";
            $work = $mysqli->query($sql_code) or die($mysqli->error);
            if($work){
                echo "<p><b>Cliente Cadastrado com Sucesso!</b></p>";
                unset($_POST);
            }
        }
    }
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
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome'];?>" name="nome" type="text"><br>
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'];?>" placeholder="(00) 98888-8888" name="telefone" type="text"><br>
        </p>
        <p>
            <label>CPF:</label>
            <input value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'];?>" name="cpf" type="text"><br>
        </p>
        <p>
            <label>Placa do Carro:</label>
            <input value="<?php if(isset($_POST['placa'])) echo $_POST['placa'];?>" name="placa" type="text"><br>
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>
    </form>
</body>
</html>