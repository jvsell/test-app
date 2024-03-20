<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco_de_dados = 'agenda';

// Verifica se o arquivo de flag existe
if (file_exists('db_created.txt')) {
    // Arquivo de flag já existe, então realiza a conexão ao banco de dados
    $db = mysqli_connect("$host", "$usuario", "$senha", "$banco_de_dados");

    if (!$db) {
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
        exit;
    }
} else {
    // Arquivo de flag não encontrado, executa o processo de setup do banco de dados
    echo "O banco de dados '$banco_de_dados' não existe. Criando o banco de dados...";
    // Cria o banco de dados
    $db = mysqli_connect("$host", "$usuario", "$senha", "");
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
    // Cria o arquivo de flag
    file_put_contents('db_created.txt', '');
    // Conecta ao banco de dados
    $db = mysqli_connect("$host", "$usuario", "$senha", "$banco_de_dados");
    if (!$db) {
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
        exit;
    }
}

?>