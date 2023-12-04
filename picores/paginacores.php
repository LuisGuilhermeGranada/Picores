<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cores</title>
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
    $sql = "SELECT * FROM requerimento";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        $linhas = array();
        while ($linha = $resultado->fetch_assoc()) {
            $linhas[] = $linha; 
        }
        while ($i < $resultado->num_rows) {
          echo '<div>
              <p>Requerimento ' . $num . ':</p>
              <p>Data de Envio: ' . $linhas[$i]['Data_requerimento'] . '</p>
              <p>Objeto: ' . $linhas[$i]['Objeto'] . '</p>
              <p>Anexo: ' . $linhas[$i]['Anexo'] . '</p>
              <form method="post" action="PHPlogin_registro/pedidocores.php">
                  <input type="hidden" name="id_requerimento" value="' . $linhas[$i]['idRequerimento'] . '">
                  <button type="submit" name="documentofisico">Solicitar documento físico</button>
                  <button type="submit" name="reenviardocumento">Pedir reenvio do documento</button>
              </form>
          </div>';
          $i += 1;
          $num += 1;
      }
      
    }
?>