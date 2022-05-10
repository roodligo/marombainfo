<?php
include_once "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$hashsenha = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));
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
$string .= "(NULL,'$nome','$email','$hashsenha','$sexo','$cep','$rua','$numero','$complemento','$bairro','$cidade','$estado')";
mysqli_query($conn, $string) or die("Erro ao Cadastrar");
?>
<script type="text/javascript">
    alert('Cadastro Efetuado com Sucesso!');
    window.location.href = "../index.html";
</script>