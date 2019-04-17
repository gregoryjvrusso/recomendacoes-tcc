/* ignore erros */
CREATE TABLE PRODUTOS (
  sku INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(200) NOT NULL,
  marca VARCHAR(200) NOT NULL,
  preco_original DECIMAL(10,2),
  preco_desconto DECIMAL(10,2),
  arvore_categoria VARCHAR(200),
  quantidade INT
);

CREATE TABLE FOTOS(
  id_fotos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  sku_produto INT NOT NULL,
  url_foto VARCHAR(200) NOT NULL
);

CREATE TABLE QUANTIDADES(
  id_quantidade INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  sku_produto INT NOT NULL,
  p INT,
  m INT,
  g INT,
  gg INT,
  unico INT
);

CREATE TABLE CARACTERISTICAS (
  id_caracteristicas INT PRIMARY KEY AUTO_INCREMENT,
  sku INT NOT NULL,
  ???
);

CREATE TABLE HANDCRAFTS (
  id_handcrafts INT PRIMARY KEY AUTO_INCREMENT,
  sku INT NOT NULL
);

CREATE TABLE USUARIOS (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nome varchar(255) NOT NULL,
  data_nascimento date NOT NULL,
  sexo char NOT NULL,
  email varchar(500) NOT NULL,
  endereco varchar(255) NOT NULL,
  bairro varchar(255) NOT NULL,
  cidade varchar(255) NOT NULL,
  estado varchar(255) NOT NULL,
  pais varchar(255) NOT NULL,
  cep varchar(9) NOT NULL 
);


