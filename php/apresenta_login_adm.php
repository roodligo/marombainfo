<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}
if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email'");
    while ($obj = $result->fetch_object()) { 
        echo '<div class="container-lg  text-white"><h5 style="margin: auto;">'
         . $obj->nome . '  </h5> 
         <a class="text-reset" href="../php/logoff.php"><input type="submit" value="Sair" class="btn btn-danger " /></a>
          </div>';
    }
?>
    
<?php
} else {
?>
    <a class="text-reset" href="/html/login-cadastro.html"><input type="submit" value="Faça Login ou Cadastre-se" class="btn btn-danger " /></a>
    <?php
        }
            ?>