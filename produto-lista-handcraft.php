<?php include("php/header.php");
require_once("banco-produto.php");

$produtos = listaProduto($conexao);

//pega os skus de todos os produtos escolhidos para serem recomendados
$handCrafts = listaHandCraft($conexao);


//reordena o array produtos antes 
//de enviá-lo ao front a fim de que 
//os produtos sejam exibidos na ordem de recomendação correta
$temporario = '';
for ($i = 0; $i < sizeof($produtos); $i++) {
  $produto = $produtos[$i];
  foreach ($handCrafts as $handcraft) :
    if ($produto->getsku() == $handcraft) {
      //elimina o elemento recomendado
      unset($produtos[$i]);
      //'reconta' o indice
      array_values($produtos);
      //adiciona o elemento recomendado no top
      array_unshift($produtos, $produto);
    }
  endforeach;
}

$json = array();
foreach ($produtos as $produto) :
  array_push($json, array(
    "sku" => $produto->getSku(),
    "nome" => $produto->getNome(),
    "marca" => $produto->getMarca(),
    "preco_original" => $produto->getPrecoOriginal(),
    "preco_desconto" => $produto->getPrecoDesconto(),
    "arvore_categoria" => $produto->getArvoreCategoria(),
    "genero" => $produto->getGenero()
  ));
endforeach;
$codificado = json_encode($json);
file_put_contents('json-lista-produtos.json', $codificado);
?>
<head>  
  <link rel="stylesheet" type="text/css" href="./css/estilo-catalogo.css">
</head>
<div class="container content">
  <div class="row">
    <div class="col-md-offset-2 col-md-10">
      <h1>Produtos</h1>
      <div class="row">
        <?php foreach ($produtos as $produto) : ?>
          <div class="col-md-4 col-sm-12">
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
<?php include("php/footer.php"); ?>