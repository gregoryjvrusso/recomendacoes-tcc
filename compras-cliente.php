<?php 
include("php/header.php"); 
require_once("banco-compras.php");

$id_cliente = $_SESSION{'usuario_id'};
$compras = listaCompraCliente($conexao, $id_cliente);
?>
<div class="container content">
  <div class="row">
    <div class="col-md-10">
			<h2>Compras realizadas</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Compra</th>
						<th scope="col">Valor</th>
            <th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($compras as $compra) : ?>
          <tr>
            <td><?= $compra['id_pedido'] ?></td>
            <td><?= $compra['valor_compra'] ?></td>
            <td>
              <a href="compras-sucesso.php?pedido=<?=$compra['id_pedido']?>">
                <button type="button" class="btn btn-link">Detalhes</a>
              </a>
            </td>
          </tr>
				<?php endforeach; ?>
				</tbody>
			</table>

    </div>
	</div>
</div>
<?php include("php/footer.php"); ?>
