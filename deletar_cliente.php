<?php
if(isset($_POST['confirmar'])){

    include("conexao.php");
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query) { ?>

    <h2>Cliente deletado com sucesso!</h2>
    <p><a href="clientes.php">CLique Aqui!</a> para a lista de clientes</p>
    <?php
    die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar o cliente cadastrado? </h1>

    <form action="" method="post">
        <button name="confirmar" value="1" type="submit">SIM</button>
        <a style="margin-left:20px" href="/clientes.php">NÃO</a>
    </form>
    
</body>
</html>