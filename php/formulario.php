<?php
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $data_nascimento = $_GET["data_nascimento"];
    $sexo = $_GET["sexo"];
    $estado = $_GET["estado"];
    $senha = $_GET["senha"];
    $confere_senha = $_GET["confere_senha"];
    $aceita_news = $_GET["aceite_news"];
    $observacoes = $_GET["observacoes"];
    echo "Olá ".$nome;
    if ($senha == $confere_senha){
        echo " você foi Cadastrado com Sucesso!";
    }
    else{
        echo " a Senha digitada é Invalida";
    }
?>