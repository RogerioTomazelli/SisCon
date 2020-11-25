-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para siscon
CREATE DATABASE IF NOT EXISTS `siscon` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `siscon`;

-- Copiando estrutura para tabela siscon.estoques
CREATE TABLE IF NOT EXISTS `estoques` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produto_id` bigint(20) unsigned DEFAULT NULL,
  `fornecedor_id` bigint(20) unsigned DEFAULT NULL,
  `data` date NOT NULL,
  `quantidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estoques_fornecedores` (`fornecedor_id`),
  KEY `FK_estoques_produtos` (`produto_id`),
  CONSTRAINT `FK_estoques_fornecedores` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_estoques_produtos` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.estoques: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `estoques` DISABLE KEYS */;
INSERT INTO `estoques` (`id`, `produto_id`, `fornecedor_id`, `data`, `quantidade`, `preco_unit`, `preco_total`, `peso_unit`, `unidade`, `created_at`, `updated_at`) VALUES
	(8, 18, 14, '2020-11-03', '5', '20', '100', '2,5', 'kg', '2020-11-20 19:52:59', '2020-11-20 19:52:59'),
	(9, 22, 13, '2020-11-11', '10', '15', '150', '500', 'g', '2020-11-20 19:54:55', '2020-11-20 19:54:55'),
	(10, 18, 13, '2020-11-05', '8', '25', '200', '2', 'kg', '2020-11-20 19:55:26', '2020-11-20 19:55:26'),
	(11, 20, 14, '2020-10-06', '5', '50', '150', '12', 'kg', '2020-11-20 20:00:29', '2020-11-20 20:00:51');
/*!40000 ALTER TABLE `estoques` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fornecedores_nome_unique` (`nome`),
  UNIQUE KEY `fornecedores_cnpj_unique` (`cnpj`),
  UNIQUE KEY `fornecedores_numero_unique` (`numero`),
  UNIQUE KEY `fornecedores_email_unique` (`email`),
  UNIQUE KEY `fornecedores_telefone_unique` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.fornecedores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `email`, `telefone`, `created_at`, `updated_at`) VALUES
	(13, 'Didatti Decorações', '111.222.333/5555.00', 'Santa Catarina', 'Xanxerê', 'Setor Industrial', 'Laranjeiras', '123', 'didatti-deco@outlook.com', '49 9870 5678', '2020-11-20 19:47:42', '2020-11-20 19:47:42'),
	(14, 'Móveis Tomazelli', '851.541.021/5555.99', 'Santa Catarina', 'Chapecó', 'Setor Industrial', 'Amoras', '178', 'tomazelli-moveis@gmail.com', '49 7841 8501', '2020-11-20 19:48:41', '2020-11-20 19:48:41'),
	(15, 'TXT Materiais de Construção', '123.597.250/4510-00', 'Santa Catarina', 'Chapecó', 'Castelo Branco', 'Antonio Marcos', '120', 'TXTMateriais@gmail.com', '49 9 8541 0000', '2020-11-20 19:50:01', '2020-11-20 19:50:01');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2020_10_26_204525_create_users_table', 1),
	(4, '2020_10_26_212018_create_fornecedores_table', 2),
	(5, '2020_10_27_191632_create_produtos_table', 3),
	(6, '2020_10_29_114719_create_estoque_table', 4),
	(7, '2020_10_30_132416_create_estoques_table', 5),
	(8, '2020_10_30_132626_create_estoques_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.produtos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `categoria`, `descricao`, `created_at`, `updated_at`) VALUES
	(18, 'Mesa', 'Móvel', 'Madeira polida. Tamanho médio.', '2020-11-20 19:50:37', '2020-11-20 19:50:37'),
	(19, 'Cadeiras', 'Móvel', 'Madeira polida. Pernas com ponta de metal.', '2020-11-20 19:51:09', '2020-11-20 19:51:26'),
	(20, 'Televisão', 'Eletrodoméstico', 'Cor preta. 50 polegadas. HD.', '2020-11-20 19:51:57', '2020-11-20 19:52:08'),
	(21, 'Fogão', 'Eletrodoméstico', 'Cor branca. 6 bocas.', '2020-11-20 19:52:28', '2020-11-20 19:52:28'),
	(22, 'Prateleira', 'Decoração', 'Madeira prensada. Cor branca.', '2020-11-20 19:53:53', '2020-11-20 19:53:53');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela siscon.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela siscon.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(11, 'Administrador', 'admin@admin.com', NULL, '$2y$10$qDPjtYFEy1zttOt1dooQQe1hMPbmtqrua14NXHXqA1F.7ud/3zfAy', NULL, '2020-11-20 19:46:56', '2020-11-20 19:46:56'),
	(12, 'Bianca Magistralli', 'bianca-magistralli@gmail.com', NULL, '$2y$10$ln4/Vjg6S0ZmaaSJYvp3geRXgFMdUp/nUNtdReQsX/wG1LE1fnh3a', NULL, '2020-11-20 19:56:05', '2020-11-20 19:56:05'),
	(13, 'Rogério Tomazelli', 'rctf2003@gmail.com', NULL, '$2y$10$dNTC.1oiGa7p3c66f8zC4ufqGjbZoYueuNvFAZ81DAUJ4MFHbcT8C', NULL, '2020-11-25 13:55:00', '2020-11-25 13:55:00'),
	(14, 'Jackson Meires', 'jackson.meires@gmail.com', NULL, '$2y$10$Re25rEzFsa2BSF7WrIxpYutm5o2Xz3cQphiJF0gKqF0yJ7lcolzZK', NULL, '2020-11-25 13:56:01', '2020-11-25 13:56:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
