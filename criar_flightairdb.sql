-- Recriar a Base de Dados
DROP DATABASE IF EXISTS `flightairdb`;
CREATE DATABASE `flightairdb`;

-- Selecionar a Base de Dados
USE `flightairdb`;

-- Criar a tabela "users"
CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(80) NOT NULL,
	`morada` VARCHAR(100) NOT NULL,
	`email` VARCHAR(60) NOT NULL,
	`nif` VARCHAR(9) NOT NULL,
	`telefone` VARCHAR(9) NOT NULL,
	`username` VARCHAR(50) NOT NULL,
	`password` VARCHAR(30) NOT NULL,
	`role` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "aviao"
CREATE TABLE `avioes` (
	`idaviao` INT NOT NULL AUTO_INCREMENT,
    `referencia` VARCHAR(9) NOT NULL,
    `lotacao` INT NOT NULL,
    `tipoaviao` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`idaviao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "aeroporto"
CREATE TABLE `aeroportos` (
	`idaeroporto` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(80) NOT NULL,
    `localizacao` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`idaeroporto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "voo"
CREATE TABLE `voos` (
	`idvoo` INT NOT NULL AUTO_INCREMENT,
    `precovenda` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`idvoo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "passagemvenda"
CREATE TABLE `passagemvendas` (
	`idpassagemvenda` INT NOT NULL AUTO_INCREMENT,
    `idvooida` INT NOT NULL,
    `idvoovolta` INT NOT NULL,
    `idutilizador` INT NOT NULL,
    `precopago` VARCHAR(10) NOT NULL,
    `datacompra` DATE NOT NULL,
    `registocheckin` BOOL NOT NULL,
    PRIMARY KEY (`idpassagemvenda`),
    FOREIGN KEY (`idvooida`) REFERENCES `voos`(`idvoo`),
    FOREIGN KEY (`idvoovolta`) REFERENCES `voos`(`idvoo`),
    FOREIGN KEY (`idutilizador`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "escala"
CREATE TABLE `escalas` (
	`idescala` INT NOT NULL AUTO_INCREMENT,
    `idvoo` INT NOT NULL,
    `idaeroportoorigem` INT NOT NULL,
    `idaeroportodestino` INT NOT NULL, 
    `dataorigem` DATE NOT NULL,
    `horaorigem` TIME NOT NULL,
    `datadestino` DATE NOT NULL,
    `horadestino` TIME NOT NULL,
    `distancia` VARCHAR(10) NOT NULL,
	`ordemescala` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`idescala`),
    FOREIGN KEY (`idvoo`) REFERENCES `voos`(`idvoo`),
    FOREIGN KEY (`idaeroportodestino`) REFERENCES `aeroportos`(`idaeroporto`),
    FOREIGN KEY (`idaeroportoorigem`) REFERENCES `aeroportos`(`idaeroporto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Criar a tabela "escalaaviao"
CREATE TABLE `escalasavioes` (
	`idescalaaviao` INT NOT NULL AUTO_INCREMENT,
    `idescala` INT NOT NULL,
    `idaviao` INT NOT NULL,
    `numeropassageiroscheckin` VARCHAR(10) NOT NULL,
    `numerobilhetesvendidos` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`idescalaaviao`),
    FOREIGN KEY (`idescala`) REFERENCES `escalas`(`idescala`),
    FOREIGN KEY (`idaviao`) REFERENCES `avioes`(`idaviao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Inserir dados de teste na tabela "users" */

-- Admin
INSERT INTO `flightairdb`.`users`
(`nome`, `morada`, `email`, `nif`, `telefone`, `username`, `password`, `role`)
VALUES
('adminTeste', 'moradaTeste', 'email@teste.com', '123456789', '987654321', 'admin', 'admin', 'admin');

-- Gestor de Voo
INSERT INTO `flightairdb`.`users`
(`nome`, `morada`, `email`, `nif`, `telefone`, `username`, `password`, `role`)
VALUES
('gestorVooTeste', 'moradaTeste', 'email@teste.com', '123456789', '987654321', 'gestorvoo', 'gestorvoo', 'gestorvoo');

-- Operador de Check-In
INSERT INTO `flightairdb`.`users`
(`nome`, `morada`, `email`, `nif`, `telefone`, `username`, `password`, `role`)
VALUES
('opCheckinTeste', 'moradaTeste', 'email@teste.com', '123456789', '987654321', 'opcheckin', 'opcheckin', 'opcheckin');

-- Passageiro
INSERT INTO `flightairdb`.`users`
(`nome`, `morada`, `email`, `nif`, `telefone`, `username`, `password`, `role`)
VALUES
('passageiroTeste', 'moradaTeste', 'email@teste.com', '123456789', '987654321', 'passageiro', 'passageiro', 'passageiro');


