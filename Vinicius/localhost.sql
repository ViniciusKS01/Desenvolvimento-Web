CREATE DATABASE vinicius;

USE vinicius;

CREATE TABLE usuarios(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    senha VARCHAR(255)
);

INSERT INTO `vinicius`.`usuarios` (`id`, `email`, `senha`) VALUES ('1', 'martinsv016@gmail.com', '123');