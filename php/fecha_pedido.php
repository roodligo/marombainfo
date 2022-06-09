<?php
session_start();

include_once "conexao.php";
$total = 0;
$forma_pagto = 1;

if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $sql1 = "SELECT * FROM cad_cliente WHERE email = '$email'";
    $result1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $codigo_cliente = ($row1['id']);
    }

    foreach ($_SESSION['cart'] as $codigo_produto => $value) {

        $custo = $value['quantidade'] * $value['unitario'];
        $total = $total + $custo;
    }

    $status = 0;



    $string1 = "INSERT INTO pedidos VALUES";
    $string1 .= "(NULL,'$status','$codigo_cliente','$total','$forma_pagto')";
    mysqli_query($conn, $string1) or die("Erro ao Cadastrar");
    
    $sql = "SELECT MAX(codigo_pedido) as codigo_pedido FROM pedidos WHERE codigo_cliente = '$codigo_cliente'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $codigo_pedido = ($row['codigo_pedido']);
    }

    foreach ($_SESSION['cart'] as $codigo_produto => $value) {
        $quantidade = $value['quantidade'];
        $unitario = $value['unitario'];

        $string = "INSERT INTO pedidos_itens VALUES";
        $string .= "('$codigo_pedido','$codigo_produto','$quantidade','$unitario')";
        mysqli_query($conn, $string) or die("Erro ao Cadastrar");  
    }
    $custo = $value['quantidade'] * $value['unitario'];
?>
    <script type="text/javascript">
        alert('Pedido enviado com Sucesso!');
        window.location.href = "../html/perfil_cliente.html";
    </script>
<?php
unset($_SESSION['cart']);
} else {
    echo 'erro';
}
