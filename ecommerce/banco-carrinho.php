<?php 
include("conecta.php");
require("vendor/autoload.php");

use classes\Produto;
use classes\Carrinho;

function insereCarrinho($conexao, $id_produto, $id_usuario, $tamanho)
{
	$query = "insert into carrinhos (id_sku, id_usuario, tamanho) values ({$id_produto}, {$id_usuario}, '{$tamanho}')";

  $resultadoDaInsersao = mysqli_query($conexao, $query);

  return $resultadoDaInsersao;
}

function listaCarrinho($conexao, $id_usuario) {

	$query = "select c.id_carrinho, c.id_sku, p.nome, p.marca, p.preco_original, p.preco_desconto, c.tamanho from carrinhos as c inner join produtos as p on c.id_sku = p.sku where id_usuario = $id_usuario";
	$carrinhos = array();
	$resultado = mysqli_query($conexao, $query);


	while($carrinhos_array = mysqli_fetch_assoc($resultado)){
		$produto = new Produto();
		$produto->setSku($carrinhos_array['id_sku']);
		$produto->setNome($carrinhos_array{'nome'});
		$produto->setMarca($carrinhos_array{'marca'});
		$produto->setPrecoOriginal($carrinhos_array{'preco_original'});
		$produto->setPrecoDesconto($carrinhos_array{'preco_desconto'});

		$carrinho = new Carrinho();
		$carrinho->setProduto($produto);
		$carrinho->setTamanho($carrinhos_array['tamanho']);
		$carrinho->setId($carrinhos_array['id_carrinho']);
		array_push($carrinhos, $carrinho);
	}
	return $carrinhos;
}

function removeCarrinho($conexao, $id){
	$query = "delete from carrinhos where id_carrinho = {$id}";

	return mysqli_query($conexao, $query);
}
