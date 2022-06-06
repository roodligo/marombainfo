<?php

session_start();

include_once "conexao.php";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
?>
        <div class="container text-white">
            <h3>Painel Administrativo</h3>
        </div>


    <?php 
    

} else {
    ?> <script type="text/javascript">
            alert('Você não pode acessar essa página!');
            window.location.href = "../index.html";
        </script>
    <?php

    }
} else {
    ?> <script type="text/javascript">
        alert('Você não está logado!');
        window.location.href = "../html/login-cadastro.html";
    </script>
<?php

}
?>