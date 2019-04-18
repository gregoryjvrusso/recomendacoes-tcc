<?php 
include("conecta.php");

function insereCarrinho($conexao, $id_produto, $id_usuario)
{
	$query = "insert into carrinhos (id_sku, id_usuario) values ($id_produto, $id_usuario)";

    $resultadoDaInsersao = mysqli_query($conexao, $query);

    return $resultadoDaInsersao;
}

function buscaCarrinho($conexao, $id_produto, $id_usuario) {
  $login = mysqli_real_escape_string($conexao, $login);
	
	$query = "select * from carrinhos where id_sku = $id_produto and id_usuario = $id_usuario";
	
	$resultado = mysqli_query($conexao, $query);
	
	$resultadoUsuario = mysqli_fetch_assoc($resultado);

	return $carrinho;
}
