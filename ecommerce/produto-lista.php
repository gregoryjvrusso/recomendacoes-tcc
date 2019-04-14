<?php include("php/header.php"); 
require_once("banco-produto.php");

$produtos = listaProduto($conexao);
?>
<style>
  .imagem-produto{
    margin-bottom: 0px
  }
  .texto-produto{
    margin: 0px;
    color: black;
  }
  .texto-produto:link{
    text-decoration:none; 
  }
  .nome-produto{
    margin: 0px;
    padding: 0px;
  }
  .marca-produto{
    margin: 0px;
  }
  .preco-produto{
    margin: 0px
  }
  .preco-original{
    text-decoration: line-through;
  }
  .preco-desconto{
    margin-left: 10px;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-10">
      <h1>Produtos</h1>
      <div class="row">
        <?php foreach($produtos as $produto): ?>
        <div class="col-md-4 col-sm-12">
          <a href="">
            <div class="card">
              <img class="card-img-top imagem-produto" src="<?= $produto->getFotos()[0] ?>" alt="Foto do Produto">
            </div>
            <div class="texto-produto">
              <h5 class="nome-produto"><?= $produto->getNome() ?></h5>
              <p class="marca-produto"><?= $produto->getMarca() ?></p>
              <p class="preco-produto">
                <span class="preco-original">R$ <?= $produto->getPrecoOriginal() ?></span>
                <span class="preco-desconto">R$ <?= $produto->getPrecoDesconto() ?></span>
              </p>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>
