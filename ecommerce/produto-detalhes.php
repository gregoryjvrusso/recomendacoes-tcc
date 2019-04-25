<?php include("php/header.php"); 
require_once("banco-produto.php");

$sku = $_GET['sku'];
$produto = buscaProduto($conexao, $sku);
$json = array(
    "sku" => $produto->getSku(),
    "nome" => $produto->getNome(),
    "marca" => $produto->getMarca(),
    "preco_original" => $produto->getPrecoOriginal(),
    "preco_desconto" => $produto->getPrecoDesconto(),
    "arvore_categoria" => $produto->getArvoreCategoria(),
    "genero" => $produto->getGenero()
  );
$codificado = json_encode($json);
file_put_contents('json-produto.json', $codificado);
?>
<script>
  (function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', 'json-produto.json', true);
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            dataLayer = JSON.parse(xmlhttp.responseText); 
        }
      }
    };
    xmlhttp.send(null);
  })();
</script>
<style>
  #produto-nome {
    font-size: 30px;
  }
  #produto-preco {
    font-size: 24px;
  }
  #produto-marca {
    font-size: 14px;
  }
  .purchase-group{
    margin-top: 10px;
  }
</style>
<div class="container-fluid content">
  <div class="row">
    <div class="col-md-6 col-sm-12">
    <!-- Carousel -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php 
          foreach($produto->getFotos() as $foto => $value):
            if($foto == 0){ ?>
              <div class="carousel-item active">
                <img src="<?= $value ?>" class="d-block w-100" alt="...">
              </div>
            <?php }else{ ?>
              <div class="carousel-item">
                <img src="<?= $value ?>" class="d-block w-100" alt="...">
              </div>
            <?php } ?>    
          <?php endforeach; ?>
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
    <div class="col-md-offset-1 col-md-6 col-sm-12">
      <form action="carrinho-adicionar.php" method="post">
        <input type="hidden" name="produto_sku" value="<?= $produto->getSku(); ?>">
        <div class="row product-information" id="product-name-container">
          <div class="col-10 col-sm-12">
            <h1 id="produto-nome"><?= $produto->getNome(); ?></h1>
            <input type="hidden" name="produto_nome" value="Nome">
          </div>
        </div>
        <div class="row product-information" id="product-price-container">
          <div class="col-md-10 col-sm-12">
            <span id="produto-preco"><?= $produto->getPrecoOriginal(); ?></span>
            <input type="hidden" name="produto_preco" value="99,00">
          </div>
        </div>
        <div class="row product-information" id="product-brand-container">
          <div class="col-md-10 col-sm-12">
            <span id="produto-marca"><?= $produto->getMarca() ?></span>
            <input type="hidden" name="produto_marca" value="Brand" >
          </div>
        </div>
        <div class="row product-information">
          <div class="col-md-7 col-sm-12 purchase-group">
              <select class="form-control" name="produto_tamanho">
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
                <option value="GG">GG</option>
              </select>
          </div>
          <div class="col-md-7 col-sm-12 purchase-group">
            <button class="btn btn-primary btn-purchase btn-block" type="submit">Button</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>

