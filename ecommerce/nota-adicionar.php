<?php
require_once("banco-nota.php");
require_once("usuario-logica.php"); 

if(verificaUsuarioMenu()){
    $inserir = insereNota($conexao, $_POST{'sku'}, $_SESSION{'usuario_id'}, $_POST{'nota'});
    header("Location: carrinho.php");
}else{
    header("Location: login.php");
}

