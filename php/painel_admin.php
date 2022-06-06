<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}
if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1");
    while ($obj = $result->fetch_object()) { ?>
        
        
    <?php }
?>
    
<?php
} else {
?>
    <form action="/html/login-cadastro.html"> 
    <input type="submit" class="btn btn-danger" style="border: 1px solid black;" value="Faça Login ou Cadastre-se" />
    </form> <?php
        }
            ?>