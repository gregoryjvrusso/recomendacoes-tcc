<?php
class Usuario{
	private $id;
	private $login;
	private $password;
	private $nome;
	private $data_nascimento;
	private $sexo;
	private $email;
	private $endereco;
	private $bairro;
	private $cidade;
	private $estado;
	private $pais;
	private $cep;

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getLogin(){
		return $this->login;
	}
  public function setLogin($login){
    $this->login = $login;
	}
	public function getPassword(){
		return $this->password;
	}
  public function setPassword($password){
    $this->password = $password;
	}
	public function getNome(){
		return $this->nome;
	}
  public function setNome($nome){
    $this->nome = $nome;
	}
	public function getDataNascimento(){
		$aux1 = explode("-", $this->data_nascimento);
		$dataD = $aux1[2]; 
		$dataM = $aux1[1]; 
		return $dataD . "/" . $dataM;
	}
	public function setDataNascimento($data_nascimento){
		$aux = explode("/", $data_nascimento);
		$data_nascimento = $aux[2] . "-". $aux[1] . "-" . $aux[0];
		$this->data_nascimento = $data_nascimento;
	}
	public function getSexo(){
		return $this->sexo;
	}
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	public function getCidade(){
		return $this->cidade;
  }
  public function setCidade($cidade){
    $this->cidade = $cidade;
	}
	public function getEstado(){
		return $this->estado;
  }
  public function setEstado($estado){
    $this->estado = $estado;
	}
	public function getPais(){
		return $this->pais;
  }
  public function setPais($pais){
    $this->pais = $pais;
	}
	public function getCep(){
		return $this->cep;
  }
  public function setCep($cep){
    $this->cep = $cep;
	}
}
