<?php

// Conexão ao servidor MySQL
include('conexao.php');

// Verifica se o banco de dados existe
$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$banco_de_dados'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // O banco de dados existe
    echo "O banco de dados '$banco_de_dados' já existe.";
} else {
    // O banco de dados não existe
    echo "O banco de dados '$banco_de_dados' não existe. Criando o banco de dados...";

    // Cria o banco de dados
    $sql = "CREATE DATABASE $banco_de_dados";
    mysqli_query($db, $sql);

    // Seleciona o banco de dados criado
    mysqli_select_db($db, "$banco_de_dados");

    // Cria a tabela
    $sql = "CREATE TABLE usuarios (
        id int NOT NULL AUTO_INCREMENT,
        nome varchar(255) NOT NULL,
        telefone varchar(255) NOT NULL,
        PRIMARY KEY (id)
    )";
    mysqli_query($db, $sql);

    echo "Banco de dados e tabela criados com sucesso!";
}

?>
