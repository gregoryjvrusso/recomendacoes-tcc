<?php include("php/header.php"); 
require_once("banco-produto.php");
require_once("banco-nota.php");

$sku = $_GET['sku'];
$produto = buscaProduto($conexao, $sku);
$nota = mediaNotaProduto($conexao, $_GET['sku']);
$tipoNota = "";
if($nota > 0){
  $tipoNota = 'media';
}
if(verificaUsuarioMenu()){
  // Verifico se o usuário já votou
  // Caso já tenha votado retorna a nota dele
  // Caso não tenha votado retorna a média de notas
  $notaUsuario = buscaNotaCliente($conexao, $sku, $_SESSION{'usuario_id'});
  if($notaUsuario > 0){
    $tipoNota = "cliente";
    $nota = $notaUsuario;
  }
}

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
  .estrelas input[type=radio] {
    display: none;
  }
  .estrelas label i.fa:before {
    content:'\f005';
    color: #FC0;
  }
  .estrelas input[type=radio]:checked ~ label i.fa:before {
    color: #CCC;
  }
  .estrelas.media label i.fa:before {
    content:'\f005';
    color: #8b99e5;
  }

  #botao-nota{
    opacity: 0;
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
      <!-- Notas -->
      <div class="estrelas">
        <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
        <label for="cm_star-1" class="star"><i class="fa"></i></label>
        <input type="radio" id="cm_star-1" name="fb" value="1"/>
        <label for="cm_star-2" class="star"><i class="fa"></i></label>
        <input type="radio" id="cm_star-2" name="fb" value="2"/>
        <label for="cm_star-3" class="star"><i class="fa"></i></label>
        <input type="radio" id="cm_star-3" name="fb" value="3"/>
        <label for="cm_star-4" class="star"><i class="fa"></i></label>
        <input type="radio" id="cm_star-4" name="fb" value="4"/>
        <label for="cm_star-5" class="star"><i class="fa"></i></label>
        <input type="radio" id="cm_star-5" name="fb" value="5"/>
      </div>
      <form action="nota-adicionar.php" method="post">
        <input type="hidden" id="tipo-nota" name="tipo-nota" value="<?= $tipoNota ?>">
        <input type="hidden" id="sku" name="sku" value="<?= $produto->getSku() ?>">
        <input type="hidden" id="nota" name="nota" value="<?= $nota ?>">
        <button type="submit" id="botao-nota"></button>
      </form>
      <!-- Fim das Notas -->
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
<script>
  var inputNota = document.querySelector('#nota');
  var inputTipoNota = document.querySelector('#tipo-nota');

  if(inputNota.getAttribute('value') > 0){
    console.log(inputTipoNota);
    if(inputTipoNota.getAttribute('value') == 'media'){
      document.querySelector('.estrelas').classList.add('media');
    }
    document.querySelector('.star[for=cm_star-' + inputNota.getAttribute('value') + ']').click();
  }
  var estrela = document.querySelectorAll('.star');
  estrela.forEach(function(item){
    item.onclick = function(){
      let id = item.getAttribute('for');
      let inputId = document.querySelector('#' + id);
      document.querySelector('#nota').setAttribute('value', inputId.getAttribute('value'));
      document.querySelector('#botao-nota').click();
    };
  });
</script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php include("php/footer.php"); ?>

