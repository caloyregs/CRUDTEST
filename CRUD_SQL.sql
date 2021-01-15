
-- Dumping structure for table test_larav72.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table test_larav72.customers: ~3 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `contact_no`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'JOHN WEAK', '9999999999999', 'johnweak@gmail.com', '2021-01-15 16:02:42', NULL, NULL);
INSERT INTO `customers` (`id`, `name`, `contact_no`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'davie 504', '296 8986', 'davie55@gmail.com', '2021-01-14 23:14:10', '2021-01-14 23:14:10', NULL);
INSERT INTO `customers` (`id`, `name`, `contact_no`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'JOEL ROGAN', '456789746', 'joerogue@gmail.com', '2021-01-14 23:14:40', '2021-01-14 23:37:15', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table test_larav72.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_larav72.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table test_larav72.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_larav72.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2021_01_15_071441_create_customers_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2021_01_15_071441_create_products_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2021_01_15_071441_create_orders_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table test_larav72.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(11,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `orders_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table test_larav72.orders: ~3 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `qty`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, 2, 4, 6, 600.00, '2021-01-15 04:30:24', '2021-01-15 04:30:24', NULL);
INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `qty`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 1, 1, 2, 90.00, '2021-01-15 04:30:41', '2021-01-15 04:30:55', NULL);
INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `qty`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 2, 2, 5, 225.00, '2021-01-15 08:03:18', '2021-01-15 08:03:32', NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table test_larav72.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table test_larav72.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Havana Slip-ons', 350.00, '2021-01-15 07:49:30', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Coke Sakto', 50.00, '2021-01-15 07:49:47', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'Chippy happy', 12.00, '2021-01-15 09:46:33', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'Lana Shampoo', 5.00, '2021-01-15 12:13:50', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, 'RHEA ALCOHOL', 45.00, '2021-01-15 09:47:01', NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table test_larav72.users
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
