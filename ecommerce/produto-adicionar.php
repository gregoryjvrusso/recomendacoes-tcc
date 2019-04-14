<?php
require_once("banco-produto.php");
require_once("class/produto.php");

$produto = new Produto();
$produto->setNome($_POST{'nome'});
$produto->setMarca($_POST{'marca'});
$produto->setPrecoOriginal(floatval($_POST{'preco_original'}));
$produto->setPrecoDesconto(floatval($_POST{'preco_desconto'}));
$produto->setArvoreCategoria($_POST{'arvore_categoria_pai'}, $_POST{'arvore_categoria_filho'});
$produto->setQuantidade($_POST{'quantidade'});
$produto->setFotos($_POST{'foto1'}, $_POST{'foto2'}, $_POST{'foto3'});

$inserir = insereProduto($conexao, $produto);

$produto->setSku(intval(buscarIdProduto($conexao)["max(sku)"]));
if(!is_null($produto->getFotos()[0])){
    $inserirFoto = insereFoto($conexao, $produto, $produto->getFotos()[0]);
}
if(!is_null($produto->getFotos()[1])){
    $inserirFoto = insereFoto($conexao, $produto, $produto->getFotos()[1]);
}
if(!is_null($produto->getFotos()[2])){
    $inserirFoto = insereFoto($conexao, $produto, $produto->getFotos()[2]);
}
?>