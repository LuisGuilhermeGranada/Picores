-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2023 at 10:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picores`
--

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `Email` varchar(100) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Requerimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requerimento`
--

CREATE TABLE `requerimento` (
  `Data_requerimento` date NOT NULL,
  `Data_entrada` date NOT NULL,
  `Data_saida` date NOT NULL,
  `Data_aprovada_cores` date NOT NULL,
  `Data_aprovada_coordenacao` date NOT NULL,
  `Objeto` varchar(100) NOT NULL,
  `Observacao` text NOT NULL,
  `Anexo` blob NOT NULL,
  `status` varchar(30) NOT NULL,
  `idRequerimento` int(11) NOT NULL,
  `id_usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Requerente` varchar(100) NOT NULL,
  `Rua` varchar(50) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Bairro` varchar(50) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Curso` varchar(50) NOT NULL,
  `Turma` varchar(20) NOT NULL,
  `Senha` varchar(200) DEFAULT NULL,
  `confirmacao` int(1) NOT NULL,
  `Numero_Matricula` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Requerente`, `Rua`, `Numero`, `Bairro`, `Cidade`, `Telefone`, `Email`, `Curso`, `Turma`, `Senha`, `confirmacao`, `Numero_Matricula`) VALUES
('Granada', 'Rua Mem de Sá', 386, 'Centro', 'Eunápolis', '73991983326', 'luis.gui.lg123456@gmail.com', 'Informática', 'EI32', '$2y$10$i/DhOG2OdD.UDEB0vIoc3OhPJZlBuf77uMpw/hCyEY.20aogOnZMy', 0, '202013600027'),
('Clarice Cleny Sasha', 'Lugar', 690, 'Algum Lugar', 'Paragominas', '73991983329', 'sasha@gmail.com', 'Edificações', 'ED31', '$2y$10$ZuMjPwzerpD0wLU5KU3heetOAg9haXa/7kb80Pvk8r6JxW4hpgkhq', 1, '202013600028'),
('Stephany Britto', 'Tatau', 420, 'Pedroca', 'Itagimirim', '73991983328', 'stephany@gmail.com', 'Informática', 'EI41', '$2y$10$Zr1YNHFrG65wclomtobX/.U7BqraR6VgGuTk8ZlyW2ZoUQY3qPBDu', 2, '202013600029'),
('Ana Caroline', 'Celinho', 876, 'Santana', 'Itaporanga', '73991983325', 'caroline@gmail.com', 'Meio Ambiente', 'EMA41', '$2y$10$4dHaQ2Y07w2a436UcMa2lePvcOov/BwfklOSVdVGsgKxLsIys7Epi', 1, '202013600030');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD KEY `Requerimento_id` (`Requerimento_id`);

--
-- Indexes for table `requerimento`
--
ALTER TABLE `requerimento`
  ADD PRIMARY KEY (`idRequerimento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Numero_Matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requerimento`
--
ALTER TABLE `requerimento`
  MODIFY `idRequerimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`Requerimento_id`) REFERENCES `requerimento` (`idRequerimento`);

--
-- Constraints for table `requerimento`
--
ALTER TABLE `requerimento`
  ADD CONSTRAINT `requerimento_FK_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Numero_Matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
