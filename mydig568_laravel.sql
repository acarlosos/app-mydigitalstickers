-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/06/2023 às 11:52
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydig568_laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `AlunoCompra`
--

CREATE TABLE `AlunoCompra` (
  `AlunoCompraID` int(11) NOT NULL,
  `AlunoCompraQuantidade` int(11) NOT NULL COMMENT 'nome',
  `AlunoCompraStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo',
  `AlunoCompraDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `AlunoCompraDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Aluno que realizou a troca do ponto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Registro de Pontos que o Aluno trocou/Devolveu para a Escola';

--
-- Despejando dados para a tabela `AlunoCompra`
--

INSERT INTO `AlunoCompra` (`AlunoCompraID`, `AlunoCompraQuantidade`, `AlunoCompraStatus`, `AlunoCompraDTInativacao`, `AlunoCompraDTAtivacao`, `UsuarioEscolaID`) VALUES
(2, 100, 1, NULL, '2023-05-26 14:54:24', 56),
(4, 10, 1, NULL, '2021-12-14 20:20:29', 56),
(8, 13, 1, NULL, '2023-05-26 11:56:22', 56);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Escola`
--

CREATE TABLE `Escola` (
  `EscolaID` int(11) NOT NULL,
  `Escola` varchar(255) CHARACTER SET latin1 NOT NULL,
  `EscolaCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
  `EscolaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado, 4 -> Prospect',
  `EscolaDTAtivacao` datetime DEFAULT NULL,
  `EscolaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `EscolaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `EscolaSenha` text CHARACTER SET latin1 NOT NULL,
  `EscolaValorFixo` decimal(13,2) NOT NULL,
  `EscolaValorVaviavel` decimal(13,2) NOT NULL,
  `EscolaMotivoBloqueio` text CHARACTER SET latin1,
  `EscolaTelefone` decimal(11,0) DEFAULT NULL,
  `EscolaCelular` decimal(11,0) DEFAULT NULL,
  `EscolaCNPJ` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `EscolaCelularPix` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'chave pix da escola',
  `RedeID` int(11) NOT NULL,
  `EscolaDTCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EscolaDiaVencimento` int(11) DEFAULT NULL,
  `EscolaDTExpiracao` datetime DEFAULT NULL,
  `EscolaEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `EscolaNomeMoeda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Escolas';

--
-- Despejando dados para a tabela `Escola`
--

INSERT INTO `Escola` (`EscolaID`, `Escola`, `EscolaCod`, `EscolaStatus`, `EscolaDTAtivacao`, `EscolaDTInativacao`, `EscolaDTBloqueio`, `EscolaSenha`, `EscolaValorFixo`, `EscolaValorVaviavel`, `EscolaMotivoBloqueio`, `EscolaTelefone`, `EscolaCelular`, `EscolaCNPJ`, `EscolaCelularPix`, `RedeID`, `EscolaDTCadastro`, `EscolaDiaVencimento`, `EscolaDTExpiracao`, `EscolaEmail`, `EscolaNomeMoeda`) VALUES
(1, 'CNA Vitória Jardim da Penha', 'CNA ESvixjp', 1, '2021-03-14 23:42:11', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732078555', '27992334992', '12989403000130', NULL, 1, '2021-02-11 22:56:02', 10, '2022-01-11 23:42:11', 'vitoriajddapenha@cna.com.br', NULL),
(2, 'CNA Vitoria Praia do Canto', 'CNA ESvixpc', 1, '2021-03-01 22:49:41', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732078885', '27988198667', '36011663000159', NULL, 1, '2021-02-11 23:09:48', 10, '2022-02-10 22:49:41', 'ewaew@rewr.com', NULL),
(3, 'CNA Guarapari', 'CNA ESguara', 1, '2023-05-26 06:59:32', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '100.00', '1.00', NULL, '2733498789', '27998746667', '09175535000178', NULL, 1, '2021-02-22 23:33:46', 10, '9999-12-31 06:59:32', NULL, NULL),
(4, 'CNA Serra', 'CNA ESserra', 1, '2021-03-01 22:50:25', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732814555', '27988198667', '10436726000125', NULL, 1, '2021-03-01 18:10:57', 10, '9999-12-31 22:50:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Evento`
--

CREATE TABLE `Evento` (
  `EventoID` int(11) NOT NULL,
  `Evento` varchar(255) CHARACTER SET latin1 NOT NULL,
  `EventoCod` varchar(255) CHARACTER SET latin1 NOT NULL,
  `EventoStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `EventoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
  `EventoDTInativacao` datetime DEFAULT NULL,
  `EventoDTBloqueio` datetime DEFAULT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tabela que com os registros dos evento';

--
-- Despejando dados para a tabela `Evento`
--

INSERT INTO `Evento` (`EventoID`, `Evento`, `EventoCod`, `EventoStatus`, `EventoDTAtivacao`, `EventoDTInativacao`, `EventoDTBloqueio`, `UsuarioID`) VALUES
(1, 'Evento Teste', 'eve_teste', 2, '2021-02-12 21:03:14', '2021-02-15 03:46:45', NULL, 1),
(2, 'Homework', 'HMWK', 1, '2021-02-14 23:51:38', NULL, NULL, 1),
(3, 'Web lessons', 'Webles', 1, '2021-02-14 23:56:42', NULL, NULL, 1),
(4, 'PArticipação eventos', 'Part_evento', 1, '2021-03-31 18:14:39', NULL, NULL, 1),
(5, 'Frequencia', 'Freq', 1, '2021-02-14 23:57:35', NULL, NULL, 1),
(6, 'Rematrícula 2021/2', 'Rema 2021/2', 1, '2021-06-07 04:50:24', NULL, NULL, 8),
(7, 'Compra material didático (MD)', 'Compra_MD', 1, '2023-05-26 05:17:54', NULL, NULL, 1),
(8, 'Ativação chave acesso MD 2021/1', 'Chave_MD 2020/1', 2, '2021-05-11 00:50:28', '2021-06-07 04:50:45', NULL, 1),
(9, 'Nota prova oral', 'nt_prv_oral', 1, '2021-02-16 00:24:21', NULL, NULL, 1),
(10, 'Ativação chave acesso MD 2022/1', 'MD2022/1', 1, '2021-12-13 23:34:16', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `EventoEscola`
--

CREATE TABLE `EventoEscola` (
  `EventoEscolaID` int(11) NOT NULL,
  `EventoStatus` int(11) NOT NULL DEFAULT '1',
  `EventoID` int(11) NOT NULL,
  `EscolaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Escola com Eventos';

--
-- Despejando dados para a tabela `EventoEscola`
--

INSERT INTO `EventoEscola` (`EventoEscolaID`, `EventoStatus`, `EventoID`, `EscolaID`) VALUES
(106, 1, 2, 2),
(107, 1, 3, 2),
(108, 1, 4, 2),
(109, 1, 5, 2),
(110, 1, 7, 2),
(111, 1, 9, 2),
(112, 1, 10, 2),
(119, 1, 5, 3),
(120, 1, 9, 3),
(121, 1, 10, 3),
(122, 1, 1, 1),
(123, 1, 2, 1),
(124, 1, 3, 1),
(125, 1, 4, 1),
(126, 1, 5, 1),
(127, 1, 6, 1),
(128, 1, 7, 1),
(129, 1, 8, 1),
(130, 1, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `FaixaEvento`
--

CREATE TABLE `FaixaEvento` (
  `FaixaEventoID` int(11) NOT NULL,
  `FaixaEventoStatus` int(11) NOT NULL DEFAULT '1',
  `FaixaEventoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `FaixaEventoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `FaixaEventoDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `FaixaEventoNumIni` int(11) DEFAULT NULL,
  `FaixaEventoNumFim` int(11) DEFAULT NULL,
  `FaixaEventoDTIni` date DEFAULT NULL,
  `FaixaEventoDTFim` date DEFAULT NULL,
  `FaixaEventoPontoQuantidade` int(11) NOT NULL,
  `EventoEscolaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Faixa de Eventos/Escola com quantidade de Ponto';

--
-- Despejando dados para a tabela `FaixaEvento`
--

INSERT INTO `FaixaEvento` (`FaixaEventoID`, `FaixaEventoStatus`, `FaixaEventoDTInativacao`, `FaixaEventoDTAtivacao`, `FaixaEventoDTBloqueio`, `FaixaEventoNumIni`, `FaixaEventoNumFim`, `FaixaEventoDTIni`, `FaixaEventoDTFim`, `FaixaEventoPontoQuantidade`, `EventoEscolaID`) VALUES
(7, 1, NULL, '2023-05-24 16:39:34', NULL, 80, 90, NULL, NULL, 5, 109),
(9, 1, NULL, '2023-05-26 02:20:55', NULL, NULL, NULL, '2023-01-01', '2023-01-10', 10, 121),
(10, 1, NULL, '2023-05-26 02:21:37', NULL, NULL, NULL, '2023-01-11', '2023-01-31', 2, 121),
(11, 1, NULL, '2023-05-26 12:18:49', NULL, 1, 10, NULL, NULL, 100, 125);

-- --------------------------------------------------------

--
-- Estrutura para tabela `InformativoAcesso`
--

CREATE TABLE `InformativoAcesso` (
  `InformativoAcessoID` int(11) NOT NULL,
  `InformativoAcesso` text CHARACTER SET latin1 NOT NULL,
  `InformativoAcessoDTIni` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `InformativoAcessoDTFim` datetime NOT NULL,
  `EscolaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro do Informativo de Primeiro Acesso';

--
-- Despejando dados para a tabela `InformativoAcesso`
--

INSERT INTO `InformativoAcesso` (`InformativoAcessoID`, `InformativoAcesso`, `InformativoAcessoDTIni`, `InformativoAcessoDTFim`, `EscolaID`) VALUES
(1, 'lnçlknklk noononoononasdonon  ohnaposidháoidhfóaid   çalksdnalksndáoksnd    AÇSDKNAksdnókn', '2021-02-11 04:28:44', '9999-12-31 04:28:44', 1),
(2, 'ononononononononono nono non on o no nononon onon on on on onon', '2021-02-18 03:20:56', '9999-12-31 03:20:56', 1),
(3, 'novov disclamer', '2021-01-01 21:32:44', '9999-12-31 21:32:44', 2),
(4, 'novo desclamer alterado', '2023-04-01 21:34:28', '9999-12-31 21:34:28', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Perfil`
--

CREATE TABLE `Perfil` (
  `PerfilID` int(11) NOT NULL,
  `Perfil` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
  `PerfilCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
  `PerfilStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `PerfilDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `PerfilDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `PerfilDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Perfil';

--
-- Despejando dados para a tabela `Perfil`
--

INSERT INTO `Perfil` (`PerfilID`, `Perfil`, `PerfilCod`, `PerfilStatus`, `PerfilDTInativacao`, `PerfilDTAtivacao`, `PerfilDTBloqueio`) VALUES
(1, 'Aluno', 'al', 1, NULL, '2021-02-23 23:54:27', NULL),
(2, 'Master', 'master', 1, NULL, '2021-02-15 03:08:11', NULL),
(3, 'Administrativo', 'adm', 1, NULL, '2021-02-15 03:09:01', NULL),
(4, 'Gestor da escola', 'gestor_escola', 1, NULL, '2021-02-15 03:09:56', NULL),
(5, 'Secretária da escola', 'secret_escola', 1, NULL, '2021-04-27 02:36:35', NULL),
(6, 'Professor', 'prof', 1, NULL, '2021-02-15 03:12:06', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PerfilTela`
--

CREATE TABLE `PerfilTela` (
  `PerfilTelaID` int(11) NOT NULL,
  `PerfilTelaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `PerfilTelaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `PerfilTelaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `PerfilTelaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `PerfilID` int(11) NOT NULL,
  `TelaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Perfil e Tela/Menu';

--
-- Despejando dados para a tabela `PerfilTela`
--

INSERT INTO `PerfilTela` (`PerfilTelaID`, `PerfilTelaStatus`, `PerfilTelaDTInativacao`, `PerfilTelaDTAtivacao`, `PerfilTelaDTBloqueio`, `PerfilID`, `TelaID`) VALUES
(562, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 1),
(563, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 2),
(564, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 3),
(565, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 4),
(566, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 7),
(567, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 8),
(568, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 9),
(569, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 10),
(570, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 11),
(571, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 12),
(572, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 13),
(573, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 15),
(574, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 16),
(575, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 17),
(576, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 18),
(577, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 19),
(578, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 27),
(579, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 29),
(580, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 30),
(581, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 31),
(582, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 32),
(583, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 33),
(584, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 34),
(585, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 35),
(617, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 2),
(618, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 3),
(619, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 4),
(620, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 8),
(621, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 12),
(622, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 17),
(623, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 27),
(624, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 29),
(625, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 30),
(626, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 31),
(627, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 33),
(628, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 34),
(629, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 35),
(658, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 2),
(659, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 4),
(660, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 8),
(661, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 17),
(662, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 18),
(663, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 27),
(664, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 29),
(665, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 30),
(666, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 31),
(667, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 33),
(668, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 34),
(669, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 35),
(673, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 1),
(674, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 2),
(675, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 17),
(680, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 2),
(681, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 17),
(682, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 30),
(683, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 1),
(684, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 2),
(685, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 3),
(686, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 4),
(687, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 8),
(688, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 17),
(689, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 18),
(690, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 27),
(691, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 32),
(692, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 34);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Ponto`
--

CREATE TABLE `Ponto` (
  `PontoID` int(11) NOT NULL,
  `PontoQuantidade` int(11) NOT NULL COMMENT 'nome',
  `PontoStatus` int(11) NOT NULL DEFAULT '1',
  `PontoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `PontoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `PontoDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Usuario/Escola que Cadastrou o ponto',
  `PontoOperacao` int(11) NOT NULL DEFAULT '1' COMMENT '1 => Adicao +, 2 => Subtracao -'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Pontos';

--
-- Despejando dados para a tabela `Ponto`
--

INSERT INTO `Ponto` (`PontoID`, `PontoQuantidade`, `PontoStatus`, `PontoDTInativacao`, `PontoDTAtivacao`, `PontoDTBloqueio`, `UsuarioEscolaID`, `PontoOperacao`) VALUES
(1, 10000, 1, NULL, '2021-05-06 22:34:53', NULL, 48, 1),
(2, 100000, 1, NULL, '2021-12-14 20:36:16', NULL, 48, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PontoRecebido`
--

CREATE TABLE `PontoRecebido` (
  `PontoRecebidoID` int(11) NOT NULL,
  `PontoRecebidoQuantidade` int(11) NOT NULL COMMENT 'nome',
  `PontoRecebidoStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo',
  `PontoRecebidoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `PontoRecebidoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Aluno que recebeu o ponto',
  `FaixaEventoID` int(11) NOT NULL COMMENT 'Faixa do Evento, da Escola. Na faixa h a qtd de pontos que o aluno recebeu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Pontos Recebimos Relao Faixa/Evento/Escola com Usurio (Aluno)';

--
-- Despejando dados para a tabela `PontoRecebido`
--

INSERT INTO `PontoRecebido` (`PontoRecebidoID`, `PontoRecebidoQuantidade`, `PontoRecebidoStatus`, `PontoRecebidoDTInativacao`, `PontoRecebidoDTAtivacao`, `UsuarioEscolaID`, `FaixaEventoID`) VALUES
(2, 100, 1, NULL, '2023-05-26 12:19:26', 56, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Rede`
--

CREATE TABLE `Rede` (
  `RedeID` int(11) NOT NULL,
  `Rede` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
  `RedeCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
  `RedeStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `RedeDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
  `RedeDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `RedeDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `RedeNomeMoeda` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Rede Escolares';

--
-- Despejando dados para a tabela `Rede`
--

INSERT INTO `Rede` (`RedeID`, `Rede`, `RedeCod`, `RedeStatus`, `RedeDTAtivacao`, `RedeDTInativacao`, `RedeDTBloqueio`, `RedeNomeMoeda`) VALUES
(1, 'Cultural Norte Americana', 'CNA', 1, '2023-04-27 21:09:51', NULL, NULL, 'CNA Dolar One'),
(2, 'Yazigi', 'YZG', 1, '2021-05-09 17:27:25', NULL, NULL, 'Yazigi dolar'),
(3, 'Cultura inglesa', 'CING', 1, '2023-04-27 18:10:51', NULL, NULL, 'Cultura Dolar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Tela`
--

CREATE TABLE `Tela` (
  `TelaID` int(11) NOT NULL,
  `Tela` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
  `TelaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `TelaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `TelaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `TelaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `TelaOrdem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Tela/Menu';

--
-- Despejando dados para a tabela `Tela`
--

INSERT INTO `Tela` (`TelaID`, `Tela`, `TelaStatus`, `TelaDTInativacao`, `TelaDTAtivacao`, `TelaDTBloqueio`, `TelaOrdem`) VALUES
(1, 'alunocompra', 1, NULL, '2021-02-23 02:45:44', NULL, 15),
(2, 'carteira', 1, NULL, '2021-02-14 00:38:39', NULL, 16),
(3, 'escola', 1, NULL, '2021-04-28 00:46:02', NULL, 9),
(4, 'escolacarteira', 1, NULL, '2021-02-14 00:39:21', NULL, 14),
(7, 'evento', 1, NULL, '2021-02-14 00:42:23', NULL, 6),
(8, 'eventoescola', 1, NULL, '2021-02-17 02:17:22', NULL, 10),
(9, 'informativoacesso', 1, NULL, '2021-02-17 02:07:47', NULL, 3),
(10, 'perfil', 1, NULL, '2021-02-17 02:18:36', NULL, 2),
(11, 'perfiltela', 1, NULL, '2021-02-15 02:47:37', NULL, 5),
(12, 'ponto', 1, NULL, '2021-02-15 03:54:49', NULL, 13),
(13, 'rede', 1, NULL, '2021-02-14 00:44:11', NULL, 1),
(15, 'tela', 1, NULL, '2021-03-06 11:37:27', NULL, 4),
(16, 'traducao', 1, NULL, '2021-02-15 00:27:36', NULL, 7),
(17, 'usuario', 1, NULL, '2021-02-15 00:28:00', NULL, 11),
(18, 'usuarioescola', 1, NULL, '2021-02-15 00:49:05', NULL, 12),
(19, 'usuarioescolainformativoacesso', 1, NULL, '2021-02-15 00:55:14', NULL, 8),
(27, 'cadastrodeparametros', 1, NULL, '2021-04-27 22:00:11', NULL, NULL),
(29, 'repassedepontosarquivo', 1, NULL, '2021-04-27 22:00:37', NULL, NULL),
(30, 'repassedepontosmanual', 1, NULL, '2021-04-27 22:00:44', NULL, NULL),
(31, 'administrarfaixaevento', 1, NULL, '2023-04-27 20:12:27', NULL, NULL),
(32, 'cadescola', 1, NULL, '2021-05-05 14:52:08', NULL, NULL),
(33, 'cadusuario', 1, NULL, '2021-05-05 14:52:22', NULL, NULL),
(34, 'cadeventoescola', 1, NULL, '2021-05-05 22:00:30', NULL, NULL),
(35, 'administrarfaixaeventonew', 1, NULL, '2021-05-05 22:20:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Traducao`
--

CREATE TABLE `Traducao` (
  `TraducaoID` int(11) NOT NULL,
  `TraducaoTextoBr` text COLLATE latin1_general_ci NOT NULL COMMENT 'Br',
  `TraducaoTextoUs` text COLLATE latin1_general_ci COMMENT 'Us',
  `TraducaoTextoEs` text COLLATE latin1_general_ci COMMENT 'Es'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tradução de texto Site';

--
-- Despejando dados para a tabela `Traducao`
--

INSERT INTO `Traducao` (`TraducaoID`, `TraducaoTextoBr`, `TraducaoTextoUs`, `TraducaoTextoEs`) VALUES
(1, 'Boa Noite', 'Good Night', 'Buenas Noches');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `UsuarioID` int(11) NOT NULL,
  `UsuarioLogin` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'login sistema\n',
  `UsuarioSenha` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'NOVA@1234' COMMENT 'senha para login',
  `UsuarioNome` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nome',
  `UsuarioStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `UsuarioDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
  `UsuarioDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `UsuarioDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `UsuarioEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `UsuarioCelular` decimal(11,0) DEFAULT NULL,
  `UsuarioMatricula` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PerfilID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Usurio, Todos os usurios ficam nessa tabela, no importal qual o perfil';

--
-- Despejando dados para a tabela `Usuario`
--

INSERT INTO `Usuario` (`UsuarioID`, `UsuarioLogin`, `UsuarioSenha`, `UsuarioNome`, `UsuarioStatus`, `UsuarioDTAtivacao`, `UsuarioDTInativacao`, `UsuarioDTBloqueio`, `UsuarioEmail`, `UsuarioCelular`, `UsuarioMatricula`, `PerfilID`) VALUES
(1, 'Mariana', '4915f0cd98ffc76cec145f434df97b7aa0c96c40', 'Mariana Bolsoes', 1, '2021-02-12 21:02:18', NULL, NULL, 'pedvitoriajddapenha@cna.com.br', '2732078885', 'Mat-mariana', 6),
(2, 'Yago', 'ca0a66d0aec6d94ed844457a89b18a93c09fd2b0', 'Yago Ferrari Bremenkamp', 1, '2021-02-12 21:07:13', NULL, NULL, 'yago_bremenkamp@hotmail.com', '27992992678', 'Mat-yago', 1),
(3, 'Vivian', 'ca0a66d0aec6d94ed844457a89b18a93c09fd2b0', 'Vivian Ferrari Bremenkamp', 1, '2021-02-15 01:32:53', NULL, NULL, 'vitoriajddapenha@cna.com.br', '27988198667', 'Mat-vivian', 4),
(4, 'Michele', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Michele Frazão Lima', 1, '2021-02-15 01:33:43', NULL, NULL, 'secvitoriajddapenha@cna.com.br', '2732078885', 'Mat-michele', 5),
(5, 'adimov', 'fc3fb3ffcf352aba103333ad6813f607b737c0ed', 'André Dimov', 1, '2021-03-29 09:59:27', NULL, NULL, 'andredimov@hotmail.com', '11940370514', 'mat_dimov', 2),
(6, 'Fernanda_Bremenkamp', 'e5daba832cd4dfbb3bc3a365ce5d12ab091686af', 'Fernanda', 1, '2021-03-31 16:18:12', NULL, NULL, 'febremankamp@hotmail.com', '27992523208', 'mat_fer', 5),
(7, 'lucas', '8a42103d71b212aad21d330cdfa4bc37871f97f5', 'lucas da silva', 1, '2021-03-31 16:20:44', NULL, NULL, 'vitoriajddapenha@cna.com.br', '27999999999', 'mat_lucas', 6),
(8, 'Bremenkamp', '6db11b352b9ee1a182a1efb9bbfa388510b869b6', 'Fernando Bremenkamp', 1, '2021-04-19 21:49:41', NULL, NULL, 'Bremenkamp@outlook.com', '27998746667', 'Mat-bremenkamp', 2),
(9, 'brendha', 'ca0a66d0aec6d94ed844457a89b18a93c09fd2b0', 'brendha Ferrari Bremenkamp', 1, '2021-04-27 01:40:10', NULL, NULL, 'Bremenkamp@outlook.com', '2732078885', 'mat-brendha', 6),
(10, 'LoginAlunoteste', '790886aa3fb44b19333dcf3f52db2951cfc66367', 'Nome do Aluno', 2, '2021-05-06 20:45:42', '2022-01-07 13:52:07', NULL, 'ccc@gmail.com', '22222222222', 'kjdje', 1),
(11, 'bremenkamp adm', 'ca0a66d0aec6d94ed844457a89b18a93c09fd2b0', 'bremenkamp administrativo', 1, '2021-05-06 22:04:58', NULL, NULL, 'Bremenkamp@outlook.com', '27998746667', 'Mat-bremenkamp', 3),
(12, 'ALICEGOMES', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ALICE GOMES FAZOLO PUPPIN', 1, '2021-12-14 00:38:38', NULL, NULL, 'ALICEGOMES@GMAIL.COM', '27999999999', '123', 1),
(14, 'ALICEGOMES1', '28722c18233cadd22bf85b447b010c87b1931b0a', 'ALICE GOMES FAZOLO PUPPIN', 1, '2021-12-14 00:39:39', NULL, NULL, 'ALICEGOMES@GMAIL.COM', '27999999999', '123', 1),
(15, 'teste', '2e6f9b0d5885b6010f9167787445617f553a735f', 'teste', 1, '2022-11-01 20:54:40', NULL, NULL, 'teste', '35999999999', 'teste', 3),
(17, 'testes1', 'd669dd0ef2fbd21900796d98cf6b38287a586b20', 'testes 1', 1, '2023-04-29 04:08:11', NULL, NULL, 'bremenkamp@outlook.com', '27998746667', '123', 1),
(18, 'professor1', '8a42103d71b212aad21d330cdfa4bc37871f97f5', 'professor 1', 1, '2023-04-29 04:18:02', NULL, NULL, 'professor1@email.com', '27998746667', '123', 6),
(19, 'SECRET PCANTO', 'e5daba832cd4dfbb3bc3a365ce5d12ab091686af', 'SECRETARIA PRAIA DO CANTO', 1, '2023-04-29 04:36:26', NULL, NULL, 'SEC@SEN.COM.BR', '28999999999', 'MAT01', 5),
(20, 'ALUNO 1', 'c0b09145b0bc17cd06ad46232ab3b141ad06852e', 'ALUNO 1', 1, '2023-04-29 04:38:14', NULL, NULL, 'AAS', '28999999999', '123', 1),
(21, 'ALUNO 2', 'c0b09145b0bc17cd06ad46232ab3b141ad06852e', 'ALUNO 2', 1, '2023-04-29 04:38:47', NULL, NULL, 'EQWEQWEQ', '28999999999', '12312', 1),
(22, 'aluno1', 'e5daba832cd4dfbb3bc3a365ce5d12ab091686af', 'aluno 1 pcanto', 1, '2023-04-29 05:05:00', NULL, NULL, 'dsdas', '0', 'qq123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `UsuarioEscola`
--

CREATE TABLE `UsuarioEscola` (
  `UsuarioEscolaID` int(11) NOT NULL,
  `UsuarioEscolaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
  `UsuarioEscolaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
  `UsuarioEscolaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `UsuarioEscolaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
  `UsuarioID` int(11) NOT NULL,
  `EscolaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Usuario com Escola, no importa o perfil';

--
-- Despejando dados para a tabela `UsuarioEscola`
--

INSERT INTO `UsuarioEscola` (`UsuarioEscolaID`, `UsuarioEscolaStatus`, `UsuarioEscolaDTInativacao`, `UsuarioEscolaDTAtivacao`, `UsuarioEscolaDTBloqueio`, `UsuarioID`, `EscolaID`) VALUES
(48, 1, NULL, '2021-05-06 22:01:35', NULL, 7, 4),
(54, 1, NULL, '2021-05-06 22:02:16', NULL, 10, 3),
(55, 1, NULL, '2021-05-06 22:05:35', NULL, 1, 1),
(56, 1, NULL, '2021-05-06 22:05:35', NULL, 2, 1),
(57, 1, NULL, '2021-05-06 22:05:35', NULL, 3, 1),
(58, 1, NULL, '2021-05-06 22:05:35', NULL, 4, 1),
(59, 1, NULL, '2021-05-06 22:05:35', NULL, 9, 1),
(65, 1, NULL, '2023-04-29 05:17:12', NULL, 12, 2),
(66, 1, NULL, '2023-04-29 05:17:12', NULL, 17, 2),
(67, 1, NULL, '2023-04-29 05:17:12', NULL, 22, 2),
(68, 1, NULL, '2023-04-29 05:17:12', NULL, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `UsuarioEscolaInformativoAcesso`
--

CREATE TABLE `UsuarioEscolaInformativoAcesso` (
  `UsuarioEscolaInformativoAcessoID` int(11) NOT NULL,
  `UsuarioEscolaInformativoAcesso` int(11) NOT NULL COMMENT '1 -> Aprovado, 2 -> No Aprovado',
  `UsuarioEscolaInformativoAcessoIDDTAcao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
  `UsuarioEscolaID` int(11) NOT NULL,
  `InformativoAcessoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Usurio com Informativo de Primeiro Acesso e Parecer de Aceite';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `AlunoCompra`
--
ALTER TABLE `AlunoCompra`
  ADD PRIMARY KEY (`AlunoCompraID`),
  ADD KEY `fk_AlunoCompra_UsuarioEscola` (`UsuarioEscolaID`);

--
-- Índices de tabela `Escola`
--
ALTER TABLE `Escola`
  ADD PRIMARY KEY (`EscolaID`),
  ADD UNIQUE KEY `uk_EscolaCod` (`EscolaCod`),
  ADD KEY `fk_Escola_Rede` (`RedeID`);

--
-- Índices de tabela `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`EventoID`),
  ADD UNIQUE KEY `uk_EventoCod` (`EventoCod`),
  ADD KEY `fk_Evento_Usuario` (`UsuarioID`);

--
-- Índices de tabela `EventoEscola`
--
ALTER TABLE `EventoEscola`
  ADD PRIMARY KEY (`EventoEscolaID`),
  ADD UNIQUE KEY `uk_EventoEscola` (`EscolaID`,`EventoID`),
  ADD KEY `fk_EventoEscola_Evento` (`EventoID`);

--
-- Índices de tabela `FaixaEvento`
--
ALTER TABLE `FaixaEvento`
  ADD PRIMARY KEY (`FaixaEventoID`),
  ADD KEY `fk_FaixaEvento_EventoEscola` (`EventoEscolaID`);

--
-- Índices de tabela `InformativoAcesso`
--
ALTER TABLE `InformativoAcesso`
  ADD PRIMARY KEY (`InformativoAcessoID`),
  ADD KEY `fk_InformativoAcesso_Escola` (`EscolaID`);

--
-- Índices de tabela `Perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`PerfilID`),
  ADD UNIQUE KEY `uk_PerfilCod` (`PerfilCod`);

--
-- Índices de tabela `PerfilTela`
--
ALTER TABLE `PerfilTela`
  ADD PRIMARY KEY (`PerfilTelaID`),
  ADD UNIQUE KEY `uk_PerfilTela` (`PerfilID`,`TelaID`),
  ADD KEY `fk_PerfilTela_Tela` (`TelaID`);

--
-- Índices de tabela `Ponto`
--
ALTER TABLE `Ponto`
  ADD PRIMARY KEY (`PontoID`),
  ADD KEY `fk_Ponto_UsuarioEscola` (`UsuarioEscolaID`);

--
-- Índices de tabela `PontoRecebido`
--
ALTER TABLE `PontoRecebido`
  ADD PRIMARY KEY (`PontoRecebidoID`),
  ADD KEY `fk_PontoRecebido_UsuarioEscola` (`UsuarioEscolaID`),
  ADD KEY `fk_PontoRecebido_FaixaEvento` (`FaixaEventoID`);

--
-- Índices de tabela `Rede`
--
ALTER TABLE `Rede`
  ADD PRIMARY KEY (`RedeID`),
  ADD UNIQUE KEY `uk_RedeCod` (`RedeCod`);

--
-- Índices de tabela `Tela`
--
ALTER TABLE `Tela`
  ADD PRIMARY KEY (`TelaID`),
  ADD UNIQUE KEY `uk_Tela` (`Tela`);

--
-- Índices de tabela `Traducao`
--
ALTER TABLE `Traducao`
  ADD PRIMARY KEY (`TraducaoID`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD UNIQUE KEY `uk_UsuarioLogin` (`UsuarioLogin`),
  ADD KEY `fk_Usuario_Perfil` (`PerfilID`);

--
-- Índices de tabela `UsuarioEscola`
--
ALTER TABLE `UsuarioEscola`
  ADD PRIMARY KEY (`UsuarioEscolaID`),
  ADD UNIQUE KEY `uk_UsuarioEscola` (`EscolaID`,`UsuarioID`),
  ADD KEY `fk_UsuarioEscola_Usuario` (`UsuarioID`);

--
-- Índices de tabela `UsuarioEscolaInformativoAcesso`
--
ALTER TABLE `UsuarioEscolaInformativoAcesso`
  ADD PRIMARY KEY (`UsuarioEscolaInformativoAcessoID`),
  ADD UNIQUE KEY `uk_UsuarioEscolaInformativoAcesso` (`UsuarioEscolaID`,`InformativoAcessoID`),
  ADD KEY `fk_UsuarioEscolaInformativoAcesso_InformativoAcesso` (`InformativoAcessoID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `AlunoCompra`
--
ALTER TABLE `AlunoCompra`
  MODIFY `AlunoCompraID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Escola`
--
ALTER TABLE `Escola`
  MODIFY `EscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Evento`
--
ALTER TABLE `Evento`
  MODIFY `EventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `EventoEscola`
--
ALTER TABLE `EventoEscola`
  MODIFY `EventoEscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de tabela `FaixaEvento`
--
ALTER TABLE `FaixaEvento`
  MODIFY `FaixaEventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `InformativoAcesso`
--
ALTER TABLE `InformativoAcesso`
  MODIFY `InformativoAcessoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Perfil`
--
ALTER TABLE `Perfil`
  MODIFY `PerfilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `PerfilTela`
--
ALTER TABLE `PerfilTela`
  MODIFY `PerfilTelaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=693;

--
-- AUTO_INCREMENT de tabela `Ponto`
--
ALTER TABLE `Ponto`
  MODIFY `PontoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `PontoRecebido`
--
ALTER TABLE `PontoRecebido`
  MODIFY `PontoRecebidoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Rede`
--
ALTER TABLE `Rede`
  MODIFY `RedeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Tela`
--
ALTER TABLE `Tela`
  MODIFY `TelaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `Traducao`
--
ALTER TABLE `Traducao`
  MODIFY `TraducaoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `UsuarioEscola`
--
ALTER TABLE `UsuarioEscola`
  MODIFY `UsuarioEscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `UsuarioEscolaInformativoAcesso`
--
ALTER TABLE `UsuarioEscolaInformativoAcesso`
  MODIFY `UsuarioEscolaInformativoAcessoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `AlunoCompra`
--
ALTER TABLE `AlunoCompra`
  ADD CONSTRAINT `fk_AlunoCompra_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `Escola`
--
ALTER TABLE `Escola`
  ADD CONSTRAINT `fk_Escola_Rede` FOREIGN KEY (`RedeID`) REFERENCES `Rede` (`RedeID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `fk_Evento_Usuario` FOREIGN KEY (`UsuarioID`) REFERENCES `Usuario` (`UsuarioID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `EventoEscola`
--
ALTER TABLE `EventoEscola`
  ADD CONSTRAINT `fk_EventoEscola_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_EventoEscola_Evento` FOREIGN KEY (`EventoID`) REFERENCES `Evento` (`EventoID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `FaixaEvento`
--
ALTER TABLE `FaixaEvento`
  ADD CONSTRAINT `fk_FaixaEvento_EventoEscola` FOREIGN KEY (`EventoEscolaID`) REFERENCES `EventoEscola` (`EventoEscolaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `InformativoAcesso`
--
ALTER TABLE `InformativoAcesso`
  ADD CONSTRAINT `fk_InformativoAcesso_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `PerfilTela`
--
ALTER TABLE `PerfilTela`
  ADD CONSTRAINT `fk_PerfilTela_Perfil` FOREIGN KEY (`PerfilID`) REFERENCES `Perfil` (`PerfilID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_PerfilTela_Tela` FOREIGN KEY (`TelaID`) REFERENCES `Tela` (`TelaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `Ponto`
--
ALTER TABLE `Ponto`
  ADD CONSTRAINT `fk_Ponto_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `PontoRecebido`
--
ALTER TABLE `PontoRecebido`
  ADD CONSTRAINT `fk_PontoRecebido_FaixaEvento` FOREIGN KEY (`FaixaEventoID`) REFERENCES `FaixaEvento` (`FaixaEventoID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_PontoRecebido_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Perfil` FOREIGN KEY (`PerfilID`) REFERENCES `Perfil` (`PerfilID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `UsuarioEscola`
--
ALTER TABLE `UsuarioEscola`
  ADD CONSTRAINT `fk_UsuarioEscola_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_UsuarioEscola_Usuario` FOREIGN KEY (`UsuarioID`) REFERENCES `Usuario` (`UsuarioID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `UsuarioEscolaInformativoAcesso`
--
ALTER TABLE `UsuarioEscolaInformativoAcesso`
  ADD CONSTRAINT `fk_UsuarioEscolaInformativoAcesso_InformativoAcesso` FOREIGN KEY (`InformativoAcessoID`) REFERENCES `InformativoAcesso` (`InformativoAcessoID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_UsuarioEscolaInformativoAcesso_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
