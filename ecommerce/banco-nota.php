<?php 
include("conecta.php");
require("vendor/autoload.php");

use classes\Produto;
use classes\Carrinho;

function insereNota($conexao, $id_produto, $id_usuario, $nota)
{
	$query = "insert into notas (id_usuario, sku, nota) values ({$id_usuario}, {$id_produto}, {$nota})";

  $resultadoDaInsersao = mysqli_query($conexao, $query);

  return $resultadoDaInsersao;
}

function mediaNotaProduto($conexao, $id_produto) {

	$query = "select AVG(notas) as nota from notas where sku = $id_produto";
	$carrinhos = array();
	$resultado = mysqli_query($conexao, $query);
    
  $notas = array();
  while($notas_array = mysqli_fetch_assoc($resultado)){
    $nota['nota'] = $notas_array['nota'];

    array_push($notas, $nota);
  }
  return $notas;
}

function removeCarrinho($conexao, $id){
	$query = "delete from carrinhos where id_carrinho = {$id}";

	return mysqli_query($conexao, $query);
}
