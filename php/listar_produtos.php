<?php
include_once "conexao.php";

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
