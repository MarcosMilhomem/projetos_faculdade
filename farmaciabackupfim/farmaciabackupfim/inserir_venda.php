<?php
include 'conexao.php';

$cliente_id = $_POST['cliente_id'];
$data_venda = $_POST['data_venda'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];


$sql = "INSERT INTO vendas (cliente_id, data_venda) VALUES ('$cliente_id', '$data_venda')";

if (mysqli_query($conn, $sql)) {
    $venda_id = mysqli_insert_id($conn);

    $sql_itens = "INSERT INTO itens_venda (venda_id, produto_id, quantidade) VALUES ('$venda_id', '$produto_id', '$quantidade')";
    if (mysqli_query($conn, $sql_itens)) {
        echo "Venda inserida com sucesso.";
    } else {
        echo "Erro ao inserir itens da venda: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao inserir venda: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
