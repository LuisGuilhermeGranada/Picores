<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus pedidos</title>
</head>
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
  $i=0;
  $num=1;
  $sql = "SELECT status FROM requerimento WHERE id_usuario = '$id_usuario'";
  $resultado = $conexao->query($sql);
  if ($resultado->num_rows > 0) {
    $status_array = array();
    while ($linha = $resultado->fetch_assoc()) {
      $status = $linha['status'];
      $status_array[] = $status;
    }
    while ($i<$resultado->num_rows){
        if ($status_array[$i]== 0) {
            echo "Requerimento $num: Em processamento na Cores.<br>\n";
            $i+=1;
            $num+=1;
        }
        else if ($status_array[$i]== 1) {
            echo "Requerimento $num: Necessário o documento físico na Cores.<br>\n";
            $i+=1;
            $num+=1;
        } 
        else if ($status_array[$i]== 2) {
            echo "Requerimento $num: Requerimento aprovado.<br>\n";
            $i+=1;
            $num+=1;
        } 
    }
}
?>