<?php
class Produto
{
	private $sku;
	private $nome;
	private $marca;
	private $preco_original;
	private $preco_desconto;
	private $arvore_categoria;
	private $quantidade;

	public function getSku()
	{
		return $this->sku;
	}
	public function setSku($sku)
	{
		$this->sku = $sku;
	}
	public function getNome()
	{
		return $this->nome;
	}
  public function setNome($nome)
  {
    $this->nome = $nome;
  }
	public function getMarca()
	{
		return $this->marca;
	}
	public function setMarca($marca)
	{
		$this->marca = $marca;
	}
	public function getPrecoOriginal()
	{
		return $this->preco_original;
	}
	public function setPrecoOriginal($preco)
	{
		$this->preco_original = $preco;
	}
	public function getPrecoDesconto()
	{
		return $this->preco_desconto;
	}
	public function setPrecoDesconto($preco)
	{
		$this->preco_desconto = $preco;
	}
	public function getArvoreCategoria()
	{
		return $this->arvore_categoria;
	}
	public function setArvoreCategoria($arvore_categoria_pai, $arvore_categoria_filha)
	{
		$this->arvore_categoria = $arvore_categoria_pai . '|' . $arvore_categoria_filha;
	}
	public function getQuantidade()
	{
		return $this->quantidade;
	}
	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}
}
