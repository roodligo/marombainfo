<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();

    include_once "conexao.php";
}

			$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
			$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
			//calcular o inicio visualização
			$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

if (isset($_SESSION['email'])) {
    $email = ($_SESSION['email']);
    $result1 = $conn->query("SELECT * FROM cad_cliente WHERE email = '$email'");
    while ($obj1 = $result1->fetch_object()) {
        $idcliente = $obj1->id;
    }

    echo '<div class="container text-white"><h3>Pedidos: </h3></div>';
    $custo = 0;
    $total = 0;
   $cap_primeiropedido = $conn->query("SELECT min(codigo_pedido) as 'codigo_pedido' FROM pedidos WHERE codigo_cliente = '$idcliente'");
    while ($cap1 = $cap_primeiropedido->fetch_object()) {
        $primeiropedido = $cap1->codigo_pedido;
    }
    $cap_ultimopedido = $conn->query("SELECT max(codigo_pedido) as 'codigo_pedido' FROM pedidos WHERE codigo_cliente = '$idcliente'");
    while ($cap2 = $cap_ultimopedido->fetch_object()) {
        $ultimopedido = $cap2->codigo_pedido;
    }
    
    $codigopedido = $primeiropedido;
    while ($codigopedido <= $ultimopedido) {

        




    $sql3 = "SELECT
    pedidos.codigo_pedido as 'pedido',
    pedidos.status_pedido as 'status',
    cad_produto.nome as 'nome',
    pedidos_itens.quantidade as 'quantidade',
    ROUND((pedidos_itens.unitario),2) as 'unitario',
    ROUND((pedidos_itens.quantidade * pedidos_itens.unitario),2) as 'total',
    ROUND((total),2) as 'geral'
    from pedidos_itens
    inner join cad_produto 
    on cad_produto.codigo = pedidos_itens.codigo_produto
    inner join pedidos 
    on pedidos_itens.codigo_pedido = pedidos.codigo_pedido
    inner join cad_cliente 
    on cad_cliente.id = pedidos.codigo_cliente
    where pedidos.codigo_cliente ='$idcliente' and pedidos.codigo_pedido = '$codigopedido'";

        $result3 = mysqli_query($conn, $sql3);
        if ($result3 === FALSE) {
            die('erro');
        }else{
            

        

        echo '<div class="card mt-3">';
        echo '<h4>Pedido:  ' . $codigopedido . '</h4>';
        echo '<table class="table table-responsive">';
        echo '<tr>';
        echo '<th>Descrição</th>';
        echo '<th>Qtd</th>';
        echo '<th>Unitário</th>';
        echo '<th>Total</th>';
        echo '</tr>';



        while ($obj3 = $result3->fetch_object()) {

            echo '<tr>';
            echo '<td>' . $obj3->nome . '</td>';
            echo '<td>' . $obj3->quantidade . '</td>';
            echo '<td>' . $obj3->unitario . '</td>';
            echo '<td>' . $obj3->total . '</td>';
            echo '</tr>';
            $total = $obj3->geral;
            switch ($obj3->status) {
                case 0:
                    $status = '<h4 class="text-info">Pedido Recebido</h4>';
                    break;
                case 1:
                    $status = '<h4 class="text-primary">Pedido em Separação</h4>';
                    break;
                case 2:
                    $status = '<h4 class="text-warning">Pedido a Caminho</h4>';
                    break;
                case 3:
                    $status = '<h4 class="text-success">Pedido Entregue</h4>';
                    break;
                case 4:
                    $status = '<h4 class="text-danger">Pedido Cancelado</h4>';
                    break;
            }
        }
        echo '</table>';
        echo '<div class="mb-3"><h5>Total R$: ' . $total . '</h5></div>';
        echo '<div>' . $status . '</div>';
        echo '<br>';
        echo ' </div>';
        $codigopedido++;
    }}
}else{
echo '<div class="card container"><h2>Faça login para acessar os Pedidos!</h2></div>';
}

?>
