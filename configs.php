<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = 'localhost';
$user = 'root';
$pw = '';
$bd = 'teatro';

$conn = new mysqli($server, $user, $pw, $bd);

if ($conn->connect_error){
    echo "Erro a ligar à base de dados: $conn->connect_error";
    exit;
}
/*else
    echo "OK";*/
?>