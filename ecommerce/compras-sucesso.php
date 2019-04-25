<?php 
include("php/header.php"); 
require_once("banco-compras.php");

$id_compra = $_GET['pedido'];
$compras = listaCompraEspecifica($conexao, $id_compra);
$valorTotal = 0;
?>
<div class="container-fluid content">
  <div class="row">
    <div class="col-md-8">
			<h2>Compra realizada com sucesso</h2>
			<p>Pedido nº <?= $id_compra ?></p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Produto</th>
						<th scope="col">Marca</th>
						<th scope="col">Tamanho</th>
						<th scope="col">Valor</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($compras as $compra) : 
					$produto = $compra->getProduto();	
					$valorTotal += $produto->getPrecoDesconto();
				?>
					<tr>
						<td><?= $produto->getNome() ?></td>
						<td><?= $produto->getMarca() ?></td>
						<td><?= $compra->getTamanho() ?></td>
						<td>R$ <?= $produto->getPrecoDesconto() ?></td>
					</tr>
				<?php endforeach; ?>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col">Valor Total</th>
						<th scope="col">R$ <?= $valorTotal ?></th>
					</tr>
				</thead>
				</tbody>
			</table>

    </div>
	</div>
</div>
<?php include("php/footer.php"); ?>
