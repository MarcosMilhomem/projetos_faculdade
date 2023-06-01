<!DOCTYPE html>
<html>
<head>
    <title>clientes ccadastrados</title>
</head>
<body>
    <h1>clientes cadastrados</h1>

    <table>
        <tr>
            <th>ID da Venda</th>
            <th>ID do Cliente</th>
            <th>Nome do Cliente</th>
            <th>Data da Venda</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT vendas.id, vendas.cliente_id, clientes.nome, vendas.data_venda 
                FROM vendas 
                INNER JOIN clientes ON vendas.cliente_id = clientes.id
                WHERE vendas.data_venda >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) 
                AND vendas.data_venda <= CURDATE()
                GROUP BY vendas.cliente_id";

        $result = $conn->query($sql);

        if ($result === false) {
            die("Erro na consulta: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["cliente_id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["data_venda"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhuma venda realizada na semana.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
