<?php
require_once("banco-carrinho.php");
require_once("usuario-logica.php"); 

if(verificaUsuarioMenu()){
    $inserir = insereCarrinho($conexao, $_POST{'produto_sku'}, $_SESSION{'usuario_id'}, $_POST{'produto_tamanho'});
    header("Location: carrinho.php");
}else{
    header("Location: login.php");
}

