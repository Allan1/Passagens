-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 24/02/2013 às 05h30min
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

INSERT INTO `cities` (`id`, `name`, `state`, `access`) VALUES
(1, 'Salvador', 'BA',0),
(2, 'São Paulo', 'SP',0),
(3, 'Rio de Janeiro', 'RJ',0);

--
-- Extraindo dados da tabela `managers`
--

INSERT INTO `managers` (`id`, `name`, `link`, `managers_type_id`) VALUES
(1, 'Hoteis.com', 'http://www.hoteis.com/cidade/***', 1),
(2, 'cptec.inpe.br', '<iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=***&w=h&c=607065&f=ffffff" height="200px" width="215px"></iframe>', 2),
(3, 'teste', 'www.teste.com/***', 1),
(4, 'decolar.com', 'http://www.decolar.com/hoteis/hl/***/', 1);

--
-- Extraindo dados da tabela `managers_shorts`
--

INSERT INTO `managers_shorts` (`id`, `manager_id`, `short_id`) VALUES
(1, 2, 2),
(2, 1, 3),
(5, 2, 4),
(6, 4, 1),
(7, 4, 5),
(8, 4, 7),
(9, 2, 6);

--
-- Extraindo dados da tabela `managers_types`
--

INSERT INTO `managers_types` (`id`, `name`) VALUES
(2, 'clima'),
(1, 'hoteis'),
(4, 'notícias'),
(3, 'passagens');

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Gerente');

--
-- Extraindo dados da tabela `shorts`
--

INSERT INTO `shorts` (`id`, `name`, `city_id`) VALUES
(1, 'SSA', 1),
(2, '242', 1),
(3, 'SP', 2),
(4, '244', 2),
(5, 'sao', 2),
(6, '241', 3),
(7, 'rio', 3);

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
