<?php
include_once "conexao.php";
/*
//consultar no banco de dados
$captura_produtos = "SELECT codigo, nome, observacao, FORMAT(preco, 2) as preco FROM cad_produto ORDER BY codigo ASC";
$resultado_produtos = mysqli_query($conn, $captura_produtos);


//Verificar se encontrou resultado na tabela "cad_produto"
if(($resultado_produtos) AND ($resultado_produtos->num_rows != 0)){
	?>
	
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Observações</th>
				<th>Preço</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_produto = mysqli_fetch_assoc($resultado_produtos)){
				?>
				<tr>
					<th><?php echo $row_produto['codigo']; ?></th>
					<td><?php echo $row_produto['nome']; ?></td>
					<td><?php echo $row_produto['observacao']; ?></td>
					<td><?php echo $row_produto['preco']; ?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum produto encontrado!</div>";
} 
*/
?>


<div class="container" style="margin-top:10px;">
	<div class="row">
		<?php
		

		$result = $conn->query('SELECT codigo, nome, observacao, FORMAT(preco, 2) as preco, foto, estoque FROM cad_produto');
		if ($result === FALSE) {
			die('erro');
		}

		if ($result) {

			while ($obj = $result->fetch_object()) {

				echo '<div class="col-md-4 text-white">';
				echo '<p><h3 >' . $obj->nome . '</h3></p>';
				echo '<img src="../imagens_produtos/' . $obj->foto . '"width="150px">';
				echo '<p><strong>Ref.</strong> ' . $obj->codigo . '</p>';
				echo '<p><strong>Observação:</strong> ' . $obj->observacao . '</p>';
				echo '<p><strong>Estoque:</strong> ' . $obj->estoque . '</p>';
				echo '<p><strong>R$</strong>: ' . $obj->preco . '</p>';

				if ($obj->estoque >= 1) {
					echo '<p><a class="text-reset" href="../php/atualizacarrinho.php?action=add&id=' . $obj->codigo . '"><input type="submit" value="Adicionar ao Carrinho" class="btn btn-outline-danger " /></a></p>';
				} else {
					echo 'Produto sem Estoque!';
				}
				echo '</div>';

			
			}
		}



		echo '</div>';
		echo '</div>';
		?>