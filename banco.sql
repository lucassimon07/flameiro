-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/07/2022 às 08:14
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agen5566_flameiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `briefings`
--

CREATE TABLE `briefings` (
  `id_briefing` int(11) NOT NULL,
  `titulo_briefing` varchar(255) NOT NULL,
  `descricao_briefing` varchar(255) NOT NULL,
  `imagem_briefing` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `cliente_briefing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compromissos`
--

CREATE TABLE `compromissos` (
  `id_compromisso` int(11) NOT NULL,
  `titulo_compromisso` varchar(255) NOT NULL,
  `descricao_compromisso` varchar(255) NOT NULL,
  `participantes_compromisso` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `data_compromisso` varchar(255) NOT NULL,
  `cliente_compromisso` varchar(255) NOT NULL,
  `hora_compromisso` varchar(255) NOT NULL,
  `local_compromisso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `compromissos`
--

INSERT INTO `compromissos` (`id_compromisso`, `titulo_compromisso`, `descricao_compromisso`, `participantes_compromisso`, `id_usuario`, `nome_usuario`, `data_compromisso`, `cliente_compromisso`, `hora_compromisso`, `local_compromisso`) VALUES
(8, 'asdasd', 'asdasd', 'fghd', 3, 'administrador', 'asd', 'salute', 'hgf', 'hf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `nome_section` varchar(255) NOT NULL,
  `categoria_section` varchar(255) NOT NULL,
  `cliente_section` varchar(255) NOT NULL,
  `descricao_section` longtext NOT NULL,
  `imagem_section` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `section`
--

INSERT INTO `section` (`id_section`, `nome_section`, `categoria_section`, `cliente_section`, `descricao_section`, `imagem_section`, `id_usuario`, `nome_usuario`) VALUES
(25, 'Mural Colaborativo', 'ideia', 'flama', 'Propor um tema por semana na parede de giz onde todos desenhem coisas que tenham relação com o tema, mas só desenhos sem palavras. E o mais importante, sem julgamento.', '', 26, 'Otto'),
(26, 'Influencers Flameiros', 'ideia', 'flama', 'Ser uma \"agência influencer\" ', '', 28, 'Lucas Simon'),
(31, 'Bolos caros < Bolos veganos', 'solucao', 'flama', 'comidinha pra todos', '49e821edf7ef914ddf610e431b73f0e3.jpg', 46, 'otto'),
(32, 'Momento Criativo', 'ideia', 'flama', 'Tirar um momento com galera da agência, podendo ser quinzenal e mensal. Sugestão dada na reunião do Digital!', '', 52, 'Naiara');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `usuario_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome_usuario`, `senha_usuario`, `usuario_usuario`) VALUES
(27, 'Administrador', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(39, 'Maria Carolina', '21743728d9eed11aed522774b60208b7', 'maria@agenciaflama.com.br'),
(47, 'otto', 'cef262b083f5bbdaf0bd8e86c364aee7', 'otto'),
(48, 'otavio gomes', 'cef262b083f5bbdaf0bd8e86c364aee7', 'otto'),
(49, 'otavio gomes', 'cef262b083f5bbdaf0bd8e86c364aee7', 'otto'),
(50, 'naiara', 'be0d7e827c4a2cfc8df534fb2358fb39', 'nai'),
(51, 'Naiara', 'be0d7e827c4a2cfc8df534fb2358fb39', 'Nai'),
(52, 'Naiara', 'be0d7e827c4a2cfc8df534fb2358fb39', 'naiara'),
(53, 'Flávio', '04b12bb3918cb07433e4bf4d613af0ba', 'flavio'),
(57, 'Lucas', 'e10adc3949ba59abbe56e057f20f883e', 'lucas'),
(59, 'pamela', '4479014fbad231347f3a47fffa75b01c', 'pamela');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `briefings`
--
ALTER TABLE `briefings`
  ADD PRIMARY KEY (`id_briefing`);

--
-- Índices de tabela `compromissos`
--
ALTER TABLE `compromissos`
  ADD PRIMARY KEY (`id_compromisso`);

--
-- Índices de tabela `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `briefings`
--
ALTER TABLE `briefings`
  MODIFY `id_briefing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compromissos`
--
ALTER TABLE `compromissos`
  MODIFY `id_compromisso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
