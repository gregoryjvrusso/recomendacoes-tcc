<?php include("php/header.php"); ?>
	
<script>
  $(function () {
    $('.carousel').carousel()
  });
</script>
<style>
  .content{
    padding-top: 20px;
    background-color: #fcfcfc;
  }
  #produto-nome {
    font-size: 30px;
  }
  #produto-preco {
    font-size: 24px;
  }
  #produto-marca {
    font-size: 14px;
  }
</style>
<div class="container-fluid content">
  <div class="row">
    <div class="col-md-6 col-sm-12">
    <!-- Carousel -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="fotos/camisa01.foto1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="fotos/camisa01.foto2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="fotos/camisa01.foto3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-md-offset-1 col-md-5 col-sm-12">
      <form action="cart-add.php" method="post">
        <input type="hidden" name="produto_sku" value="234jjgr">
        <div class="row product-information" id="product-name-container">
          <div class="col-10 col-sm-12">
            <h1 id="produto-nome">Nome do Produto</h1>
            <input type="hidden" name="produto_nome" value="Nome">
          </div>
        </div>
        <div class="row product-information" id="product-price-container">
          <div class="col-md-10 col-sm-12">
            <span id="produto-preco">R$ 99,00</span>
            <input type="hidden" name="produto_preco" value="99,00">
          </div>
        </div>
        <div class="row product-information" id="product-brand-container">
          <div class="col-md-10 col-sm-12">
            <span id="produto-marca">Marca do Produto</span>
            <input type="hidden" name="produto_marca" value="Brand" >
          </div>
        </div>
        <div class="row product-information">
          <div class="col-md-6 col-sm-12 purchase-group">
              <select class="form-control" name="produto_tamanho">
                <option>P</option>
                <option>M</option>
                <option>G</option>
                <option>GG</option>
              </select>
          </div>
          <div class="col-md-6 col-sm-12 purchase-group">
            <button class="btn btn-primary btn-purchase btn-block" type="submit">Button</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>

