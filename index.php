<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');

// Dados de conexão originais
$servername = "54.234.153.24";
$username = "root";
$password = "Senha123";
$database = "meubanco";

$link = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("Falha na conexão: %s\n", mysqli_connect_error());
    exit();
}

// Capturando dados do formulário HTML via POST
// Substituímos o rand() e random_bytes() pelos dados reais
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$host_name = gethostname(); // Mantido para mostrar qual container processou

// Query ajustada para usar as variáveis do formulário
$query = "INSERT INTO dados (Nome, Sobrenome, Endereco, Cidade, Host) 
          VALUES ('$nome', '$sobrenome', '$endereco', '$cidade', '$host_name')";

if ($link->query($query) === TRUE) {
  echo "<h2>Cadastro realizado com sucesso!</h2>";
  echo "Processado pelo container: " . $host_name;
  echo "<br><a href='index.html'>Voltar</a>";
} else {
  echo "Erro: " . $link->error;
}
?>