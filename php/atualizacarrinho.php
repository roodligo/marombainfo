<?php
session_start();

include_once "conexao.php";

$codigo_produto = $_GET['id'];
$quantidade = 1;
$action = $_GET['action'];

if ($action === 'empty')
    unset($_SESSION['cart']);

$result = $conn->query("SELECT codigo, nome, observacao, FORMAT(preco, 2) as preco FROM cad_produto WHERE codigo = " . $codigo_produto);


if ($result) {

    if ($obj = $result->fetch_object()) {

        switch ($action) {
            case "add":
                if (isset($_SESSION['cart'][$obj->codigo])) {
                    $_SESSION['cart'][$obj->codigo]['quantidade']++;
                } else {
                    $_SESSION['cart'][$obj->codigo] = array('nome' => $obj->nome, 'codigo' => $obj->codigo, 'quantidade' => $quantidade, 'unitario' => $obj->preco, 'total' => (float)$obj->preco * (float)'quantidade');
                }
?>
                <script type="text/javascript">
                    alert('Item adicionado ao Carrinho!');
                    window.location.href = "/php/listar_produtos.php?filtro=0";
                </script>
            <?php
                break;

            case "remove":
                $_SESSION['cart'][$obj->codigo]['quantidade']--;
                if ($_SESSION['cart'][$obj->codigo]['quantidade'] == 0)
                    unset($_SESSION['cart'][$obj->codigo]);
            ?>
                <script type="text/javascript">
                    alert('Item removido!');
                    window.location.href = "../html/carrinho.html";
                </script>
<?php
    break;
        }
    }
}
?>