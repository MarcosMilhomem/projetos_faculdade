<!DOCTYPE html>
<html>
<head>
  <title>Vendas Diárias</title>
  <style>
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>
<body>
  <h1>Vendas Diárias</h1>
  
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fb";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

  $sql = "SELECT vendas.data_venda, clientes.nome, produtos.nome AS produto, produtos.preco, itens_venda.quantidade
          FROM vendas
          INNER JOIN clientes ON vendas.cliente_id = clientes.id
          INNER JOIN itens_venda ON vendas.id = itens_venda.venda_id
          INNER JOIN produtos ON itens_venda.produto_id = produtos.id
          WHERE vendas.data_venda = CURDATE()";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>
            <tr>
              <th>Data da Venda</th>
              <th>Cliente</th>
              <th>Produto</th>
              <th>Valor</th>
              <th>Quantidade</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>" . $row["data_venda"] . "</td>
              <td>" . $row["nome"] . "</td>
              <td>" . $row["produto"] . "</td>
              <td>" . $row["preco"] . "</td>
              <td>" . $row["quantidade"] . "</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "Nenhum resultado encontrado.";
  }

  $conn->close();
  ?>
  
</body>
</html>
