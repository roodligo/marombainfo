<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

echo '<div class="container"><h3>Carrinho: </h3></div>';
$custo = 0;
$total = 0;

echo '<table class="table table-borderless">';
echo '<tr>';
echo '<th>Descrição</th>';
echo '<th>Qtd</th>';
echo '<th>Unitário</th>';
echo '<th>Total</th>';
echo '</tr>';
foreach ($_SESSION['cart'] as $codigo_produto => $value) {
    // echo '<div class="container"><p>Código: '.$value['codigo'].' | Descrição: '.$value['nome'].' | Quantidade: '.$value['quantidade'].' | Unitário: '.$value['unitario'].' | Total: '.$value['quantidade'] * $value['unitario'].'</p></div>';
    echo '<tr>';
    echo '<td>' . $value['nome'] . '</td>';
    echo '<td>' . $value['quantidade'] . '</td>';
    echo '<td>' . $value['unitario'] . '</td>';
    echo '<td>' . $value['quantidade'] * $value['unitario'] . '</td>';
    echo '</tr>';
    $custo = $value['quantidade'] * $value['unitario'];
    $total = $total + $custo;
}
echo '</table>';

echo '<tr>';
echo '<h4 class="container"> Total do Pedido R$: ' . $total . '</h4>';