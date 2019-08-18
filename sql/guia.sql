-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2019 às 11:14
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `avaliacao_id` int(11) NOT NULL,
  `avaliacao` int(1) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`avaliacao_id`, `avaliacao`, `cliente_id`, `empresa_id`) VALUES
(1, 5, 29, 18),
(2, 3, 29, 18),
(3, 5, 29, 18),
(4, 5, 29, 17),
(5, 1, 29, 17),
(6, 5, 50, 16),
(7, 5, 50, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `situacao` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `nome_completo`, `cpf`, `login_id`, `situacao`) VALUES
(16, 'Wilson Soares da Fonseca Junior', '06512201141', 49, 0),
(17, 'Juliane Araujo Fonseca', '043.839.010-40', 50, 1),
(18, 'Wilson Soares da Fonseca Junior', '065.122.011-40', 51, 1),
(19, 'wilson', '1111111111111111', 52, 1),
(20, 'João da Silva', '06512201140', 62, 1),
(21, 'teste', '22222222222', 63, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `avaliacao_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`avaliacao_id`, `comentario`, `cliente_id`, `empresa_id`) VALUES
(4, 'asdfadf', 17, 21),
(10, 'Ótimo local com ótimos preços.', 62, 27),
(11, 'Bom :)', 62, 25),
(12, 'Até que é legal :)', 63, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `cupom_id` int(11) NOT NULL,
  `cupom` int(10) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cupom`
--

INSERT INTO `cupom` (`cupom_id`, `cupom`, `empresa_id`, `cliente_id`) VALUES
(1, 123, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL,
  `nome_fantasia` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `descricao_da_empresa` varchar(500) NOT NULL,
  `inicio_expediente` time NOT NULL,
  `fim_expediente` time NOT NULL,
  `tipo_estabelecimento` varchar(11) NOT NULL,
  `foto_perfil` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `login_id` int(11) NOT NULL,
  `situacao` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`empresa_id`, `nome_fantasia`, `endereco`, `descricao_da_empresa`, `inicio_expediente`, `fim_expediente`, `tipo_estabelecimento`, `foto_perfil`, `cnpj`, `telefone`, `login_id`, `situacao`) VALUES
(17, 'Burger King', 'Alameda Shopping', 'Burger King, muitas vezes abreviado como BK, é uma rede de restaurantes especializada em fast-food, fundada nos Estados Unidos por James McLamore e David Edgerton, que abriram a primeira unidade em Miami, Flórida.', '09:00:00', '23:00:00', 'Restaurante', '15578617015cdb15451600d.jpg', '66.666.666/666', '(61) 2398-0345', 27, 1),
(18, 'Delta', 'Asa Sul', 'Gastrobar intimista com sacada e mesas a céu aberto serve hambúrgueres entre petiscos da casa e coquetéis.', '18:00:00', '04:00:00', 'Bar', '15578618285cdb15c4ba29f.jpg', '77.777.777/777', '(61) 4982-7842', 28, 1),
(19, 'Primeiro Cozinha Bar', 'Setor Sudoeste Quadra 8, 2385, Brasília - DF, 70297-400', 'O Primeiro Bar é uma casa espaçosa com muitos lugares que é ótimo pra confraternizações, tem música ao vivo todos os dias, uma ótima localização,um bar pra agradar a todos os públicos que sempre buscam inovar e oferecer sempre o melhor.', '12:00:00', '01:00:00', 'Bar', '15602756265cffeaaa63b67.jpg', '40.026.587/9511-11', '(61) 3028-1331', 52, 1),
(20, 'Reserva Especial ', 'Qno 11 Conj O Casa 06 Loja 01 - Ceilândia Norte - Setor O, ', 'Mesas extras. Otimos Coquetéis. Aconchegante', '17:00:00', '01:00:00', 'Bar', '15602769735cffefed26b3c.jpg', '88.992.746/0001-70', '(61) 9914-6509', 53, 1),
(21, 'D´Sousa', 'Ceilândia Norte QNO 11 - Ceilândia', 'Restaurante e pizzaria. Comida tarde da noite casual. Bom para levar as crianças', '11:00:00', '00:00:00', 'Restaurante', '15602772585cfff10aed45f.jpg', '43.365.098/0001-93', '(61) 3585-2450', 54, 1),
(22, 'Radical', 'St. M QNM 1 Conj. B 04 Lote 48 - Ceilândia', 'Restaurante e self-service.', '11:00:00', '15:00:00', 'Restaurante', '15602774975cfff1f9d7a20.jpg', '73.661.011/0001-96', '(61) 9950-8417', 55, 1),
(23, 'Popeye', 'St. N Q 13 - Ceilândia', 'Comida tarde da noite. Mesas extras. Casual.', '18:00:00', '04:00:00', 'Restaurante', '15602777455cfff2f1eecfd.jpg', '75.615.485/0001-27', '(61) 3971-8089', 56, 1),
(24, 'Ceilândia Sports', 'Bloco C - Lotes 01 / 02, St. M Cnm 2 Conjunto A Bl D, 03 A - Ceilândia', 'Loja de artigos esportivos.', '08:00:00', '17:00:00', 'Loja', '15602780045cfff3f418520.jpg', '19.617.776/0001-83', '(61) 3371-8003', 57, 1),
(25, 'Musical Center', 'Bloco C - Loja 26, Quadra C 12 - Taguatinga Centro, Brasília ', 'No ramo de instrumentos musicais e acessórios para instrumentos de todas as marcas.', '06:30:00', '16:00:00', 'Loja', '15602782365cfff4dc321de.jpg', '35.067.629/0001-33', '(61) 3563-5672', 58, 1),
(26, 'Acácio Comercio', 'St. N QNN 19 Loja 20 - Ceilândia, Brasília ', 'Loja de artigos para cama, mesa e banho, com muitas novidades e principalmente com varias promoções.', '08:00:00', '12:00:00', 'Loja', '15602784955cfff5df230b5.png', '69.406.556/0001-89', '(61) 3373-4441', 59, 1),
(27, 'Swine', 'Asa Norte Comércio Local Norte 314 Loja 21 - Asa Norte', 'A boemia gastronômica elegante de cozinha apurada e com ambientes acolhedores convidativos com sacada coberta.', '08:00:00', '12:00:00', 'Bar', '15602787865cfff7027c1d4.jpg', '27.988.671/0001-69', '(61) 3034-3471', 60, 1),
(28, 'Comércio de Couros', 'Endereço: St. N CNN 2 Lote 10 - Ceilândia', 'Atacadista de artigos de couros com grandes diversidades, preços bacanas, novidades e com muitas credibilidades. ', '08:00:00', '12:00:00', 'Loja', '15602790695cfff81d73050.png', '61.938.063/0001-88', '(61) 3471-4424', 61, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_usuario`
--

CREATE TABLE `login_usuario` (
  `login_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login_usuario`
--

INSERT INTO `login_usuario` (`login_id`, `email`, `senha`, `status`) VALUES
(27, 'burgerking@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(28, 'delta@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(49, 'wilson@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(50, 'juliane@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(51, 'wilson@teste.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(52, 'primeirobar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(53, 'reservaespecial@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(54, 'dsousa@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(55, 'radical@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(56, 'popeye@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(57, 'sportsceilandia@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(58, 'musicalcenter@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(59, 'acacio@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(60, 'swine@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(61, 'comerciodecouros@email.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL),
(62, 'joao@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(63, 'teste4@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`avaliacao_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`avaliacao_id`);

--
-- Indexes for table `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`cupom_id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Indexes for table `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `avaliacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `avaliacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `cupom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login_usuario`
--
ALTER TABLE `login_usuario`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
