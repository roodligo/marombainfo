<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $estado = $_POST["estado"];
    $senha = $_POST["senha"];
    $confere_senha = $_POST["confere_senha"];
    $aceita_news = 0;
    $aceita_news = $_POST["aceite_news"];
    $observacoes = $_POST["observacoes"];
        if ($senha == $confere_senha)
        {
            $conexao = mysqli_connect('localhost','root','d4rks1d3','cad') or die("Erro ao Conectar");
            $string = "INSERT INTO cad_cliente VALUES";
            $string .="('$nome','$email','$data_nascimento','$sexo','$estado','$senha','$aceita_news','$observacoes')";
            mysqli_query($conexao,$string) or die("Erro ao Cadastrar");
            echo "Cadastro Efetuado com Sucesso!";
        }else 
        {
            echo "As Senhas Digitadas nao Batem";
        }
        
?>