<?php 
require_once("banco-usuario.php");
require_once("usuario-logica.php");

$usuario = buscaUsuario($conexao, $_POST["login"], $_POST["senha"]);

if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido!";
    header("Location: login.php");
} else {
    $_SESSION["success"] = "Usuário logado com sucesso.";
    logaUsuario($usuario);
    header("Location: carrinho.php");
}
die();