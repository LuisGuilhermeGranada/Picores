<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
      echo "O usuário não está autenticado";
      header("Location: http://localhost/picores/login.html");
      exit;
    }
    $id_usuario = $_SESSION['id_usuario'];
    extract($_POST);
    $conexao = new mysqli('localhost', 'root', '', 'picores');
    if ($conexao->connect_error) {
        die("Não foi possível conectar com a database " . $conexao->connect_error);
    }
    if(isset($enviar)){
      $sql = "INSERT INTO requerimento (Data_requerimento, Objeto, Observacao, Anexo, status, id_usuario) VALUES ('$data_envio','$tipo_requerimento','$observacao','$arquivos','0','$id_usuario')";
      $resultado = $conexao->query($sql);
      header("Location: http://localhost/picores/restodepagina/meuspedidos.php");
    }
    $conexao->close();
?>
