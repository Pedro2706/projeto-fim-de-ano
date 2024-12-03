-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03-Dez-2024 às 09:58
-- Versão do servidor: 8.0.33-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3-4ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `pizza` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bebida` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sobremesa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `pizza`, `bebida`, `sobremesa`) VALUES
(1, 'Margherita, Calabresa', 'agua', 'mousse'),
(2, 'Margherita, Calabresa, Portuguesa', 'Suco', 'pudim'),
(17, 'Calabresa', 'agua', 'pudim'),
(18, 'Calabresa', 'agua', 'Brownie'),
(19, 'Calabresa', 'sprite', 'bolo'),
(20, 'Calabresa', 'agua', 'Brownie'),
(21, 'Calabresa', 'Coca', 'pudim'),
(22, 'Calabresa', 'Coca', 'pudim'),
(23, 'Margherita, Calabresa', 'agua', 'mousse'),
(24, 'Margherita', 'agua', 'tiramisu'),
(25, 'Margherita, Calabresa, Portuguesa, Vegetariana', 'guarana', 'sorvete'),
(26, 'Margherita, Calabresa', 'agua', 'pudim'),
(27, 'Margherita', 'agua', 'pudim'),
(28, 'Margherita', 'agua', 'pudim'),
(29, 'Calabresa', 'Coca', 'bolo'),
(30, 'Calabresa', 'Coca', 'bolo'),
(31, 'Calabresa, Vegetariana', 'agua', 'tiramisu'),
(32, 'Vegetariana', 'Suco', 'mousse'),
(33, 'Vegetariana', 'agua', 'Brownie'),
(34, 'Vegetariana', 'agua', 'Brownie'),
(35, 'Margherita, Portuguesa', 'Suco', 'bolo'),
(36, 'Margherita, Portuguesa', 'Suco', 'bolo'),
(37, 'Calabresa', 'Suco', 'tiramisu'),
(38, 'Margherita', 'agua', 'tiramisu'),
(39, 'Margherita, Vegetariana', 'Suco', 'sorvete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `rua` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `tipo`) VALUES
(1, 'Aparecida Ferreira', 'aparecida.ferreira@gmail.com', '12345678', '2024-09-04', 'aaaa', 123, 'ssss', 'Parque Verde', 'Cascavel', 'pr', '85807670', 0),
(2, 'LUIZ', 'luiz@gmail.com', '12345678', '2024-09-06', 'aaaa', 0, 'ssss', 'Parque Verde', 'Cascavel', 'AC', '85807670', 1),
(3, 'luiz felipe', 'luizbarbosa1913blp@gmail.com', 'nego00&44', '2006-08-21', 'avenida brasil', 10299, 'casa', 'coqueiral', 'cidade', 'pr', '85807030', 0),
(4, 'bsertjetrh', 'pedro@gmail.com', '987654321', '2000-06-27', 'pqeifywehvgy', 123456789, 'casa 019385', 'coco', 'louca', 'PR', '85807673', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
