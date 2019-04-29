<?php
require_once("banco-nota.php");
require_once("usuario-logica.php"); 

if(verificaUsuarioMenu()){
    if(buscaNotaCliente($conexao, $_POST{'sku'}, $_SESSION{'usuario_id'}) > 0){
			$alterar = alteraNota($conexao, $_POST{'sku'}, $_SESSION{'usuario_id'}, $_POST{'nota'});
    }else{
			$inserir = insereNota($conexao, $_POST{'sku'}, $_SESSION{'usuario_id'}, $_POST{'nota'});
    }
    header("Location: produto-detalhes.php?sku=" . $_POST{'sku'});
}else{
    header("Location: login.php");
}

