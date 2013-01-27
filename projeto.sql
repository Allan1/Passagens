-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'Salvador', 'BA'),
(2, 'Feira-de-Santana', 'BA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `managers`
--

INSERT INTO `managers` (`id`, `name`, `type`, `link`) VALUES
(1, 'Hoteis.com', 'hoteis', 'www.hoteis.com/cidade/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `short`
--

CREATE TABLE IF NOT EXISTS `short` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbreviation` varchar(45) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`city_id`),
  KEY `fk_short_cities_idx` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(200) NOT NULL,
  `role` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `fullName`, `role`, `username`, `password`) VALUES
(3, 'Alonzo Church', 'admin', 'admin', '092cb2e7b0f8be80de60d221bee7592847c3a998'),
(6, 'David Hilbert', 'admin', 'hilbert', '167d8d973d5a5ce1f7322c78fcb0ecbd192a50ac'),
(13, 'Alan Turing', 'admin', 'turing', '71801afb208a8617bedacf49e4161bb302bc4d80');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `short`
--
ALTER TABLE `short`
  ADD CONSTRAINT `fk_short_cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
