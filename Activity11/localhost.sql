CREATE DATABASE sisacademico

USE sisacademico;

CREATE TABLE alunos (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    media DOUBLE,
    foto VARCHAR(255)
);

CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    senha VARCHAR(255),
    perfil VARCHAR(9)
);

INSERT INTO `sisacademico`.`usuarios` (`id`, `email`, `senha`, `perfil`) VALUES ('1', 'vinicius.martins@estudante.ifms.edu.br', '123456', 'Professor');
INSERT INTO `sisacademico`.`usuarios` (`id`, `email`, `senha`, `perfil`) VALUES ('2', 'martinsv016@gmail.com', '654321', 'Pedagogo');
