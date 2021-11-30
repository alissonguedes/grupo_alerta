-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25/11/2021 às 16:57
-- Versão do servidor: 10.5.12-MariaDB-0+deb11u1
-- Versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alissond_grupoalertaweb`
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
(1, 0, 2, 0, 'Home', '[]', 'home', NULL, NULL, 0, 0000, '2021-11-17 14:02:47', '0', '1'),
(2, 0, 2, 0, 'O Grupo', '[]', 'o-grupo', NULL, NULL, 0, 0000, '2021-11-17 14:02:37', '0', '1'),
(3, 0, 2, 0, 'Empresas do Grupo', '[]', 'empresas-do-grupo', NULL, NULL, 0, 0000, '2021-11-17 14:04:39', '1', '1'),
(4, 0, 2, 0, 'Notícias', '[]', 'noticias', NULL, NULL, 0, 0000, '2021-11-17 14:02:44', '0', '1'),
(5, 0, 2, 0, 'Orçamento', '[]', 'orcamento', NULL, NULL, 0, 0000, '2021-11-17 14:02:33', '0', '1'),
(6, 0, 2, 0, 'Área do Cliente', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'area-do-cliente', NULL, NULL, 0, 0000, '2021-11-01 00:03:01', '1', '1'),
(7, 0, 2, 0, 'Contato', '{\"en\":\"\",\"hr\":\"\",\"pt-br\":\"\"}', 'contato', NULL, NULL, 0, 0000, '2021-11-01 00:03:08', '1', '1');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de usuários';

--
-- Despejando dados para a tabela `tb_acl_usuario`
--

INSERT INTO `tb_acl_usuario` (`id`, `id_grupo`, `id_gestor`, `nome`, `email`, `login`, `senha`, `salt`, `ultimo_login`, `permissao`, `created_at`, `updated_at`, `status`) VALUES
(3, 1, 0, 'Alisson', 'alissonguedes87@gmail.com', 'alisson', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3', NULL, '2021-11-25 12:06:26', 0000, '2021-11-23 18:31:32', '2021-11-25 15:06:26', '1');

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

--
-- Despejando dados para a tabela `tb_attachment`
--

INSERT INTO `tb_attachment` (`id`, `id_modulo`, `modulo`, `path`, `realname`, `titulo`, `descricao`, `clicks`, `url`, `size`, `author`, `ordem`, `tags`, `created_at`, `updated_at`, `status`) VALUES
(1, 45, 'page', 'assets/embaixada/documentos/cdb5e267e382a7c77d42662bdb2f079e6f485744618621ef32a18.png', 'icon_whats.png', NULL, NULL, 0, NULL, 4591, 'Alisson', 0, NULL, '2021-11-06 06:34:23', '2021-11-06 06:34:23', '1');

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
(11, 'asdf', NULL, 'asdf', 0, 'asdf', 'assets/grupoalertaweb/wp-content/uploads/2021/11/banners/a9620cf1e8985468638f13ae7df36cd10ac58fe6.jpg', 'slider_03_a.jpg', 0, '2021-11-01 01:02:38', '1', 0, NULL, NULL, '2021-11-01 07:21:48', '2021-11-01 01:02:38', NULL, '1'),
(13, '2', NULL, NULL, 0, '2', 'assets/grupoalertaweb/wp-content/uploads/2021/11/banners/cbccf905014d4c2147e769291a273148f8def1b2.png', 'client_05.png', 0, '2021-11-25 15:07:29', '3', 0, NULL, NULL, NULL, '2021-11-25 15:07:29', NULL, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
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

INSERT INTO `tb_cliente` (`id`, `nome`, `imagem`, `site`, `descricao`, `rua`, `cep`, `bairro`, `cidade`, `uf`, `complemento`, `created_at`, `updated_at`, `status`) VALUES
(3, 'Especial Force', 'assets/grupoalertaweb/wp-content/uploads/2021/11/clientes/561a1f62c460e7cec951686a0318ed032653e896.png', 'http://localhost/teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-01 01:34:35', '2021-11-23 18:09:54', '1'),
(4, 'Especial CCtv Justice', 'assets/grupoalertaweb/wp-content/uploads/2021/11/clientes/ec785880cde5f31a4a7e59b41ebd996d68771c47.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-05 13:01:39', NULL, '1'),
(5, 'Fireman Departament', 'assets/grupoalertaweb/wp-content/uploads/2021/11/clientes/10965c7c4ada40d8ea75cd25a1ebbba2fa75d72e.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-05 13:01:56', NULL, '1'),
(6, 'Solution Giome', 'assets/grupoalertaweb/wp-content/uploads/2021/11/clientes/6b3af6b5a05bfd14c01829d24b503b0f9a7a89d6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-05 13:02:11', NULL, '1');

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
  `cnpj` varchar(18) DEFAULT NULL COMMENT 'CNPJ da empresa.',
  `inscricao_estadual` varchar(14) DEFAULT NULL COMMENT 'Inscrição Estadual da empresa',
  `inscricao_municipal` varchar(20) DEFAULT NULL COMMENT 'Inscrição Municipal da empresa.',
  `razao_social` varchar(200) NOT NULL COMMENT 'Razão Social da empresa',
  `nome_fantasia` varchar(200) DEFAULT NULL COMMENT 'Nome Fantasia da empresa.',
  `imagem` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL COMMENT 'CEP do endereço da empresa',
  `endereco` varchar(200) DEFAULT NULL COMMENT 'Endereço da empresa',
  `numero` varchar(11) DEFAULT NULL COMMENT 'Número do endereço da empresa',
  `bairro` varchar(200) DEFAULT NULL COMMENT 'Bairro do endereço da empresa',
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
  `senha_certificado` varchar(255) DEFAULT NULL COMMENT 'Senha do certificado digital',
  `ambiente` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Tipo do ambiente de emissão de notas fiscais. 0 - Homologação; 1 - Produção',
  `sequence_nfe` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal eletrônica emitida.',
  `sequence_nfce` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal de consumidor emitida.',
  `serie_nfe` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal eletrônica.',
  `serie_nfce` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal de consumidor.',
  `tokencsc` varchar(6) DEFAULT NULL COMMENT 'Token CSC',
  `csc` varchar(36) DEFAULT NULL COMMENT 'CSC',
  `matriz` enum('S','N') NOT NULL DEFAULT 'N' COMMENT 'Identifica como loja Matriz ou Filial',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de cadastro de lojas/empresas';

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`id`, `cnpj`, `inscricao_estadual`, `inscricao_municipal`, `razao_social`, `nome_fantasia`, `imagem`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `quem_somos`, `quem_somos_imagem`, `distribuidor_imagem`, `contato_imagem`, `telefone`, `celular`, `email`, `facebook`, `instagram`, `gplus`, `linkedin`, `github`, `gmaps`, `aliquota_imposto`, `tributacao`, `certificado`, `senha_certificado`, `ambiente`, `sequence_nfe`, `sequence_nfce`, `serie_nfe`, `serie_nfce`, `tokencsc`, `csc`, `matriz`, `created_at`, `updated_at`, `status`) VALUES
(4, NULL, NULL, NULL, 'Força Alerta Natal - RN', NULL, NULL, NULL, 'Rua Prefeito Sandoval Cavalcante de Albuquerque', '50', 'Candelária', NULL, 'Candelária', 'RN', NULL, NULL, NULL, NULL, '(84) 3302.0718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, NULL, '0', 0, 0, 00, 00, NULL, NULL, 'N', '2021-11-05 01:49:23', '2021-11-05 15:54:52', '1'),
(5, NULL, NULL, NULL, 'Força Alerta Aracaju - SE', NULL, NULL, NULL, 'Tv. Pedro Garcia Moreno Neto', '50', 'Inácio Barbosa', NULL, 'Aracaju', 'SE', NULL, NULL, NULL, NULL, '(79) 3021.1308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, NULL, '0', 0, 0, 00, 00, NULL, NULL, 'N', '2021-11-05 12:50:40', '2021-11-05 15:53:07', '1'),
(6, NULL, NULL, NULL, 'Força Alerta João Pessoa - PB', NULL, NULL, NULL, 'Av. Presidente Epitácio Pessoa', '1839', 'Estados', NULL, 'João Pessoa', 'PB', NULL, NULL, NULL, NULL, '(83) 3224.6581', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, NULL, '0', 0, 0, 00, 00, NULL, NULL, 'N', '2021-11-05 12:55:59', NULL, '1'),
(7, NULL, NULL, NULL, 'Força Alerta Recife - PE', NULL, NULL, NULL, 'R. Tabira', '121', 'Boa Vista', NULL, 'Recife', 'PE', NULL, NULL, NULL, NULL, '(81) 3129.1155', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, NULL, '0', 0, 0, 00, 00, NULL, NULL, 'N', '2021-11-05 12:56:44', NULL, '1'),
(8, NULL, NULL, NULL, 'Força Alerta Campina Grande - PB', NULL, NULL, NULL, 'Rua Estelita Cruz', '221', 'Alto Branco', NULL, 'Campina Grande', 'PB', NULL, NULL, NULL, NULL, '(83) 3341.1700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000', 'SIMPLES NACIONAL', NULL, NULL, '0', 0, 0, 00, 00, NULL, NULL, 'S', '2021-11-05 12:58:37', '2021-11-05 19:42:11', '1');

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
  `titulo` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `subtitulo` text DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `idioma` varchar(5) NOT NULL COMMENT 'Idioma padrão da postagem',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `titulo` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitulo` text DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'post' COMMENT 'Informa o tipo de página: Página simples ou galeria de fotos',
  `arquivo` text DEFAULT NULL,
  `idioma` varchar(5) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_pagina`
--

INSERT INTO `tb_pagina` (`id`, `id_menu`, `id_pagina`, `titulo`, `slug`, `subtitulo`, `descricao`, `texto`, `tipo`, `arquivo`, `idioma`, `created_at`, `updated_at`, `status`) VALUES
(41, 3, 0, 'Alerta Construtora', 'alerta-construtora', NULL, 'Alerta Segurança Eletrônica', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/888342f66f3068f7f669ec13a912300ca81e55f8.jpg\" width=\"1053\" height=\"701\" /></h3><h3>Alerta Construtora</h3><p>Mais do que construir empreendimentos residenciais e comerciais, ajudamos milhares de pessoas a construir projetos de vida, com responsabilidade social e ambiental e, principalmente, um rigoroso compromisso com a satisfa&ccedil;&atilde;o plena do cliente.</p><p>Mas a hist&oacute;ria da Alerta Construtora n&atilde;o se restringe &agrave;s nossas realiza&ccedil;&otilde;es. Por tr&aacute;s de tudo o que fazemos est&atilde;o os profissionais que trabalham na Alerta Construtora e d&atilde;o o melhor de si. Est&atilde;o os sonhos de quem idealizou a empresa e tornou realidade o que antes era apenas projeto. Est&atilde;o os parceiros, os fornecedores e os clientes, que confiam em nossos produtos e servi&ccedil;os.</p><h3>Benef&iacute;cios com este servi&ccedil;o</h3><p>Temos uma equipe qualificada e preparada, que conta com o melhor da tecnologia, garantindo servi&ccedil;os de alta qualidade e padr&otilde;es acima do exigido, com rapidez e confian&ccedil;a, fazendo o monitoramento da constru&ccedil;&atilde;o e a fiscaliza&ccedil;&atilde;o da obra. Visamos tamb&eacute;m que nossos profissionais tenham uma intera&ccedil;&atilde;o com o Cliente de forma que este atinja satisfa&ccedil;&atilde;o plena nos servi&ccedil;os executados, e acompanhamos passo a passo o desenvolvimento do projeto.</p><p><img style=\"float: left; margin-right: 30px;\" src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/4019e884c72596b1040abe1459a5c5406a0be303.jpg\" /></p><ul><li>Controle e gest&atilde;o da constru&ccedil;&atilde;o</li><li>Detalhes espec&iacute;ficos da obra</li><li>Or&ccedil;amento, compra e recebimento de materiais</li><li>Controle financeiro (elabora&ccedil;&atilde;o de or&ccedil;amentos e preven&ccedil;&atilde;o de gastos exacerbados)</li><li>Garantia de prazos e metas cumpridos</li><li>Projeto desenvolvido por profissionais extremamente qualificados e capacitados</li><li>Maior custo/benef&iacute;cio (economia em rela&ccedil;&atilde;o aos gastos durante a obra)</li><li>Mais rapidez na execu&ccedil;&atilde;o das constru&ccedil;&otilde;es</li><li>Materiais de qualidade que ir&atilde;o garantir a durabilidade da sua constru&ccedil;&atilde;o</li></ul>', 'post', NULL, 'pt-br', '2021-11-01 02:13:39', '2021-11-06 06:52:28', '1'),
(42, 3, 0, 'Alerta Serviços', 'alerta-servicos', NULL, 'Alerta Serviços', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/ddd52b29f02256f85e1cf7c6286d2e7d89f96d3a.jpg\" width=\"995\" height=\"663\" /></h3><h3>Alerta Servi&ccedil;os</h3><p>A Alerta Servi&ccedil;os, uma empresa especializada na presta&ccedil;&atilde;o de servi&ccedil;os terceirizados, com fornecimento de m&atilde;o de obra cont&iacute;nua ou tempor&aacute;ria. Presta servi&ccedil;os nos mais diversificados segmentos do mercado, tais como estabelecimentos comerciais, institui&ccedil;&otilde;es financeiras, condom&iacute;nios, hospitais, clinicas m&eacute;dicas, institui&ccedil;&otilde;es de ensinos, entre outros.</p><p>Desempenhando os conceitos de limpeza e higieniza&ccedil;&atilde;o de ambientes, objetivando os melhores resultados para os seus clientes. Disponibiliza profissionais aptos a executar as seguintes fun&ccedil;&otilde;es: porteiro, servente, auxiliar de servi&ccedil;os gerais, copeira, jardineiro, telefonista, motorista e outras atividades afins.</p><h3>Benef&iacute;cios com este servi&ccedil;o</h3><p>Desempenhamos os conceitos de limpeza e higieniza&ccedil;&atilde;o de ambientes, objetivando os melhores resultados para os nossos clientes. Disponibilizamos profissionais aptos a executar as seguintes fun&ccedil;&otilde;es: porteiro, servente, auxiliar de servi&ccedil;os gerais, copeira, jardineiro, telefonista, motorista e outras atividades afins.</p><p><img style=\"float: left; margin-right: 30px;\" src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/7b37d6093b94630141ad6771ce85081b5f4e822a.jpg\" width=\"462\" height=\"308\" /></p><ul><li>Equipe Qualificada para execu&ccedil;&atilde;o das atividades</li><li>Profissionais Experientes</li><li>Maior Flexibilidade no mercado</li></ul><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Prestamos servi&ccedil;os nos mais diversificados segmentos do mercado, tais como estabelecimentos comerciais, institui&ccedil;&otilde;es financeiras, condom&iacute;nios, hospitais, clinicas m&eacute;dicas, institui&ccedil;&otilde;es de ensinos, entre outros.</p>', 'post', NULL, 'pt-br', '2021-11-01 02:14:13', '2021-11-06 07:01:09', '1'),
(43, 3, 0, 'Força Alerta', 'forca-alerta', NULL, 'Força Alerta', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/3c9e9c5219d82b761844900b45e068d4693ce750.jpg\" width=\"926\" height=\"617\" /></h3><h3>For&ccedil;a Alerta - Seguran&ccedil;a Patrimonial</h3><p>&Eacute; uma empresa especializada em seguran&ccedil;a privada. Nossos servi&ccedil;os s&atilde;o norteados nos padr&otilde;es de controle e gest&atilde;o operacional, fazendo com que a For&ccedil;a Alerta esteja posicionada como uma das melhores prestadoras de servi&ccedil;os do segmento. Com destaque para a qualidade e excel&ecirc;ncia na presta&ccedil;&atilde;o de servi&ccedil;os.</p><p>Os servi&ccedil;os de Vigil&acirc;ncia Patrimonial s&atilde;o desempenhados por profissionais criteriosamente selecionados, sendo realizados cursos de reciclagens para exercer a fun&ccedil;&atilde;o. Prestamos servi&ccedil;os com vigilantes armados ou desarmados, em escala, conforme determina a lei vigente e atividades de escolta armada se destacando como um dos principais of&iacute;cios exercidos na &aacute;rea de Seguran&ccedil;a Privada do Brasil.</p><p>Est&aacute; autorizada pela Policia Federal a exercer todas atividades do ramo de seguran&ccedil;a, sendo pessoal, p&uacute;blica ou privada. Com atua&ccedil;&atilde;o nos estados da Para&iacute;ba, Pernambuco, Rio Grande do Norte e Sergipe.</p><h3>Benef&iacute;cios com este servi&ccedil;o</h3><p>A atua&ccedil;&atilde;o da equipe das equipes da For&ccedil;a Alerta Seguran&ccedil;a Patrimonial &eacute; muito ampla. Com equipes Treinadas, os profissionais t&ecirc;m a compet&ecirc;ncia para evitar ou minimizar os efeitos de diferentes intercorr&ecirc;ncias, tais como:</p><p><img style=\"float: left; margin-right: 30px;\" src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/a3abc72367878a440a9538f377a26ec78dc0dfa6.jpg\" width=\"438\" height=\"292\" /></p><ul><li>Assaltos e furtos</li><li>Inc&ecirc;ndios</li><li>Roubos a cargas</li><li>Seguran&ccedil;a perimetral</li><li>Vandalismo</li><li>Desabamentos</li><li>Atos de terrorismo</li><li>Atos de viola&ccedil;&atilde;o do patrim&ocirc;nio</li><li>Sequestros de funcion&aacute;rios (e at&eacute; de seus familiares)</li><li>Consumo de drogas e &aacute;lcool no ambiente laboral</li><li>Em muitas dessas situa&ccedil;&otilde;es, os seguran&ccedil;as usufruem da tecnologia como forma de facilitar a prote&ccedil;&atilde;o</li></ul>', 'post', NULL, 'pt-br', '2021-11-01 02:14:48', '2021-11-06 07:05:21', '1'),
(44, 3, 0, 'Alerta Segurança Eletrônica', 'alerta-seguranca-eletronica', NULL, 'Alerta Segurança Eletrônica', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/161a3552fc29d082c01975e3189df4d8f71106da.jpg\" alt=\"\" width=\"1071\" height=\"713\" /></h3><h3>Alerta Eletr&ocirc;nica</h3><p>Atuamos desde 1998 no mercado de Seguran&ccedil;a Eletr&ocirc;nica, oferecendo produtos e servi&ccedil;os de: Alarmes, Cercas el&eacute;tricas, Controle de acesso, V&iacute;deo monitoramento (CFTV), Instala&ccedil;&otilde;es, Rastreamento de Ve&iacute;culos. Manuten&ccedil;&otilde;es e projetos para empresas p&uacute;blica e privada, condom&iacute;nios, shoppings, ind&uacute;strias, resid&ecirc;ncias entre outros. Contamos com equipes especializadas em instala&ccedil;&otilde;es, manuten&ccedil;&otilde;es, monitoramento, atendimento externo e administrativo.</p><p>Nossa miss&atilde;o &eacute; buscar tecnologia e atualiza&ccedil;&atilde;o constante, afim de servir e proteger.</p><p>Especificar, implementar e manter as solu&ccedil;&otilde;es de seguran&ccedil;a mais adequadas para cada um de nossos clientes, e contribuir ativamente para sua seguran&ccedil;a, seu sucesso e bem estar.</p><p>Nos preocupamos com o bem estar dos nossos colaboradores e clientes, pois nosso trabalho &eacute; levar tranquilidade &agrave; vida das pessoas.</p><h3>Benef&iacute;cios com este servi&ccedil;o</h3><p>Buscamos o maior da alta tecnologia no ramo de seguran&ccedil;a, e procuramos sempre as solu&ccedil;&otilde;es de seguran&ccedil;a mais adequadas para cada cliente, garantindo assim seu bem-estar e sucesso.O acompanhamento em tempo real, 24 horas por dia, permite saber tudo o que acontece com seu patrim&ocirc;nio, se prevenindo das mais variadas situa&ccedil;&otilde;es.</p><p><img style=\"margin-right: 30px; float: left;\" src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/286206da9e3595c2ef9e4c735aef4034420cd5ab.jpg\" /></p><ul class=\"elementor-icon-list-items\"><li class=\"elementor-icon-list-item\"><span class=\"elementor-icon-list-text\">Maior seguran&ccedil;a no local e arredores</span></li><li class=\"elementor-icon-list-item\"><span class=\"elementor-icon-list-text\">Maior controle no acesso ao local</span></li><li class=\"elementor-icon-list-item\"><span class=\"elementor-icon-list-text\">Vigil&acirc;ncia 24 horas por dia</span></li><li class=\"elementor-icon-list-item\"><span class=\"elementor-icon-list-text\">Presen&ccedil;a de profissionais capacitados e qualificados</span></li></ul>', 'post', NULL, 'pt-br', '2021-11-01 02:27:00', '2021-11-06 06:47:09', '1'),
(45, 3, 0, 'Alerta Portaria Virtual', 'alerta-portaria-virtual', NULL, 'Alerta Portaria Virtual', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/f298fd353bd291c3a0f33dec474eb52221266f85.jpg\" width=\"1136\" height=\"757\" /></h3><h3>Alerta Portaria Virtual</h3><p>A portaria virtual &eacute; um sistema que trabalha via &ldquo;telepresen&ccedil;a&rdquo; com profissionais de seguran&ccedil;a, atuando de forma remota para a seguran&ccedil;a e controle de acesso de edif&iacute;cios e condom&iacute;nios.</p><p>Com este sistema &eacute; poss&iacute;vel substituir a figura do porteiro, j&aacute; que a identifica&ccedil;&atilde;o da entrada &eacute; feita com uso de biometria e v&iacute;deo por profissionais alocados na Central de Monitoramento da Alerta, garantindo o acesso apenas de moradores cadastrados ou visitantes devidamente autorizados.</p><p>Al&eacute;m de abrir e fechar as portas e port&otilde;es da garagem do edif&iacute;cio, os profissionais monitoram o condom&iacute;nio 24h com sistemas de biometria, C&acirc;meras de alta defini&ccedil;&atilde;o, sistemas de alarme para detectar poss&iacute;veis intrus&otilde;es e dispositivos de p&acirc;nico silenciosos para garantir que situa&ccedil;&otilde;es de emerg&ecirc;ncia sejam devidamente comunicadas &agrave; Central de Monitoramento.</p><p>A tecnologia da portaria virtual Alerta, com expertise em monitoramento e seguran&ccedil;a, &eacute; uma solu&ccedil;&atilde;o altamente inovadora que une o &uacute;til ao agrad&aacute;vel: consegue reduzir os custos e ainda aumentar substancialmente o n&iacute;vel de seguran&ccedil;a dos condom&iacute;nios.</p><p>A portaria virtual &eacute; um sistema que trabalha via &ldquo;telepresen&ccedil;a&rdquo; com profissionais de seguran&ccedil;a, atuando de forma remota para a seguran&ccedil;a e controle de acesso de edif&iacute;cios e condom&iacute;nios.</p><p>Com este sistema &eacute; poss&iacute;vel substituir a figura do porteiro, j&aacute; que a identifica&ccedil;&atilde;o da entrada &eacute; feita com uso de biometria e v&iacute;deo por profissionais alocados na Central de Monitoramento da Alerta, garantindo o acesso apenas de moradores cadastrados ou visitantes devidamente autorizados.</p><p>Al&eacute;m de abrir e fechar as portas e port&otilde;es da garagem do edif&iacute;cio, os profissionais monitoram o condom&iacute;nio 24h com sistemas de biometria, C&acirc;meras de alta defini&ccedil;&atilde;o, sistemas de alarme para detectar poss&iacute;veis intrus&otilde;es e dispositivos de p&acirc;nico silenciosos para garantir que situa&ccedil;&otilde;es de emerg&ecirc;ncia sejam devidamente comunicadas &agrave; Central de Monitoramento.</p>', 'post', NULL, 'pt-br', '2021-11-01 02:30:46', '2021-11-06 06:34:23', '1'),
(46, 3, 0, 'Força Alerta Segurança e Transporte de Valores', 'forca-alerta-seguranca-e-transporte-de-valores', NULL, 'Força Alerta Segurança e Transporte de Valores', '<h3><img src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/e591c10d63742287bbad4d83e93f8ddb5f06076a.jpg\" width=\"881\" height=\"587\" /></h3><h3>For&ccedil;a Alerta Seguran&ccedil;a e Transporte de Valores</h3><p>Oferecemos a solu&ccedil;&atilde;o log&iacute;stica completa para o seu neg&oacute;cio como transporte de numer&aacute;rios em nossos carros blindados, com a prote&ccedil;&atilde;o de vigilantes armados e capacitados e total cobertura securit&aacute;ria.</p><p>Da coleta &agrave; entrega final, a Alerta garante a seguran&ccedil;a do transporte de itens de altos valores agregados, feito por uma equipe treinada, carros extra fortes e tecnologia inovadora.</p><p>A robusta frota conta com muitos ve&iacute;culos especiais para o transporte de valores, utilizados especialmente na carga Segura, servi&ccedil;o que visa oferecer seguran&ccedil;a e comodidade para as empresas.</p><p>Cofre inteligente O Cofre Inteligente oferece maior agilidade no processamento de numer&aacute;rio; maior confiabilidade e seguran&ccedil;a; diminui&ccedil;&atilde;o e at&eacute; elimina&ccedil;&atilde;o da diferen&ccedil;a de numer&aacute;rio e redu&ccedil;&atilde;o de custos com Transporte de Valores.</p><h3>Benef&iacute;cios com este servi&ccedil;o</h3><p>Mais que dinheiro, nossos carros-fortes transportam valores e nossas equipes atuam sob os mais r&iacute;gidos padr&otilde;es de qualidade e seguran&ccedil;a, utilizando tecnologia e a experi&ecirc;ncia para reduzir riscos e assegurar uma opera&ccedil;&atilde;o cont&iacute;nua e eficaz.</p><p><img style=\"float: left; margin-right: 30px;\" src=\"https://localhost/grupo_alerta/public/assets/grupoalertaweb/wp-content/uploads/2021/11/paginas/cfe4525dfbd1ac447aa97cf76a6ef18778d8a254.jpg\" width=\"414\" height=\"276\" /></p><ul><li>Mais tranquilidade</li><li>Maior efici&ecirc;ncia e seguran&ccedil;a</li><li>Apoio tecnol&oacute;gico (tecnologia de ponta)</li><li>Agilidade e Monitoramento em tempo real</li><li>Rastreamento de todos a veiculos</li></ul>', 'post', NULL, 'pt-br', '2021-11-01 02:31:49', '2021-11-06 07:08:00', '1'),
(60, 1, 0, 'asdf', 'asdf', NULL, 'asdf', NULL, 'post', NULL, 'pt-br', '2021-11-17 17:22:49', '2021-11-17 18:09:10', '1');

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
-- Estrutura para tabela `tb_pagina_sections`
--

CREATE TABLE `tb_pagina_sections` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pagina` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `subtitulo` text DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ordem` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_pagina_sections`
--

