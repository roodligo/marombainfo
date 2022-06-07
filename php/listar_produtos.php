<?php
include_once "conexao.php";
$filtro = $_GET["filtro"];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.3/bootbox.min.js" integrity="sha512-U3Q2T60uOxOgtAmm9VEtC3SKGt9ucRbvZ+U3ac/wtvNC+K21Id2dNHzRUC7Z4Rs6dzqgXKr+pCRxx5CyOsnUzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.3/bootbox.js" integrity="sha512-OMYI9iOelB12PWdWHfU6XouDuUvszFZEywO4W9KFJGP3aj/nP5UECd5ctMqRm+/9Qk3oOFqhbXVi6cJAqlAUuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/busca_cep.js"></script>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="shortcut icon" type="imagex/png" href="../imagens/favicon.ico">
</head>

<body>
	<!--Barra de Navegação-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#"></a>
			<img src="/imagens/logo.png" alt="" width="132 height=" 100">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="../index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/php/listar_produtos.php?filtro=0">Produtos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/html/quem-somos.html">Quem Somos</a>
					</li>
				</ul>
			</div>
			<nav class="navbar navbar-dark bg-dark">
				<div class="container-fluid">
					<div id="login"></div>
					<script>
						$(document).ready(function() {
							$.post('../php/apresenta_login.php', function(retorna) {
								$("#login").html(retorna);
							});
						});
					</script>
					<form action="/html/carrinho.html">
						<button type="submit" class="btn btn-warning">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
								<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
								</path>
							</svg>
							Carrinho
						</button>
					</form>
				</div>
			</nav>
		</div>
	</nav>
	</div>
	<!--Barra de Navegação-->

	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-9 mt-2">
				<form method="get" action="../php/listar_produtos.php">
					<select class="form-select text-white" aria-label="Categorias" name="filtro" id="filtro">
						<option value="0">Todas as Categorias</option>
						<option value="1">Ganho de Massa</option>
						<option value="2">Emagrecimento</option>
						<option value="3">Competição</option>
					</select>
			</div>
			<div class="col-lg-2 mt-2">
				<input class="btn btn-danger " type="submit" id="btnInfo" value="Filtrar" />
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<?php
		if ($filtro == 0) {
			echo '<h1 class="text-decoration-underline text-light ">Todas as Categorias</h1>';
		} else if ($filtro == 1) {
			echo '<h1 class="text-decoration-underline text-light ">Ganho de Massa</h1>';
		} else if ($filtro == 2) {
			echo '<h1 class="text-decoration-underline text-light ">Emagrecimento</h1>';
		} else if ($filtro == 3) {
			echo '<h1 class="text-decoration-underline text-light ">Competição</h1>';
		}
		?>
	</div>



	<br>
	<!--Listar Produtos-->


	<?php

	if ($filtro == 0 || $filtro == null) {
	?>

		<div class="container-lg mt-1">
			<div class="row">
				<?php
				
				$result = $conn->query('SELECT codigo, nome, observacao, FORMAT(preco, 2) as preco, foto, estoque FROM cad_produto');
				if ($result === FALSE) {
					die('erro');
				}

				if ($result) {

					while ($obj = $result->fetch_object()) {

						echo '<div class="col-md-4 text-white">';
						echo '<p><h5 >' . $obj->nome . '</h5></p>';
						echo '<img src="../imagens_produtos/' . $obj->foto . '"width="150px">';
						echo '<p><strong>Ref.</strong> ' . $obj->codigo . '</p>';
						echo '<p><strong>Observação:</strong> ' . $obj->observacao . '</p>';
						echo '<p><strong>Estoque:</strong> ' . $obj->estoque . '</p>';
						echo '<p><strong>R$</strong>: ' . $obj->preco . '</p>';

						if ($obj->estoque >= 1) {
							echo '<p><a class="text-reset" href="../php/atualizacarrinho.php?action=add&id=' . $obj->codigo . '"><input type="submit" value="Adicionar ao Carrinho" class="btn btn-warning " /></a></p>';
						} else {
							echo 'Produto sem Estoque!';
						}
						echo '</div>';
					}
				}

			echo '</div>';
			echo '</div>';

				
		} else {
			?>
				<div class="container-lg mt-1">
					<div class="row">
					<?php


					$result = $conn->query('SELECT codigo, nome, observacao, FORMAT(preco, 2) as preco, foto, estoque FROM cad_produto where categoria_id =' . $filtro);
					if ($result === FALSE) {
						die('erro');
					}

					if ($result) {

						while ($obj = $result->fetch_object()) {

							echo '<div class="col-lg-4 text-white">';
							echo '<p><h3 >' . $obj->nome . '</h3></p>';
							echo '<img src="../imagens_produtos/' . $obj->foto . '"width="150px">';
							echo '<p><strong>Ref.</strong> ' . $obj->codigo . '</p>';
							echo '<p><strong>Observação:</strong> ' . $obj->observacao . '</p>';
							echo '<p><strong>Estoque:</strong> ' . $obj->estoque . '</p>';
							echo '<p><strong>R$</strong>: ' . $obj->preco . '</p>';

							if ($obj->estoque >= 1) {
								echo '<p><a class="text-reset" href="../php/atualizacarrinho.php?action=add&id=' . $obj->codigo . '"><input type="submit" value="Adicionar ao Carrinho" class="btn btn-warning " /></a></p>';
							} else {
								echo 'Produto sem Estoque!';
							}
							echo '</div>';
						}
					}


					echo '</div>';
					echo '</div>';
				}
					?>

