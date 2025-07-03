<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "mundo_virtual";

// Conexão procedural
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>

