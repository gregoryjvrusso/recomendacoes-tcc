<?php
require_once("banco-carrinho.php");
$id = $_POST['id'];
removeCarrinho($conexao, $id);
header("Location: carrinho.php");
die();
