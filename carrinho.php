<?php include("php/header.php"); 
require_once("banco-carrinho.php");
$carrinhos = listaCarrinho($conexao, $_SESSION{'usuario_id'});
$valorTotal = 0;
?>
<div class="container content">
	<div class="row">
		<div class="col-md-10">
			<h2>Carrinho</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Produto</th>
						<th scope="col">Marca</th>
						<th scope="col">Tamanho</th>
						<th scope="col">Valor</th>
						<th scope="col">Excluir</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($carrinhos as $carrinho) : 
					$produto = $carrinho->getProduto();	
					$valorTotal += $produto->getPrecoDesconto();
				?>
					<tr>
						<td><?= $produto->getNome() ?></td>
						<td><?= $produto->getMarca() ?></td>
						<td><?= $carrinho->getTamanho() ?></td>
						<td>R$ <?= $produto->getPrecoDesconto() ?></td>
						<td>
							<form action="carrinho-deletar.php" method="post">
        				<input type="hidden" name="id" value="<?= $carrinho->getId() ?>" />
	            	<button class="btn btn-danger">Excluir</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col">Valor Total</th>
						<th scope="col">R$ <?= $valorTotal ?></th>
						<th scope="col">
							<form action="compras-adicionar.php" method="post">
								<input type="hidden" name="id_cliente" value="<?= $_SESSION{'usuario_id'} ?>" />
								<input type="hidden" name="id_compra" value="<?= md5(uniqid(rand(), true)) ?>" />
								<button class="btn btn-success">Comprar</button>
							</form>
						</th>
					</tr>
				</thead>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include("php/footer.php"); ?>