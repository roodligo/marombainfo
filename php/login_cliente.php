<?php
include_once "conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];
$sql = "SELECT * FROM cad_cliente WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($senha, $row['senha'])) {
?>
            <script type="text/javascript">
                alert('Login Efetuado com Sucesso!');
                window.location.href = "../index.html";
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('E-mail ou Senha Inválida!');
                window.location.href = "../html/login.html";
            </script>
    <?php
                    }
                }
            } else {
    ?>
    <script type="text/javascript">
        alert('E-mail ou Senha Inválida!');
        window.location.href = "../html/login-cadastro.html";
    </script>
<?php
            }
?>