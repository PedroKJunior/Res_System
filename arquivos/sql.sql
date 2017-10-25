-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 03/06/2013 às 21h26min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `login`
--
CREATE DATABASE `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--
-- Banco de Dados: `res`
--
CREATE DATABASE `res` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `res`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(14) NOT NULL,
  `cel` varchar(14) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `tel`, `cel`, `obs`) VALUES
(1, 'Pedro Kretikouski Roque Júnior', 'juniorkart@hotmail.com', '(16)3361-4966', '(16)8227-5776', 'teste1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id_imovel` int(4) NOT NULL AUTO_INCREMENT,
  `sgn` int(4) NOT NULL,
  `valor` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `n_casa` int(7) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `residencial` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `chave` varchar(3) NOT NULL,
  `placa` varchar(3) NOT NULL,
  `id_tipo` int(4) NOT NULL,
  `obs` text NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id_imovel`, `sgn`, `valor`, `endereco`, `n_casa`, `complemento`, `residencial`, `bairro`, `cidade`, `uf`, `cep`, `chave`, `placa`, `id_tipo`, `obs`, `id_cliente`, `img`) VALUES
(1, 1, '1000.', 'AV TEIXEIRA DE BARROS', 2013, '', '', 'Pq Arnold Schim', 'SÃO CARLOS', 'SP', '13574033', 'n', 'sim', 1, 'teste', 0, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpimovel`
--

CREATE TABLE IF NOT EXISTS `tpimovel` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tpimovel`
--

INSERT INTO `tpimovel` (`id_tipo`, `tipo`) VALUES
(1, 'Apartamento'),
(2, 'Barracão'),
(3, 'Sala'),
(4, 'Salão'),
(5, 'Casa'),
(6, 'Terreno'),
(7, 'Galpão'),
(8, 'Kitnet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
