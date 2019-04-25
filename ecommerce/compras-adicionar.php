<?php
require_once("banco-compras.php");
require_once("banco-carrinho.php");

$id_cliente = $_POST{'id_cliente'};
$id_compra = $_POST{'id_compra'};

$carrinhos = listaCarrinho($conexao, $id_cliente);

foreach($carrinhos as $carrinho){
    $produto = $carrinho->getProduto();	
    insereCompra($conexao, $id_cliente, $produto->getSku(), $id_compra, $carrinho->getTamanho());
    removeCarrinho($conexao, $carrinho->getId());
}

header("Location: compras-sucesso.php?pedido=$id_compra");


