<?php

// Conexão ao banco de dados
include('conexao.php');

// Validação dos dados
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

// Inserção dos dados na tabela
$sql = "INSERT INTO usuarios (nome, telefone) VALUES ('$nome', '$telefone')";
mysqli_query($db, $sql);

// Redirecionamento
header('Location: index.php');

?>
