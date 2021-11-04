-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/11/2021 às 02:32
-- Versão do servidor: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alissong_grupoalertaweb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_grupo`
--

CREATE TABLE `tb_acl_grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `grupo` varchar(25) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 0000,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de grupos de usuários.';

--
-- Despejando dados para a tabela `tb_acl_grupo`
--

INSERT INTO `tb_acl_grupo` (`id`, `grupo`, `descricao`, `permissao`, `status`) VALUES
(1, 'Super Administrador', 'Tem permissão total no sistema.', 1111, '1'),
(2, 'Administrador', 'Há restrições para permissão exclusão de dados', 0100, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu`
--

CREATE TABLE `tb_acl_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_palavra` int(10) UNSIGNED NOT NULL,
  `id_secao` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `label` varchar(255) NOT NULL,
  `traducao` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `target` varchar(20) DEFAULT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 0000,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editavel` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de menus';

--
-- Despejando dados para a tabela `tb_acl_menu`
--

INSERT INTO `tb_acl_menu` (`id`, `id_palavra`, `id_secao`, `id_parent`, `label`, `traducao`, `link`, `icon`, `target`, `ordem`, `permissao`, `updated_at`, `editavel`, `status`) VALUES
(1, 0, 2, 0, 'Home', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'home', NULL, NULL, 0, 0000, '2021-11-01 00:02:35', '1', '1'),
(2, 0, 2, 0, 'O Grupo', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'o-grupo', NULL, NULL, 0, 0000, '2021-11-01 00:02:45', '1', '1'),
(3, 0, 2, 0, 'Empresas do Grupo', '{\"en\":\"Empresas do grupo\",\"hr\":\"Empresas do grupo\",\"pt-br\":\"Empresas do grupo\"}', 'empresas-do-grupo', NULL, NULL, 0, 0000, '2021-10-31 23:13:08', '1', '1'),
(4, 0, 2, 0, 'Orçamento', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'orcamento', NULL, NULL, 0, 0000, '2021-11-01 00:02:52', '1', '1'),
(5, 0, 2, 0, 'Área do Cliente', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'area-do-cliente', NULL, NULL, 0, 0000, '2021-11-01 00:03:01', '1', '1'),
(6, 0, 2, 0, 'Contato', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'contato', NULL, NULL, 0, 0000, '2021-11-01 00:03:08', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_grupo`
--

CREATE TABLE `tb_acl_menu_grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para atribuições de menus a grupos de usuários.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_secao`
--

CREATE TABLE `tb_acl_menu_secao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `secao` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de seções de menus. Seções correspondem ao local onde o menu se localizará: sidebar, header, footer, etc...';

--
-- Despejando dados para a tabela `tb_acl_menu_secao`
--

INSERT INTO `tb_acl_menu_secao` (`id`, `id_modulo`, `secao`, `slug`, `descricao`, `status`) VALUES
(1, 1, 'Menu Principal', 'sidebar', 'Menu principal da área administrativa', '1'),
(2, 2, 'Main Principal', 'main-menu', 'Menu principal da área pública', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo`
--

CREATE TABLE `tb_acl_modulo` (
  `id` int(10) UNSIGNED NOT NULL,
  `modulo` varchar(50) NOT NULL,
  `diretorio` varchar(50) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de módulos. Módulos correspondem aos diretórios da aplicação: main, admin, etc...';

--
-- Despejando dados para a tabela `tb_acl_modulo`
--

INSERT INTO `tb_acl_modulo` (`id`, `modulo`, `diretorio`, `descricao`, `status`) VALUES
(1, 'área administrativa', 'admin', 'Área administrativa do site', '1'),
(2, 'área pública', 'main', 'Área pública do site', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_rotas`
--

CREATE TABLE `tb_acl_rotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `type` enum('add','get','post','put','head','options','delete','patch','match','resource','map','group') NOT NULL DEFAULT 'add',
  `route` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `filter` longtext DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 0000,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de rotas de menus.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario`
--

CREATE TABLE `tb_acl_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_gestor` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 0000,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de usuários';

--
-- Despejando dados para a tabela `tb_acl_usuario`
--

INSERT INTO `tb_acl_usuario` (`id`, `id_grupo`, `id_gestor`, `nome`, `email`, `login`, `senha`, `salt`, `ultimo_login`, `permissao`, `updated_at`, `status`) VALUES
(1, 1, 0, 'Alisson', 'alisson', 'alissonguedes87@gmail.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3', NULL, '2021-03-08 22:40:38', 0110, NULL, '1'),
(2, 2, 0, 'Edvan', 'edvan', 'edvan', 'b123e9e19d217169b981a61188920f9d28638709a513220168', NULL, '2021-03-03 08:38:46', 0000, NULL, '1'),
(3, 1, 0, 'Alisson', 'alissonguedes87@gmail.com', 'alisson', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3', NULL, '0000-00-00 00:00:00', 0000, NULL, '1'),
(4, 1, 0, 'Felipe', 'felipeweb@hotmail.com', 'felipeweb', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3', NULL, '0000-00-00 00:00:00', 0000, NULL, '1'),
(5, 2, 0, 'teste', 'teste@teste.com', 'teste', 'b123e9e19d217169b981a61188920f9d28638709a513220168', NULL, '0000-00-00 00:00:00', 0000, NULL, '1'),
(6, 2, 0, 'Isaac Brigano', 'isaacbrigano@email.com', 'isaacbrigano', 'd866fcd2a66112773d45e594e2b7be2c4e095a2c54419c78c1', NULL, '0000-00-00 00:00:00', 0000, NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario_imagem`
--

CREATE TABLE `tb_acl_usuario_imagem` (
  `id_imagem` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `privada` enum('0','1') NOT NULL,
  `data_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_album`
--

CREATE TABLE `tb_album` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_attachment`
--

CREATE TABLE `tb_attachment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL COMMENT 'Chave estrangeira referente à tabela identificada na coluna `modulo`',
  `modulo` varchar(100) NOT NULL COMMENT 'Coluna que identifica a tabela ou página que está referenciando.',
  `path` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL COMMENT 'Título do arquivo',
  `descricao` text DEFAULT NULL COMMENT 'Texto descritivo do arquivo',
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quantidade de clicks/visualizações do arquivo',
  `url` varchar(255) DEFAULT NULL COMMENT 'Um link externo para arquivo se houver',
  `size` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Tamanho do arquivo',
  `author` varchar(500) NOT NULL COMMENT 'Id do usuário que fez a importação do arquivo',
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem para o caso de o arquivo for uma imagem e pertencer a um banner',
  `tags` varchar(200) DEFAULT NULL COMMENT 'Tags de pesquisa',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Data de criação do arquivo',
  `updated_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Data a última modificação do arquivo',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Situação de exibição do banner. 0 - Não exibir; 1 - Exibir.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Numero sequencial',
  `titulo` varchar(255) DEFAULT NULL COMMENT 'Título principal do banner.',
  `alias` varchar(255) DEFAULT NULL COMMENT 'Título sem caracteres especiais para identificar o banner.',
  `descricao` text DEFAULT NULL COMMENT 'Texto descritivo do banner',
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quantidade de clicks/visualizações do banner',
  `link` varchar(255) DEFAULT NULL COMMENT 'Link para artigo',
  `imagem` varchar(255) NOT NULL COMMENT 'Caminho ou nome da imagem do banner',
  `original_name` varchar(255) NOT NULL,
  `imgsize` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Tamanho da imagem do banner',
  `dataadd` timestamp NULL DEFAULT current_timestamp() COMMENT 'Data de criação do banner',
  `autor` varchar(50) NOT NULL COMMENT 'Autor de criação do banner',
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem do banner',
  `publish_up` date DEFAULT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date DEFAULT NULL COMMENT 'Data para parar exibição do banner',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `tags` varchar(200) DEFAULT NULL COMMENT 'Tags de pesquisa do banner',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Situação de exibição do banner. 0 - Não exibir; 1 - Exibir.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_banner`
--

INSERT INTO `tb_banner` (`id`, `titulo`, `alias`, `descricao`, `clicks`, `link`, `imagem`, `original_name`, `imgsize`, `dataadd`, `autor`, `ordem`, `publish_up`, `publish_down`, `updated_at`, `created_at`, `tags`, `status`) VALUES
(10, 'Teste', NULL, NULL, 0, 'teste', 'assets/grupoalertaweb/wp-content/uploads/2021/11/banners/eb0208e98ffe319db076d9c1dba536402eb53878.jpg', 'slider_02_a.jpg', 0, '2021-10-30 16:32:13', '1', 0, NULL, NULL, '2021-11-01 07:53:00', '2021-10-30 16:32:13', NULL, '1'),
(11, 'asdf', NULL, 'asdf', 0, 'asdf', 'assets/grupoalertaweb/wp-content/uploads/2021/11/banners/a9620cf1e8985468638f13ae7df36cd10ac58fe6.jpg', 'slider_03_a.jpg', 0, '2021-11-01 01:02:38', '1', 0, NULL, NULL, '2021-11-01 07:21:48', '2021-11-01 01:02:38', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(3) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `imagem`, `descricao`, `rua`, `cep`, `bairro`, `cidade`, `uf`, `complemento`, `created_at`, `updated_at`, `status`) VALUES
(3, 'asdf', 'assets/grupoalertaweb/wp-content/uploads/2021/11/clientes/42c5a120f9d5cd7f83802225e82b9b5a273f2778.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-01 01:34:35', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente_email`
--

CREATE TABLE `tb_cliente_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente_telefone`
--

CREATE TABLE `tb_cliente_telefone` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor`
--

CREATE TABLE `tb_distribuidor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor_email`
--

CREATE TABLE `tb_distribuidor_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor_telefone`
--

CREATE TABLE `tb_distribuidor_telefone` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_email`
--

CREATE TABLE `tb_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_reply` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Chave primária da tabela.',
  `cnpj` varchar(18) NOT NULL COMMENT 'CNPJ da empresa.',
  `inscricao_estadual` varchar(14) NOT NULL COMMENT 'Inscrição Estadual da empresa',
  `inscricao_municipal` varchar(20) NOT NULL COMMENT 'Inscrição Municipal da empresa.',
  `razao_social` varchar(200) NOT NULL COMMENT 'Razão Social da empresa',
  `nome_fantasia` varchar(200) NOT NULL COMMENT 'Nome Fantasia da empresa.',
  `cep` varchar(9) NOT NULL COMMENT 'CEP do endereço da empresa',
  `endereco` varchar(200) NOT NULL COMMENT 'Endereço da empresa',
  `numero` varchar(11) NOT NULL COMMENT 'Número do endereço da empresa',
  `bairro` varchar(200) NOT NULL COMMENT 'Bairro do endereço da empresa',
  `complemento` varchar(200) DEFAULT NULL COMMENT 'Complemento do endereço da empresa',
  `cidade` varchar(200) NOT NULL COMMENT 'Cidade',
  `estado` varchar(3) NOT NULL COMMENT 'Estado',
  `quem_somos` text DEFAULT NULL COMMENT 'Descrição da empresa',
  `quem_somos_imagem` varchar(255) DEFAULT NULL,
  `distribuidor_imagem` varchar(255) DEFAULT NULL,
  `contato_imagem` varchar(255) DEFAULT NULL,
  `telefone` varchar(16) NOT NULL COMMENT 'Número do telefone da empresa',
  `celular` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'E-mail da empresa',
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `gplus` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `gmaps` varchar(255) DEFAULT NULL,
  `aliquota_imposto` decimal(10,3) UNSIGNED NOT NULL DEFAULT 0.000 COMMENT 'Alíquota de imposto da empresa',
  `tributacao` enum('SIMPLES NACIONAL','SN - EXCESSO DE SUB-LIMITE DA RECEITA','REGIME NORMAL') NOT NULL DEFAULT 'SIMPLES NACIONAL' COMMENT 'Tipo de tributação',
  `certificado` blob DEFAULT NULL COMMENT 'Localização do arquivo de certificado digital para emissão de notas fiscais',
  `senha_certificado` varchar(255) NOT NULL COMMENT 'Senha do certificado digital',
  `ambiente` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Tipo do ambiente de emissão de notas fiscais. 0 - Homologação; 1 - Produção',
  `sequence_nfe` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal eletrônica emitida.',
  `sequence_nfce` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal de consumidor emitida.',
  `serie_nfe` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal eletrônica.',
  `serie_nfce` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal de consumidor.',
  `tokencsc` varchar(6) DEFAULT NULL COMMENT 'Token CSC',
  `csc` varchar(36) DEFAULT NULL COMMENT 'CSC',
  `matriz` enum('S','N') NOT NULL DEFAULT 'N' COMMENT 'Identifica como loja Matriz ou Filial',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de cadastro de lojas/empresas';

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`id`, `cnpj`, `inscricao_estadual`, `inscricao_municipal`, `razao_social`, `nome_fantasia`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `quem_somos`, `quem_somos_imagem`, `distribuidor_imagem`, `contato_imagem`, `telefone`, `celular`, `email`, `facebook`, `instagram`, `gplus`, `linkedin`, `github`, `gmaps`, `aliquota_imposto`, `tributacao`, `certificado`, `senha_certificado`, `ambiente`, `sequence_nfe`, `sequence_nfce`, `serie_nfe`, `serie_nfce`, `tokencsc`, `csc`, `matriz`, `status`) VALUES
(1, '', '', '', '', '', '', '', '', '', NULL, '', '', NULL, NULL, NULL, '/embaixada_cod/public_html/assets/embaixada/img/quem_somos/1610941873_d36a8dfdb8b8262fcb0d.png', '', '', '', '', '', NULL, '', NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, '', '0', 0, 0, 00, 00, NULL, NULL, 'N', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_lead`
--

CREATE TABLE `tb_lead` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de adição de links rápidos do site';

--
-- Despejando dados para a tabela `tb_link`
--

INSERT INTO `tb_link` (`id`, `titulo`, `descricao`, `slug`, `link`, `imagem`, `status`, `created_at`, `updated_at`) VALUES
(1, 'link 1', '{\"en\":\"I want to get a visa\",\"hr\":\"Szeretn\\u00e9k v\\u00edzumot szerezni\",\"pt-br\":\"Quero obter um visto\"}', 'quero-obter-um-visto', NULL, 'assets/embaixada/links/92ab3940864627db856a9f920b327ca6e4bef983.png', '1', '2021-07-09 10:29:36', '2021-11-01 07:46:07'),
(2, 'link 2', '{\"en\":\"link 2\",\"hr\":\"link 2\",\"pt-br\":\"link 2\"}', 'link-2', NULL, 'assets/embaixada/links/4f32e9cfbb6f3e7f796d25545b767e3cb037faf2.png', '1', '2021-07-09 10:32:50', '2021-11-01 08:02:08'),
(3, 'link 3', '{\"en\":\"link 3\",\"hr\":\"link 3\",\"pt-br\":\"link 3\"}', 'link-3', NULL, 'assets/embaixada/links/0d9180489fa55228acf69b37cd0ba215782afc32.png', '1', '2021-07-09 10:33:43', '2021-11-01 08:02:40'),
(4, 'link 4', '{\"en\":\"link 4\",\"hr\":\"link 4\",\"pt-br\":\"link 4\"}', 'link-4', NULL, 'assets/embaixada/links/92ab3940864627db856a9f920b327ca6e4bef983.png', '1', '2021-07-09 10:34:23', '2021-11-01 08:02:50'),
(5, 'link 6', '{\"en\":\"link 6\",\"hr\":\"link 6\",\"pt-br\":\"link 6\"}', 'link-6', NULL, 'assets/embaixada/links/be455cd88fc46cb5882ade28af01bf09c741e1c8.png', '1', '2021-07-09 10:34:54', '2021-11-01 08:02:58'),
(6, 'link 5', '{\"en\":\"link 5\",\"hr\":\"link 5\",\"pt-br\":\"link 5\"}', 'link-5', NULL, 'assets/embaixada/links/f918dba21d265d1c17255955c11888c406ca8556.png', '1', '2021-07-09 10:35:28', '2021-11-01 08:02:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_link_pagina`
--

CREATE TABLE `tb_link_pagina` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_link` int(10) UNSIGNED NOT NULL,
  `id_pagina` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para vincluar um link a uma página';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_noticia`
--

CREATE TABLE `tb_noticia` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `idioma` varchar(5) NOT NULL COMMENT 'Idioma padrão da postagem',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pagina`
--

CREATE TABLE `tb_pagina` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_pagina` int(10) UNSIGNED DEFAULT 0,
  `tipo` varchar(20) NOT NULL DEFAULT 'post' COMMENT 'Informa o tipo de página: Página simples ou galeria de fotos',
  `titulo` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `subtitulo` text DEFAULT NULL,
  `texto` longblob NOT NULL,
  `arquivo` text DEFAULT NULL,
  `idioma` varchar(5) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_pagina`
--

INSERT INTO `tb_pagina` (`id`, `id_menu`, `id_pagina`, `tipo`, `titulo`, `slug`, `descricao`, `subtitulo`, `texto`, `arquivo`, `idioma`, `created_at`, `updated_at`, `status`) VALUES
(41, 3, 0, 'post', 'Alerta Segurança Eletrônica', 'alerta-seguranca-eletronica', 'Alerta Segurança Eletrônica', NULL, 0x3c703e666164733c2f703e, NULL, 'en', '2021-11-01 02:13:39', '2021-11-01 05:34:26', '1'),
(42, 3, 0, 'post', 'Alerta Serviços', 'alerta-servicos', 'Alerta Serviços', NULL, 0x3c703e617364663c2f703e, NULL, 'en', '2021-11-01 02:14:13', '2021-11-01 05:34:29', '1'),
(43, 3, 0, 'post', 'Força Alerta', 'forca-alerta', 'Força Alerta', NULL, 0x3c703e617364663c2f703e, NULL, 'en', '2021-11-01 02:14:48', '2021-11-01 05:36:40', '1'),
(44, 3, 0, 'post', 'Alerta Construtora', 'alerta-construtora', 'Alerta Construtora', NULL, 0x3c703e61736466617364663c2f703e, NULL, 'en', '2021-11-01 02:27:00', '2021-11-01 05:35:13', '1'),
(45, 3, 0, 'post', 'Alerta Portaria Virtual', 'alerta-portaria-virtual', 'Alerta Portaria Virtual', NULL, 0x3c703e617364663c2f703e, NULL, 'en', '2021-11-01 02:30:46', '2021-11-01 05:34:48', '1'),
(46, 3, 0, 'post', 'Força Alerta Segurança e Transporte de Valores', 'forca-alerta-seguranca-e-transporte-de-valores', 'Força Alerta Segurança e Transporte de Valores', NULL, 0x3c703e617364663c2f703e, NULL, 'en', '2021-11-01 02:31:49', '2021-11-01 05:34:35', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pagina_album`
--

CREATE TABLE `tb_pagina_album` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Numero sequencial',
  `id_album` int(10) UNSIGNED NOT NULL,
  `id_pagina` int(10) UNSIGNED DEFAULT NULL COMMENT 'Título principal do banner.',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Data de criação do banner',
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Situação de exibição do banner. 0 - Não exibir; 1 - Exibir.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `modo_uso` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `valor` decimal(10,3) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto_categoria`
--

CREATE TABLE `tb_produto_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_config`
--

CREATE TABLE `tb_sys_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Número sequencial da tabela.',
  `config` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL COMMENT 'Endereço do website',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de configurações do site';

--
-- Despejando dados para a tabela `tb_sys_config`
--

INSERT INTO `tb_sys_config` (`id`, `config`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'asdf', '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(2, 'site_description', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(3, 'site_url', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(4, 'language', 'en', '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(5, 'site_logo', 'assets/grupoalertaweb/wp-content/uploads/2021/11/b0ee4b6d8eb3e066d1913a064d75da0df4300c66.png', '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(6, 'site_tags', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(7, 'contact_email', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(8, 'contact_phone', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(9, 'contact_cel', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(10, 'facebook', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(11, 'instagram', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(12, 'linkedin', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(13, 'address', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(14, 'address_nro', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(15, 'cep', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(16, 'complemento', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(17, 'bairro', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(18, 'cidade', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(19, 'uf', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(20, 'pais', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(21, 'gmaps', NULL, '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(22, 'original_logo_name', 'logo_dark.png', '2021-11-01 05:25:29', '2021-11-01 05:25:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_dicionario`
--

CREATE TABLE `tb_sys_dicionario` (
  `id` int(10) UNSIGNED NOT NULL,
  `palavra` text NOT NULL,
  `definicao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_idioma`
--

CREATE TABLE `tb_sys_idioma` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `sigla` varchar(7) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_sys_idioma`
--

INSERT INTO `tb_sys_idioma` (`id`, `descricao`, `sigla`, `imagem`, `updated_at`, `status`) VALUES
(1, 'Português', 'pt-br', 'img/localidades/1612531977_220a6c6c090a89d743e9.jpg', '2021-07-28 23:44:33', '1'),
(2, 'English', 'en', 'img/localidades/1612531878_bd7502753e5de17e7b45.jpg', '2021-03-11 21:36:10', '1'),
(3, 'Húngaro', 'hr', 'img/localidades/1612531970_988317c9bd4ee27b70dc.jpg', '2021-03-07 22:06:18', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_idioma_dicionario`
--

CREATE TABLE `tb_sys_idioma_dicionario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `id_palavra` int(10) UNSIGNED NOT NULL,
  `traducao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_acl_grupo`
--
ALTER TABLE `tb_acl_grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo` (`grupo`);

--
-- Índices de tabela `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_acl_menu_id_secao` (`id_secao`);

--
-- Índices de tabela `tb_acl_menu_grupo`
--
ALTER TABLE `tb_acl_menu_grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_menu` (`id_menu`,`id_grupo`),
  ADD KEY `fk_tb_acl_menu_grupo_id_grupo` (`id_grupo`);

--
-- Índices de tabela `tb_acl_menu_secao`
--
ALTER TABLE `tb_acl_menu_secao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_modulo` (`id_modulo`,`secao`,`slug`);

--
-- Índices de tabela `tb_acl_modulo`
--
ALTER TABLE `tb_acl_modulo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modulo` (`modulo`),
  ADD UNIQUE KEY `diretorio` (`diretorio`);

--
-- Índices de tabela `tb_acl_rotas`
--
ALTER TABLE `tb_acl_rotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_acl_rotas_id_menu` (`id_menu`);

--
-- Índices de tabela `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_tb_acl_usuario_id_grupo` (`id_grupo`);

--
-- Índices de tabela `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `tb_acl_usuario_imagem_id_usuario` (`id_usuario`);

--
-- Índices de tabela `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_attachment`
--
ALTER TABLE `tb_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_cliente_email`
--
ALTER TABLE `tb_cliente_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cliente_email_id_cliente` (`id_cliente`);

--
-- Índices de tabela `tb_cliente_telefone`
--
ALTER TABLE `tb_cliente_telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cliente_telefone_id_cliente` (`id_cliente`);

--
-- Índices de tabela `tb_distribuidor`
--
ALTER TABLE `tb_distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_distribuidor_email`
--
ALTER TABLE `tb_distribuidor_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_distribuidor_email_id_distribuidor` (`id_distribuidor`);

--
-- Índices de tabela `tb_distribuidor_telefone`
--
ALTER TABLE `tb_distribuidor_telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_distribuidor_telefone_id_distribuidor` (`id_distribuidor`);

--
-- Índices de tabela `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `tb_lead`
--
ALTER TABLE `tb_lead`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_lead_id_cliente` (`id_cliente`),
  ADD KEY `tb_lead_id_produto` (`id_produto`);

--
-- Índices de tabela `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_link_pagina`
--
ALTER TABLE `tb_link_pagina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_link_pagina_id_link` (`id_link`),
  ADD KEY `fk_tb_link_pagina_id_pagina` (`id_pagina`);

--
-- Índices de tabela `tb_noticia`
--
ALTER TABLE `tb_noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_noticia_idioma` (`idioma`) USING BTREE,
  ADD KEY `fk_tb_noticia_id_menu` (`id_menu`);

--
-- Índices de tabela `tb_pagina`
--
ALTER TABLE `tb_pagina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_pagina_id_menu` (`id_menu`),
  ADD KEY `fk_tb_pagina_idioma` (`idioma`) USING BTREE;

--
-- Índices de tabela `tb_pagina_album`
--
ALTER TABLE `tb_pagina_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_album_foto_id_album` (`id_album`);

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_produto_id_categoria` (`id_categoria`);

--
-- Índices de tabela `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`config`);

--
-- Índices de tabela `tb_sys_dicionario`
--
ALTER TABLE `tb_sys_dicionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_sys_idioma`
--
ALTER TABLE `tb_sys_idioma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Índices de tabela `tb_sys_idioma_dicionario`
--
ALTER TABLE `tb_sys_idioma_dicionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_sys_idioma_id_palavra` (`id_palavra`),
  ADD KEY `fk_tb_sys_idioma_id_idioma` (`id_idioma`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_acl_grupo`
--
ALTER TABLE `tb_acl_grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu_grupo`
--
ALTER TABLE `tb_acl_menu_grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu_secao`
--
ALTER TABLE `tb_acl_menu_secao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_acl_modulo`
--
ALTER TABLE `tb_acl_modulo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_acl_rotas`
--
ALTER TABLE `tb_acl_rotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  MODIFY `id_imagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_attachment`
--
ALTER TABLE `tb_attachment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Numero sequencial', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_cliente_email`
--
ALTER TABLE `tb_cliente_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cliente_telefone`
--
ALTER TABLE `tb_cliente_telefone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_distribuidor`
--
ALTER TABLE `tb_distribuidor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_distribuidor_email`
--
ALTER TABLE `tb_distribuidor_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_distribuidor_telefone`
--
ALTER TABLE `tb_distribuidor_telefone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_email`
--
ALTER TABLE `tb_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Chave primária da tabela.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_lead`
--
ALTER TABLE `tb_lead`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_link_pagina`
--
ALTER TABLE `tb_link_pagina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_noticia`
--
ALTER TABLE `tb_noticia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_pagina`
--
ALTER TABLE `tb_pagina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tb_pagina_album`
--
ALTER TABLE `tb_pagina_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Numero sequencial', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Número sequencial da tabela.', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_sys_dicionario`
--
ALTER TABLE `tb_sys_dicionario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sys_idioma`
--
ALTER TABLE `tb_sys_idioma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_sys_idioma_dicionario`
--
ALTER TABLE `tb_sys_idioma_dicionario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  ADD CONSTRAINT `fk_tb_acl_menu_id_secao` FOREIGN KEY (`id_secao`) REFERENCES `tb_acl_menu_secao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_menu_grupo`
--
ALTER TABLE `tb_acl_menu_grupo`
  ADD CONSTRAINT `fk_tb_acl_menu_grupo_id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `tb_acl_grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_menu_grupo_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_menu_secao`
--
ALTER TABLE `tb_acl_menu_secao`
  ADD CONSTRAINT `fk_tb_acl_menu_secao_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_rotas`
--
ALTER TABLE `tb_acl_rotas`
  ADD CONSTRAINT `fk_tb_acl_rotas_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  ADD CONSTRAINT `fk_tb_acl_usuario_id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `tb_acl_grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  ADD CONSTRAINT `tb_acl_usuario_imagem_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_acl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cliente_email`
--
ALTER TABLE `tb_cliente_email`
  ADD CONSTRAINT `tb_cliente_email_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cliente_telefone`
--
ALTER TABLE `tb_cliente_telefone`
  ADD CONSTRAINT `tb_cliente_telefone_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_distribuidor_email`
--
ALTER TABLE `tb_distribuidor_email`
  ADD CONSTRAINT `fk_tb_distribuidor_email_id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `tb_distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_distribuidor_telefone`
--
ALTER TABLE `tb_distribuidor_telefone`
  ADD CONSTRAINT `fk_tb_distribuidor_telefone_id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `tb_distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_lead`
--
ALTER TABLE `tb_lead`
  ADD CONSTRAINT `tb_lead_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lead_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_link_pagina`
--
ALTER TABLE `tb_link_pagina`
  ADD CONSTRAINT `fk_tb_link_pagina_id_link` FOREIGN KEY (`id_link`) REFERENCES `tb_link` (`id`),
  ADD CONSTRAINT `fk_tb_link_pagina_id_pagina` FOREIGN KEY (`id_pagina`) REFERENCES `tb_pagina` (`id`);

--
-- Restrições para tabelas `tb_noticia`
--
ALTER TABLE `tb_noticia`
  ADD CONSTRAINT `fk_tb_noticia_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_noticia_idioma` FOREIGN KEY (`idioma`) REFERENCES `tb_sys_idioma` (`sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_pagina`
--
ALTER TABLE `tb_pagina`
  ADD CONSTRAINT `fk_tb_pagina_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_pagina_idioma` FOREIGN KEY (`idioma`) REFERENCES `tb_sys_idioma` (`sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_pagina_album`
--
ALTER TABLE `tb_pagina_album`
  ADD CONSTRAINT `fk_tb_album_foto_id_album` FOREIGN KEY (`id_album`) REFERENCES `tb_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `tb_produto_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_produto_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_sys_idioma_dicionario`
--
ALTER TABLE `tb_sys_idioma_dicionario`
  ADD CONSTRAINT `fk_tb_sys_idioma_id_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_sys_idioma_id_palavra` FOREIGN KEY (`id_palavra`) REFERENCES `tb_sys_dicionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
