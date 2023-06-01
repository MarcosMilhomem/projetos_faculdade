<?php
include 'conexao.php';

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO clientes (nome, endereco, telefone, cpf) VALUES ('$nome', '$endereco', '$telefone', '$cpf')";

if (mysqli_query($conn, $sql)) {
    echo "Cliente inserido com sucesso.";
} else {
    echo "Erro ao inserir cliente: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
