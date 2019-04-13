<?php include("php/header.php"); ?>
	
<script>
  $(function () {
    $('.carousel').carousel()
  });
</script>
<style>
  .content{
    padding: 20px;
    background-color: #fcfcfc;
  }
  .texto-categoria{
    font-size: 18px;
  }
</style>
<div class="container-fluid content">
  <div class="row">
    <div class="col-md-6">
      <h1>Cadastrar Produto</h1>
      <form action="produto-adicionar.php" method="post">
        <div class="form-group">
          <label for="nome_produto">Nome</label>
          <input type="text" class="form-control" id="nome_produto" aria-describedby="nomeProduto" placeholder="Nome Produto">
        </div>
        <div class="form-group">
          <label for="marca_produto">Marca</label>
          <input type="text" class="form-control" id="marca_produto" aria-describedby="marcaProduto" placeholder="Marca Produto">
        </div>
        <div class="form-group">
          <label for="preco_original_produto">Preço Original</label>
          <input type="text" class="form-control" id="preco_original_produto" aria-describedby="precoOriginalProduto" placeholder="Preço Original">
        </div>
        <div class="form-group">
          <label for="preco_desconto_produto">Preço Desconto</label>
          <input type="text" class="form-control" id="preco_desconto_produto" aria-describedby="precoDescontoProduto" placeholder="Preço Desconto">
        </div>
        <div class="categoria">
          <h2>Categoria</h2>
          <!-- Inicio da Categoria Pai -->
          <div class="categoria-pai">
            <p class="texto-categoria">Categoria Pai</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="categoriaPai" id="categoriaPai1" value="option1">
              <label class="form-check-label" for="categoriaPai1">
                Masculino
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="categoriaPai" id="categoriaPai2" value="option2">
              <label class="form-check-label" for="categoriaPai2">
                Feminino
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="categoriaPai" id="categoriaPai3" value="option3">
              <label class="form-check-label" for="categoriaPai3">
                Unissex
              </label>
            </div>
          </div>
          <!-- Fim da Categoria Pai -->
          <!-- Começo da Categoria Filho -->
          <div class="categoria-filho">
            <p class="texto-categoria">Categoria Filho</p>
            <div class="categoria-filho-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="categoriaFilho" id="categoriaFilho11" value="option1">
                <label class="form-check-label" for="categoriaFilho1">
                  Masculino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="categoriaFilho" id="categoriaFilho2" value="option2">
                <label class="form-check-label" for="categoriaFilho2">
                  Feminino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="categoriaFilho" id="categoriaFilho3" value="option3">
                <label class="form-check-label" for="categoriaFilho3">
                  Unissex
                </label>
              </div>
            </div>
          </div>
          <!-- Fim da Categoria Filho -->
        </div>
        <div class="form-group">
          <label for="preco_desconto_produto">Quantidade</label>
          <input type="text" class="form-control" id="preco_desconto_produto" aria-describedby="precoDescontoProduto" placeholder="Preço Desconto">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>

