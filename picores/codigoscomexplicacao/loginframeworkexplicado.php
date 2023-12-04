<?php
    // Extrai variáveis do array $_POST
    extract($_POST);

    // Verifica se a variável "cadastro" está definida
    if(isset($cadastro)){
        // Redireciona para a página de cadastro
        header("Location: http://localhost/picores/cadastro.html");
    }

    // Estabelece uma conexão com o banco de dados usando mysqli
    $conexao = new mysqli('localhost', 'root', '', 'picores');

    // Verifica se a conexão com o banco de dados foi bem-sucedida
    if ($conexao->connect_error) {
        // Encerra o script e exibe uma mensagem de erro
        die("Não foi possível conectar com o banco de dados " . $conexao->connect_error);
    }

    // Verifica se o formulário com o nome "enviar" foi enviado
    if(isset($enviar)){
        // Constrói uma consulta SQL para selecionar a senha associada ao número de matrícula fornecido
        $sql = "SELECT senha FROM Usuario WHERE Numero_Matricula = '$matricula'";
        
        // Executa a consulta SQL
        $resultado = $conexao->query($sql);
        
        // Verifica se uma única linha foi retornada
        if ($resultado->num_rows == 1) {
            // Obtém a senha hash da coluna de resultados
            $coluna = $resultado->fetch_assoc();
            $senhacomhash = $coluna["senha"];
            
            // Constrói uma consulta SQL para selecionar a confirmação do usuário associada ao número de matrícula fornecido
            $sqlpedido = "SELECT confirmacao FROM Usuario WHERE Numero_Matricula = '$matricula'";
            
            // Executa a consulta SQL para a confirmação do usuário
            $resultadopedido = $conexao->query($sqlpedido);
            
            // Obtém a confirmação da coluna de resultados
            $colunapedido = $resultadopedido->fetch_assoc();
            $confirmacaodb = $colunapedido["confirmacao"];
            
            // Verifica se a senha é correta e se a confirmação é 0, redireciona para página de requerimento
            if (password_verify($senha, $senhacomhash) && $confirmacaodb==0) {
                header("Location: http://localhost/picores/restodepagina/requerimento.html");
            }
            // Verifica se a senha é correta e se a confirmação é 1, redireciona para página de cores
            if (password_verify($senha, $senhacomhash) && $confirmacaodb==1) {
                header("Location: http://localhost/picores/restodepagina/paginacores.html");
            }
            // Verifica se a senha é correta e se a confirmação é 2, redireciona para página de administração
            if (password_verify($senha, $senhacomhash) && $confirmacaodb==2) {
                header("Location: http://localhost/picores/restodepagina/paginaadm.html");
            }
            // Se as condições anteriores não forem atendidas, exibe uma mensagem de senha incorreta
            else{
                echo "Senha incorreta, tente novamente";
            }
        }
        // Se o número de matrícula não for encontrado, exibe uma mensagem de usuário não encontrado
        else{
            echo "Usuário não encontrado, verifique seu número de matrícula ou se cadastre.";
        }
    }
?>