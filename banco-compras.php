<?php 
include("conecta.php");
require("vendor/autoload.php");

use classes\Produto;
use classes\Carrinho;

function insereCompra($conexao, $id_cliente, $sku, $id_pedido, $tamanho){
	$query = "insert into compras (id_pedido, id_cliente, sku, tamanho) values ('{$id_pedido}', {$id_cliente}, {$sku}, '{$tamanho}')";
 
  $resultadoDaInsersao = mysqli_query($conexao, $query);

  return $resultadoDaInsersao;
}

function listaCompraEspecifica($conexao, $id_pedido){
  $query = "select c.sku, p.nome, p.marca, p.preco_desconto, c.tamanho from compras as c inner join produtos as p on c.sku = p.sku where id_pedido = '{$id_pedido}'";
  $carrinhos = array();
  $resultado = mysqli_query($conexao, $query);

  while($carrinhos_array = mysqli_fetch_assoc($resultado)){
    $produto = new Produto();
    $produto->setSku($carrinhos_array['sku']);
    $produto->setNome($carrinhos_array{'nome'});
    $produto->setMarca($carrinhos_array{'marca'});
    $produto->setPrecoDesconto($carrinhos_array{'preco_desconto'});

    $carrinho = new Carrinho();
    $carrinho->setProduto($produto);
    $carrinho->setTamanho($carrinhos_array['tamanho']);
    array_push($carrinhos, $carrinho);
  }
  return $carrinhos;
}

function listaCompraCliente($conexao, $id_cliente){
  $query = "select c.id_pedido, SUM(p.preco_desconto) as valor_compra from compras as c inner join produtos as p on c.sku = p.sku where id_cliente = {$id_cliente} group by c.id_pedido";
  $resultado = mysqli_query($conexao, $query);
  $compras = array();
  while($compras_array = mysqli_fetch_assoc($resultado)){
    $compra['id_pedido'] = $compras_array['id_pedido'];
    $compra['valor_compra'] = $compras_array['valor_compra'];

    array_push($compras, $compra);
  }
  return $compras;
}