INSERT INTO `tb_pagina_sections` (`id`, `id_pagina`, `titulo`, `slug`, `subtitulo`, `texto`, `ordem`, `imagem`, `created_at`, `updated_at`) VALUES
(29, 60, 'asdf', 'asdf', 'aaaa', '<p>asdf</p>', 1, NULL, '2021-11-17 17:22:49', '2021-11-17 18:09:10'),
(30, 60, 'a', 'a', NULL, NULL, 2, NULL, '2021-11-17 17:26:16', '2021-11-17 18:09:10'),
(31, 60, 'asdf1', 'asdf1', NULL, NULL, 3, NULL, '2021-11-17 17:26:16', '2021-11-17 18:09:10'),
(32, 60, 'as', 'as', NULL, NULL, 4, NULL, '2021-11-17 17:27:23', '2021-11-17 18:09:10'),
(35, 60, 'as2', 'as2', 'as', NULL, 5, NULL, '2021-11-17 17:29:03', '2021-11-17 18:09:10');

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
-- Estrutura para tabela `tb_sys_changelog`
--

CREATE TABLE `tb_sys_changelog` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_versao` int(11) UNSIGNED NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'site_title', 'Grupo Alerta', '2021-11-01 05:13:34', '2021-11-05 20:35:19'),
(2, 'site_description', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:19'),
(3, 'site_url', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:19'),
(4, 'language', 'pt-br', '2021-11-01 05:13:34', '2021-11-05 20:35:19'),
(5, 'site_logo', 'assets/grupoalertaweb/wp-content/uploads/2021/11/b0ee4b6d8eb3e066d1913a064d75da0df4300c66.png', '2021-11-01 05:13:34', '2021-11-01 08:25:29'),
(6, 'site_tags', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(7, 'contact_email', 'sac@grupoalertasv.com.br', '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(8, 'contact_phone', '0800 556 1700', '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(9, 'contact_cel', '(83) 3066.5758', '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(10, 'facebook', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(11, 'instagram', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(12, 'linkedin', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(13, 'address', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(14, 'address_nro', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(15, 'cep', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(16, 'complemento', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(17, 'bairro', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(18, 'cidade', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(19, 'uf', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(20, 'pais', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(21, 'gmaps', NULL, '2021-11-01 05:13:34', '2021-11-05 20:35:20'),
(22, 'original_logo_name', 'logo_dark.png', '2021-11-01 05:25:29', '2021-11-01 05:25:29'),
(23, 'imagem', NULL, '2021-11-05 12:59:28', '2021-11-05 20:35:19'),
(24, 'horario_atendimento', 'Atendimento de segunda à sábado, das 8h às 18h.', '2021-11-05 15:01:45', '2021-11-05 20:35:20'),
(25, 'version', '2.0', '2021-11-24 16:45:07', '2021-11-24 16:45:07');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_version`
--

