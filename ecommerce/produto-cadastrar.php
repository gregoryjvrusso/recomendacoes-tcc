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
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Produto">
        </div>
        <div class="form-group">
          <label for="marca">Marca</label>
          <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca Produto">
        </div>
        <div class="form-group">
          <label for="preco_original">Preço Original</label>
          <input type="text" class="form-control" id="preco_original" name="preco_original" placeholder="Preço Original">
        </div>
        <div class="form-group">
          <label for="preco_desconto">Preço Desconto</label>
          <input type="text" class="form-control" id="preco_desconto" name="preco_desconto" placeholder="Preço Desconto">
        </div>
        <div class="fotos">
          <div class="form-group">
            <label for="foto1">Foto 1</label>
            <input type="file" class="form-control-file" id="foto1" name="foto1">
          </div>
          <div class="form-group">
            <label for="foto2">Foto 2</label>
            <input type="file" class="form-control-file" id="foto2" name="foto2">
          </div>
          <div class="form-group">
            <label for="foto3">Foto 3</label>
            <input type="file" class="form-control-file" id="foto3" name="foto3">
          </div>
        </div>
        <div class="categoria">
          <h2>Categoria</h2>
          <!-- Inicio da Categoria Pai -->
          <div class="categoria-pai">
            <p class="texto-categoria">Categoria Pai</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="arvore_categoria_pai" id="arvore_categoria_pai1" value="masculino">
              <label class="form-check-label" for="arvore_categoria_pai1">
                Masculino
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="arvore_categoria_pai" id="arvore_categoria_pai2" value="feminino">
              <label class="form-check-label" for="arvore_categoria_pai2">
                Feminino
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="arvore_categoria_pai" id="arvore_categoria_pai3" value="unissex">
              <label class="form-check-label" for="arvore_categoria_pai3">
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
                <input class="form-check-input" type="radio" name="arvore_categoria_filho" id="arvore_categoria_filho1" value="masculino">
                <label class="form-check-label" for="arvore_categoria_filho1">
                  Masculino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="arvore_categoria_filho" id="arvore_categoria_filho2" value="feminino">
                <label class="form-check-label" for="arvore_categoria_filho2">
                  Feminino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="arvore_categoria_filho" id="arvore_categoria_filho3" value="unissex">
                <label class="form-check-label" for="arvore_categoria_filho3">
                  Unissex
                </label>
              </div>
            </div>
          </div>
          <!-- Fim da Categoria Filho -->
        </div>
        <div class="form-group">
          <h2>Quantidade</h2>
          <!-- Tratamento de Quantidade -->
          <label for="preco_desconto_produto">P</label>
          <input type="text" class="form-control" id="quantidade_p" name="quantidade_p" placeholder="Quantidade">

          <label for="preco_desconto_produto">M</label>
          <input type="text" class="form-control" id="quantidade_m" name="quantidade_m" placeholder="Quantidade">

          <label for="preco_desconto_produto">G</label>
          <input type="text" class="form-control" id="quantidade_g" name="quantidade_g" placeholder="Quantidade">

          <label for="preco_desconto_produto">GG</label>
          <input type="text" class="form-control" id="quantidade_gg" name="quantidade_gg" placeholder="Quantidade">

          <label for="preco_desconto_produto">Unico</label>
          <input type="text" class="form-control" id="quantidade_unico" name="quantidade_unico" placeholder="Quantidade">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>

