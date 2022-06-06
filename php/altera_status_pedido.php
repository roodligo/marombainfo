<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}
$status = $_GET['status'];
$num_pedido = $_GET['pedido'];

if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1");
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $string = "UPDATE pedidos SET status_pedido = '$status' where codigo_pedido =" .$num_pedido;
        mysqli_query($conn, $string) or die("Erro ao Alterar");
        ?>
        <script type="text/javascript">
            alert('Pedido Alterado com Sucesso!');
            window.location.href = "../html/pedidos_adm.html";
        </script>
        <?php
    }
}
