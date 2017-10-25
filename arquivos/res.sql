
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(14) NOT NULL,
  `cel` varchar(14) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InooDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO res.cliente(id, nome, email, tel, cel, obs) VALUES
 (1, 'Pedro Kretikouski Roque Júnior', 'juniorkart@hotmail.com', '(16)3361-4966', '(16)8227-5776', 'teste1');

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `sgn` int(4) NOT NULL,
  `valor` int(12) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `casa` int(4) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `residencial` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `chave` varchar(3) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `idimovel` varchar(4) NOT NULL,
  `obs` text NOT NULL,
  `idcliente` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InooDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tpimovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imovel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InooDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

INSERT INTO res.imoveis(id, sgn, valor, endereco, casa, complemento, residencial, bairro, cidade, uf, cep, chave, placa, idimovel, obs, idcliente, img) VALUES
 (1, '0001', '1000,00', 'Rua dos Inconfidentes', '431', '', '' ,'Pq Arnold Schimid', 'São Carlos', 'SP', '13566-581', 'sim', 'não', '1', 'teste1', '4', '');

INSERT INTO `tpimovel` (`id`, `imovel`) VALUES
(1, 'Apartamento'),
(2, 'Barracão'),
(3, 'Sala'),
(4, 'Salão'),
(5, 'Casa'),
(6, 'Terreno'),
(7, 'Galpão'),
(8, 'Kitnet');

