<?php 
include("conecta.php");
require_once("class/usuario.php");

function insereUsuario($conexao, Usuario $usuario)
{
	$query = "insert into usuario (login, password, nome, data_nascimento, sexo, email, endereco, bairro, cidade, estado, pais, cep) values ('{$usuario->getLogin()}', '{$usuario->getPassword()}', '{$usuario->getNome()}', '{$usuario->getDataNascimento()}', '{$usuario->getSexo()}', {$usuario->getEmail()}, '{$usuario->getEndereco()}', '{$usuario->getBairro()}', '{$usuario->getCidade()}', '{$usuario->getEstado()}', '{$usuario->getPais()}', '{$usuario->getCep()}')";

	$resultadoDaInsersao = mysqli_query($conexao, $query);
	return $resultadoDaInsersao;
}
