CREATE DATABASE IF NOT EXISTS crud_clientes;
USE crud_clientes;

CREATE TABLE IF NOT EXISTS clientes (
    id INT() AUTO_INCREMENT,
    nome VARCHAR(30),
    telefone VARCHAR(30),
    cpf VARCHAR(11),
    placa VARCHAR(8)
);