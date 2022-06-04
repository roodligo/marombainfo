<?php
include_once "conexao.php";

$nome = $_POST["nome"];
$observacao = $_POST["observacao"];
$preco = $_POST['preco'];
$foto = $_POST['foto'];
$estoque = $_POST["estoque"];
$categoria_id = $_POST["categoria_id"];

$string = "INSERT INTO cad_cliente VALUES";
$string .= "(NULL,'$nome','$email','$telefone','$hashsenha','$sexo','$cep','$rua','$numero','$complemento','$bairro','$cidade','$estado','$aceita_news')";
mysqli_query($conn, $string) or die("Erro ao Cadastrar");

if(isset($_FILES["FOTOA"])){
    $arquivo = $_FILES["FOTOA"];
    //diretorio dos arquivos
    $pasta_dir = "images/arquivosACIDENTES/";
    // Faz o upload da imagem
    $arquivo_nome = $pasta_dir . $arquivo["FOTOA"];
    //salva no banco
    move_uploaded_file($arquivo["FOTOA"], $arquivo_nome);

    $query  = "Insert into acidentes (IMAGEM) values ($arquivo_nome)";
}



?>
<script type="text/javascript">
    alert('Cadastro Efetuado com Sucesso!');
    window.location.href = "../index.html";
</script>