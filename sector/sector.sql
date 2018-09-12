-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Set-2018 às 16:50
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sector`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `tipo` enum('usuario','adm','cliente','setor') NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(254) NOT NULL,
  `logado` datetime NOT NULL,
  `setor` varchar(50) NOT NULL,
  `telefone` int(20) NOT NULL,
  `cpf` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(50) NOT NULL,
  `cep` int(8) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `tipo`, `nome`, `sobrenome`, `email`, `senha`, `logado`, `setor`, `telefone`, `cpf`, `cliente`, `cnpj`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `ativo`) VALUES
(1, 'adm', 'administrador', '', 'sector@sector.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '0000-00-00 00:00:00', '', 0, 0, '', 0, '', 0, '', '', '', 0, 0),
(6, 'cliente', '', '', 'sector@sector.com', '', '0000-00-00 00:00:00', '', 123456798, 0, 'Padaria', 123456, 'endereÃ§o do cliente', 222, 'bairro do cliente', 'cidade do cliente', 'estado do cliente', 11000000, 0),
(7, 'cliente', '', '', 'sector@sector.com', '', '0000-00-00 00:00:00', '', 123456798, 0, 'Mercado', 123456, 'endereÃ§o do cliente', 444, 'bairro do cliente', 'cidade do cliente', 'estado do cliente', 11000000, 0),
(8, 'cliente', '', '', 'sector@sector.com', '', '0000-00-00 00:00:00', '', 123456798, 0, 'Empresa qualquer', 123456, 'endereÃ§o do cliente', 222, 'bairro do cliente', 'cidade do cliente', 'estado do cliente', 11000000, 1),
(9, 'cliente', '', '', 'sector@sector.com', '', '0000-00-00 00:00:00', '', 123456798, 0, 'Outra empresa', 123456, 'endereÃ§o do cliente', 222, 'bairro do cliente', 'cidade do cliente', 'estado do cliente', 11000000, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime NOT NULL,
  `situacao` enum('recebido','finalizado','retornado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
