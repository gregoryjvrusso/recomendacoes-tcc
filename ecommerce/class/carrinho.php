<?php
namespace classes; 
use classes\Produto;

class Carrinho
{
    private $id;
    public $produto;
    private $tamanho;

    function setId($id){
        $this->id = $id;
    }
    function getId(){
        return $this->id;
    }
    function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }
    function getTamanho(){
        return $this->tamanho;
    }
    function setProduto(Produto $produto){
        $this->produto = $produto;
    }
    function getProduto(){
        return $this->produto;
    }
}