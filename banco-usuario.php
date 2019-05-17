<?php 
include("conecta.php");
require("vendor/autoload.php");

use classes\Usuario;

function insereUsuario($conexao, Usuario $usuario)
{
	$query = "insert into usuarios (login, password, nome, data_nascimento, sexo, email, endereco, bairro, cidade, estado, pais, cep) values ('{$usuario->getLogin()}', '{$usuario->getPassword()}', '{$usuario->getNome()}', '{$usuario->getDataNascimentoBD()}', '{$usuario->getSexo()}', '{$usuario->getEmail()}', '{$usuario->getEndereco()}', '{$usuario->getBairro()}', '{$usuario->getCidade()}', '{$usuario->getEstado()}', '{$usuario->getPais()}', '{$usuario->getCep()}')";

	$resultadoDaInsersao = mysqli_query($conexao, $query);
	
	return $resultadoDaInsersao;
}

function buscaUsuario($conexao, $login, $senha) {
  $login = mysqli_real_escape_string($conexao, $login);
	
	$query = "select * from usuarios where login = '{$login}' and password = '{$senha}'";
	
	$resultado = mysqli_query($conexao, $query);
	
	$resultadoUsuario = mysqli_fetch_assoc($resultado);
  
  $usuario = new Usuario();
  $usuario->setId($resultadoUsuario['id_usuario']);
  $usuario->setLogin($resultadoUsuario['login']);
  $usuario->setNome($resultadoUsuario['nome']);
  $usuario->setDataNascimentoBD($resultadoUsuario['data_nascimento']);
  $usuario->setSexo($resultadoUsuario['sexo']);
  $usuario->setEmail($resultadoUsuario['email']);
  $usuario->setEndereco($resultadoUsuario['endereco']);
  $usuario->setBairro($resultadoUsuario['bairro']);
  $usuario->setCidade($resultadoUsuario['cidade']);
  $usuario->setEstado($resultadoUsuario['estado']);
  $usuario->setPais($resultadoUsuario['pais']);
  $usuario->setCep($resultadoUsuario['cep']);

	return $usuario;
}