</body>
<br><br>
<!--Rodapé-->
<footer class="text-center text-lg-start bg-dark text-muted">
	<!-- Redes Sociais -->
	<div class="container">
		<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
			<!-- Lado Esquerdo -->
			<div class="me-5 d-none d-lg-block">
				<span>Nos sigam nas Redes Sociais:</span>
			</div>
			<!-- Lado Esquerdo -->

			<!-- Lado Direito -->
			<div>
				<a href="#" class="me-4 text-reset">
					<i class="fab fa-facebook-f"></i>
					Facebook
				</a>
				<a href="" class="me-4 text-reset">
					<i class="fab fa-twitter"></i>
					Twitter
				</a>
				<a href="" class="me-4 text-reset">
					<i class="fab fa-instagram"></i>
					Instagram
				</a>
			</div>
			<!-- Lado Direito -->
		</section>
	</div>
	<!-- Redes Sociais -->

	<!-- Links  -->
	<section class="">
		<div class="container text-center text-md-start mt-5">
			<!-- Grid row -->
			<div class="row mt-3">
				<!-- Grid column -->
				<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
					<!-- Content -->
					<h6 class="text-uppercase fw-bold mb-4">
						<i class="fas fa-gem me-3"></i>Portal Maromba
					</h6>
					<p>
						Não deixe para amanhã o que pode fazer hoje!
					</p>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
					<!-- Links -->
					<h6 class="text-uppercase fw-bold mb-4">
						CATEGORIAS
					</h6>
					<p>
						<a href="../php/listar_produtos.php?filtro=1" class="text-reset">Ganho de Massa</a>
					</p>
					<p>
						<a href="../php/listar_produtos.php?filtro=2" class="text-reset">Emagrecimento</a>
					</p>
					<p>
						<a href="../php/listar_produtos.php?filtro=3" class="text-reset">Competição</a>
					</p>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
					<!-- Links -->
					<h6 class="text-uppercase fw-bold mb-4">
						CLIENTE
					</h6>
					<p>
						<a href="../html/perfil_cliente.html" class="text-reset">Perfil</a>
					</p>
					<p>
						<a href="../html/pedidos.html" class="text-reset">Meus Pedidos</a>
					</p>
					<p>
						<a href="../html/quem-somos.html" class="text-reset">Quem Somos</a>
					</p>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
					<!-- Links -->
					<h6 class="text-uppercase fw-bold mb-4">
						Contato
					</h6>
					<p><i class="fas fa-home me-3"></i> Av. Paulista, 1016</p>
					<p>
						<i class="fas fa-envelope me-3"></i>
						contato@portalmaromba.com.br
					</p>
					<p><i class="fas fa-print me-3"></i> + 55 (11)4002-8922</p>
				</div>
				<!-- Grid column -->
			</div>
			<!-- Grid row -->
		</div>
	</section>
	<!-- Section: Links  -->

	<!-- Copyright -->
	<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
		© 2022 Copyright:
		<a class="text-reset fw-bold" href="#">Rodrigo Ferreira</a>
	</div>
	<!-- Copyright -->
</footer>
<!-- Footer -->

</html>