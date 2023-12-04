<?php
session_start();
extract($_POST);

$conexao = new mysqli('localhost', 'root', '', 'picores');

if ($conexao->connect_error) {
    die("Não foi possível conectar com a database " . $conexao->connect_error);
}

$id_requerimento = '';

if (isset($_POST['id_requerimento'])) {
    $id_requerimento = $_POST['id_requerimento'];
}

if (isset($confirmacao) && !empty($id_requerimento)) {
    $sql = "UPDATE requerimento SET status = 0 WHERE idRequerimento = $id_requerimento";
    
    if ($conexao->query($sql) === TRUE) {
        header("Location: http://localhost/picores/paginacoordenacao.php");
    } else {
        echo "Erro na atualização do status: " . $conexao->error;
    }
} else {
    echo "ID de requerimento não fornecido ou vazio.";
}

$conexao->close();
?>