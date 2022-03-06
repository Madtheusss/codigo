<?php

$host = "localhost";
$db = "crud_clientes";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno){
    die("Falha na conexão com banco de dados!");
}

function formatar_telefone($telefone){
    $ddd = substr($telefone, 0, 2);
    $primeira = substr($telefone, 2, 5);
    $segunda = substr($telefone, 7);
    return "($ddd) $primeira-$segunda";
}