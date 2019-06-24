<?php include("php/header.php");
require_once("banco-produto.php");
require_once("banco-nota.php");

$produtos = listaProduto($conexao);

$json = array();
array_push($json, array(
  "id" => $_SESSION['usuario_id'],
));
$codificado = json_encode($json);
file_put_contents('json-id.json', $codificado);

//RECOMENDAÇÃO
$notas = listaNota($conexao);
$jsonRecomendacao = array();
foreach ($notas as $nota) :
  array_push($jsonRecomendacao, array(
    "id_usuario" => $nota['id_cliente'],
    "sku" => $nota['sku'],
    "nota" => $nota['nota']
  ));
endforeach;
$codificadoRecomendado = json_encode($jsonRecomendacao);
file_put_contents('json-lista-produtos-recomendado.json', $codificadoRecomendado);
//Recomendação - Continua no JS
?>

<head>  
  <link rel="stylesheet" type="text/css" href="./css/estilo-catalogo.css">
</head>
<div class="container content">
  <div class="row">
    <div class="col-md-offset-2 col-md-10">
      <h1>Produtos</h1>
      <div class="row" id="produto-lista">
        <?php foreach ($produtos as $produto) : ?>
          <div class="col-md-4 col-sm-12 produto" id="id-<?= $produto->getSku() ?>">
            <a href="produto-detalhes.php?sku=<?= $produto->getSku() ?>">
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
<script src="./js/script-catalogo.js"></script>
<script>
(function(){
  var usuario = getIdUsuario();
  var dataset = getRequest();
  var correlacaoPorPessoa = function (dataset,u1,u2){
    var existeU1U2 = {};
    
    for (item in dataset[u1]){
      if (item in dataset[u2]){
        existeU1U2[item] = 1
      }
    }
    
    var numeroProdutos = len(existeU1U2);
    if(numeroProdutos == 0) return 0;
    //store the sum and the square sum of both p1 and p2
    //store the product of both
    var somaU1 = 0,
      somaU2 = 0,
      somaU1Sq=0,
      somaU2Sq=0,
      produtoU1U2 = 0
      
    //calculate the sum and square sum of each data point
    //and also the product of both point
    for(var sku in existeU1U2){
      somaU1 += dataset[u1][sku]
      somaU2 += dataset[u2][sku]

      somaU1Sq += Math.pow(dataset[u1][sku],2);
      somaU2Sq += Math.pow(dataset[u2][sku],2);
      produtoU1U2 += dataset[u1][sku]*dataset[u2][sku];
    }
    //console.log('somaU1Sq = ' + somaU1 * somaU2 / numeroProdutos)
    var numerador = produtoU1U2 - (somaU1 * somaU2 / numeroProdutos);
    //console.log(somaU1 * somaU2 / numeroProdutos)
    var st1 = somaU1Sq - (Math.pow(somaU1,2)/numeroProdutos);
    var st2 = somaU2Sq - (Math.pow(somaU2,2)/numeroProdutos);
    //console.log('st1 = ' + Math.pow(somaU1,2) + ' e st2 = ' + somaU2)
    var denominador = Math.sqrt(st1*st2);
    //console.log('denominador = ' + st1 * st2)
    if(denominador == 0) return 0;
    else {
      var val = numerador / denominador;
      return val;
    }    
  }
  var len  = function(obj){
    var len=0;
    for(var i in obj){
      len++
    }
    return len;
  }
  var motorRecomendacao = function (dataset, usuario, correlacaoPorPessoa) {
    var totais = {
      setDefault: function (propriedades, valor) {
        if (!this[propriedades]) {
          this[propriedades] = 0
        }
        this[propriedades] += valor
      }
    },
    simsum = {
      setDefault: function (propriedades, valor) {
        if (!this[propriedades]) {
          this[propriedades] = 0
        }
        this[propriedades] += valor
      }
    },
    rank_lst = [];

    for (var outro in dataset) {
      if (outro === usuario) continue
      var similar = correlacaoPorPessoa(dataset, usuario, outro)  

      if (similar <= 0) continue
      for (var item in dataset[outro]) {
        if (!(item in dataset[usuario]) || (dataset[usuario][item] == 0)) {
          totais.setDefault(item, dataset[outro][item] * similar)
          simsum.setDefault(item, similar)
        }
      }
    }

    for (var item in totais) {
      if (typeof totais[item] != "function") {
        var val = totais[item] / simsum[item];
        rank_lst.push({ val: val, itens: item });
      }
    }
    rank_lst.sort(function (a, b) {
      return b.val < a.val ? -1 : b.val > a.val ?
        1 : b.val >= a.val ? 0 : NaN;
    });
    var recomendados = [];
    for (var i in rank_lst) {
      recomendados.push(rank_lst[i].itens);
    }
    return [rank_lst, recomendados];
  }
  console.log(dataset)
  var skuProduto = motorRecomendacao(dataset, usuario, correlacaoPorPessoa)
  reordenarProduto(skuProduto)
  console.log(skuProduto)
})()

function getIdUsuario(){
  let request = new XMLHttpRequest()

  request.open("GET", 'json-id.json', false)
  request.send(null)
  let sku
  if (request.status === 200) {
    sku = JSON.parse(request.responseText)
  }
  return sku[0].id
}
function getRequest() {
  let request = new XMLHttpRequest()

  let product = []
  request.open("GET", 'json-lista-produtos-recomendado.json', false)
  request.send(null)
  if (request.status === 200) {
    let notasUsuarios = JSON.parse(request.responseText)
    notas = {}
    notasUsuarios.forEach(function(item){
      let sku = item.sku
      let nota = item.nota
      let id = item.id_usuario
      if(typeof notas[id] === 'undefined')
        notas[id] = {}
      notas[id][sku] = parseInt(nota)
    })
    
    return notas
  }
}

function reordenarProduto(sku){
  var elements = []
  sku[0].forEach(function(item){
    if(item.val > 3){
      let element = document.querySelector('#id-' + item.itens.toString()).cloneNode(true)
      document.querySelector('#id-' + item.itens.toString()).remove()
      elements.unshift(element)
    }
  })
  if(elements.length > 0){
    let elementBlock = document.querySelector('#produto-lista')
    elements.forEach(function(item){
      elementBlock.insertBefore(item, document.querySelectorAll('.produto')[0])
    })
  }
}
</script>
<?php include("php/footer.php"); ?>