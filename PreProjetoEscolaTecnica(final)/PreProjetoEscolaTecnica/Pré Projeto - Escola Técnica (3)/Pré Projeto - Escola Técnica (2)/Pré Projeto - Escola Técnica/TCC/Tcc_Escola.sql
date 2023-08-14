Drop database tcc_escola;
CREATE DATABASE tcc_escola;
create database cadastro_cliente; 
Use cadastro_cliente; 

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(200)
);
INSERT INTO clientes (nome, email, telefone, endereco)
VALUES ('João', 'joao@email.com', '123456789', 'Rua A');
SELECT * FROM clientes;
CREATE TABLE carrinho_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    produto_id INT,
    quantidade INT,
    preco DECIMAL(10, 2),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);
INSERT INTO carrinho_itens (cliente_id, produto_id, quantidade, preco)
VALUES (1, 1, 2, 19.99);
SELECT * FROM carrinho_itens WHERE cliente_id = 1;
