-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/08/2023 às 14:19
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
-- Banco de dados: `3if_restaurante`
--
CREATE DATABASE IF NOT EXISTS `3if_restaurante` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `3if_restaurante`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `antendimentos`
--

CREATE TABLE `antendimentos` (
  `cod_atendimento` bigint(20) NOT NULL,
  `cod_usuario` bigint(20) DEFAULT NULL,
  `cod_mesa` int(11) NOT NULL,
  `inicio_dth` timestamp NOT NULL DEFAULT current_timestamp(),
  `fim_dth` datetime DEFAULT NULL,
  `cod_pagamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `cod_grupo` bigint(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `criacao_dth` timestamp NOT NULL DEFAULT current_timestamp(),
  `criacao_resp` bigint(20) NOT NULL,
  `alteracao_dth` datetime DEFAULT NULL,
  `alterarcao_resp` bigint(20) DEFAULT NULL,
  `exclusao_dth` datetime DEFAULT NULL,
  `exclusao_resp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mesas`
--

CREATE TABLE `mesas` (
  `cod_mesa` int(11) NOT NULL,
  `uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `privilegios_grupos`
--

CREATE TABLE `privilegios_grupos` (
  `cod_privilegio_grupo` bigint(20) NOT NULL,
  `cod_grupo` bigint(20) NOT NULL,
  `cod_servico` bigint(20) NOT NULL,
  `inserir` tinyint(4) NOT NULL DEFAULT 0,
  `alterar` tinyint(4) NOT NULL DEFAULT 0,
  `excluir` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `privilegios_usuarios`
--

CREATE TABLE `privilegios_usuarios` (
  `cod_privilegio_usuario` bigint(20) NOT NULL,
  `cod_usuario` bigint(20) NOT NULL,
  `cod_servico` bigint(20) NOT NULL,
  `inserir` tinyint(4) NOT NULL DEFAULT 0,
  `alterar` tinyint(4) NOT NULL DEFAULT 0,
  `excluir` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `cod_produto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `cod_servico` bigint(20) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` bigint(20) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'usuário está ativo no sistema?',
  `cpf` varchar(11) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `criacao_dth` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'data hora da criação do usuário',
  `alterarcao_dth` datetime DEFAULT NULL,
  `exclusao_dth` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_grupos`
--

CREATE TABLE `usuarios_grupos` (
  `cod_usuario_grupo` bigint(20) NOT NULL,
  `cod_usuario` bigint(20) NOT NULL,
  `cod_grupo` bigint(20) NOT NULL,
  `criacao_dth` timestamp NOT NULL DEFAULT current_timestamp(),
  `criacao_resp` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `antendimentos`
--
ALTER TABLE `antendimentos`
  ADD PRIMARY KEY (`cod_atendimento`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`cod_grupo`),
  ADD KEY `criacao_resp` (`criacao_resp`),
  ADD KEY `grupo_excluir_log` (`exclusao_resp`),
  ADD KEY `grupo_alterar_log` (`alterarcao_resp`);

--
-- Índices de tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`cod_mesa`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Índices de tabela `privilegios_grupos`
--
ALTER TABLE `privilegios_grupos`
  ADD KEY `cod_grupo` (`cod_grupo`),
  ADD KEY `cod_servico` (`cod_servico`);

--
-- Índices de tabela `privilegios_usuarios`
--
ALTER TABLE `privilegios_usuarios`
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_servico` (`cod_servico`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`cod_produto`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`cod_servico`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- Índices de tabela `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  ADD PRIMARY KEY (`cod_usuario_grupo`),
  ADD KEY `usuarios_grupos_criacao_resp` (`criacao_resp`),
  ADD KEY `usuarios_grupos_usuario` (`cod_usuario`),
  ADD KEY `usuarios_grupos_grupos` (`cod_grupo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `antendimentos`
--
ALTER TABLE `antendimentos`
  MODIFY `cod_atendimento` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `cod_grupo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mesas`
--
ALTER TABLE `mesas`
  MODIFY `cod_mesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `cod_produto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `cod_servico` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  MODIFY `cod_usuario_grupo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupo_alterar_log` FOREIGN KEY (`alterarcao_resp`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `grupo_excluir_log` FOREIGN KEY (`exclusao_resp`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`criacao_resp`) REFERENCES `usuarios` (`cod_usuario`);

--
-- Restrições para tabelas `privilegios_grupos`
--
ALTER TABLE `privilegios_grupos`
  ADD CONSTRAINT `privilegios_grupos_ibfk_1` FOREIGN KEY (`cod_grupo`) REFERENCES `grupos` (`cod_grupo`),
  ADD CONSTRAINT `privilegios_grupos_ibfk_2` FOREIGN KEY (`cod_servico`) REFERENCES `servicos` (`cod_servico`);

--
-- Restrições para tabelas `privilegios_usuarios`
--
ALTER TABLE `privilegios_usuarios`
  ADD CONSTRAINT `privilegios_usuarios_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `privilegios_usuarios_ibfk_2` FOREIGN KEY (`cod_servico`) REFERENCES `servicos` (`cod_servico`);

--
-- Restrições para tabelas `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  ADD CONSTRAINT `usuarios_grupos_criacao_resp` FOREIGN KEY (`criacao_resp`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `usuarios_grupos_grupos` FOREIGN KEY (`cod_grupo`) REFERENCES `grupos` (`cod_grupo`),
  ADD CONSTRAINT `usuarios_grupos_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
