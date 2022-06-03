<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}
if (isset($_SESSION['email'])):
    
    $sql = "SELECT * FROM cad_cliente WHERE email = ".($_SESSION['email']);
    $result = mysqli_query($conn, $sql);
    echo ` Bem Vindo: `.($_SESSION['email']).``;
else:

echo`    <form action="/html/login-cadastro.html">
        <input type="submit" class="btn btn-danger" value="Faça Login ou Cadastre-se" />
    </form>`;
endif;
    ?>
