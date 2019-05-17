<?php
session_start();
function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}
function verificaUsuario() {
  if(!usuarioEstaLogado()) {
     $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
     header("Location: login.php");
     die();
  }
}
function verificaUsuarioMenu() {
  if(!usuarioEstaLogado()) {
    return false;
  }else{
    return true;
  }
}
function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}
function logaUsuario($usuario) {
  $_SESSION["usuario_id"] = $usuario->getId();
  $_SESSION["usuario_logado"] = $usuario->getLogin();
  $_SESSION["usuario_nome"] = $usuario->getNome();
  $_SESSION["usuario_data_nascimento"] = $usuario->getDataNascimento();
  $_SESSION["usuario_sexo"] = $usuario->getSexo();
  $_SESSION["usuario_email"] = $usuario->getEmail();
  $_SESSION["usuario_endereco"] = $usuario->getEndereco();
  $_SESSION["usuario_bairro"] = $usuario->getBairro();
  $_SESSION["usuario_cidade"] = $usuario->getCidade();
  $_SESSION["usuario_estado"] = $usuario->getEstado();
  $_SESSION["usuario_pais"] = $usuario->getPais();
  $_SESSION["usuario_cep"] = $usuario->getCep();
}
function logout() {
  session_destroy();
  session_start();
}