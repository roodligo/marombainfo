<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
include_once "conexao.php";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cad_cliente WHERE email = '$email' and adm = 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
?>
        <div class="container card" style="max-width: 900px;">
            <h3>Cadastro de Produto:</h3>
            <form method="post" action="../php/envia_cad_produto.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control bg-dark text-white" name="nome" type="text" id="nome" placeholder="Nome" required>
                </div>
                <div class="mb-3">
                    <input class="form-control bg-dark text-white" name="observacao" type="text" id="observacao" placeholder="Observação" required>
                </div>
                <div class="mb-3">
                    <input class="form-control bg-dark text-white" name="preco" type="number" id="preco" placeholder="Preço" step="0.010" required>
                </div>
                <script>
                    document.getElementById("preco").addEventListener("change", function() {
                        this.value = parseFloat(this.value).toFixed(2);
                    });
                </script>
                <div class="mb-3">
                    <input class="form-control bg-dark text-white" name="estoque" type="number" id="estoque" placeholder="Estoque" required>
                </div>
                <div class="mb-3">
                    <select class="form-select text-white bg-dark" style="border-color: black;" aria-label="Categorias" name="categoria_id" id="categoria_id">
                        <option selected>Categoria</option>
                        <option value="1">Ganho de Massa</option>
                        <option value="2">Emagrecimento</option>
                        <option value="3">Competição</option>
                    </select>
                </div>
                <div class="mb-3">
                    <p style="font-size:22px;"> Foto </p>
                    <input style="color:#9e9e9e;" name="pic" type="file" id="pic" aria-required="true" class="full-width">
                    <div class="mb-3">
                        <br>
                        <button type="submit" class="btn btn-dark btn-lg btn-block" style="background-color: #39b54a">Salvar</button>
                    </div>
            </form>
        </div>

    <?php } else {
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