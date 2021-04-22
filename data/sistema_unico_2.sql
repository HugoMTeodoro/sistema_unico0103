-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Abr-2021 às 16:35
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_unico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `consulta_id` int(11) NOT NULL,
  `data_consulta` datetime NOT NULL,
  `paciente_cpf` varchar(11) NOT NULL,
  `crm_medico` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`consulta_id`, `data_consulta`, `paciente_cpf`, `crm_medico`) VALUES
(2, '2021-06-14 10:00:00', '21871733057', '33317M'),
(3, '2021-06-14 11:00:00', '84384158662', '21911M'),
(4, '2021-06-14 14:30:00', '12676897659', '33317M'),
(5, '2021-06-15 08:00:00', '73947838638', '55107M'),
(6, '2021-06-16 11:00:00', '56304799624', '20717M'),
(7, '2021-06-16 15:00:00', '37126365632', '55107M'),
(8, '2021-03-19 16:00:00', '56304799624', '21117M'),
(9, '2021-03-23 15:30:00', '37126365632', '05542M'),
(10, '2021-05-29 10:30:00', '73947838638', '21117M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade_medico`
--

CREATE TABLE `especialidade_medico` (
  `especialidade_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `especialidade_medico`
--

INSERT INTO `especialidade_medico` (`especialidade_id`, `descricao`) VALUES
(1, 'Oftalmologista'),
(2, 'Cardiologista'),
(8, 'Neurologista'),
(9, 'Oncologista'),
(10, 'Pediatra'),
(11, 'Otorrino'),
(12, 'Otorrinolaringologista'),
(13, 'Endocrinologista'),
(14, 'Gastroenterologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `CRM` varchar(6) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `especialidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`CRM`, `nome`, `idade`, `especialidade_id`) VALUES
('05117M', 'Dr. Maria Antonia Souza', 36, 11),
('05542M', 'Dr. Alessandra Silva Matos', 54, 13),
('20717M', 'Dr. Marcos Souza Dias', 42, 2),
('21117M', 'Dr. Alberto Antonio Junior', 32, 8),
('21911M', 'Dr. Marilia da Silva', 31, 12),
('22017M', 'Dr. Alexandra Dias de Souza', 32, 9),
('29220M', 'Dr. Marcela Matos Souza', 33, 10),
('33317M', 'Dr. Antonio Souza Rubens', 32, 9),
('55107M', 'Dr. Emily Marinho Dias', 30, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `CPF` varchar(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `contato` varchar(13) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`CPF`, `nome`, `idade`, `contato`, `rua`, `bairro`, `numero`) VALUES
('12676897659', 'Bryan Matheus Assis', 36, '31993581510', 'São Tiago', 'São Bernardo', 288),
('21871733057', 'Aparecida Agatha Freitas', 62, '38998746830', 'Miguel Gomes da Costa', 'Mantiqueira', 693),
('37126365632', 'Luna Débora Novaes', 48, '31985764618', 'Imaculada Novaes Santos', 'Céu Azul', 759),
('56304799624', 'João Gustavo Juan da Silva', 70, '31985639817', 'Santa Seconda', 'Acaiaca', 465),
('73947838638', 'Cecilia Emilly das Neves', 20, '31983530243', 'Serra Jose Vieira', 'Distrito Industrial Vale do Jatoba', 549),
('82746860635', 'Rosangela Sebastiana Assuncao', 40, '31982907747', 'Engenho do Minério', 'Engenho Nogueira', 977),
('84384158662', 'Anderson Paulo DUarte', 62, '31981881484', 'Nelson José de Almeida', 'Lagoa', 262);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE `prontuario` (
  `prontuario_id` int(11) NOT NULL,
  `problema` varchar(200) NOT NULL,
  `situacao` varchar(7) NOT NULL,
  `analise` varchar(20) NOT NULL,
  `observacoes` varchar(500) NOT NULL,
  `crm_medico` varchar(6) NOT NULL,
  `paciente_cpf` varchar(11) NOT NULL,
  `id_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`prontuario_id`, `problema`, `situacao`, `analise`, `observacoes`, `crm_medico`, `paciente_cpf`, `id_consulta`) VALUES
(1, 'Acidente Vascular Cerebral Sintomas Observados: paralisia facial, dificuldade para falar e caminhar, desequilíbrio e indício de vertigem.', 'ativo', 'subjetivo', 'O paciente deu entrada desacordado e após alguns minutos retornou à consciência.', '21117M', '56304799624', 8),
(2, 'Controle de diabetes tipo 2.', 'ativo', 'objetivo', 'Aumento do índice de colesterol. Insulina em níveis normais. Diminuição do percentual de gordura.', '05542M', '37126365632', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id` int(11) NOT NULL,
  `crm_medico` varchar(6) NOT NULL,
  `cpf_paciente` varchar(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `posologia` varchar(100) NOT NULL,
  `medicamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id`, `crm_medico`, `cpf_paciente`, `periodo`, `posologia`, `medicamento`) VALUES
(5, '22017M', '12676897659', 3, '7ml de 8 em 8 horas', 'Decadron'),
(7, '55107M', '37126365632', 5, '2 vezes de 12 em 12 horas', 'Aerolin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `prioridade` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `senha`, `prioridade`, `nome`) VALUES
(1, 'hugo', 'ab56b4d92b40713acc5af89985d4b786', 2, 'hugo'),
(2, 'vinicius', 'ab56b4d92b40713acc5af89985d4b786', 0, 'vinicius'),
(3, 'ryanzinhokaik', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Ryan'),
(4, 'vinicim', '202cb962ac59075b964b07152d234b70', 2, 'Vinícius');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`consulta_id`),
  ADD KEY `paciente_cpf` (`paciente_cpf`),
  ADD KEY `crm_medico` (`crm_medico`);

--
-- Índices para tabela `especialidade_medico`
--
ALTER TABLE `especialidade_medico`
  ADD PRIMARY KEY (`especialidade_id`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`CRM`),
  ADD KEY `especialidade_id` (`especialidade_id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices para tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`prontuario_id`),
  ADD KEY `paciente_cpf` (`paciente_cpf`),
  ADD KEY `crm_medico` (`crm_medico`),
  ADD KEY `id_consulta` (`id_consulta`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crm_medico` (`crm_medico`),
  ADD KEY `cpf_paciente` (`cpf_paciente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `especialidade_medico`
--
ALTER TABLE `especialidade_medico`
  MODIFY `especialidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `prontuario`
--
ALTER TABLE `prontuario`
  MODIFY `prontuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`paciente_cpf`) REFERENCES `paciente` (`CPF`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`);

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidade_medico` (`especialidade_id`);

--
-- Limitadores para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`paciente_cpf`) REFERENCES `paciente` (`CPF`),
  ADD CONSTRAINT `prontuario_ibfk_2` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`),
  ADD CONSTRAINT `prontuario_ibfk_3` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`consulta_id`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`),
  ADD CONSTRAINT `receita_ibfk_2` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`CPF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
