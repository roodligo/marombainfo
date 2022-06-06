<?php
session_start();

include_once "conexao.php";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $nome = $_POST["nome"];
        $observacao = $_POST["observacao"];
        $preco = $_POST['preco'];
        $estoque = $_POST["estoque"];
        $categoria_id = $_POST["categoria_id"];
        if (isset($_FILES['pic'])) {
            $ext = strtolower(substr($_FILES['pic']['name'], -4));
            $arquivo_nome = $nome.$ext;
            $dir = '../imagens_produtos/';
            move_uploaded_file($_FILES['pic']['tmp_name'], $dir . $arquivo_nome);
        }
        $string = "INSERT INTO cad_produto VALUES";
        $string .= "(NULL,'$nome','$observacao','$preco','$arquivo_nome','$estoque','$categoria_id')";
        mysqli_query($conn, $string) or die("Erro ao Cadastrar");


?>
        <script type="text/javascript">
            alert('Cadastro Efetuado com Sucesso!');
            window.location.href = "../html/cadastra_produto.html";
        </script>
<?php
    }
}
?>