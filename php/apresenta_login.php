<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}
if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email'");
    while ($obj = $result->fetch_object()) { 
        echo '<div class="container text-white"><h5 style="margin: auto;">'
         . $obj->nome . '  </h5> 
         <a class="text-reset" href="../html/perfil_cliente.html"><input type="submit" value="Perfil" class="btn btn-light " /></a>
         <form action="../php/logoff.php"> 
         <input type="submit" class="btn btn-danger" value="Sair" />
         </form> </div>';
    }
?>
    
<?php
} else {
?>
    <form action="/html/login-cadastro.html"> 
    <input type="submit" class="btn btn-danger" value="Faça Login ou Cadastre-se" />
    </form> <?php
        }
            ?>