<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fb";

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "INSERT INTO produtos (nome, preco, estoque) VALUES ('$nome', '$preco', '$estoque')";

if ($conn->query($sql) === TRUE) {
    echo "Produto inserido com sucesso!";
} else {
    echo "Erro ao inserir produto: " . $conn->error;
}

$conn->close();
?>
