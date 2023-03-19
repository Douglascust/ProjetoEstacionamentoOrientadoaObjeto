-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2022 às 22:17
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
-- Banco de dados: `estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `cod_veiculo` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `rg` char(100) DEFAULT NULL,
  `cpf` char(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cod_veiculo`, `nome`, `rg`, `cpf`, `email`, `endereco`, `telefone`) VALUES
(6, 5, 'Nome TESTE', '546748679678', '46437903817', 'teste@gmail.com', 'Av. Salgado Filho', '11960171717'),
(8, 7, '7', '7', '7', '7', '7', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacionamento`
--

CREATE TABLE `estacionamento` (
  `cod_estacionamento` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estacionamento`
--

INSERT INTO `estacionamento` (`cod_estacionamento`, `nome`, `bairro`, `endereco`, `email`, `telefone`) VALUES
(2, '17', '17', '17', '17', '17'),
(7, 'Estaciona AQUI!', 'São João Batista', 'Av. Faria Lima', 'aqui.estaciona@gmail.com', '1128379543');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod_funcionario` int(100) NOT NULL,
  `salario` decimal(10,0) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` char(100) NOT NULL,
  `cpf` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_funcionario`, `salario`, `nome`, `rg`, `cpf`, `email`, `endereco`, `telefone`) VALUES
(7, '80', 'BroShippuden', '546748679678', '46488877710', 'teste@gmail.com', 'Av. Salgado Filho', '28379543'),
(8, '8', '8', '8', '8', '8', '8', '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `cod_proprietario` int(100) NOT NULL,
  `cnpj` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` char(100) NOT NULL,
  `cpf` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`cod_proprietario`, `cnpj`, `nome`, `rg`, `cpf`, `email`, `endereco`, `telefone`) VALUES
(1, 2, '2', '2', '2', '2', '2', '2'),
(7, 7, '7', '7', '7', '7', '7', '7'),
(99, 2147483647, 'Nome TESTE', '5467486', '46437903817', 'teste.nãooficial@gmail.com', 'Av.Salgado Filho', '11960171717');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `cod_vaga` int(100) NOT NULL,
  `numerovaga` int(100) NOT NULL,
  `patio` varchar(1) NOT NULL,
  `datareserva` datetime NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`cod_vaga`, `numerovaga`, `patio`, `datareserva`, `valor`) VALUES
(1, 8, 'D', '2022-12-02 17:18:00', '12'),
(8, 8, 'A', '2021-05-20 22:18:45', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `cod_veiculo` int(11) NOT NULL,
  `placa` varchar(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`cod_veiculo`, `placa`, `modelo`, `marca`, `cor`) VALUES
(1, 'DTA-1968', 'Mercedez', 'Camaro', 'Azul'),
(7, '1', '1', '1', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `fk_codveiculo` (`cod_veiculo`);

--
-- Índices para tabela `estacionamento`
--
ALTER TABLE `estacionamento`
  ADD PRIMARY KEY (`cod_estacionamento`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod_funcionario`);

--
-- Índices para tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`cod_proprietario`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`cod_vaga`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`cod_veiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
