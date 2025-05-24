-- CRIA O BANCO DE DADOS
CREATE DATABASE IF NOT EXISTS venda;
USE venda;

-- CRIA A TABELA DE PRODUTOS
CREATE TABLE IF NOT EXISTS produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT 1,
    dataDeCadastro DATE NOT NULL,
    dataDeValidade DATE
);
-- SQL INJECTION
-- 'Teste2', 0, 0, '2025-01-01', '2025-12-12'); DROP TABLE produtos --

INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
('Teste2', 0, 0, '2025-01-01', '2025-12-12');