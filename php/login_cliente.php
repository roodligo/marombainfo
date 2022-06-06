<?php
include_once "conexao.php";

session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
$sql = "SELECT * FROM cad_cliente WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($senha, $row['senha'])) {
            $sql2 = "SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1";
            $result2 = mysqli_query($conn, $sql2);
            $num2 = mysqli_num_rows($result2);
            if ($num2 == 1) {
?>
                <script type="text/javascript">
                    alert('Login Efetuado com Sucesso!');
                    window.location.href = "../html/home_adm.html";
                </script><?php
                        } else {
                            ?>
                <script type="text/javascript">
                    alert('Login Efetuado com Sucesso!');
                    window.location.href = "../index.html";
                </script><?php
                        }
                    } else {
                        unset($_SESSION['email']);
                        unset($_SESSION['senha']);
                            ?>
            <script type="text/javascript">
                alert('E-mail ou Senha Inválida!');
                window.location.href = "../html/login.html";
            </script>
    <?php
                    }
                }
            } else {
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
    ?>
    <script type="text/javascript">
        alert('E-mail ou Senha Inválida!');
        window.location.href = "../html/login-cadastro.html";
    </script>
<?php
            }
?>