/* ignore error */
CREATE TABLE PRODUTOS (
  sku INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(200) NOT NULL,
  marca VARCHAR(200) NOT NULL,
  preco_original FLOAT(2,2),
  preco_desconto FLOAT(2,2),
  arvore_categoria VARCHAR(200),
  quantidade INT,
);

CREATE TABLE QUANTIDADES(
  id_quantidade INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  sku_produto INT NOT NULL,
  p INT,
  m INT,
  g INT,
  gg INT
);

CREATE TABLE CARACTERISTICAS (
  id_caracteristicas INT PRIMARY KEY AUTO_INCREMENT,
  sku INT NOT NULL,
  ???
);