CREATE DATABASE bookshelf;

USE bookshelf;

CREATE TABLE tb_users (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    surname VARCHAR(120) NOT NULL,
    username VARCHAR(120) NOT NULL UNIQUE,
    email VARCHAR (255) NOT NULL UNIQUE,
    senha VARCHAR (32) NOT NULL,
    profile_pic VARCHAR(255)
);