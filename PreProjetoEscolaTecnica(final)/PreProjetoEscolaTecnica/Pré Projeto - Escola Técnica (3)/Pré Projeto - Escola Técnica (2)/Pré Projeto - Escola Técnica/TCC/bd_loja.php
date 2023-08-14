<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'Tcc_Escola';

$mysqli = new mysqli($host, $username, $password, $database);

// Verifica se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die('Erro na conexão: ' . $mysqli->connect_error);
}

echo 'Conexão bem-sucedida ao banco de dados!';
?>