<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    echo "O usuário não está autenticado";
    header("Location: http://localhost/picores/login.html");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$conexao = new mysqli('localhost', 'root', '', 'picores');
if ($conexao->connect_error) {
    die("Não foi possível conectar com a database " . $conexao->connect_error);
}

$num = 1;
$sql = "SELECT * FROM requerimento WHERE status = 1";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo '<div>
            <p>Requerimento ' . $num . ':</p>
            <p>Data de Envio: ' . $linha['Data_requerimento'] . '</p>
            <p>Objeto: ' . $linha['Objeto'] . '</p>
            <p>Anexo: ' . $linha['Anexo'] . '</p>
            <form method="post" action="PHPlogin_registro/pedidocoordenacao.php">
                <input type="hidden" name="id_requerimento" value="' . $linha['idRequerimento'] . '">
                <button type="submit" name="confirmacao">Confirmar Requerimento</button>
            </form>
        </div>';
        $num += 1;
    }
} else {
    echo "Nenhum requerimento encontrado com status 1.";
}

$conexao->close();
?>
</body>
</html>