CREATE DATABASE Biblioteca;

USE Biblioteca;

CREATE TABLE clientes (
  id_cliente INT NOT NULL AUTO_INCREMENT,
  CPF VARCHAR(11) NOT NULL,
  nome_cliente VARCHAR(255) NOT NULL,
  dt_nasc DATE NOT NULL,
  id_endereco INT NOT NULL,
  email VARCHAR(255) NOT NULL,
  telefone VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_cliente)
);

CREATE TABLE endereco (
  id_endereco INT NOT NULL AUTO_INCREMENT,
  rua VARCHAR(255) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  cidade VARCHAR(255) NOT NULL,
  id_estado VARCHAR(2) NOT NULL,
  pais VARCHAR(50) NOT NULL,
  CEP VARCHAR(10) NOT NULL,
  PRIMARY KEY (id_endereco),
  FOREIGN KEY (id_estado) REFERENCES estado (id_estado)
);

CREATE TABLE Livros (
  id_livro INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  genero VARCHAR(255) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  autor VARCHAR(255) NOT NULL,
  ano INT NOT NULL,
  ISBN VARCHAR(255) NOT NULL,
  status_livro VARCHAR(255) NOT NULL,
  qnt_livros INT NOT NULL,
  PRIMARY KEY (id_livro)
);

CREATE TABLE Locacoes (
  id_locacao INT NOT NULL AUTO_INCREMENT,
  id_cliente INT NOT NULL,
  id_livro INT NOT NULL,
  data_locacao DATE NOT NULL,
  data_devolucao DATE NOT NULL,
  PRIMARY KEY (id_locacao),
  FOREIGN KEY (id_cliente) REFERENCES Clientes (id_cliente),
  FOREIGN KEY (id_livro) REFERENCES Livros (id_livro)
);

CREATE TABLE estados (
  id_estado INT NOT NULL,
  sigla VARCHAR(2) NOT NULL,
  nome VARCHAR(255) NOT NULL,
  regiao VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_estado)
);