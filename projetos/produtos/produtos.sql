-- Cria o Banco e Tabela
CREATE DATABASE IF NOT EXISTS projeto;
USE projeto;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    ativo BOOLEAN NOT NULL,
    dataDeCadastro DATE NOT NULL,
    dataDeValidade DATE
);