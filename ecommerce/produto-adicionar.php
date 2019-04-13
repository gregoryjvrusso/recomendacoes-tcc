<?php
require_once("banco-produto.php");
require_once("class/produto.php");

$produto = new Produto();
$produto->setNome($_POST{'nome'});
$produto->setMarca($_POST{'marca'});
$produto->setPrecoOriginal($_POST{'preco_original'});
$produto->setPrecoDesconto($_POST{'preco_desconto'});
$produto->setArvoreCategoria($_POST{'arvore_categoria_pai'}, $_POST{'arvore_categoria_filho'});
$produto->setQuantidade($_POST{'quantidade'});

$inserir = insereProduto($conexao, $produto);
?>