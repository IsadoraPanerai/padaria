CREATE DATABASE padaria;
USE padaria;

CREATE TABLE Comprador (
    id_comprador INTEGER PRIMARY KEY AUTO_INCREMENT,
    telefone_comprador VARCHAR(20),
    endereco_comprador VARCHAR(200),
    nome_comprador VARCHAR(200)
);

CREATE TABLE venda (
    id_venda INTEGER PRIMARY KEY AUTO_INCREMENT,
    data_venda DATE,
    id_comprador INTEGER,
    itens_venda VARCHAR (200),
    fk_Comprador_id_comprador INTEGER
);

CREATE TABLE item_venda (
    id_itemVenda INTEGER PRIMARY KEY AUTO_INCREMENT,
    quantidade INTEGER,
    subtotal FLOAT,
    fk_venda_id_venda INTEGER,
    fk_Produto_id_produto INTEGER
);

CREATE TABLE Produto (
    id_produto INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_produto VARCHAR(200),
    preco_produto FLOAT,
    descricao_produto VARCHAR(200)
);
 
ALTER TABLE venda ADD CONSTRAINT FK_venda_2
    FOREIGN KEY (fk_Comprador_id_comprador)
    REFERENCES Comprador (id_comprador)
    ON DELETE RESTRICT;
 
ALTER TABLE item_venda ADD CONSTRAINT FK_item_venda_2
    FOREIGN KEY (fk_venda_id_venda)
    REFERENCES venda (id_venda)
    ON DELETE RESTRICT;
 
ALTER TABLE item_venda ADD CONSTRAINT FK_item_venda_3
    FOREIGN KEY (fk_Produto_id_produto)
    REFERENCES Produto (id_produto)
    ON DELETE RESTRICT;