<?php
    session_start();
    extract($_POST);
    if(isset($cadastro)){
        header("Location: http://localhost/picores/cadastro.html");
    }
    $conexao = new mysqli('localhost', 'root', '', 'picores');
    if ($conexao->connect_error) {
        die("Não foi possível conectar com a database " . $conexao->connect_error);
    }
    if(isset($enviar)){
        $sql = "SELECT senha FROM Usuario WHERE Numero_Matricula = '$matricula'";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows == 1) {
            $coluna = $resultado->fetch_assoc();
            $senhacomhash = $coluna["senha"];
            $sqlpedido = "SELECT confirmacao FROM Usuario WHERE Numero_Matricula = '$matricula'";
            $resultadopedido = $conexao->query($sqlpedido);
            $colunapedido = $resultadopedido->fetch_assoc();
            $confirmacaodb = $colunapedido["confirmacao"];
            if (password_verify($senha, $senhacomhash)) {
                $_SESSION['id_usuario'] = $matricula;
                switch($confirmacaodb){
                  case 0:
                    header("Location: http://localhost/picores/requerimento.html");
                    break;
                  case 1:
                    header("Location: http://localhost/picores/paginacores.php");
                    break;
                  case 2:
                    header("Location: http://localhost/picores/paginacoordenacao.php");
                    break;
                  case 3:
                    header("Location: http://localhost/picores/restodepagina/paginaadm.html");
                    break;
                }
              }
            else{
                echo "Senha incorreta, tente novamente";
            }
        }
        else{
            echo "Usuário não encontrado, verifique seu número de matrícula ou se cadastre.";
        }
    }
