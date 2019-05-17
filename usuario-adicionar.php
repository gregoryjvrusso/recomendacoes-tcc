<?php
require_once("banco-usuario.php");
require("vendor/autoload.php");

use classes\Usuario;

$usuario = new Usuario();
$usuario->setLogin($_POST{'login'});
$usuario->setPassword($_POST{'password'});
$usuario->setNome($_POST{'nome'});
$usuario->setDataNascimento($_POST{'data_nascimento'});
$usuario->setSexo($_POST{'sexo'});
$usuario->setEmail($_POST{'email'});
$usuario->setEndereco($_POST{'endereco'});
$usuario->setBairro($_POST{'bairro'});
$usuario->setCidade($_POST{'cidade'});
$usuario->setEstado($_POST{'estado'});
$usuario->setPais($_POST{'pais'});
$usuario->setCep($_POST{'cep'});

$inserir = insereUsuario($conexao, $usuario);

header("Location: produto-lista.php");
