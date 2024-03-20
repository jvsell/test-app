<?php

// Conexão ao banco de dados
include('conexao.php');

// Apagar todos os registros da tabela
$sql = "DELETE FROM usuarios";
mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resetar Cadastros</title>
  <style>
  #mensagem {
    font-size: 24px;
    font-weight: bold;
    color: white;
  }
  body {
  background-color: #0F2E5D;
  }
  </style>
</head>
<body>
  <script>
  function redirecionar() {
    var segundos = 10;
    var intervalo = setInterval(function() {
      document.getElementById("mensagem").innerHTML = "Reset concluído, redirecionando para a página inicial em " + segundos + " segundos.";
      segundos--;
      if (segundos < 0) {
        clearInterval(intervalo);
        window.location.href = "index.php";
      }
    }, 1000);
  }

  redirecionar();
  </script>

  <h3 id="mensagem" style="text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    Reset concluído, redirecionando para a página inicial em 5 segundos.
  </h3>
</body>
</html>
