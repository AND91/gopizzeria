-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2020 às 17:59
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `natura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id`, `usuario`, `email`, `senha`) VALUES
(1, 'admin', 'lucas_alves_lbas@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ajustes`
--

CREATE TABLE `ajustes` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor` double NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ajustes`
--

INSERT INTO `ajustes` (`id`, `id_cliente`, `valor`, `comentario`, `data`) VALUES
(1, 4, 2, 'testando ...', '2019-03-15 15:31:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `ultima_compra` date NOT NULL,
  `ultimo_pagamento` date DEFAULT NULL,
  `saldo` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `ultima_compra`, `ultimo_pagamento`, `saldo`) VALUES
(1, 'Lucas Alves', '(11) 98308-6511', '2019-02-07', '2020-02-11', 1673.44),
(2, 'João Santos', '(16) 52516-0000', '2019-01-31', NULL, 2068.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `nome`, `cidade`, `estado`) VALUES
(1, '22.855.880/0001-89', 'Pizzaria Hot', 'Taiobeiras', 'Minas Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `produto` int(100) NOT NULL,
  `preco` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `produto`, `preco`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id`, `id_pedido`, `nome`, `valor`) VALUES
(32, 36, 'Vestido', 165),
(31, 36, 'Vestido', 169),
(30, 36, 'Vestido', 189),
(29, 36, 'Vestido', 189),
(28, 36, 'Vestido', 189),
(27, 35, '1 Short', 118),
(26, 35, '1 Short', 118),
(25, 35, '1 Calça', 90),
(24, 35, '1 Calça', 80),
(23, 35, '1 Calça', 112),
(13, 18, 'bala', 1),
(14, 19, 'chocolate', 5),
(15, 20, 'arroz', 10),
(16, 21, 'chocolate', 5),
(33, 36, 'Vestido', 179),
(34, 37, 'Vestido', 189),
(35, 37, 'Vestido', 189),
(36, 37, 'Vestido', 189),
(37, 37, 'Vestido', 169),
(38, 37, 'Vestido', 165),
(39, 37, 'Vestido', 179),
(40, 38, 'Vestido', 189),
(41, 38, 'Vestido', 189),
(42, 38, 'Vestido', 189),
(43, 38, 'Vestido', 169),
(44, 38, 'Vestido', 165),
(45, 38, 'Vestido', 179),
(46, 39, 'Vestido', 189),
(47, 39, 'Vestido', 189),
(48, 39, 'Vestido', 189),
(49, 39, 'Vestido', 169),
(50, 39, 'Vestido', 165),
(51, 39, 'Vestido', 179),
(52, 40, '1 Vestido', 100),
(53, 41, '1 Short', 80),
(54, 42, '1 Short', 10),
(55, 42, '1 Short', 10),
(56, 42, '1 Short', 10),
(57, 42, '1 Short', 10),
(58, 42, '1 Short', 10),
(59, 42, '1 Short', 10),
(60, 43, '1 Short', 100),
(61, 44, '1 Short', 110),
(62, 44, '1 Camiseta', 79),
(63, 45, '1 Short', 100),
(64, 45, '1 Calça', 50),
(65, 46, '1 Vestido', 100),
(66, 47, '1 Vestido', 100),
(67, 48, '1 Vestido', 100),
(68, 50, 'Blusa', 1),
(69, 50, 'Calça', 2),
(70, 50, 'Camiseta', 3),
(71, 50, 'Capri', 4),
(72, 50, 'Cueca', 5),
(73, 50, 'Jardineira', 6),
(74, 50, 'Macaquinho', 7),
(75, 50, 'Meia', 8),
(76, 50, 'Vestido', 9),
(77, 51, 'Blusa', 100),
(78, 52, 'Blusa', 100),
(79, 53, 'Blusa', 100),
(80, 53, 'Blusa', 100),
(81, 54, 'Blusa', 100),
(82, 54, 'Blusa', 100),
(83, 55, 'Blusa', 123),
(84, 57, 'Blusa', 80),
(85, 58, 'Blusa', 100),
(86, 59, 'Blusa', 200),
(87, 60, 'Blusa', 100),
(88, 61, 'Calça', 100),
(89, 62, 'Calça', 100),
(90, 63, 'Calça', 100),
(91, 64, 'Camiseta', 50),
(92, 65, 'Blusa', 33.44),
(93, 66, 'Calça', 50),
(94, 67, 'Cueca', 32),
(95, 68, 'Cueca', 32),
(96, 69, 'Calça', 120),
(97, 70, 'Blusa', 100),
(98, 71, 'Blusa', 100),
(99, 71, 'Calça', 120),
(100, 71, 'Short', 80),
(101, 71, 'Camiseta', 60),
(102, 72, 'Restante', 89),
(103, 73, 'Camiseta', 50),
(104, 74, 'Restante', 136),
(105, 76, 'Blusa', 52.41),
(111, 86, 'Camiseta', 120),
(110, 86, 'Calça', 20),
(109, 86, 'Blusa', 100),
(112, 87, 'Blusa', 100),
(113, 88, 'Blusa', 200),
(114, 89, 'Calça', 200),
(115, 90, 'Blusa', 125),
(116, 91, 'Blusa', 200),
(117, 91, 'Calça', 100),
(118, 92, 'Blusa', 100),
(119, 92, 'Calça', 50),
(120, 92, 'Camiseta', 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_produtos`
--

CREATE TABLE `lista_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lista_produtos`
--

INSERT INTO `lista_produtos` (`id`, `nome`) VALUES
(16, 'Pizza de Carne'),
(17, 'Esfira de Carne'),
(18, 'Pizza de Queijo'),
(19, 'Pizza de Chocolate'),
(20, 'Pizza de Mussarela'),
(21, 'Esfira de Frango'),
(22, 'Esfira de Queijo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `data_pagamento` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `id_cliente`, `valor`, `data_pagamento`) VALUES
(1, 1, 5.00, '2019-01-04 15:09:12'),
(2, 1, 7.00, '2019-01-04 15:21:34'),
(3, 1, 5.00, '2019-01-04 16:20:33'),
(4, 3, 50.00, '2019-01-07 18:15:32'),
(5, 3, 30.00, '2019-01-07 18:15:41'),
(6, 4, 100.00, '2019-01-09 10:41:20'),
(7, 4, 70.10, '2019-01-11 13:28:02'),
(8, 4, 135.00, '2019-01-11 13:53:29'),
(9, 4, 90.00, '2019-01-11 13:54:50'),
(10, 4, 170.00, '2019-01-11 16:14:45'),
(11, 1, 64.00, '2019-02-04 12:44:40'),
(12, 5, 50.00, '2019-02-08 12:11:08'),
(13, 3, 50.00, '2019-02-28 16:36:14'),
(14, 5, 50.00, '2019-03-01 18:31:33'),
(15, 7, 85.00, '2019-03-02 09:32:37'),
(16, 8, 94.00, '2019-03-03 18:23:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `desconto` double(10,2) NOT NULL,
  `valor_com_desconto` double(10,2) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `valor_parcelas` double(10,2) NOT NULL,
  `data_compra` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `valor`, `desconto`, `valor_com_desconto`, `parcelas`, `valor_parcelas`, `data_compra`) VALUES
(45, 4, 150.00, 0.00, 150.00, 0, 0.00, '2019-02-01 14:35:51'),
(44, 4, 189.00, 0.00, 189.00, 0, 0.00, '2019-01-01 14:35:47'),
(41, 3, 80.00, 0.00, 80.00, 0, 0.00, '2019-02-01 14:35:43'),
(40, 3, 100.00, 0.00, 100.00, 0, 0.00, '2019-02-01 14:35:39'),
(39, 2, 1080.00, 0.00, 1080.00, 0, 0.00, '2019-01-14 14:35:36'),
(38, 2, 1080.00, 0.00, 1080.00, 0, 0.00, '2019-02-07 14:35:33'),
(92, 8, 205.00, 10.25, 194.75, 3, 64.92, '2019-03-03 18:22:04'),
(37, 2, 1080.00, 0.00, 1080.00, 0, 0.00, '2019-02-01 14:35:29'),
(36, 2, 1080.00, 0.00, 1080.00, 0, 0.00, '2019-01-09 14:35:24'),
(35, 2, 518.00, 0.00, 518.00, 0, 0.00, '2019-01-21 14:35:21'),
(46, 4, 100.00, 0.00, 100.00, 0, 0.00, '2019-01-18 14:35:14'),
(47, 4, 100.00, 10.00, 90.00, 0, 0.00, '2019-01-11 13:55:01'),
(48, 4, 100.00, 20.00, 80.00, 0, 0.00, '2019-01-11 13:56:28'),
(49, 4, 15.00, 0.00, 15.00, 0, 0.00, '2019-02-03 14:35:05'),
(50, 4, 45.00, 2.25, 42.75, 0, 0.00, '2019-01-11 16:15:48'),
(51, 4, 100.00, 10.00, 90.00, 0, 0.00, '2019-01-11 16:35:37'),
(52, 2, 100.00, 10.00, 90.00, 0, 0.00, '2019-01-31 15:02:12'),
(53, 2, 200.00, 0.00, 2000.00, 2, 100.00, '2019-02-01 14:34:59'),
(54, 2, 200.00, 20.00, 180.00, 2, 90.00, '2019-01-31 15:21:04'),
(55, 1, 123.00, 0.00, 123.00, 2, 61.50, '2019-02-15 14:34:55'),
(91, 7, 300.00, 15.00, 285.00, 2, 142.50, '2019-03-02 09:32:28'),
(57, 1, 80.00, 0.00, 80.00, 1, 80.00, '2019-01-15 14:34:51'),
(90, 5, 125.00, 0.00, 125.00, 1, 125.00, '2019-03-01 18:28:33'),
(89, 3, 200.00, 20.00, 180.00, 2, 90.00, '2019-02-01 12:32:22'),
(88, 3, 200.00, 0.00, 200.00, 1, 200.00, '2019-02-21 12:31:48'),
(87, 3, 100.00, 0.00, 100.00, 1, 100.00, '2019-02-18 12:29:04'),
(86, 5, 240.00, 12.00, 228.00, 2, 114.00, '2019-02-08 12:10:50'),
(76, 1, 144.41, 0.00, 144.41, 1, 144.41, '2019-02-01 14:34:46'),
(75, 1, 136.00, 0.00, 0.00, 1, 136.00, '2019-02-07 14:47:48'),
(74, 1, 136.00, 0.00, 0.00, 1, 136.00, '2019-02-07 14:47:28'),
(73, 1, 160.00, 0.00, 0.00, 1, 160.00, '2019-02-07 14:46:03'),
(72, 1, 89.00, 0.00, 0.00, 1, 89.00, '2019-02-07 14:44:38'),
(71, 1, 360.00, 0.00, 0.00, 3, 120.00, '2019-02-04 16:02:21'),
(69, 1, 120.00, 0.00, 0.00, 1, 120.00, '2019-02-04 13:19:27'),
(70, 1, 100.00, 10.00, 90.00, 2, 45.00, '2019-02-04 15:12:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

CREATE TABLE `recuperar_senha` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`id`, `email`, `token`, `hora`) VALUES
(1, 'lucas_alves_lbas@hotmail.com', '0b855ec953f13dc9cf791d2ce4a6590cb0ad676e', '2019-03-11 15:14:11'),
(2, 'lucas_alves_lbas@hotmail.com', '366169b11e00e8b2194779aa46b5cd9835fb383e', '2019-03-11 16:36:22'),
(3, 'lucas_alves_lbas@hotmail.com', 'e74a93dd86297ab78562172edca23de29d1a0973', '2019-03-11 16:36:33'),
(4, 'lucas_alves_lbas@hotmail.com', '5fc9e64c7f18922a65252ad5bc4940f642bd98ba', '2019-03-11 16:40:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ajustes`
--
ALTER TABLE `ajustes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista_produtos`
--
ALTER TABLE `lista_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ajustes`
--
ALTER TABLE `ajustes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de tabela `lista_produtos`
--
ALTER TABLE `lista_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