CREATE TABLE `tb_sys_version` (
  `id` int(11) UNSIGNED NOT NULL,
  `versao` varchar(5) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `lancamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
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
-- Índices de tabela `tb_pagina_sections`
--
ALTER TABLE `tb_pagina_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pagina_titulo_slug_UNIQUE` (`id_pagina`,`titulo`,`slug`);

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
-- Índices de tabela `tb_sys_changelog`
--
ALTER TABLE `tb_sys_changelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_sys_changelog` (`id_versao`);

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
-- Índices de tabela `tb_sys_version`
--
ALTER TABLE `tb_sys_version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Numero sequencial', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Chave primária da tabela.', AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_pagina`
--
ALTER TABLE `tb_pagina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `tb_pagina_album`
--
ALTER TABLE `tb_pagina_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Numero sequencial', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_pagina_sections`
--
ALTER TABLE `tb_pagina_sections`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT de tabela `tb_sys_changelog`
--
ALTER TABLE `tb_sys_changelog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Número sequencial da tabela.', AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT de tabela `tb_sys_version`
--
ALTER TABLE `tb_sys_version`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
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
-- Restrições para tabelas `tb_pagina_sections`
--
ALTER TABLE `tb_pagina_sections`
  ADD CONSTRAINT `fk_tb_pagina_sections` FOREIGN KEY (`id_pagina`) REFERENCES `tb_pagina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `tb_produto_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_produto_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_sys_changelog`
--
ALTER TABLE `tb_sys_changelog`
  ADD CONSTRAINT `fk_tb_sys_changelog` FOREIGN KEY (`id_versao`) REFERENCES `tb_sys_version` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
