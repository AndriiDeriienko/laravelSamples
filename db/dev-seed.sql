SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_02_11_104500_create_posts_table', 1);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Eliane Dooley', 'dare.santiago@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(2, 'Dr. Destini Little III', 'maxime32@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(3, 'Walter McGlynn PhD', 'white.raphaelle@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(4, 'Monroe Harber', 'oryan@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(5, 'Tobin Brakus', 'tamia.boehm@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(6, 'Alene Muller', 'estelle58@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(7, 'Kraig McClure', 'boris16@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(8, 'Milford Medhurst', 'bschaefer@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(9, 'Mr. Werner Borer MD', 'rmarvin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(10, 'Alex Gibson V', 'fschoen@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(11, 'Reese Mante', 'ylind@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(12, 'Prof. Marshall Ledner IV', 'tiara.jacobson@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(13, 'Rodrick Fahey', 'abernathy.jimmy@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(14, 'Prof. Cassie Huels', 'alexis.dietrich@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(15, 'Brandon Pfannerstill', 'dameon52@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(16, 'Melyna Nader II', 'cbernier@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(17, 'Dr. Isadore Howell', 'jaufderhar@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(18, 'Meta Collins', 'albert.harvey@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(19, 'Leonard Ullrich', 'shania.stamm@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(20, 'Golden Pfannerstill', 'dalton.kozey@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(21, 'Demarco Predovic', 'eliezer.corwin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(22, 'Kaya Carter', 'sim83@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(23, 'Erik Murphy', 'demard@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(24, 'Dr. Pauline Keeling PhD', 'halvorson.shaniya@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(25, 'Jonathon Lindgren', 'ycollins@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(26, 'Maudie Steuber II', 'shanahan.cedrick@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(27, 'Stefanie Turcotte', 'thalia51@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(28, 'Robyn Ward', 'jody.ferry@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(29, 'Ms. Judy Gislason', 'streich.cornelius@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33'),
(30, 'Isidro Crooks', 'schmidt.thomas@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2021-02-11 09:24:33', '2021-02-11 09:24:33');

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 11, 'Ut eveniet dolorem doloremque.', 'Possimus vel necessitatibus dolore quis voluptas. Reiciendis est consequatur eos et ut. Laudantium ut molestiae suscipit architecto id eius consequatur est. Eum et ab ut consequatur qui velit id.', '2019-08-05 08:30:03', '1992-03-19 07:09:52'),
(2, 12, 'Odit totam est tenetur.', 'Delectus voluptatibus iste officiis voluptate. Voluptates nobis omnis quam delectus laborum. Ut eum reiciendis occaecati nostrum.', '2003-05-27 12:02:11', '1978-02-24 00:19:58'),
(3, 13, 'Doloremque vero laborum neque libero non.', 'Velit molestias reprehenderit pariatur nisi quod ut. Aut suscipit aspernatur quidem quis voluptates. Quis nam maiores qui nam architecto. Earum neque enim accusamus fuga sit quibusdam sunt beatae.', '1979-08-08 00:37:07', '2003-05-19 07:06:24'),
(4, 14, 'Enim ratione impedit dolore mollitia iure.', 'Corporis hic quibusdam quia qui porro consequatur. Et eum a natus quod magnam sint quia. Ut est eius aperiam voluptatem laudantium minima.', '1991-05-24 02:09:49', '1988-11-27 22:25:51'),
(5, 15, 'Ducimus sed debitis repellendus.', 'Aut qui quia sit qui vel aut fuga. Voluptas sit iure aliquid sit inventore nisi vero. Aut dolor aliquam repellat non delectus maxime aut.', '2010-12-29 14:58:19', '2017-10-02 09:56:50'),
(6, 16, 'Ut officiis unde quae vel.', 'Et et inventore ipsam dolores dolore deserunt. Ipsam magnam temporibus aut ad sint sit. Hic quia voluptatem reprehenderit eligendi. In veritatis aliquam quasi et quis deleniti.', '2015-06-30 15:14:10', '1994-03-29 23:14:21'),
(7, 17, 'Nostrum sequi eligendi qui et.', 'Hic harum ut quia labore numquam tempora fuga. Expedita enim quia cupiditate et cumque dolorem unde. Tempora repellendus qui fugiat porro unde quia.', '1977-11-25 09:20:29', '1974-10-11 23:56:27'),
(8, 18, 'Non id vel et.', 'Ipsa soluta exercitationem in rerum. Saepe exercitationem itaque impedit similique et. Facere autem nesciunt modi minima quisquam voluptas ea.', '1995-03-18 02:06:04', '2007-01-06 04:09:19'),
(9, 19, 'Eos ab velit corrupti ut.', 'Dolores voluptate libero et blanditiis id. Ea voluptas qui labore excepturi explicabo necessitatibus minus impedit. Expedita ducimus voluptatum error quasi repellendus omnis ullam id.', '2000-06-05 19:51:00', '2002-12-26 22:40:59'),
(10, 20, 'Iure repudiandae et delectus.', 'Tenetur asperiores necessitatibus facilis officia. Eligendi dolorem exercitationem doloremque. Et ipsam incidunt delectus dolor aut labore illum.', '2003-07-21 17:34:56', '2006-03-17 13:42:43'),
(11, 21, 'Dolores molestiae consequatur.', 'Non quaerat quis sequi ratione qui voluptas ea. Earum id rerum praesentium. Minus facilis voluptatem aut quas.', '1991-04-28 21:36:43', '2004-03-19 09:06:25'),
(12, 22, 'Magni id asperiores.', 'Architecto est quisquam sunt facere dolore cumque iure. Aut culpa numquam eum voluptatem. Beatae earum at dignissimos tenetur iusto ut.', '1996-03-07 09:07:30', '2011-05-05 02:28:52'),
(13, 23, 'Tempore et nulla nobis excepturi nostrum.', 'Hic aperiam dolor quidem ab ea qui. Et consequatur nihil est ut occaecati fugit. Est illo id esse cupiditate voluptatibus et. Dolores ut velit reprehenderit iste quibusdam autem.', '2002-02-13 13:44:30', '2000-08-05 01:43:41'),
(14, 24, 'Ab delectus voluptatem eum.', 'Debitis quaerat at corrupti veritatis qui libero cum. Adipisci iusto aut repellat est. Expedita quia possimus impedit sapiente repudiandae odio.', '1983-03-29 18:04:33', '1970-07-15 15:43:51'),
(15, 25, 'Animi in tenetur architecto repudiandae iste.', 'Enim magnam est aut rerum et omnis ut dolores. Accusantium voluptatem reiciendis earum veritatis quia atque tempore quis.', '1997-01-13 13:15:41', '2017-08-12 11:16:36'),
(16, 26, 'Aliquam hic neque.', 'Suscipit tempora provident distinctio dolor. Vero autem pariatur facere delectus exercitationem soluta laudantium. Et voluptate a ut. Vitae sequi dignissimos expedita voluptatem.', '1980-04-22 00:28:13', '2001-03-22 05:21:17'),
(17, 27, 'Tenetur ut quaerat consectetur.', 'Deleniti dignissimos molestiae est aliquam. Quia cumque et delectus laudantium error. Fugit aut vitae qui laboriosam dolores. Dolores nihil dolorem ex. Esse quaerat ab laudantium perferendis qui.', '1981-01-14 13:45:06', '2001-02-12 07:00:56'),
(18, 28, 'Natus deserunt quibusdam.', 'Blanditiis consequatur dolor labore magnam quidem illum voluptatem. Est autem distinctio est voluptatibus qui. Velit laborum vel pariatur et.', '1985-01-04 13:57:38', '1971-06-09 21:11:21'),
(19, 29, 'Ratione soluta rem facere.', 'Laborum ut voluptatem esse dignissimos quo nesciunt qui. Sit corporis autem necessitatibus aut et. Qui voluptatem hic aut occaecati sunt. Laboriosam et voluptates eos.', '1987-06-24 17:04:53', '2002-09-13 21:01:51'),
(20, 30, 'Dolorum placeat consectetur.', 'Consequuntur consectetur suscipit quia ea dolor blanditiis. Ipsam quo qui molestiae necessitatibus iure occaecati ad. Maxime sunt culpa ut harum quia. Quo et alias ducimus ipsa iure sequi.', '2011-12-31 08:10:16', '1996-07-15 20:10:33');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;