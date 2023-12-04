<?php
    extract($_POST);
    $conexao = new mysqli('localhost', 'root', '', 'picores');
    if ($conexao->connect_error) {
        die("Não foi possível conectar com a database " . $conexao->connect_error);
    }
    if(isset($enviar)){
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (Requerente, Rua, Numero, Bairro, Cidade, Telefone, Email, Curso, Turma, Senha, confirmacao, Numero_Matricula) VALUES ('$nome','$rua','$numero','$bairro','$cidade','$telefone','$email','$curso','$turma','$senha','0','$matricula')";
        $resultado = $conexao->query($sql);
        header("Location: http://localhost/picores/login.html");
    }
    $conexao->close();
?>
