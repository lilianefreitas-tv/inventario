-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/10/2023 às 16:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inventariobd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `descricao`) VALUES
(1, 'Altamira'),
(2, 'Medicilândia'),
(3, 'Porto de Moz'),
(4, 'Brasil Novo'),
(5, 'Anapu'),
(6, 'Senador José Porfírio'),
(7, 'Uruará'),
(8, 'Vitória do Xingú');

-- --------------------------------------------------------

--
-- Estrutura para tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id_local` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `localizacao`
--

INSERT INTO `localizacao` (`id_local`, `descricao`) VALUES
(1, 'CPD'),
(2, 'Auditório'),
(3, '1ª PJ'),
(4, '2ª PJ'),
(5, '3ª PJ'),
(6, '4ª PJ'),
(7, '5ª PJ'),
(8, '6ª PJ'),
(9, '7ª PJ'),
(10, '8ª PJ'),
(11, 'Coordenação'),
(12, 'Sala de Reunião 01'),
(13, 'Sala de Reunião 02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `descricao`) VALUES
(1, 'HP'),
(2, 'LENOVO'),
(3, 'SAMSUNG'),
(4, 'KYOCERA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `patrimonio` varchar(20) NOT NULL,
  `local` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `configuracao` varchar(150) NOT NULL,
  `manutencao` varchar(150) NOT NULL,
  `mac` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `obs` varchar(150) NOT NULL,
  `cidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `material`
--

INSERT INTO `material` (`id_material`, `data`, `descricao`, `tipo`, `patrimonio`, `local`, `marca`, `configuracao`, `manutencao`, `mac`, `ip`, `obs`, `cidade`) VALUES
(1, '2023-10-26', 'ECOSYS M3655idn', ' Impressora', '000000', ' 6ª PJ', ' KYOCERA', '', 'Nome do host: KMEBE336', '00:17:C8:EB:E3:36', '192.168.72.41', 'User/Senha: Admin/Admin', ' Altamira'),
(2, '2023-10-26', 'ECOSYS M3655idn', ' Impressora', '000000', ' 3ª PJ', ' KYOCERA', '', 'Nome do Host: KMEBE0CC', '00:17:C8:EB:E0:CC', '192.168.72.42', 'User/Senha: Admin/Admin _ Apoio 3ªPJ', ' Altamira'),
(3, '2023-10-26', 'ECOSYS M3655idn', ' Impressora', '000000', ' Coordenação', ' KYOCERA', '', 'Nome do Host: KMEBE207', '00:17:C8:EB:E2:07', '192.168.72.43', 'User/Senha: Admin/Admin', ' Altamira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `descricao`) VALUES
(1, 'Notebook'),
(2, 'Computador Desktop'),
(3, 'Impressora'),
(4, 'Scanner'),
(5, 'Datashow'),
(6, 'Nobreak'),
(7, 'Monitor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Liliane de Freitas Terra Vieira', 'lilianefreitas@mppa.mp.br', '5454263@Mp');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices de tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id_local`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
