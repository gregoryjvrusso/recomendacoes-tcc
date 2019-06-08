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

function alteraNota($conexao, $id_produto, $id_usuario, $nota)
{
	$query = "update notas SET nota = {$nota} where sku = $id_produto and id_usuario = $id_usuario";

  $resultadoDaInsersao = mysqli_query($conexao, $query);
  return $resultadoDaInsersao;
}

function listaNota($conexao){
  $notas = array();
	$resultado = mysqli_query($conexao, "select * from notas");
	while($notas_array = mysqli_fetch_assoc($resultado)){
    $nota['id_cliente'] = $notas_array['id_usuario'];
    $nota['sku'] = $notas_array['sku'];
    $nota['nota'] = $notas_array['nota'];
    array_push($notas, $nota);
	}
	return $notas;
}

function buscaNotaCliente($conexao, $id_produto, $id_cliente) {
  $query = "select nota from notas where sku = $id_produto and id_usuario = $id_cliente";
	$resultado = mysqli_query($conexao, $query);
    
  $notas = 0;
  while($notas_array = mysqli_fetch_assoc($resultado)){
    $nota = intval($notas_array['nota']);

    $notas = $nota;
  }
  return $notas;
}

function mediaNotaProduto($conexao, $id_produto) {
	$query = "select AVG(nota) as nota from notas where sku = $id_produto";
	$resultado = mysqli_query($conexao, $query);
    
  $notas = 0;
  while($notas_array = mysqli_fetch_assoc($resultado)){
    $nota = intval($notas_array['nota']);

    $notas = $nota;
  }
  return $notas;
}