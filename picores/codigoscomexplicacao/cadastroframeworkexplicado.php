<?php
    // Extrai variáveis do array $_POST
    extract($_POST);

    // Estabelece uma conexão com o banco de dados usando mysqli
    $conexao = new mysqli('localhost', 'root', '', 'picores');

    // Verifica se a conexão com o banco de dados foi bem-sucedida
    if ($conexao->connect_error) {
        die("Não foi possível conectar com o banco de dados " . $conexao->connect_error);
    }

    // Verifica se o formulário com o nome "enviar" foi enviado
    if(isset($enviar)){
        // Gera o hash da senha usando o algoritmo padrão (bcrypt)
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        
        // Constrói uma consulta SQL para inserir dados na tabela "usuario"
        $sql = "INSERT INTO usuario (Requerente, Rua, Numero, Bairro, Cidade, Telefone, Email, Curso, Turma, Senha, confirmacao, Numero_Matricula) VALUES ('$nome','$rua','$numero','$bairro','$cidade','$telefone','$email','$curso','$turma','$senha','0','$matricula')";
        
        // Executa a consulta SQL
        $resultado = $conexao->query($sql);
        
        // Redireciona para a página de login após a inserção bem-sucedida
        header("Location: http://localhost/picores/login.html");
    }
    
    // Fecha a conexão com o banco de dados
    $conexao->close();
?>
