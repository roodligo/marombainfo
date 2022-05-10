<?php
include_once "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $sexo = $_POST["sexo"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero_casa"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["uf"];
    $aceita_news = 0;

            $string = "INSERT INTO cad_cliente VALUES";
            $string .="(NULL,'$nome','$email','$senha','$sexo','$cep','$rua','$numero','$complemento','$bairro','$cidade','$estado')";
            mysqli_query($conn,$string) or die("Erro ao Cadastrar");
            echo "Cadastro Efetuado com Sucesso!";
        
        
?>