<?php 
include("conecta.php");
require("vendor/autoload.php");

use classes\Produto;

function listaProduto($conexao){
	$produtos = array();
	$resultado = mysqli_query($conexao, "select * from produtos");
	while($produtos_array = mysqli_fetch_assoc($resultado)){
		$produto = new Produto();
		$produto->setSku($produtos_array{'sku'});
		$produto->setNome($produtos_array{'nome'});
		$produto->setMarca($produtos_array{'marca'});
		$produto->setPrecoOriginal($produtos_array{'preco_original'});
		$produto->setPrecoDesconto($produtos_array{'preco_desconto'});
		$produto->setArvoreCategoriaBD($produtos_array{'arvore_categoria'});
    $produto->setQuantidade($produtos_array{'quantidade'});

    $query = "select * from fotos where sku_produto = {$produto->getSku()} limit 1";
    $resultadoFoto = mysqli_query($conexao, $query);
    $foto_array = mysqli_fetch_assoc($resultadoFoto);
    
    $produto->setFotoBD($foto_array{'url_foto'});
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, Produto $produto)
{
	$query = "insert into produtos (nome, marca, preco_original, preco_desconto, arvore_categoria, quantidade) values ('{$produto->getNome()}', '{$produto->getMarca()}', {$produto->getPrecoOriginal()}, {$produto->getPrecoDesconto()}, '{$produto->getArvoreCategoria()}', {$produto->getQuantidade()})";
	
	$resultadoDaInsersao = mysqli_query($conexao, $query);
	return $resultadoDaInsersao;
}

function removeProduto($conexao, $sku) {
    $query = "delete from produtos where sku = {$sku}";
    
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {
    $query = "update produtos set nome = '{$produto->getNome()}', marca = '{$produto->getMarca()}', preco_original = {$produto->getPrecoOriginal()}, preco_desconto = {$produto->getPrecoDesconto()}, arvore_categoria = '{$produto->getArvoreCategoria()}', quantidade = {$produto->getQuantidade()} where sku = {$produto->getSku()}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $sku) {
	$query = "select * from produtos where sku = {$sku}";
	
	$resultado = mysqli_query($conexao, $query);
	$produto_buscado = mysqli_fetch_assoc($resultado);
	$produto = new Produto();				
	$produto->setSku($produto_buscado{'sku'});
	$produto->setNome($produto_buscado{'nome'});
	$produto->setMarca($produto_buscado{'marca'});
	$produto->setPrecoOriginal($produto_buscado{'preco_original'});
	$produto->setPrecoDesconto($produto_buscado{'preco_desconto'});
	$produto->setArvoreCategoriaBD($produto_buscado{'arvore_categoria'});
  $produto->setQuantidade($produto_buscado{'quantidade'});
  
  $query = "select * from fotos where sku_produto = {$produto->getSku()}";
  $resultadoFoto = mysqli_query($conexao, $query);
	while($fotos_array = mysqli_fetch_assoc($resultadoFoto)){
		$produto->setFotoBD($fotos_array['url_foto']);
	}	
  return $produto;
}

function buscarIdProduto($conexao) {
	$query = "SELECT max(sku) FROM PRODUTOS";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}

function insereFoto($conexao, $produto, $foto){ 
	$query = "insert into fotos (sku_produto, url_foto) value ({$produto->getSku()}, '{$foto}')";
	$resultadoDaInsersao = mysqli_query($conexao, $query);

	return $resultadoDaInsersao;
}

function listaHandCraft($conexao){
	$handCrafts = array();
	$resultado = mysqli_query($conexao, "select * from HANDCRAFTS");
	while($handCraft_array = mysqli_fetch_assoc($resultado)){
		array_push($handCrafts, $handCraft_array{'sku'});
	}
	return $handCrafts;
}

function insereQuantidade($conexao, $produto, $quantidade){
	$query = "insert into quantidades (sku_produto, p, m, g, gg, unico) value ({$produto->getSku()}, $quantidade[0], $quantidade[1], $quantidade[2], $quantidade[3], $quantidade[4])";
	$resultadoDaInsersao = mysqli_query($conexao, $query);

	return $resultadoDaInsersao;	
}