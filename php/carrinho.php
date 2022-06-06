<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['cart'])) {
    echo '<div class="container text-white"><h3>Carrinho: </h3></div>';
    $custo = 0;
    $total = 0;

    echo '<table class="table table-dark ">';
    echo '<tr>';
    echo '<th>Descrição</th>';
    echo '<th>Qtd</th>';
    echo '<th>Unitário</th>';
    echo '<th>Total</th>';
    echo '<th></th>';
    echo '</tr>';
    foreach ($_SESSION['cart'] as $codigo_produto => $value) {
        // echo '<div class="container"><p>Código: '.$value['codigo'].' | Descrição: '.$value['nome'].' | Quantidade: '.$value['quantidade'].' | Unitário: '.$value['unitario'].' | Total: '.$value['quantidade'] * $value['unitario'].'</p></div>';
        echo '<tr>';
        echo '<td>' . $value['nome'] . '</td>';
        echo '<td>' . $value['quantidade'] . '</td>';
        echo '<td>' . $value['unitario'] . '</td>';
        echo '<td>' . $value['quantidade'] * $value['unitario'] . '</td>';
        echo '<td><p><a class="text-reset" href="../php/atualizacarrinho.php?action=remove&id=' . $codigo_produto . '"><input type="submit" value="Remover" class="btn btn-outline-danger " /></a></p></td>';
        echo '</tr>';
        $custo = $value['quantidade'] * $value['unitario'];
        $total = $total + $custo;
    }
    echo '</table>';

    echo '<tr>';
    if (isset($_SESSION['email'])) {
?>
    <div class="container row">
        <div class="col-md-5 text-white">
            <h3>Escolha a Forma de Pagamento: </h3>
            <br>
            <form method="post" action="../php/fecha_pedido.php">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="f_pag" id="p_pix" value=1>
                    <label class="form-check-label" for="p_pix">Pix</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="f_pag" id="p_debito" value="2">
                    <label class="form-check-label" for="p_debito">Débito</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="f_pag" id="p_credito" value="3">
                    <label class="form-check-label" for="p_credito">Crédito</label>
                </div>
                <script>
                    document.getElementById("p_pix").onclick = function() {
                        document.getElementById("pag_debito").style.display = "none";
                        document.getElementById("pag_credito").style.display = "none";
                        document.getElementById("pag_pix").style.display = "block";
                    }
                    document.getElementById("p_debito").onclick = function() {
                        document.getElementById("pag_pix").style.display = "none";
                        document.getElementById("pag_credito").style.display = "none";
                        document.getElementById("pag_debito").style.display = "block";
                    }
                    document.getElementById("p_credito").onclick = function() {
                        document.getElementById("pag_pix").style.display = "none";
                        document.getElementById("pag_debito").style.display = "none";
                        document.getElementById("pag_credito").style.display = "block";
                    }
                </script>
            
        </div>
        
        <div class="col-md-5 text-white">
            <div id="pag_pix">
            <h3>Pagamento em PIX</h3>
            <p>Escaneie o QR-CODE abaixo para efetuar o pagamento!</p>
            <br>
            <img src="/imagens/pix-qr.png" alt="" width="auto">
            </div>
            <div id="pag_credito">

                <h3>Dados do Cartão de Crédito</h3>
                <div class="form-container">
                    <div>
                        <label for="name">Nome</label>
                        <input class="form-control" id="name" maxlength="20" type="text">
                    </div>
                    <div>
                        <label for="cardnumber">Numero do Cartão</label>
                        <input class="form-control" id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <div>
                        <label for="expirationdate">Validade (mm/aa)</label>
                        <input class="form-control" id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <div>
                        <label for="securitycode">Código de Segurança</label>
                        <input class="form-control" id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                </div>
            </div>
            <div id="pag_debito">

                <h3>Dados do Cartão de Débito</h3>
                <div class="form-container">
                    <div>
                        <label for="name">Nome</label>
                        <input class="form-control" id="name" maxlength="20" type="text">
                    </div>
                    <div>
                        <label for="cardnumber">Numero do Cartão</label>
                        <input class="form-control" id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <div>
                        <label for="expirationdate">Validade (mm/aa)</label>
                        <input class="form-control" id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <div>
                        <label for="securitycode">Código de Segurança</label>
                        <input class="form-control" id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php

    echo '<div class="container"><h4 class="mt-1 text-white"> Total do Pedido R$: ' . $total . '</h4>    <p><a class="text-reset" href="../php/fecha_pedido.php"><input type="submit" value="Finalizar Pedido" class="btn btn-danger " /></a></p> </div></form>';
                }else{
                    echo '<h4 class="text-white md-5 mt-5 container-fluid">Faça login para finalizar a compra!</h4>';
                }
                
                if ($total == 0) {
        unset($_SESSION['cart']);
    }
} else {
    echo '<h4 class="text-white md-5 mt-5 col-3 container-fluid">O Carrinho está vazio!</h4>';
}
