<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}

if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result1 = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email'");
    while ($obj1 = $result1->fetch_object()) {
        $idcliente = $obj1->id;
        $nome = $obj1->nome;
    }
    
    echo '<div class="card">
    <h3> Bem Vindo!</h3>
    <h3>'.$nome.'</h3>
    <a class="text-reset" href="../html/pedidos.html"><input type="submit" value="Acessar meus Pedidos" class="btn btn-info " /></a>
    </div>';

    
}else{
echo '<div class="card container"><h2>Faça login para acessar os Pedidos!</h2></div>';
}?>
