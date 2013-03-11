-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de GeraÃ§Ã£o: 
-- VersÃ£o do Servidor: 5.5.27-log
-- VersÃ£o do PHP: 5.4.6

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
(1, 'Salvador', 'BA', 2),
(2, 'SÃƒÂ£o Paulo', 'SP', 5),
(3, 'Rio de Janeiro', 'RJ', 0),
(4, 'Belo Horizonte', 'MG', 2),
(5, 'Porto Alegre', 'RS', 4),
(6, 'Recife', 'PE', 0),
(7, 'Manaus', 'AM', 1),
(8, 'GoiÃƒÂ¢nia', 'GO', 0),
(9, 'BrasÃƒÂ­lia', 'DF', 1);

--
-- Extraindo dados da tabela `managers`
--

INSERT INTO `managers` (`id`, `name`, `link`, `managers_type_id`, `stars`, `reviews`) VALUES
(2, 'cptec.inpe.br', '<iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=***&w=h&c=607065&f=ffffff" height="200px" width="215px"></iframe>', 2, 0, 0),
(4, 'decolar.com', 'http://www.decolar.com/hoteis/hl/***/', 1, 5, 1),
(5, 'viajanet.com.br', 'http://passagens-aereas2.viajanet.com.br/voos-resultados?domestic=true&triptype=1&departureAirport=***&arrivalAirport=***&departureDate=*dia*/*mes*/*ano*&arrivalDate=*dia*/*mes*/*ano*&adultPassenger=1&childPassenger=0&infantPassenger=0', 3, 0, 0),
(6, 'decolar.com', 'http://www.decolar.com/shop/flights/results/roundtrip/***/***/*ano*-*mes*-*dia*/*ano*-*mes*-*dia*/1/0/0', 3, 0, 0),
(7, 'clickhoteis.com.br', 'http://www.clickhoteis.com.br/***-Brasil/Hoteis/', 1, 0, 0),
(8, 'cvc.com.br', 'http://www.cvc.com.br/travel/resultado-pacotes.aspx?SearchType=Air&Origem=***&Destino=***&Proximity=&ProximityId=0&Data=*dia*/*mes*/*ano*&RoundTrip=1&Data=*dia*/*mes*/*ano*&SomenteDireto=false', 3, 0, 0);

--
-- Extraindo dados da tabela `managers_shorts`
--

INSERT INTO `managers_shorts` (`id`, `manager_id`, `short_id`) VALUES
(1, 2, 2),
(5, 2, 4),
(6, 4, 1),
(7, 4, 5),
(8, 4, 7),
(9, 2, 6),
(10, 5, 5),
(11, 5, 7),
(12, 5, 1),
(13, 6, 1),
(14, 6, 5),
(15, 6, 7),
(16, 6, 8),
(17, 4, 8),
(18, 4, 9),
(19, 6, 9),
(20, 4, 10),
(21, 6, 10),
(22, 4, 11),
(23, 6, 11),
(24, 4, 12),
(25, 6, 12),
(26, 4, 13),
(27, 6, 13),
(28, 2, 14),
(29, 2, 15),
(30, 2, 16),
(31, 2, 17),
(32, 2, 18),
(33, 2, 19),
(34, 5, 13),
(35, 5, 8),
(36, 5, 9),
(37, 5, 11),
(38, 5, 10),
(39, 7, 20),
(40, 7, 21),
(41, 7, 22),
(42, 7, 23),
(43, 7, 24),
(44, 7, 25),
(45, 7, 26),
(46, 7, 27),
(47, 7, 28),
(48, 8, 1),
(49, 8, 5),
(50, 8, 7),
(51, 8, 13),
(52, 8, 12),
(53, 8, 11),
(54, 8, 10),
(55, 8, 9),
(56, 8, 8);

--
-- Extraindo dados da tabela `managers_types`
--

INSERT INTO `managers_types` (`id`, `name`) VALUES
(2, 'clima'),
(1, 'hoteis'),
(4, 'noticias'),
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
(7, 'rio', 3),
(8, 'BSB', 9),
(9, 'GYN', 8),
(10, 'MAO', 7),
(11, 'REC', 6),
(12, 'POA', 5),
(13, 'BHZ', 4),
(14, '222', 4),
(15, '237', 5),
(16, '239', 6),
(17, '234', 7),
(18, '230', 8),
(19, '224', 9),
(20, 'Salvador', 1),
(21, 'Sao-Paulo', 2),
(22, 'Rio-de-Janeiro', 3),
(23, 'Belo-Horizonte', 4),
(24, 'Porto-Alegre', 5),
(25, 'Recife', 6),
(26, 'Manaus', 7),
(27, 'Goiania', 8),
(28, 'Brasilia', 9);

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
