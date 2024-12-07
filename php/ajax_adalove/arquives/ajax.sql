-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20-Jun-2023 às 01:07
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ajax`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `pontuation` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `name`, `pontuation`) VALUES
(1, 'Ngoma', 5),
(2, 'Lucrêcia', 10),
(3, 'Albetina', 15),
(4, 'Zany', 16),
(5, 'Cecília', 18),
(6, 'Hermenegildo', 20),
(7, 'Rosa', 20),
(8, 'Paulina', 17),
(9, 'Custódia', 13),
(10, 'Lajoie', 12),
(11, 'Torres', 18),
(12, 'Albuquerque', 14),
(13, 'Clemente', 16),
(14, 'Vlademir', 17),
(15, 'Cahenda', 15),
(16, 'Rosalina', 3),
(17, 'Zeferina', 4),
(18, 'Janeth', 13),
(19, 'Tomas', 13),
(20, 'Natalia', 10),
(21, 'Creusa', 12),
(22, 'Domingas', 13),
(23, 'Caludia', 18),
(24, 'Victoria', 12),
(25, 'Naura', 10),
(26, 'Lisliana', 14),
(27, 'Wesa', 19),
(28, 'Wasamba', 18),
(29, 'Filomena', 13),
(30, 'Betania', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
