<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        form {
            margin: auto;
            width: 500px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        
        input {
            margin: 10px 0;
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button {
            margin: 10px 0;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2 align="center">Formulário de Cadastro</h2>
    <form action="processar_formulario.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="telefone" placeholder="Telefone">
        <button type="submit">Enviar</button>
    </form>

    <?php
    // Conexão ao servidor MySQL
    include('conexao.php');
    // Exibição dos últimos cadastros
    $sql = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Nome: " . $row['nome'] . "</p>";
        echo "<p>Telefone: " . $row['telefone'] . "</p>";
        echo "<hr />";
    }
?>
</body>
</html>
