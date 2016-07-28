-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jul-2016 às 02:11
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_pokedex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemon`
--

CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descricao` text NOT NULL,
  `altura` float NOT NULL,
  `peso` float NOT NULL,
  `habilidades` varchar(50) NOT NULL,
  `fraquezas` varchar(50) NOT NULL,
  `imagem` blob NOT NULL,
  `tipo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pokemon`
--

INSERT INTO `pokemon` (`id`, `nome`, `descricao`, `altura`, `peso`, `habilidades`, `fraquezas`, `imagem`, `tipo`) VALUES
(12, 'Bulbasaur', 'Pode ser visto cochilando sob luz solar intensa. HÃ¡ uma semente na sua parte traseira. Por absorver os raios do sol, a semente cresce progressivamente.', 0.7, 6.9, 'overgrow', 'Fogo', 0x63633362653434656131656363343838613934333865623130366134656366392e706e67, 'Grama'),
(13, 'Charmander ', 'A chama que arde na ponta da cauda Ã© uma indicaÃ§Ã£o das suas emoÃ§Ãµes. Se o PokÃ©mon fica furioso, a chama queima ferozmente.', 0.6, 8.5, 'Chama', 'Ãgua', 0x39623965316137386232363837616261393539333634353666653665386565392e706e67, 'Fogo'),
(14, 'Squirtle', 'O seu casco nÃ£o Ã© sÃ³ usado para a proteÃ§Ã£o, sua forma arredondada e as ranhuras em sua superfÃ­cie ajudar a minimizar a resistÃªncia na Ã¡gua, permitindo que este PokÃ©mon nade em altas velocidades.', 0.5, 9, 'Pulverizar Ã¡gua', 'ElÃ©trico', 0x38653135653662613561323862373939303664346163306266326465303532352e706e67, 'Ãgua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
