-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/03/2025 às 21:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inventário_dw`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipment_items`
--

CREATE TABLE `equipment_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `damage` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `durability` int(11) DEFAULT NULL,
  `effect` varchar(255) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipment_items`
--

INSERT INTO `equipment_items` (`id`, `name`, `type`, `damage`, `defense`, `weight`, `durability`, `effect`, `image`) VALUES
(9, 'Dark Sword', 'Arma', 110, 0, 5, 180, 'Spinning Slash: A habilidade permite que o jogador execute um movimento giratório com a espada, realizando um ataque em área que atinge inimigos ao redor do personagem', 'https://th.bing.com/th/id/R.5ce3236b3e3e1a3b2295cfc16e2f542b?rik=WNEaGeWBIjv4rw&riu=http%3a%2f%2foyster.ignimgs.com%2fmediawiki%2fapis.ign.com%2fdark-souls-3%2fc%2fca%2fDarksword1.jpg&ehk=jXcEHx2qZwn0uFUU0ebv%2f1HGYtAOML4hADrUGKxwWyk%3d&risl=&pid=ImgRaw&r=0'),
(10, 'Estoc', 'Arma', 90, 0, 3, 200, 'R1 (Ataque normal): Golpes rápidos e precisos com bastante alcance, excelente para ataques de estocada.', 'https://th.bing.com/th/id/R.ddf9257b4b9deeea75cebe3bc837e5c6?rik=gSYZS1VuOre9dQ&riu=http%3a%2f%2fdarksouls3.wiki.fextralife.com%2ffile%2fDark-Souls-3%2festoc.png&ehk=Yzf0Rlhhq8qxLxWNW%2b1GR%2fYifV5MqpYeQGZgM%2f66X5U%3d&risl=&pid=ImgRaw&r=0'),
(11, 'Heater Shield', 'Escudo', 0, 80, 5, 250, 'Nenhuma habilidade especial. Apenas a capacidade de defesa.', 'https://th.bing.com/th/id/R.e0ad24ce64f883845aa3c32ce95af771?rik=bWKM%2bluTy%2bdxmA&riu=http%3a%2f%2fdarksouls.wikidot.com%2flocal--files%2fnormal-shields%2fheater-shield.png&ehk=d1uA9I%2fiqbRhSJnlduPY3jF5YFumxYPf3H4%2bkWjgIUg%3d&risl=&pid=ImgRaw&r=0'),
(12, 'Estus Flask', 'Consumível', 0, 0, 0, 0, 'Recuperação de Vida: Ao usar o Estus Flask, você recupera uma quantidade considerável de vida. A quantidade de vida recuperada depende da melhoria do Estus Flask, que pode ser aumentada com Estus Shards.', 'https://vignette.wikia.nocookie.net/darksouls/images/0/08/Estus_Flask_(DSIII)_-_01.png/revision/latest?cb=20160613233757'),
(13, 'Firebomb', 'Arma', 150, 0, 0.5, 0, 'ogo: Ao lançar o Firebomb, ele explode em uma área ao atingir o alvo, causando dano de fogo. É útil para ataques a distância e para explodir barris ou inimigos.', 'https://th.bing.com/th/id/OIP.GnJISZEu-JDmtenVfhS7bwHaHa?w=512&h=512&rs=1&pid=ImgDetMain');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inventário`
--

CREATE TABLE `inventário` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Senha` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inventário`
--

INSERT INTO `inventário` (`ID`, `UserName`, `Senha`) VALUES
(1, 'Gab', 12345678);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `equipment_items`
--
ALTER TABLE `equipment_items`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `inventário`
--
ALTER TABLE `inventário`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipment_items`
--
ALTER TABLE `equipment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `inventário`
--
ALTER TABLE `inventário`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
