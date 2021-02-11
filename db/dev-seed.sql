SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Reta Weber', 'kaylie.muller@example.com', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lNDbVw2Ftk', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(2, 'Keira Glover', 'durgan.gideon@example.com', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TUKsxWk515', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(3, 'Mr. Brennon Kling', 'charlie18@example.net', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yAU6lFnUxJ', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(4, 'Cassandra Pacocha', 'nsanford@example.com', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6h1V4gtnKe', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(5, 'Lelah Rau', 'moen.jannie@example.com', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mEdNF2jD51', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(6, 'Ines Kilback', 'lehner.evalyn@example.net', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'woN6WEb92a', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(7, 'Lilly Kerluke III', 'hyatt.malika@example.com', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WJXngOECKl', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(8, 'Margaretta Gorczany', 'zhayes@example.org', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hA65Nr93wD', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(9, 'Vinnie Walter', 'beier.june@example.org', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RINK6VUz3k', '2021-02-10 14:05:36', '2021-02-10 14:05:36'),
(10, 'Josue Lowe', 'cierra17@example.net', '2021-02-10 14:05:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GAfRIsssWu', '2021-02-10 14:05:36', '2021-02-10 14:05:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;