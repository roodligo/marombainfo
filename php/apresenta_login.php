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
         <a class="text-reset" href="../html/perfil_cliente.html"><input type="submit" value="Perfil" class="btn btn-light " /></a>
         <a class="text-reset" href="../php/logoff.php"><input type="submit" value="Sair" class="btn btn-danger " /></a>
         <a class="text-reset" href="/html/carrinho.html"><button type="submit" value="Carrinho" class="btn btn-warning "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart"
         viewBox="0 0 16 16">
         <path
           d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
         </path>
       </svg>Carrinho</button></a>
          </div>';
    }
?>
    
<?php
} else {
?>
    <a class="text-reset" href="/html/login-cadastro.html"><input type="submit" value="Faça Login ou Cadastre-se" class="btn btn-danger " /></a>
    <a class="text-reset" href="/html/carrinho.html"><button type="submit" value="Carrinho" class="btn btn-warning "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart"
         viewBox="0 0 16 16">
         <path
           d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
         </path>
       </svg>Carrinho</button></a>
    <?php
        }
            ?>