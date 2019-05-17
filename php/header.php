<?php require_once("usuario-logica.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/estilo-default.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Loja</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-login" href="#" id="navbarDropdownProduto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownProduto">
          <a class="dropdown-item" href="produto-cadastrar.php">Cadastrar</a>
          <a class="dropdown-item" href="produto-lista.php">Listar</a>
          <a class="dropdown-item" href="produto-lista-handcraft.php">Listar Segmentado</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-login" href="#" id="navbarDropdownUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownUsuario">
          <a class="dropdown-item" href="usuario-cadastrar.php">Cadastrar</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php if(verificaUsuarioMenu()) { ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-login" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Olá, <?=$_SESSION['usuario_logado'] ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="carrinho.php">Carrinho</a>
        <a class="dropdown-item" href="compras-cliente.php">Minhas Compras</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="usuario-logout.php">Logout</a>
      </div>
    </li>
    <?php }else{ ?>
      <a class="navbar-brand text-login" id="login" href="login.php">Login</a>
    <?php } ?>
    <style>
      .text-login{
        margin-left: 15px;
        color: #FFF !important;
      }
      #login{
        font-size: 15px;
      }
    </style>
  </div>
</nav>