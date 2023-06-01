<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
