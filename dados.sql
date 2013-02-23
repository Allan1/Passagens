-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 23/02/2013 às 00h58min
-- Versão do Servidor: 5.5.25
-- Versão do PHP: 5.3.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `projeto`
--

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'Salvador', 'BA'),
(2, 'São Paulo', 'SP');

--
-- Extraindo dados da tabela `managers_types`
--

INSERT INTO `managers_types` (`id`, `name`) VALUES
(1, 'hoteis');

--
-- Extraindo dados da tabela `managers`
--

INSERT INTO `managers` (`id`, `name`, `managers_type_id`, `link`) VALUES
(1, 'Hoteis.com', 1, 'www.hoteis.com/cidade/');

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Gerente');


--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`) VALUES
(1, 'Alonzo Church', 'admin', '59c9a45fe666b141151a27c7cc07064d3aa4b4bf', 1),
(2, 'David Hilbert', 'hilbert', '59c9a45fe666b141151a27c7cc07064d3aa4b4bf', 2);

SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
