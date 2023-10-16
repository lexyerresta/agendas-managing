-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_kegiatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `notulensi` text DEFAULT NULL,
  `waktu_pelaksanaan` datetime DEFAULT NULL,
  `tempat_pelaksanaan` varchar(255) NOT NULL,
  `link_dokumentasi` varchar(255) DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `user_id`, `division_id`, `nama_agenda`, `perihal`, `notulensi`, `waktu_pelaksanaan`, `tempat_pelaksanaan`, `link_dokumentasi`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Intervensi Ketahanan Keluarga Anti Narkoba', 'Desa Bersinar', '<div>1. Minggu depan orang tua dan anak datang 30 menit lebih awal.<br>2. Minggu depan akan diberikan baju dan topi sebagai bahan kontak.<br>3. Minggu depan orang tua dan anak melaporkan progress dari program ini.</div>', '2023-06-17 01:26:00', 'CS Bedha, Kediri, Tabanan', 'www.googledrive.com/intervensibnnpbali', '2023-05-21 16:06:24', '2023-05-21 06:44:28', '2023-05-21 08:06:24'),
(2, 4, 1, 'Intervensi Ketahanan Keluarga Anti Narkoba II', 'Ea debitis necessitatibus autem ullam.', '<div>Dignissimos quasi ut eius et. Est a aliquid saepe. Vel quibusdam voluptatem rem corporis est perspiciatis ut doloribus. Asperiores quam assumenda ducimus adipisci dolores hic autem. Ullam quos numquam consequuntur. Dolore vel recusandae ab molestiae error. Corrupti aut suscipit ipsa aperiam repudiandae. Quaerat doloribus doloremque quae. Sunt vel cumque perferendis. Ut doloribus cumque rerum.</div>', '2023-07-24 02:52:00', 'Ds. B.Agam Dlm No. 53, Jayapura 24772, Aceh', 'http://zulaika.ac.id/in-quia-animi-perspiciatis-iure-dolores-beatae-laudantium', NULL, '2023-05-21 06:44:28', '2023-05-21 06:48:11'),
(3, 2, 1, 'Intervensi Ketahanan Keluarga Anti Narkoba III', 'Nemo aut rerum explicabo nisi blanditiis neque.', '<div>Odit architecto consequatur aperiam temporibus aliquid necessitatibus rerum ut. Dolorem voluptatem possimus saepe mollitia. Non amet nulla et dolores unde ipsam sequi. Atque iste excepturi sed aliquam. Incidunt aperiam ut reprehenderit veritatis aut. Sit rem aut asperiores sed ad quis. Nobis consequatur eaque et omnis dolorem. Harum ad fugit nesciunt. Ducimus hic voluptas ex nihil sit enim velit.</div>', '2023-08-07 07:37:00', 'Dk. Bass No. 110, Administrasi Jakarta Pusat 45889, Jabar', 'http://yuniar.co/distinctio-eaque-vel-quibusdam-esse-aliquid-reprehenderit-neque', NULL, '2023-05-21 06:44:28', '2023-05-21 06:48:22'),
(4, 1, 7, 'Smash On Drugs 2023', 'HANI 2023', '<div>Rangkaian Acara HANI 2023</div>', '2023-06-21 14:34:00', 'Gedung Rektorat UNUD', 'www.googledrive.com/SOD2023', NULL, '2023-05-21 06:44:28', '2023-05-21 09:59:05'),
(5, 4, 6, 'Kolaborasi BNNP Bali x ITB STIKOM Bali', 'Nemo quidem.', '<div>Eum temporibus beatae qui aperiam. Ut fugit tempore recusandae quis laborum illo culpa magnam. Molestiae consequatur et sed vel ratione exercitationem fugit. Ducimus pariatur numquam voluptatum minus veritatis quisquam voluptas pariatur. Doloribus quibusdam officiis rerum eos enim sunt. Alias voluptate voluptas dolorem totam. Nesciunt error vitae hic itaque ut. Dolores consequatur autem quas dicta facere quo pariatur. Quam odit expedita possimus officia sit. Enim in quia aliquam voluptas magni labore cupiditate rerum. Praesentium vel consequatur qui veritatis dolor.</div>', '2023-07-06 05:13:00', 'Kpg. Aceh No. 746, Pangkal Pinang 90792, DIY', 'http://www.sihombing.or.id/laborum-autem-minima-impedit-ut-culpa.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:49:50'),
(6, 3, 1, 'BNN Run 2023', 'Sequi ut eaque labore quas.', '<div>Natus est voluptas rerum ut saepe commodi voluptatem. Vitae praesentium consectetur vitae ut. Debitis dolore aut iusto quibusdam dolor vel. Exercitationem repellendus adipisci doloribus et qui. Voluptas placeat laborum rerum vitae quo architecto. Facere exercitationem ut sapiente quas doloremque est adipisci libero. Error earum ut molestias et neque porro iste optio. Libero libero quae quia aliquam doloribus. Nemo corporis eos iste laborum. Velit ipsa est ducimus consequatur officiis ducimus.</div>', '2023-07-23 23:39:00', 'Jln. Otto No. 429, Sukabumi 53118, Jateng', 'http://megantara.web.id/provident-qui-fuga-qui-sit-explicabo-iste-corrupti', NULL, '2023-05-21 06:44:28', '2023-05-21 06:50:47'),
(7, 2, 4, 'Audit BNNP Bali 2023', 'Audit Tahunan', '<div>Telah dilaksanakan audit BNNP 2023</div>', '2023-06-17 10:40:00', 'Kantor BNNP Bali', 'www.googledrive.com/Audit2023', '2023-05-21 21:06:33', '2023-05-21 06:44:28', '2023-05-21 13:06:33'),
(8, 4, 7, 'Hari Anti Narkotika Internasional 2023', 'HANI 2023', '<div>Puncak HANI 2023</div>', '2023-06-26 09:00:00', 'BNDCC Nusa Dua Bali', 'www.googledrive.com/HANI2023', NULL, '2023-05-21 06:44:28', '2023-05-21 10:06:06'),
(9, 4, 1, 'Kolaborasi BNNP Bali x UNDIKNAS', 'Praesentium similique harum rerum.', '<div>Quidem magnam omnis vitae unde omnis nemo. Deleniti vel tempora mollitia. Quam enim odit sed error. Officiis nulla aspernatur sed. Rerum sit commodi voluptate voluptatem. Aut mollitia deleniti aut dolor dignissimos nisi. Omnis enim qui quis illo vel vero. Earum voluptas dolore error perspiciatis ea. Aut voluptatem aspernatur eaque porro fugiat repellat maiores. Odit earum eos eum vitae amet nisi. Molestiae quia natus temporibus ab modi et reiciendis. Quam beatae voluptatibus sed consectetur laudantium distinctio quia.</div>', '2023-06-17 00:38:00', 'Ds. Babakan No. 25, Sabang 78786, Sulsel', 'http://utami.in/voluptatem-occaecati-minus-molestias-iure-alias-ducimus', NULL, '2023-05-21 06:44:28', '2023-05-21 06:52:27'),
(10, 3, 5, 'Kolaborasi BNNP Bali x UNUD', 'Cum pariatur eum accusamus quia qui.', '<div>Ipsum eligendi nesciunt quia eligendi aut. Eum voluptatem eveniet voluptatem. Qui asperiores tempore minima ducimus. Adipisci libero doloribus odit et corrupti voluptatibus officiis. Et dolore mollitia et consequatur. Est nulla maxime hic et ipsam. Libero cum et delectus adipisci. Molestiae illo eius sit molestiae quibusdam quae maiores maiores. Ea ut sequi consequuntur et. Cum nulla pariatur et non explicabo et quasi aliquam.</div>', '2023-06-03 16:48:00', 'Gg. Aceh No. 287, Bima 19044, Lampung', 'http://prastuti.co.id/est-qui-asperiores-enim-dolor-dolorum', NULL, '2023-05-21 06:44:28', '2023-05-21 06:52:49'),
(11, 2, 6, 'Sint fuga repellendus.', 'Recusandae aperiam et veniam aliquid.', 'Blanditiis harum exercitationem a. Officiis consequatur dolorem quam et sapiente non assumenda. Eum et odit et quisquam. Ea est et ut illo libero in.\n\nOmnis dolor dicta id dolorem eos velit. Quaerat nisi et non et in aut architecto.\n\nAliquam occaecati fuga aut eius earum ea et. Eius voluptas repellat dolorem maxime et maxime molestias. Enim accusamus officia sed unde. Quasi sed et maiores et ut unde.', '2023-06-10 12:56:48', 'Dk. Karel S. Tubun No. 92, Banjar 60853, Sultra', 'http://nababan.info/esse-libero-occaecati-facere-corrupti-officia.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(12, 1, 3, 'Neque praesentium quo quia.', 'Et non.', 'Fugiat voluptatibus cupiditate necessitatibus consequatur. Iure consequatur qui dolor qui impedit eum. Adipisci ratione dolores eius velit maxime quod.\n\nMinus odit eius ipsa eum ipsum. Dolores id ut non eius. Est numquam dicta ea similique et distinctio ipsam iusto.\n\nConsequuntur aperiam perferendis id quia perferendis nemo. Aut numquam dolorem iusto dicta impedit consequatur. Dolores et vitae laborum ducimus et.', '2023-08-12 05:31:05', 'Jr. S. Parman No. 218, Administrasi Jakarta Pusat 79248, Sulbar', 'https://purnawati.sch.id/ut-ullam-itaque-sunt-sunt-accusamus-sit-temporibus.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(13, 1, 3, 'Voluptatem facilis.', 'Quam eveniet aut tenetur.', 'Incidunt voluptas quis est recusandae nemo. Cum non vitae quo atque pariatur quis eveniet. Quis explicabo in dolorem nihil.\n\nUt magnam officiis sed dolorem perferendis. Dignissimos voluptas sint corporis reprehenderit mollitia dolorem atque. Maxime neque commodi corporis aut iure deserunt pariatur.\n\nEveniet delectus minus in deserunt. Consequatur quis cumque quisquam est fugiat sit. Error eum quaerat vel sed est sunt ut vero. Sit voluptates est assumenda odio. Minus ut qui aperiam voluptatem nihil.', '2023-05-23 13:28:38', 'Kpg. Sutami No. 415, Sorong 15364, Sulbar', 'http://thamrin.ac.id/ullam-est-et-facere-repellendus-eum.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(14, 2, 3, 'Vel aspernatur et vitae ab et.', 'Vitae cumque voluptate distinctio.', 'Neque sunt maiores rerum sit et in. Ullam molestiae qui ut ut eum ut quas. Provident mollitia consequatur facilis perspiciatis consequatur dolorem.\n\nMinus rerum harum asperiores ipsum et sed. Et deserunt ullam ut asperiores. Deleniti quo eius nesciunt provident maiores nam illum aliquid. Est expedita earum consequuntur consequatur.\n\nConsequatur eos adipisci accusantium at ratione. Hic distinctio dolorum error quia ipsa placeat.', '2023-06-19 03:38:20', 'Jln. Fajar No. 391, Solok 32878, Babel', 'http://mangunsong.co/quas-necessitatibus-qui-quidem-quisquam-omnis-quo', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(15, 2, 5, 'Repellat soluta explicabo voluptatem quia eaque.', 'Eius accusantium quia eius quasi qui.', 'Explicabo et sequi ullam nesciunt expedita impedit nulla. Dignissimos magnam rerum magni aut natus quasi. Voluptatibus nemo nulla repudiandae veritatis porro qui.\n\nEt veritatis soluta sint et sit. Eligendi officia ea ipsum ut. Et autem commodi at et. Laudantium veritatis eum sequi qui.\n\nPerspiciatis consequuntur voluptates reiciendis possimus nostrum earum. Sint recusandae alias et sed quo. Possimus voluptatem aut enim deserunt natus. Sit nisi eos recusandae et fugiat consequatur.', '2023-06-18 05:33:24', 'Ds. Kalimantan No. 210, Mojokerto 15858, Kepri', 'http://nainggolan.co/at-eum-non-soluta-eum.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(16, 2, 1, 'Commodi aliquam non.', 'Dolores quasi eum fuga.', 'Et aperiam sit cumque deleniti. Fugiat commodi temporibus sint aut. Sit numquam autem qui et quis quas ab.\n\nMolestiae necessitatibus quas vero incidunt ut non veritatis. At inventore id asperiores quo minus distinctio repellat.\n\nSapiente id velit voluptatem quis voluptatem quia. Accusamus sunt dolores qui nostrum aut. Fugiat excepturi soluta quo commodi necessitatibus.', '2023-07-25 04:11:15', 'Ds. Jamika No. 879, Administrasi Jakarta Barat 32868, Sulbar', 'https://saptono.tv/id-soluta-sunt-dicta-accusamus-qui.html', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(17, 1, 1, 'Consequatur est praesentium iusto.', 'Quia nesciunt eum.', 'Omnis recusandae qui ut nam sit molestiae sint. Dolore enim quidem occaecati accusamus et reprehenderit beatae qui. Vel similique dolore ratione debitis. Libero aperiam dolores qui totam.\n\nEt vitae earum atque molestiae quia sint excepturi. Nemo est quis et saepe. Veritatis voluptate at dolores consequatur officia eos. Error in necessitatibus nobis non quis ut.\n\nAperiam aut quibusdam quisquam eos quia nihil sunt. Quibusdam repellat ut inventore ducimus voluptatem vitae quam. Repellat ullam non vero quae aut cupiditate. Voluptas voluptas perferendis qui tempora sunt.', '2023-08-02 16:40:23', 'Ki. Ciumbuleuit No. 310, Tangerang Selatan 91207, Bali', 'https://www.hutapea.com/nisi-perspiciatis-deserunt-ducimus-fugit-eaque-itaque', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(18, 2, 6, 'Deleniti iusto laborum est distinctio.', 'Expedita distinctio et soluta reiciendis.', 'Voluptates nihil ut vero enim. Facilis iste aperiam dolores magnam sapiente voluptatem velit dicta. Omnis sed velit reiciendis qui. Voluptatibus dolorem natus nobis inventore incidunt dolorem qui.\n\nInventore iste earum et sapiente non quas. Voluptatem expedita exercitationem eum eos. Et asperiores sit dolor sit qui accusantium ut ratione. Cumque fugit id est omnis veniam et voluptatem atque.\n\nEst et recusandae nihil at. Reprehenderit dignissimos nam est eos beatae amet. Error sapiente sequi enim soluta rerum quae sapiente.', '2023-06-13 09:14:52', 'Gg. PHH. Mustofa No. 388, Lhokseumawe 21453, Banten', 'http://www.mustofa.ac.id/aspernatur-perspiciatis-iusto-cupiditate-et-quis-sed-rem-quia', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(19, 3, 3, 'Ut ut.', 'Occaecati sequi excepturi ipsa quo inventore.', '<div>Ullam temporibus ex adipisci. Molestiae vel tempore ut est omnis numquam iste. Nihil maiores est eveniet. Placeat possimus neque deserunt perferendis quasi quos autem. Nemo voluptatem quam officia. Qui molestias ea laborum ut. Nulla ut quasi sint aut repellat qui id. Ipsam corrupti illum omnis quasi. Officiis in et nulla unde corporis illum. Asperiores facilis libero rerum. Nihil reprehenderit aperiam inventore quo eligendi.</div>', '2023-08-01 00:37:00', 'Ds. Bayam No. 268, Padangsidempuan 42370, DIY', 'http://winarsih.net/et-eum-officiis-est-perferendis-alias.html', NULL, '2023-05-21 06:44:28', '2023-05-21 10:04:44'),
(20, 2, 6, 'Aut quia tempora laborum quidem.', 'Et eos autem nulla odio qui.', 'Nam ratione eius quia voluptas aut culpa voluptatem. Et culpa similique voluptatem tempore non expedita harum. Fugiat quo nostrum magni dolorem necessitatibus. Sit esse nostrum odit molestiae cupiditate dolores quia.\n\nCupiditate sit quis voluptate et. Accusamus explicabo et nihil officiis delectus. Libero natus ut temporibus suscipit nemo. Cumque pariatur cum quod quisquam exercitationem exercitationem.\n\nRepellendus iure autem enim. Velit quasi ab libero magni iste in aut. Eligendi harum nisi ullam et labore unde.', '2023-07-14 08:46:01', 'Ki. Gedebage Selatan No. 342, Sibolga 93817, Jatim', 'http://www.sihotang.or.id/', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(21, 3, 6, 'Vel voluptatibus ut perspiciatis.', 'Reprehenderit minima non.', '<div>Iste voluptatum perspiciatis ducimus dolorem dignissimos. Sit et ullam repudiandae eum non et possimus. Deserunt ea ducimus eum quasi placeat repudiandae suscipit. Qui nobis similique dolores voluptatem eveniet tempore a. Nisi et ipsam rerum saepe iusto tempore. Totam culpa voluptatem ea et. Qui recusandae et beatae qui. Veritatis dicta unde sapiente amet. Rem molestiae nihil natus facere esse quae omnis placeat. Vel repellat temporibus temporibus incidunt. Voluptates eum dolorum et.</div>', '2023-06-01 11:03:00', 'Gg. Industri No. 47, Bandar Lampung 22744, Bali', 'http://www.saragih.asia/quia-possimus-non-natus-magnam', NULL, '2023-05-21 06:44:28', '2023-05-21 10:04:54'),
(22, 4, 2, 'Et quis laboriosam.', 'Est consequuntur.', '<div>Inventore aut omnis rerum totam qui incidunt ullam. Labore velit quas omnis sapiente. Fuga aut cum sunt nam sit tenetur. Odit explicabo vel rerum nihil. Amet et iste voluptatem id maiores perspiciatis sed et. Illo ut distinctio sint. Id quaerat omnis laudantium. Facilis qui quos quia mollitia officiis. Quo aut sed quibusdam culpa. Nam odio pariatur eos voluptas consequatur et.</div>', '2023-05-27 10:44:00', 'Dk. Suryo Pranoto No. 292, Blitar 94226, Papua', 'https://www.hartati.sch.id/sed-vitae-rem-soluta-aut', NULL, '2023-05-21 06:44:28', '2023-05-21 10:05:05'),
(23, 3, 5, 'Dolores consequuntur laboriosam corporis rem.', 'Et repellendus minus sit.', 'Voluptatem vero velit vero aliquam vel. Sit autem suscipit asperiores voluptatem quos. Consequatur eius eveniet laboriosam est quia. Doloribus veritatis nisi quos. Quo quis enim et voluptate.\n\nVoluptatum optio et in enim veritatis officia. Doloremque eaque exercitationem inventore ipsum delectus deleniti. Quis adipisci quod laudantium qui necessitatibus sequi officia. Voluptatem optio aut voluptates repellat soluta porro aut.\n\nDolor rerum possimus nesciunt pariatur. Ipsam sint quos exercitationem illum. Labore aut quam impedit et.', '2023-05-30 20:04:44', 'Ki. Reksoninten No. 146, Bekasi 58686, DIY', 'http://www.rahmawati.my.id/suscipit-omnis-ea-iusto-quisquam.html', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(24, 4, 3, 'Aut quos beatae voluptates consequatur veritatis.', 'Ex ipsam autem ea repudiandae.', 'Eum nobis voluptate porro vel voluptatem delectus. Sint nesciunt nemo voluptatibus assumenda sapiente. Et eveniet nisi officia ut voluptatem aut. Tempore et iste incidunt ad magnam aut qui.\n\nEveniet eaque natus culpa at doloribus unde. Sed deleniti molestiae debitis nam. Vitae officiis eligendi assumenda. Et vero laborum quaerat deleniti.\n\nError qui illo fuga corporis accusantium laborum. Temporibus incidunt sit eos illum est dolorem. Debitis fugit qui harum numquam. Dolores cum officia ut voluptatem aut aut nisi omnis.', '2023-07-11 11:55:12', 'Ds. HOS. Cjokroaminoto (Pasirkaliki) No. 228, Tangerang Selatan 87384, NTB', 'https://www.hasanah.tv/ad-repellendus-est-eum-ut-et-minus-quae-in', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(25, 2, 6, 'Modi impedit est.', 'Consequatur expedita.', 'Ea qui et quia aspernatur iure. Corporis quia sed ea similique animi. Aut ipsum incidunt porro enim repellendus. Cumque nesciunt aut minima autem exercitationem voluptatum.\n\nCulpa qui ut officia. Enim ab consequatur et in maiores.\n\nMolestias eum voluptate totam consequatur dolores qui in iusto. Praesentium est fuga vel vel. Eligendi porro occaecati accusantium veritatis quia.', '2023-07-12 12:25:33', 'Gg. Dipatiukur No. 11, Cimahi 48753, Aceh', 'http://saputra.mil.id/modi-a-incidunt-atque-laborum-quo', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(26, 3, 1, 'Ut ut sunt reiciendis blanditiis.', 'Sapiente delectus.', 'Ut voluptatem et quo ab aut similique aspernatur. Rerum sint vitae eos. Et est saepe ut doloribus est quasi. Molestiae provident ut vero doloremque vero sit et.\n\nIpsa cum porro fugiat nisi occaecati est provident repellat. Recusandae et sint quibusdam esse dolores et dolor. Velit consequatur molestiae dolor eum voluptatum facere dolor. Ullam similique sit iure vitae.\n\nEa odio fugiat aut sint. Alias nesciunt natus impedit nihil aut optio voluptas. Dolorum et esse eum sed quo sapiente expedita. Ut iusto et debitis vel voluptate qui alias laboriosam.', '2023-07-22 20:32:41', 'Psr. Baranang No. 914, Medan 72768, Sultra', 'http://susanti.desa.id/ut-id-quaerat-sit-officia.html', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(27, 1, 1, 'Ab expedita voluptas voluptatem.', 'Aut libero.', 'Fugit reiciendis voluptates eligendi dolorem. Deserunt reiciendis consequuntur eveniet aliquam blanditiis quia est. Laboriosam et rerum excepturi itaque dolores omnis aspernatur. Iusto ut a ullam nihil exercitationem quia.\n\nVoluptates perspiciatis dolor dicta vel. Repellendus dolores quo est suscipit voluptate recusandae. Officiis molestiae quis ut vitae magni at distinctio.\n\nRerum aut commodi quam et deleniti laborum qui. Corporis est tenetur tenetur facilis. Praesentium aut illum saepe. Nesciunt quasi saepe sunt nisi.', '2023-07-21 07:23:19', 'Kpg. Achmad No. 971, Administrasi Jakarta Timur 41583, Jabar', 'https://www.safitri.co.id/dolores-tenetur-saepe-nemo-earum-rerum', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(28, 4, 6, 'Corporis dicta libero.', 'Error sequi sunt consequatur assumenda.', 'Sint ipsum dignissimos autem quis. Sit laudantium sint cum sit. Quis aliquid eligendi illum qui officiis exercitationem. Consequatur non cumque itaque molestiae porro repellendus voluptatem.\n\nEt tempore quas sit nemo ut. Sed saepe qui non ducimus dolores fugit. Omnis rem iste maxime in.\n\nAnimi iure aut odit incidunt doloribus odit. Laborum accusantium quasi pariatur assumenda repellat voluptate. Eos minus illum quo. Reiciendis ut labore et commodi.', '2023-08-06 02:07:32', 'Jr. Madiun No. 435, Dumai 27162, Sultra', 'http://kurniawan.co/maxime-quia-iure-et.html', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(29, 2, 6, 'Sapiente ducimus et et.', 'Atque similique iusto recusandae quo.', 'Laborum non et vel hic ut. Eum accusantium praesentium in magnam quia libero mollitia. Enim expedita et officia praesentium explicabo soluta optio vero. Ducimus quasi pariatur placeat libero in deserunt.\n\nDolor molestias cumque omnis eum voluptatum est rerum. Et minima eveniet necessitatibus molestias ut et. Itaque occaecati possimus similique tempora eum.\n\nRepellendus sed aliquid dicta. Quo dolor quia sint a fugiat ullam. Qui quia non sint iusto accusamus ut veniam illum. Omnis ab accusamus quas in. Alias nemo aut est labore.', '2023-07-03 23:47:52', 'Jr. Nanas No. 322, Semarang 15772, Sumut', 'http://purwanti.info/', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(30, 3, 2, 'Et illo omnis omnis.', 'Repellendus rerum.', 'Doloremque voluptas delectus modi et commodi expedita neque eum. Voluptatem in aliquid est at rerum quia ad. Est est aspernatur rerum sit illum est voluptatem. Dignissimos eveniet rerum fuga occaecati necessitatibus non cum.\n\nQui aliquam sunt quis autem id minus voluptatum. Deleniti enim dolores dolores sit. Labore aut mollitia alias doloribus vitae id eos. Non corporis veniam sunt cupiditate commodi at autem.\n\nFacere id accusantium omnis ducimus velit inventore. Quos dolores et exercitationem molestias. Dignissimos impedit aut exercitationem quod labore et dolorem officia. Et et doloribus blanditiis maiores.', '2023-06-28 18:42:04', 'Ds. Baja No. 6, Yogyakarta 64516, Babel', 'http://www.mardhiyah.com/', NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Workshop Penggiat Anti Narkoba di Lingkungan Pendidikan', 'workshop-penggiat-anti-narkoba-di-lingkungan-pendidikan', 'post-images/XuJnOwDxJwjNxXtcdJLvozQ68kUCheseQxNM69YB.jpg', 'Telah terlaksana Workshop Penggiat Anti Narkoba di Lingkungan Pendidikan pada 21 Mei 2023', '<div>Telah terlaksana Workshop Penggiat Anti Narkoba di Lingkungan Pendidikan pada 21 Mei 2023</div>', '2023-05-22 06:44:28', '2023-05-21 07:08:30'),
(2, 1, 3, 'Rapat Virtual Persiapan Smash On Drugs Internasional Table Tennis Championship 2023', 'rapat-virtual-persiapan-smash-on-drugs-internasional-table-tennis-championship-2023', 'post-images/pYi1NuilNzHDeLoUV1FFhKWd9kv9kZC9bnVquj2A.webp', 'Bertempat di Ruang Media Center WAR ON DRUGS&nbsp; BNN Provinsi Bali, dipimpin langsung oleh PJU BNNP Bali, Kepala BNNK Jajaran, Coach Ronald, Perwakilan Polda Bali, Rekan – rekan Sponsorship. Hadir m...', '<div>Bertempat di Ruang Media Center WAR ON DRUGS&nbsp; BNN Provinsi Bali, dipimpin langsung oleh PJU BNNP Bali, Kepala BNNK Jajaran, Coach Ronald, Perwakilan Polda Bali, Rekan – rekan Sponsorship. Hadir mengikuti&nbsp; Rapat Virtual Persiapan Smash On Drugs Internasional Table Tennis Championship 2023.</div><div>Acara di buka langsung oleh Ketua Panitia disambung dengan pemaparan materi&nbsp; terkait pelaksanaan Smash On Drugs Internasional Table Tennis Championship 2023, tatanan dalam pelaksanaan teknis dan perlengkapannya, event ini akan dilaksanakan di pulau Dewata Bali pada bulan juni mendatang&nbsp; dan disambung dengan tanya jawab panitia BNN RI dengan panitia BNNP Bali.</div><div>#WarOnDrugs</div><div>#BaliBersinar</div><div>#IndonesiaBersinar</div><div>#BNNPBali</div>', '2023-05-23 06:44:28', '2023-05-21 07:17:54'),
(3, 2, 2, 'Penandatanganan Nota Kesepahaman', 'penandatanganan-nota-kesepahaman', 'post-images/5ANEvGZVCmeWhwL18XxJG9GnaNHobRxUY1tjFJlT.webp', 'Kepala BNN Provinsi Bali Dr. R. Nurhadi Yuwono, S.I.K., M.S.i., CHRMP melaksanakan Penandatanganan Nota Kesepahaman antara BNN Provinsi Bali dengan 12 Lembaga baik Lembaga Rehabilitasi Instansi Pemeri...', '<div>Kepala BNN Provinsi Bali Dr. R. Nurhadi Yuwono, S.I.K., M.S.i., CHRMP melaksanakan Penandatanganan Nota Kesepahaman antara BNN Provinsi Bali dengan 12 Lembaga baik Lembaga Rehabilitasi Instansi Pemerintah dan Lembaga Rehabilitasi Komponen Masyarakat .</div><div>Dalam rangkaian kegiatan, Kepala BNN Provinsi Bali menyampaikan apresiasi setinggi tingginya bagi undangan yang hadir secara langsung maupun perwakilan untuk berpartisipasi dalam pelaksanaan P4GN di Provinsi Bali. Diharapkan Penandatangan Nota Kesepahaman ini dapat mewujudkan sinergitas dalam pelaksanaan program Pencegahan, Pemberantasan, Penyalahgunaan dan Peredaran Gelap Narkotika.</div><div>#BidangRehabilitasi</div><div>#SiGAPBNNPBali</div><div>#WarOnDrugs</div><div>#IndonesiaBersinar</div><div>#SehatTanpaNarkoba</div><div>#SpeedUpNeverLetUp</div>', '2023-05-21 06:44:28', '2023-05-21 07:19:43'),
(4, 1, 2, 'Menghadiri Undangan Rapat Koordinasi', 'menghadiri-undangan-rapat-koordinasi', 'post-images/Qmrpssk4kqfWyz4wVfvjgOYd6YxTSTOZkO1qi3pX.webp', 'Dalam rangka persiapan pelaksanaan pendaftaran bakal calon anggota DPD dan DPRD Provinsi Bali pada tanggal 1 s. d 14 Mei 2023, KPU Provinsi Bali melaksanakan rapat koordinasi terkait dengan pelaksanaa...', '<div>Dalam rangka persiapan pelaksanaan pendaftaran bakal calon anggota DPD dan DPRD Provinsi Bali pada tanggal 1 s. d 14 Mei 2023, KPU Provinsi Bali melaksanakan rapat koordinasi terkait dengan pelaksanaan kegiatan yang dimaksud.</div><div>Hadir Ketua Tim Rehabilitasi ( Luh Gede Idayanti, SH) mewakili Kepala BNN Provinsi Bali. Dalam kesempatan ini di sampaikan Proses pendaftaran tetap mengacu pada Peraturan&nbsp; KPU Nomor 10 Tahun 2023 tentang pencalonan anggota Dewan Perwakilan Rakyat, Dewan Perwakilan Rakyat Daerah Provinsi,&nbsp; dan&nbsp; Dewan Perwakilan Rakyat Daerah Kabupaten/Kota. Selain persyaratan seperti melampirkan foto copy KTP elektronik, Foto copy Ijasah, SKCK, disyaratkan pula bahwa bakal calon harus melampirkan surat lainnya seperti surat keterangan sehat jasmani dan rohani serta Surat Keterangan Hasil Pemeriksaan Narkotika (SKHPN). Pada Peraturan KPU nomor 10 Tahun 2023 disebutkan bahwa surat tersebut dapat diperoleh di Rumah Sakit Pemerintah dan juga BNN terdekat. Untuk memudahkan akses Layanan SKHPN, Ketua Tim Rehabilitasi menyampaikan bahwa bakal Calon dapat mengakses layanan SKHPN di BNN Provinsi Bali&nbsp; secara online yaitu melalui link http://www.sigapbnnpbali.bnn.go.id/SKHPN. Beberapa partai politik lebih memilih mencari SKHPN di rumah Sakit Pemerintah dikarenakan di Rumah Sakit sudah tersedia paket Pemeriksaan yaitu terdiri dari Pemeriksaan kesehatan Jasmani dan rohani serta SKHPN. Sehingga kemungkinan besar bakal calon legislatif akan lebih memilih mengakses Layanan di RS dari pada di BNNP Bali.</div><div>#WarOnDrugs</div><div>#IndonesiaBersinar</div><div>#BidangRehabilitasi</div><div>#BNNPBALI</div>', '2023-05-21 06:44:28', '2023-05-21 07:25:24'),
(5, 3, 1, 'Virtual Zoom Rapat Panitia Lomba Menembak', 'virtual-zoom-rapat-panitia-lomba-menembak', 'post-images/GS6AutlxPS6tZLCaGrW6JvciwFHEOrjRUVCSREcN.webp', 'Bertempat di Ruang Media Center WAR ON DRUGS&nbsp; BNN Provinsi Bali, dipimpin langsung oleh Kepala BNNP Bali, didampingi oleh Kabag Umum, Penyuluh Ahli Muda, Pengelola BMN, Dokter Klinik BNNP Bali,&n...', '<div>Bertempat di Ruang Media Center WAR ON DRUGS&nbsp; BNN Provinsi Bali, dipimpin langsung oleh Kepala BNNP Bali, didampingi oleh Kabag Umum, Penyuluh Ahli Muda, Pengelola BMN, Dokter Klinik BNNP Bali,&nbsp; Staf Rehabilitasi hadir mengikuti&nbsp; Virtual Zoom rapat panitia Lomba Menembak.</div><div>Acara di buka langsung oleh Ketua Panitia Menembak, Pembahasan terkait persiapan Lomba Menembak di Bali, Pelaksanaan menembak pada tanggal 24 S/D 25 Juni 2023, Pelaksanaan dilapangan menembak Tohpati Polda Bali, Kategori yang dilombakan (Kelas Eksekutif, Kelas Khusus, Kelas Atlit Bali), Perlombaan menembak dilakukan 2 sesi (Presisi (Sasaran Hitam) dan Menembak reaksi cepat), Jumlah peserta menembak (Prediksi), Peserta Eselon I, II, dan kemungkinan ditambah pok ahli BNN: berjumlah 67 + 12 = 79 orang peserta (termasuk Ka BNNP) dan Peserta Asn dan Anggota Polri penugasan BNN berjumlah 122 orang peserta, Pembukaan pada tanggal 24 Juni 2023 dan Penutupan pada tanggal 25 Juni 2023, memperhatikan hal – hal teknis dalam pelaksanaan lomba menembak, adapun Hadiah pada setiap kategori yang di lombakan, Persiapan (membuat semua rencana kerja dan rencana kebutuhan, persiapan desain piala dan medali, pengumpulan ukuran kaos untuk panitia, kebutuhan serta keperluan dalam surat menyurat kepada instansi terkait. Di sambung dengan sesi diskusi.</div><div>#WarOnDrugs</div><div>#BaliBersinar</div><div>#IndonesiaBersinar</div><div>#BNNPBali</div>', '2023-05-21 06:44:28', '2023-05-21 07:26:39'),
(6, 3, 1, 'BNNP Bali Prediksi Kasus Narkoba Masih Meningkat di Tahun 2023, Faktor Geo-Politik Global', 'bnnp-bali-prediksi-kasus-narkoba-masih-meningkat-di-tahun-2023-faktor-geo-politik-global', 'post-images/RSbu9mduI3S9URft0zXKI6VclKEdwatSkZNMJp0n.jpg', 'Kepala Badan Narkotika Nasional Provinsi (BNNP) Bali, Dr. R. Nurhadi Yuwono, S.I.K., M.Si., CHRMP mengungkap bahwa kasus narkoba masih diprediksi mengalami peningkatan pada tahun 2023.&nbsp;Menurut di...', '<div>Kepala Badan Narkotika Nasional Provinsi (BNNP) Bali, Dr. R. Nurhadi Yuwono, S.I.K., M.Si., CHRMP mengungkap bahwa kasus narkoba masih diprediksi mengalami peningkatan pada tahun 2023.&nbsp;</div><div>Menurut dia, prediksi peredaran kasus narkotika di Bali tahun 2023 cenderung tetap meningkat dikarenakan faktor pemulihan kondisi pasca covid 19 dan kondisi geopolitik dunia saat ini yang berpengaruh besar pada sector ekonomi masyarakat Bali.&nbsp;</div><div>\"Pariwisata Bali meskipun dalam kondisi sudah membaik namun dirasakan masih belum menentu kedepannya. Hal ini akan berpengaruh besar pada cara masyarakat mencari pendapatan. Akan ada trend mengambil jalan singkat untuk memenuhi kebutuhan ekonomi sebagai pengedar atau kurir,\" kata Brigjen Nurhadi dalam jumpa pers akhir tahun di kantor BNNP Bali, Denpasar, Bali, pada Kamis 29 Desember 2022.</div><div>Lebih lanjut, disampaikan, Jenderal Polisi Bintang Satu ini, Bali masih menjadi wilayah rawan dan pasar potensial penyalahgunaan dan peredaran gelap narkotika.</div><div>Secara penyebaran yang diungkap, kasus peredaran gelap narkotika tidak hanya berkonsentrasi di daerah perkotaan atau daerah tujuan wisata namun juga ditemukan di pedesaan termasuk pengungkapan kasus di daerah pelosok di Kabupaten di Bali.</div><div>\"Tahun 2022 BNN Provinsi Bali dan BNNK jajaran berhasil melampaui target yang ditetapkan dengan mengungkap kasus peredaran gelap narkotika sebanyak 50 kasus dan tersangka 59 orang yang terlibat dalam jaringan narkotika nasional dan internasional,\" paparnya.</div><div>Berdasarkan kasus tersebut, pelaku kasus narkotika yang berhasil diungkap sekitar 63 persen berasal dari luar Bali yang diantaranya 10 orang merupakan Warga negara Asing (WNA).</div><div>BNNP Bali berfokus pada bandar dan pengedar untuk memutus jaringan peredaran gelap narkotika yang masuk ke Bali.&nbsp;</div><div>\"Dari data jenis narkotika yang diungkap, narkotika ganja dan sabu masih menjadi jenis narkotika yang paling banyak disalahgunakan, namun di tahun ini varian narkotika yang diungkap lebih banyak dibandingkan tahun sebelumnya, diantaranya terdapat tren penyalahgunaan narkotika jenis kokain dan heroin di kalangan wisatawan asing,\" jabarnya.</div>', '2023-05-21 06:44:28', '2023-05-21 07:41:14'),
(7, 1, 4, 'Kepala BNNP Bali Berganti, Brigjen Gede Sugianyar Dilantik sebagai Pejabat yang Baru', 'kepala-bnnp-bali-berganti-brigjen-gede-sugianyar-dilantik-sebagai-pejabat-yang-baru', 'post-images/aVIDZaiggHT7lThITZAiiQ7k642HBEFXyWwrKi1B.jpg', 'Kepala Badan Narkotika Nasional Provinsi ( BNNP) Bali resmi berganti.Brigjen Pol Drs Gede Sugianyar Dwi Putra S.H M.Si kini menjadi Kepala BNNP Bali yang baru.Jenderal bintang satu di pundaknya ini di...', '<div>Kepala Badan Narkotika Nasional Provinsi ( BNNP) Bali resmi berganti.</div><div>Brigjen Pol Drs Gede Sugianyar Dwi Putra S.H M.Si kini menjadi Kepala BNNP Bali yang baru.</div><div>Jenderal bintang satu di pundaknya ini diketahui resmi menyandang status baru sebagai Kepala BNNP Bali sejak Kamis 29 April 2021 pagi.</div><div>Brigjen Gede Sugianyar yang dilantik langsung oleh Kepala BNN RI Komjen Pol Petrus Reinhard Golose menggantikan Brigjen I Putu Gede Suastawa yang kini sudah memasuki masa pensiun.</div><div><em>\"Nggih</em> benar, tadi jam 9 pagi <em>tiang</em> (saya) dilantik oleh Kepala BNN sebagai Kepala BNNP Bali,\" ujar Brigjen Gede Sugianyar, Kamis 29 April 2021.<br><br></div><div>Brigjen Gede Sugianyar yang merupakan putra asli Bali, kelahiran Gianyar 14 September 1964 yang memiliki kegemaran di bidang fotografi ini dilantik Kepala BNN di Jakarta.</div><div>Sosok jenderal lulusan Akpol 1987 yang sebelumnya menjabat sebagai Kepala BNNP Nusa Tenggara Barat (NTB) sejak tanggal 16 Juli 2019 ini dikenal memiliki kepribadian yang ramah dan dekat dengan awak media.</div><div>Bahkan pria yang dikaruniai empat orang anak hasil pernikahan dengan Lina Meidevita ini pernah mengemban tugas penting di wilayah Bali.</div><div>Diketahui Brigjen Gede Sugianyar Dwi Putra pernah menjabat sebagai Kepala Bidang Hubungan Masyarakat (Kabid Humas) Kepolisian Daerah (Polda) Bali di tahun 2008.</div><div>Ia juga diketahui pernah menjabat sebagai Direktur Lalu Lintas (Dirlantas) Polda Nusa Tenggara Timur (NTT) pada tahun 2011 dan sebagai Irwasda Polda Papua di tahun 2012.</div><div>Mengenai jabatan barunya sebagai Kepala BNNP Bali, ia pun berharap semua pihak di Bali terutama masyarakat dapat mendukung kerjanya saat ini.</div><div>\"Ya mohon dukungannya,\" tambah Brigjen Pol Drs Gede Sugianyar Dwi Putra, Kamis 29 April 2021.(*)</div>', '2023-05-21 06:44:28', '2023-05-21 07:43:08'),
(8, 1, 3, 'Jadi Kepala BNNP Bali, Brigjen Nurhadi Ingin Bangun Bali Bersih Narkoba, Antisipasi Pesta Tahun Baru', 'jadi-kepala-bnnp-bali-brigjen-nurhadi-ingin-bangun-bali-bersih-narkoba-antisipasi-pesta-tahun-baru', 'post-images/KwDQV0hnWQuQAJX1fPA5wOKeH4tY92aQBJlKliTT.jpg', 'Brigjen Pol Dr. R Nurhadi Yuwono SIK, Msi CHRMP mengawali tugasnya sebagai Kepala Badan Narkotika Nasional Provinsi (BNNP) Bali, pada Jumat 2 Desember 2022.Brigjen Pol Nurhadi menjabat Kepala BNNP Bal...', '<div>Brigjen Pol Dr. R Nurhadi Yuwono SIK, Msi CHRMP mengawali tugasnya sebagai Kepala Badan Narkotika Nasional Provinsi (BNNP) Bali, pada Jumat 2 Desember 2022.</div><div>Brigjen Pol Nurhadi menjabat Kepala BNNP Bali menggantikan Brigjen Pol Drs Gde Sugianyar Dwi Putra yang memasuki masa pensiun.<br><br></div><div>Brigjen Nurhadi yang sebelumnya bertugas sebagai Kepala BNNP Nusa Tenggara Timur itu langsung memberikan arahan dan motivasi kepada seluruh pejabat dan personel BNNP Bali.</div><div>Menurut Brigjen Nurhadi yang resmi dilantik pada 29 November 2022 sebagai Kepala BNNP Bali, pihaknya mengutamakan proses dan kerja sama dalam setiap pelaksanaan tugas.<br><br></div><div>Hal itu disampaikan Brigjen Nurhadi didampingi Kepala Bidang Pemberantasan BNNP Bali, Agus Arjaya dan Koordinator Humas, Media dan Publikasi, Made Dwi saat sesi audiensi dengan sejumlah awak media termasuk Tribun Bali, di ruang kerjanya, pada Jumat 2 Desember 2022.<br><br></div><div>“Setiap fungsi dan bidang harus saling bersinergi menjadi satu kekuatan bersama, karena ringan sama dijinjing berat sama dipikul, jadi apa yang jadi tugas dengan segala keterbatasan bisa menjadi lebih mudah,” ucap dia.</div><div>Brigjen Nurhadi juga mengaku menyesuaikan situasi dan kondisi dalam memimpin jajaran BNNP Bali yang merupakan ASN berbeda dengan saat berdinas di institusi kepolisian.<br><br></div><div>Bagi Nurhadi, yang pernah bertugas di Polda Metro Jaya hingga Polda Kalimantan Timur itu, bertugas di Badan Narkotika Nasional merupakan tugas yang mulia.</div><div>Sejumlah program pun mulai disusun Brigjen Nurhadi baik dari aspek Hard Power melalui pemberantasan dan menindak tegas pelaku, serta aspek smart power dan soft power sebagai strategi War on Drugs yang dicanangkan Kepala BNN RI Komjen Petrus Reinhard Golose serta bersinergi dengan awak media.<br><br></div><div>“Ini tugas mulia, kami bertugas menyelamatkan masyarakat dari ancaman bahaya narkotika untuk membangun negeri ini menjadi bangsa yang maju dan bersniar (Bersih Narkoba),” kata jenderal bintang satu yang hobi bersepeda itu.</div><div>“Mari bekerja dengan bersungguh-sungguh agar kehadiran BNN bisa dirasakan masyarakat sebagai pelindung dan pelayan masyarakat, kami sudah susun program, nanti bulan Maret 2023 rencananya BNN RI menggelar bernyanyi bersama Mars BNN untuk memecahkan rekor MURI, kemungkinan dipusatkan di Bali dan serentak secara nasional secara virtual, untuk program di Bali nanti saya rencana menggelar lomba Kabupaten/Kota paling Bersinar, kampus dan sekolah Bersinar, bagaimanapun cara untuk kesadaran bahaya narkoba tertanam di setiap benak individu, di NTT saya kerja sama dengn perbankan memasang stiker-stiker War on Drugs,” jabarnya.</div><div>Bahkan Brigjen Nurhadi juga langsung membangun kekuatan Bali Bersinar dengan langsung beraudiensi bersama Kapolda Bali Irjen Pol Drs Putu Jayan Danu Putra, SH, Msi untuk bersih-bersih Bali dari peredaran gelap narkotika, terlebih menyongsong akhir tahun yang biasanya digelar pesta malam tahun baru.</div><div>“Untuk tahun baru kami sesuaikan dengan kegiatan Polda, kami juga sudah gelar rapat koordinasi, kami mengimbangi giat Polda, menjaga pintu-pintu masuk di Gilimanuk, Padang Bai, bandara, karena pasti ada peningkatan turis domestic dan mancanegara, kami juga sudah edukasi jasa titipan kilat untuk lebih melakukan profiling terhadap pengirim dan penerima paket,” pungkasnya. (*)</div><div><br></div>', '2023-05-21 06:44:28', '2023-05-21 07:49:31'),
(9, 2, 2, 'BNNP Bali dan BNN Kabupaten Badung Lakukan Sweeping', 'bnnp-bali-dan-bnn-kabupaten-badung-lakukan-sweeping', 'post-images/FNANMjqctaPadS2nrWOZLpSY7BGZZHVxTDRaPxRP.jpg', 'Jajaran Badan Narkotika Nasional Provinsi (BNNP) Bali dan BNN Kabupaten Badung melaksanakan sweeping obat terlarang menjelang perayaan tahun baru.&nbsp;Sweeping ke sejumlah tempat hiburan malam kawasa...', '<div>Jajaran Badan Narkotika Nasional Provinsi (BNNP) Bali dan BNN Kabupaten Badung melaksanakan sweeping obat terlarang menjelang perayaan tahun baru.&nbsp;</div><div>Sweeping ke sejumlah tempat hiburan malam kawasan Seminyak dilaksanakan dengan mengerahkan anjing pelacak K-9 BNNP Bali, pada Rabu 14 Desember 2022 malam.</div><div>IP (45) seorang security sebuah tempat hiburan malam di kawasan Seminyak, Badung, Bali kedapatan mengedarkan pil ekstasi kepada pengunjung.&nbsp;</div><div>Selain itu, juga dilakukan tes urine kepada para karyawan THM tersebut.&nbsp;</div><div>Menjelang tahun baru, Bali sebagai daerah destinasi wisata favorit wisatawan mancanegara dan domestik perlu dijaga keamanan dan ketertibannya, salah satunya dengan antisipasi penyalahgunaan dan peredaran gelap narkotika.</div><div>\"Sweeping tersebut berdasarkan hasil pemetaan kerawanan terhadap penyalahgunaan dan peredaran gelap narkotika. Narkotika yang merupakan ancaman negara perlu ditangani secara serius dan hati-hati,\" kata Kabid Pemberantasan BNNP Bali, I Putu Agus Arjaya, SE., MSi kepada Tribun Bali, pada Kamis 15 Desember 2022.</div><div><br></div><div>Berdasarkan hasil pemeriksaan selama di tempat hiburan malam di daerah tersebut berhasil dilakukan penangkapan terhadap satu orang security yang mengedarkan narkotika kepada para pengunjung, yang kasusnya saat ini dalam proses penyidikan di BNNP Bali.</div><div>\"Kegiatan sweeping ini bukan untuk menakut-nakuti ataupun menggangu masyarakat dan pengelola serta pengunjung tempat hiburan malam. Ini adalah merupakan bentuk kehadiran negara untuk menjaga dan melindungi masyarakat dari ancaman penyalahgunaan dan peredaran gelap narkoba menjelang tahun baru,\" ujarnya.</div><div>“Kami mengucapkan terima kasih atas kerjasamanya atas pelaksanaan kegiatan ini. Happy boleh asal jangan menggunakan narkoba. Mari Jaga diri dan lingkungan dari narkoba untuk hidup yang lebih baik dan sehat tanpa narkoba,\" pungkasnya. (*)</div>', '2023-05-21 06:44:28', '2023-05-21 07:50:58'),
(10, 3, 2, 'BNNP Bali Gagalkan Peredaran 200 Gram Kokain yang Dikirim dari Inggris', 'bnnp-bali-gagalkan-peredaran-200-gram-kokain-yang-dikirim-dari-inggris', 'post-images/c7li3lGMhTu0L1WVgkjs1j4NtHGSeHKmZsj9vSmd.jpg', 'Pulau Bali masih menjadi market peredaran barang haram narkotika jenis kokain, setelah Badan Narkotika Nasional Provinsi (BNNP) Bali berhasil menangkap seorang pria yang dengan gelagat mencurigakan me...', '<div>Pulau Bali masih menjadi <em>market</em> peredaran barang haram narkotika jenis kokain, setelah Badan Narkotika Nasional Provinsi (BNNP) Bali berhasil menangkap seorang pria yang dengan gelagat mencurigakan menerima paket barang yang berasal dari Inggris.</div><div>Tim Pemberantasan BNNP Bali bekerja sama dengan Kanwil Bea Cukai Bali dan Bea Cukai Ngurah Rai pada Rabu, 30 November 2022 sekira Pukul 12.00 Wita melakukan penyelidikan, di salah satu perusahaan jasa titipan di Denpasar yang beralamat di Jalan Tjok Agung Tresna, Sumerta Kelod, Denpasar Timur, Kota Denpasar, Bali.</div><div><br></div><div>Petugas melihat tersangka inisial AJ itu dengan gelagat mencurigakan sedang membawa 1 buah paket kiriman sepatu anak-anak.</div><div>Atas kecurigaan itu, petugas kemudian mendatangi pria yang berprofesi sebagai ojek <em>online</em> itu dan menanyakan perihal paket kiriman yang dibawa tersebut.</div><div>Setelah dilakukan pengecekan paket tersebut diselundupkan plastik klip berisi bubuk berwarna putih yang diduga mengandung Narkotika jenis Kokain yang berasal dari Inggris.</div><div><br></div><div>“ Kokain yang diamankan seberat 200,76 gram, modusnya disamarkan melalui paket kiriman, kami terus dalami peran pelaku dan jaringan yang terlibat,” kata Kepala BNNP Bali, Brigjen Pol Dr. R Nurhadi Yuwono SIK, Msi CHRMP dalam press rilis di Kantor BNNP Bali, pada Rabu 7 Desember 2022.</div><div>Brigjen Nurhadi mengatakan, BNNP Bali menaruh perhatian khusus terhadap perusahaan ekspedisi untuk waspada terhadap paket-paket kiriman yang berpotensi terjadi penyelundupan narkoba.</div><div>“Kami sudah lakukan analisis khusus paket kiriman, kami mendapatkan narkotika jenis kokain, zat adiktif paling mahal paling tinggi kastanya dan sudah masuk dan ini menjadi bentuk atensi bagi kami,” tegasnya.<br><br></div><div>Atas perbuatannya, AJ, pria asal Bondowoso berusia 29 tahun itu terancam pidana paling lama penjara seumur hidup</div><div>“112 ayat (2) , undang -undang RI no.35 tahun 2009 tentang Narkotika dengan Ancaman Hukuman paling singkat 5 (lima) tahun dan paling lama seumur hidup,” jelasnya.</div><div>Sementara itu, Kepala Bidang Pemberantasan BNNP Bali, Agus Arjaya, menjelaskan, paket Kokain yang dikirim dari negara Inggris itu tidak tercantum jelas nama penerimanya dan anggota BNNP Bali menunggu sampai barang itu diambil oleh seseorang, yakni AJ.</div><div>“Anggota kami nyanggong menunggu lalu pelaku ditangkap dan dilakukan pendalaman, harga Kokain per gram bisa mencapai 4-5 juta rupiah, biasanya menjadi konsumsi wisatawan asing, pelaku mengaku disuruh seseorang dan dijanjikan upah 10 juta rupiah,” bebernya.<br><br></div><div>Pada kesempatan yang sama, Kepala Kantor Wilayah Bea Cukai Bali, NTB, NTT, Susila Brata, menambahkan, pihaknya siap bersinergi dengan BNNP Bali untuk melakukan pengungkapan bersama dan pemberantasan narkoba.</div><div>Bea Cukai Bali pun memiliki 6 anjing pelacak yang dilatih untuk mendeteksi bahan-bahan narkotika.</div><div>“Kami kerja sama dapat alat bantu training kit berupa heroin 60 gram digunakan untuk melatih pelacakan anjing. Beacukai punya 6 anjing pelacak , 4 harus dilatih dibantu teman BNN,” paparnya. (*)</div><div><br></div>', '2023-05-21 06:44:28', '2023-05-21 07:52:56'),
(12, 3, 1, 'Debitis qui quo ea nesciunt.', 'repellendus-facere-est-ipsa-dicta', NULL, 'Quidem sit ut ullam dolor magnam. Exercitationem delectus officiis qui quaerat rerum consequuntur voluptas. Porro eos cupiditate similique non iure voluptatibus ducimus.', '<p>Est ut eius inventore sint tempore consequatur. Rerum amet voluptatem consequatur necessitatibus quos ex blanditiis. Nam eveniet alias beatae earum voluptatem debitis.</p><p>Vel aut et quis alias facere voluptas. Doloremque et esse culpa sint numquam in. In omnis nisi et alias.</p><p>Velit quia voluptatem molestiae iure suscipit voluptatum consequatur. Voluptatem aspernatur perspiciatis dolorem at et sed. In et eligendi quia sint accusamus nihil non ab.</p><p>Tenetur labore iure neque error aut ea quisquam incidunt. Voluptate voluptatem ipsa quia possimus. Sit quibusdam nihil perferendis dolorum accusantium ut culpa dignissimos.</p><p>Placeat libero voluptatum aut nobis sint architecto ratione. Voluptatem ipsam animi voluptas explicabo ullam quasi minus. Dolores animi ducimus nihil illum voluptas voluptas recusandae quisquam. Doloremque accusamus magnam quo nihil non.</p>', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(13, 4, 3, 'Repellendus qui voluptate ad asperiores.', 'quod-qui-laboriosam-velit', NULL, 'Est neque deserunt animi quis vel inventore aut. Neque natus eaque nemo eos nisi et suscipit nisi. Eum earum sed voluptas quos est vel dolorem unde.', '<p>Itaque enim rerum unde et eligendi. Voluptatem ab ut omnis officia est cum voluptate ut. Reiciendis sed est ea assumenda sint.</p><p>Eum voluptas aliquam et mollitia in. Tempore architecto consequatur quia distinctio praesentium aut. Repudiandae praesentium culpa labore iste repellendus architecto eveniet. Dolor et quis minima reiciendis fugiat ducimus. Inventore et veritatis ut.</p><p>Ab consequatur repellendus pariatur est quidem cupiditate. Saepe natus labore eius.</p><p>Et magnam placeat beatae distinctio omnis fugiat quas. Officiis atque voluptas consequuntur porro molestias. Ad quidem sed quam dolore molestias.</p><p>Non velit et ut vero. Est atque quidem illum quia expedita aliquid. Consectetur mollitia ut quis iusto nemo et. Hic quidem cupiditate eius asperiores. Inventore esse voluptas repellendus.</p><p>Sapiente sed quasi quas deleniti. A corrupti quia soluta. Debitis architecto repellat doloribus cumque voluptatem blanditiis voluptas reprehenderit. Veniam omnis asperiores maiores sapiente unde suscipit.</p><p>A vel voluptate aut. Itaque vitae et distinctio veritatis voluptatem harum repudiandae. Dolores qui voluptatem neque. Alias ex placeat dolores dolore dignissimos velit laudantium.</p><p>Animi enim quam optio. Sequi nisi sit ut ut. Molestias labore incidunt voluptatem eveniet quis.</p><p>Aspernatur quisquam voluptatum quis id quia. Ea et modi eveniet sed. Iusto error architecto eius repellendus.</p><p>Architecto asperiores aliquid soluta. Magnam voluptas perspiciatis sit quo eius perferendis consectetur. Itaque qui magnam aut molestiae voluptates dolores aperiam.</p>', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(14, 4, 2, 'Consequuntur est vitae occaecati quibusdam dignissimos nemo vel voluptates.', 'expedita-totam-et-vero-dicta-laudantium-rem-aut', NULL, 'Porro quisquam ducimus aut numquam. Ad ut quibusdam quo et fugit consectetur ut.', '<p>Voluptas eum unde cum magni libero. Esse ab dolor aut adipisci accusamus nisi quasi. Repudiandae voluptatem et quia voluptatem. Ipsam repudiandae labore porro ullam laborum odio consequuntur.</p><p>Ipsam magni voluptas repellendus nihil doloremque earum nulla quos. Explicabo error hic esse explicabo. Perferendis numquam ipsum corporis quibusdam natus molestiae.</p><p>Eum quasi voluptatem sint nostrum quasi repellendus molestiae numquam. Asperiores beatae sit ullam et quia earum dolor. Ut suscipit harum accusantium saepe optio quia reiciendis.</p><p>Quo magnam asperiores alias laboriosam eligendi. Quidem natus dicta sed qui veritatis mollitia possimus asperiores. Nobis magnam et ex quo.</p><p>Aut iure eaque labore illo reprehenderit. Laboriosam dolor nulla ut rerum reprehenderit natus. Nemo totam quo quis explicabo. Non aut esse eveniet ab.</p><p>Aliquam ratione aut adipisci molestiae reprehenderit harum eaque sed. Et esse quisquam est maxime repudiandae consequatur. Illum occaecati deleniti sit ut.</p><p>Qui dolorum nemo non dignissimos. Omnis dignissimos at natus distinctio earum saepe. Nam nostrum iusto et et provident odit. Consectetur aliquid necessitatibus molestiae molestias et.</p><p>Velit officiis dolorem voluptatibus modi. Aut a minima consequatur id fugit.</p>', '2023-05-21 06:44:28', '2023-05-21 06:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'War On Drugs', 'war-on-drugs', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(2, 'Narcotics', 'narcotics', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(3, 'Criminal', 'criminal', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(4, 'Biotech', 'biotech', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(5, 'Metaverse', 'metaverse', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(6, 'Science', 'science', '2023-05-21 06:44:28', '2023-05-21 06:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'P2M', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(2, 'Rehabilitasi', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(3, 'Pemberantasan', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(4, 'Intelijen', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(5, 'Sarpras', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(6, 'Umum', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(7, 'Humas', '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(8, 'Masyarakat', '2023-05-21 06:44:28', '2023-05-21 06:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungans`
--

CREATE TABLE `kunjungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `waktu_kunjungan` datetime DEFAULT NULL,
  `keperluan` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tanggal_approve` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kunjungans`
--

INSERT INTO `kunjungans` (`id`, `user_id`, `name`, `waktu_kunjungan`, `keperluan`, `asal`, `no_hp`, `tanggal_approve`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'Widya Padmasari', '2023-07-13 03:09:46', 'Office Tour', 'UD Halimah Tbk', '0646 3926 089', '2023-05-21 18:39:35', NULL, '2023-05-21 06:44:29', '2023-05-21 10:39:35'),
(2, 4, 'Cawisadi Hidayat', '2023-07-05 03:13:43', 'Office Tour', 'Perum Utami', '0956 4763 506', '2023-05-21 21:13:48', NULL, '2023-05-21 06:44:29', '2023-05-21 13:13:48'),
(3, 4, 'Suci Yuniar M.Pd', '2023-08-08 00:24:52', 'Office Tour', 'PT Halim (Persero) Tbk', '0626 4844 127', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(4, 4, 'Maida Sudiati', '2023-05-26 18:32:48', 'Office Tour', 'Fa Mustofa', '0417 4712 2809', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(5, 4, 'Nadine Kasiyah Kusmawati', '2023-06-20 19:36:55', 'Office Tour', 'Perum Sihombing', '(+62) 985 4290 1442', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(6, 4, 'Catur Wahyudin', '2023-06-08 18:21:55', 'Office Tour', 'PT Januar Santoso', '(+62) 816 7051 1091', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(7, 4, 'Najwa Paramita Rahmawati', '2023-05-21 18:07:14', 'Office Tour', 'Perum Melani (Persero) Tbk', '0854 309 429', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(8, 4, 'Patricia Ana Lailasari', '2023-07-21 20:04:18', 'Office Tour', 'PJ Puspasari Prasetyo Tbk', '0851 0983 251', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(9, 4, 'Damar Dabukke', '2023-07-09 03:07:36', 'Office Tour', 'PD Farida Sihombing', '(+62) 955 7288 579', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(10, 4, 'Jaeman Lanjar Gunarto S.Pd', '2023-08-17 13:58:01', 'Office Tour', 'Fa Sihombing Tbk', '(+62) 241 0182 3255', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(11, 4, 'Rizki Setiawan', '2023-07-19 08:59:27', 'Office Tour', 'PD Siregar', '0689 6150 196', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(12, 4, 'Makara Waluyo', '2023-06-21 01:45:39', 'Office Tour', 'Yayasan Simanjuntak Sinaga Tbk', '(+62) 778 1840 0762', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(13, 4, 'Viman Pradipta', '2023-05-31 15:54:02', 'Office Tour', 'Perum Mustofa Safitri', '0314 5130 7096', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(14, 4, 'Ulya Mayasari', '2023-06-01 16:21:36', 'Office Tour', 'Yayasan Nababan Tbk', '0906 1302 687', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(15, 4, 'Hana Padmasari', '2023-07-25 11:59:37', 'Office Tour', 'PD Rajasa (Persero) Tbk', '(+62) 901 2352 1320', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(16, 4, 'Ade Hastuti', '2023-05-22 07:30:22', 'Office Tour', 'Yayasan Pudjiastuti (Persero) Tbk', '0410 7653 7833', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(17, 4, 'Candrakanta Pradana', '2023-06-12 04:04:50', 'Office Tour', 'Fa Hardiansyah Pradipta', '0797 8321 7963', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(18, 4, 'Kawaya Lantar Tampubolon', '2023-06-20 06:51:31', 'Office Tour', 'PT Susanti Budiyanto (Persero) Tbk', '025 8333 9444', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(19, 4, 'Jabal Wibisono', '2023-08-06 16:03:54', 'Office Tour', 'UD Utama Nuraini (Persero) Tbk', '(+62) 773 5507 2940', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(20, 4, 'Lutfan Narpati', '2023-07-23 09:11:34', 'Office Tour', 'PJ Nasyiah Maryadi Tbk', '(+62) 27 5914 4900', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(21, 4, 'Darsirah Hardiansyah', '2023-08-17 07:25:43', 'Office Tour', 'Perum Rajata Tbk', '0934 9058 9881', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(22, 4, 'Yance Intan Hasanah M.Pd', '2023-07-25 02:55:59', 'Office Tour', 'Perum Firgantoro Yolanda', '(+62) 28 3558 157', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(23, 4, 'Victoria Handayani', '2023-08-11 23:59:49', 'Office Tour', 'PT Siregar Sudiati Tbk', '(+62) 935 6858 119', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(24, 4, 'Rendy Tomi Siregar M.Kom.', '2023-07-21 17:59:59', 'Office Tour', 'Fa Tamba', '0285 5687 9426', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(25, 4, 'Galih Prakasa', '2023-05-31 20:09:57', 'Office Tour', 'Yayasan Maheswara Oktaviani', '(+62) 371 8150 9945', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(26, 4, 'Eman Widodo', '2023-08-01 19:52:38', 'Office Tour', 'Fa Lestari Tbk', '025 1520 251', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(27, 4, 'Bakiman Iswahyudi S.IP', '2023-06-24 07:00:33', 'Office Tour', 'Fa Saputra Kusmawati (Persero) Tbk', '(+62) 241 9457 858', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(28, 4, 'Rina Namaga S.I.Kom', '2023-08-15 10:01:29', 'Office Tour', 'PT Wahyuni Nainggolan (Persero) Tbk', '0438 1717 834', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(29, 4, 'Puspa Farhunnisa Oktaviani', '2023-06-21 11:02:00', 'Office Tour', 'Perum Nuraini Manullang (Persero) Tbk', '(+62) 714 7483 0812', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(30, 4, 'Prasetya Bajragin Siregar', '2023-07-21 15:15:52', 'Office Tour', 'PT Prasasta', '(+62) 917 0010 076', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_11_034301_create_categories_table', 1),
(6, '2023_04_11_101925_create_articles_table', 1),
(7, '2023_04_16_231837_create_narasumbers_table', 1),
(8, '2023_04_16_234338_create_kunjungans_table', 1),
(9, '2023_04_27_012524_create_agendas_table', 1),
(10, '2023_04_27_221446_create_divisions_table', 1),
(11, '2023_05_01_111739_create_pengumuman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narasumbers`
--

CREATE TABLE `narasumbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tanggal_acara` datetime DEFAULT NULL,
  `tempat` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tanggal_approve` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narasumbers`
--

INSERT INTO `narasumbers` (`id`, `user_id`, `name`, `tanggal_acara`, `tempat`, `asal`, `no_hp`, `tanggal_approve`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'Vicky Astuti', '2023-06-07 12:48:28', 'Kpg. Bakit  No. 522', 'PJ Pranowo (Persero) Tbk', '(+62) 543 7765 385', '2023-05-21 18:38:44', NULL, '2023-05-21 06:44:29', '2023-05-21 10:38:44'),
(2, 4, 'Umi Astuti', '2023-08-14 06:20:13', 'Psr. Wahidin No. 636', 'Perum Prasetyo (Persero) Tbk', '0654 3399 518', '2023-05-21 21:13:17', NULL, '2023-05-21 06:44:29', '2023-05-21 13:13:17'),
(3, 4, 'Janet Ilsa Agustina', '2023-07-04 10:51:19', 'Ki. Urip Sumoharjo No. 131', 'Fa Marpaung Yolanda', '(+62) 303 1669 498', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(4, 4, 'Wira Suryono', '2023-07-26 09:58:45', 'Kpg. Barasak No. 651', 'Perum Haryanto Haryanto Tbk', '021 2296 999', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(5, 4, 'Paiman Samsul Wacana S.Pt', '2023-06-17 05:40:03', 'Dk. Jend. Sudirman No. 126', 'PD Maheswara Suryatmi (Persero) Tbk', '0586 2055 2757', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(6, 4, 'Yosef Ardianto M.M.', '2023-08-11 16:53:55', 'Kpg. Sudiarto No. 429', 'PJ Pertiwi Pratiwi (Persero) Tbk', '0948 6993 3324', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(7, 4, 'Kamidin Damanik', '2023-07-28 13:20:54', 'Gg. Sudirman No. 285', 'Yayasan Mansur Mandasari', '0785 3191 760', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(8, 4, 'Nadia Agustina M.Farm', '2023-06-20 17:43:30', 'Kpg. Moch. Toha No. 979', 'Fa Ramadan', '(+62) 819 372 714', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(9, 4, 'Laksana Harjaya Permadi', '2023-08-08 01:23:07', 'Gg. Baik No. 665', 'Perum Manullang', '(+62) 925 3532 7384', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(10, 4, 'Viman Luhung Marpaung S.Pd', '2023-08-08 14:06:26', 'Kpg. Adisumarmo No. 261', 'Perum Dongoran Tbk', '0976 0285 0272', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(11, 4, 'Salimah Palastri', '2023-08-10 10:12:24', 'Ds. Jambu No. 567', 'Fa Ramadan', '(+62) 812 6694 468', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(12, 4, 'Tugiman Muni Dabukke S.T.', '2023-08-03 12:09:26', 'Ds. Cemara No. 562', 'PT Susanti Wahyuni', '0881 733 974', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(13, 4, 'Taswir Habibi', '2023-07-13 21:15:51', 'Ki. Astana Anyar No. 965', 'Perum Santoso (Persero) Tbk', '0798 6732 512', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(14, 4, 'Jabal Hakim', '2023-06-17 23:32:22', 'Jr. Casablanca No. 956', 'PD Suwarno Ramadan', '(+62) 658 5289 6449', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(15, 4, 'Febi Mayasari S.I.Kom', '2023-06-29 23:07:21', 'Ki. Diponegoro No. 334', 'Fa Laksmiwati Nurdiyanti Tbk', '024 2967 0158', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(16, 4, 'Ganjaran Baktiono Hakim', '2023-08-14 15:08:21', 'Ki. Uluwatu No. 535', 'Yayasan Anggriawan Sinaga Tbk', '023 0290 5417', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(17, 4, 'Maimunah Laksita', '2023-08-13 12:42:33', 'Jr. Abdul Rahmat No. 346', 'CV Usada Wastuti (Persero) Tbk', '0301 5688 7377', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(18, 4, 'Dinda Yolanda', '2023-05-30 07:05:34', 'Gg. Baik No. 392', 'PJ Samosir Lazuardi (Persero) Tbk', '(+62) 382 9037 385', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(19, 4, 'Wakiman Hidayanto', '2023-07-24 08:20:35', 'Ki. Lada No. 281', 'UD Padmasari', '0751 2776 804', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(20, 4, 'Wawan Latupono', '2023-08-09 08:07:15', 'Ds. Setia Budi No. 890', 'PT Rahmawati Irawan', '(+62) 252 5121 593', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(21, 4, 'Gamblang Hutasoit', '2023-07-04 21:55:47', 'Kpg. Basuki Rahmat  No. 842', 'Fa Laksita Iswahyudi', '(+62) 863 6533 4999', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(22, 4, 'Violet Rahmawati S.Sos', '2023-07-29 16:12:44', 'Kpg. Adisucipto No. 477', 'Perum Pratiwi Budiman (Persero) Tbk', '0819 1448 4113', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(23, 4, 'Gawati Fathonah Puspita', '2023-08-10 18:52:11', 'Ds. Kebonjati No. 679', 'Fa Wahyuni Tbk', '(+62) 303 1762 4583', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(24, 4, 'Balijan Maryadi', '2023-06-03 08:26:10', 'Gg. Bahagia  No. 903', 'Yayasan Sudiati Tbk', '0655 7532 815', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(25, 4, 'Edward Jailani M.Ak', '2023-06-26 23:54:23', 'Gg. Bakhita No. 626', 'Yayasan Anggriawan Hutasoit Tbk', '0459 0401 9761', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(26, 4, 'Ulva Puput Suryatmi M.Kom.', '2023-08-03 02:09:51', 'Ds. Reksoninten No. 413', 'Yayasan Setiawan Pratiwi Tbk', '(+62) 927 6822 3221', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(27, 4, 'Malika Raina Pratiwi', '2023-08-07 17:56:17', 'Ki. Bakti No. 191', 'PJ Widodo', '0846 6294 5751', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(28, 4, 'Padma Usamah', '2023-08-15 01:32:52', 'Gg. Astana Anyar No. 157', 'PD Pranowo Mulyani', '0800 357 673', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(29, 4, 'Umay Irawan', '2023-07-09 13:22:27', 'Jr. Adisucipto No. 781', 'Yayasan Oktaviani Prayoga (Persero) Tbk', '(+62) 799 0805 229', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29'),
(30, 4, 'Jane Yuliarti', '2023-08-04 07:16:01', 'Ki. Basoka No. 669', 'UD Sudiati Tbk', '(+62) 300 0372 6984', NULL, NULL, '2023-05-21 06:44:29', '2023-05-21 06:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `user_id`, `division_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Besuk Tahanan Online', '<div>Besuk Tahanan Online mulai kembali efektif pada H+3 lebaran yaitu tanggal 29 April 2023.</div>', '2023-05-24 05:36:20', '2023-05-21 06:57:52'),
(2, 2, 2, 'Klinik Pratama Rawat Jalan BNN Provinsi Bali', '<div>Officia id inventore vel pariatur. Velit sunt ut tempore corporis est quia ad autem. Recusandae corporis quos porro voluptas voluptatem eum. Molestiae et magnam recusandae dicta. Fugit nesciunt ut et. Ex sed hic at fuga ea.</div>', '2023-08-21 02:33:13', '2023-05-21 07:15:36'),
(3, 3, 3, 'Jemur Tahanan dan Olahraga Pagi', '<div>Dolorum quidem est illum esse rerum ut dolor ratione. Odit ducimus eos consequatur ea voluptatum. Rerum quo deleniti autem voluptatum quia quos fugiat. Dolores eligendi a dolor provident et explicabo dolorem. Eaque ut voluptate temporibus placeat vel accusantium. Enim optio corporis unde et. Et adipisci ipsum nisi in aliquid impedit autem. Reprehenderit sed voluptatem consequatur reiciendis sint temporibus. In vitae fugiat aut est ratione. Totam iure odio sed ipsa. At eius nemo nostrum natus rerum officia.</div>', '2023-06-26 11:46:56', '2023-05-21 07:15:51'),
(4, 2, 7, 'Libur Hari Raya Lebaran 2023', '<div>Amet et tempora exercitationem non. Nihil inventore aut et libero omnis dolor. Amet reiciendis dolores nisi alias omnis dolores. Consectetur facilis aut atque error officiis. Aperiam nemo commodi repudiandae et dolor voluptate id. Suscipit aut porro consequatur possimus. Dolorem quibusdam amet assumenda aut.</div>', '2023-07-23 02:23:31', '2023-05-21 07:15:09'),
(5, 4, 4, 'Libur Hari Raya Galungan 2023', '<div>Libur Hari Raya Galungan dimulai pada tanggal 4-11 Januari 2023</div>', '2023-01-19 23:05:40', '2023-05-21 13:09:32'),
(6, 4, 4, 'Libur Natal 2023', '<div>Voluptates molestias ut omnis optio nam. Voluptatem et et exercitationem perspiciatis qui omnis quia culpa. Cumque ipsam maiores veniam voluptatem. Aut illo quam id dolorem. Et et minus voluptas quidem. Autem in corrupti qui. Eum fuga rem veritatis dolore. Enim nemo et laborum dicta voluptates. Consequatur illo quis est iure ullam expedita. Animi et aut ducimus nobis earum dolorum sed. Vel quis quis eius modi sequi quasi et. Adipisci quis blanditiis est suscipit nesciunt exercitationem omnis.</div>', '2023-04-16 03:55:46', '2023-05-21 07:17:14'),
(7, 3, 2, 'Bimbingan Teknis Petugas Rehabilitasi Tentang Intervensi Krisis', '<div>Dolorem dignissimos occaecati cum ea quis odio expedita perspiciatis. Voluptatibus aperiam deleniti magni ut cumque molestiae. Aspernatur sit aut voluptas ut consectetur voluptatum. Non consectetur molestias fuga animi amet aut aliquid. At nostrum voluptate praesentium est soluta. Id animi voluptas dolorem temporibus quod qui expedita asperiores. Non quis quo unde animi exercitationem numquam dolores. Perferendis sapiente hic et nulla voluptatem. Sed deserunt neque qui quia consequatur rerum velit ut. Consequatur atque labore quo reprehenderit molestiae.</div>', '2023-06-08 05:53:40', '2023-05-21 07:17:34'),
(8, 3, 1, 'Perubahan Jam Kerja Selama Bulan Ramadhan 2023', '<div>Error molestiae rerum suscipit aut recusandae praesentium. Aliquid id aspernatur et exercitationem rerum at. Dolorem ipsa incidunt rerum suscipit aut enim dignissimos. Vel voluptatum aut rem molestias est occaecati velit. Dolore nam nesciunt est eius numquam. Voluptatem laboriosam expedita dolore soluta accusamus cumque possimus. Similique cumque facilis sed non vel sint. Numquam et labore et est excepturi quae. Corporis debitis qui natus voluptatum. Dolor aut iste et quia saepe mollitia.</div>', '2023-07-25 06:44:11', '2023-05-21 07:17:39'),
(9, 1, 6, 'Briefing Senin Pagi', '<div>Quam et eligendi molestiae blanditiis. Temporibus exercitationem nihil sunt dicta doloremque porro. Est consequatur architecto nam et error ea velit quo. Qui et autem nobis distinctio. Eaque tempora nemo dolorem tenetur. Optio quis eum eos ut nisi. Repudiandae ullam deserunt voluptatem quia rerum dolorem dolores. Quisquam veritatis repellendus dicta nostrum occaecati iusto. Eos distinctio nihil sed magnam voluptas. Sint corrupti molestiae veritatis quia natus dolorum vero. At voluptatem et repellat natus voluptas.</div>', '2023-07-23 11:36:58', '2023-05-21 07:04:20'),
(10, 1, 5, 'Penyediaan Gitar Untuk Kunjungan 7 Mei', '<div>Animi inventore est ut ipsa esse. Iusto ipsa eos eum qui. Aut numquam itaque omnis voluptatem sapiente dolor qui. Quia quasi consequatur perspiciatis quo aut. Nulla quaerat earum ut rerum enim eos id. Natus sit vero repellendus enim amet exercitationem quod. Quisquam quisquam perferendis inventore inventore. Velit adipisci explicabo quisquam maxime velit dolore. Tempora beatae eius corporis et occaecati cupiditate aut. Quo velit quisquam ut delectus numquam dolorem ea.</div>', '2023-08-17 20:02:45', '2023-05-21 07:04:45'),
(11, 3, 2, 'Autem adipisci est.', 'Fugit autem mollitia qui consectetur consequatur voluptas. Saepe dolore voluptas velit est nam. Ad rerum consequatur tempora inventore molestias rerum necessitatibus. Nostrum consequatur atque ducimus sint enim velit consequatur.\n\nQuae ut modi voluptas aperiam consequatur et. Vitae ab consequatur et. Perspiciatis dicta repellendus at cum.\n\nEt quo recusandae corrupti impedit sed illum et. Provident aperiam facere necessitatibus ut rerum. Tempore quo odit aut sapiente est amet. Voluptatem itaque cupiditate quas eum repudiandae iste quia.', '2023-06-08 07:34:12', '2023-05-21 06:44:29'),
(12, 1, 7, 'Dicta commodi.', 'Vitae quas repellendus laudantium ipsa et reprehenderit et. Nostrum et eveniet rerum sed enim molestiae est. Officiis repudiandae cumque possimus quis.\n\nAb voluptatem nemo et maxime animi a. Blanditiis sunt rerum itaque reprehenderit ut. Perferendis commodi deserunt omnis animi dicta ab vel. Perferendis ea impedit molestiae voluptates doloribus eum atque. Alias suscipit quo ex eos at perferendis eum.\n\nDolores in odio officia rem nobis id voluptatem. Ipsa hic nobis ut voluptatem deleniti eligendi tempore. Quidem sed non et dolores. Corporis et eum deserunt tempore.', '2023-07-10 21:23:05', '2023-05-21 06:44:29'),
(13, 3, 5, 'Dignissimos magni et.', 'Reiciendis pariatur velit quia et modi vel fugit. Officia et est ex ut nisi quis eum quia. Laborum eos harum rerum.\n\nLaborum illo sunt consequatur voluptate non enim ut. Sit optio magnam rerum consectetur ex quia ullam.\n\nDignissimos velit repellat iusto sunt dolore alias error. Nesciunt minus sunt et ea.', '2023-05-31 02:23:17', '2023-05-21 06:44:29'),
(14, 3, 3, 'Velit nihil perferendis necessitatibus.', 'Ratione exercitationem et id dolores. Officia quas voluptatibus praesentium ut nostrum. Sit facilis officiis vel qui fugit ullam aliquam voluptas.\n\nEt harum omnis voluptate id et natus. Quo totam excepturi aut optio quos beatae. Ad sed qui voluptas atque laudantium neque fugiat. Sint ea iste odio vel fuga.\n\nAspernatur repellat et ut et modi. Omnis qui animi sed et molestiae. Laboriosam explicabo dolorum fugiat ex ut.', '2023-07-18 05:25:58', '2023-05-21 06:44:29'),
(15, 4, 3, 'Atque illum sed.', 'Aut numquam et enim deserunt non fugiat aperiam. Ducimus ut a nostrum. Et dolore nihil cumque sit quo unde reprehenderit velit.\n\nEst nobis quasi nihil et perspiciatis illum hic et. Et fugit excepturi deserunt et soluta. A perspiciatis aut assumenda corrupti. Asperiores consequatur omnis quaerat quam.\n\nRerum quis minus rem quidem ex quos corrupti. Commodi cumque consequuntur quia sint assumenda aut laudantium. Alias est eum quo reprehenderit dolore illo. Aliquid quisquam provident aut totam mollitia nihil iste. Voluptatem omnis quia enim ipsum labore natus.', '2023-07-20 07:39:38', '2023-05-21 06:44:29'),
(16, 1, 1, 'Laudantium fuga soluta.', 'Sequi illum deserunt molestiae. Sit aut tempore vitae velit ut omnis. Tempore voluptatibus molestias rem atque.\n\nVero rerum labore similique doloremque. Consequatur animi pariatur dolorem. Est asperiores minus a quia molestias. Animi provident alias placeat expedita dolorum nostrum neque.\n\nEt aut officiis perspiciatis deleniti rerum ipsum. Recusandae aut non et. Consequatur assumenda dolores est iste reprehenderit.', '2023-08-16 02:12:20', '2023-05-21 06:44:29'),
(17, 2, 5, 'Cupiditate iste.', 'Recusandae voluptatibus architecto nam laborum deserunt cumque. Et quae placeat repellat facere vero occaecati cumque dicta. Ut est et adipisci velit id.\n\nRepellendus eum perspiciatis modi. Delectus pariatur necessitatibus eum aperiam et. Consequatur et dicta repellendus deleniti.\n\nAut est quae eaque distinctio. Totam quibusdam quisquam eos eos quaerat exercitationem ut. Saepe dolorum quam hic ut soluta.', '2023-05-30 15:17:58', '2023-05-21 06:44:29'),
(18, 2, 5, 'Quia qui et voluptatem.', 'Eligendi nemo inventore in aut qui consectetur eum natus. Maiores et ab quae labore et dolor rerum dicta. Aut aut cum corporis delectus reprehenderit. Distinctio dolorem possimus pariatur.\n\nEnim et quidem incidunt veritatis. Nobis mollitia similique voluptas maiores. Quod sapiente est repellat optio ut consequuntur sequi. Quae praesentium et tenetur iste voluptatem nostrum.\n\nIn consectetur aliquid et quo architecto itaque. Voluptates eius eum ad dolore doloremque. Voluptatem ipsam soluta reprehenderit sunt ducimus. Eum modi non iusto illum distinctio.', '2023-07-14 12:33:25', '2023-05-21 06:44:29'),
(19, 4, 6, 'Ut eos recusandae.', 'Tempore aut unde quaerat unde eum maiores atque natus. Aut laboriosam dolores modi dolor in in. Iste et corporis quis. Expedita aspernatur voluptatibus delectus occaecati ipsam quia sed. Ex sequi iste ea asperiores aspernatur dolorem quidem.\n\nConsequuntur blanditiis libero eum explicabo. Blanditiis ut odio veritatis libero commodi nihil rerum. Voluptatum dolores et incidunt porro velit porro est quia.\n\nDoloremque eveniet aliquid voluptatem optio voluptates ut. Rerum et dolores autem. Quia reprehenderit natus error debitis optio aut dolor. Labore voluptatibus dolorum tempore numquam.', '2023-06-09 14:49:00', '2023-05-21 06:44:29'),
(20, 1, 7, 'Est autem pariatur magni.', 'Rerum officia aut necessitatibus error itaque maiores. At laboriosam vel facilis. Itaque atque et omnis aperiam soluta voluptatem itaque. Consequatur consequuntur vero aut optio perspiciatis ab aut et.\n\nNam qui vitae nulla molestiae. Ea consequatur debitis eos placeat et et ut at. Consequuntur molestiae ab velit omnis tenetur.\n\nAut asperiores accusantium dolorum iure ut magnam natus. Voluptas sed omnis voluptates libero. Et iste placeat id nobis ipsum.', '2023-07-30 04:26:07', '2023-05-21 06:44:29'),
(21, 4, 1, 'Aperiam in repudiandae voluptas.', 'Et et necessitatibus asperiores molestias eaque adipisci. Dolorum repellendus est quo vitae. Et incidunt harum soluta omnis voluptas impedit.\n\nRem tenetur est fugiat aliquid. A sit eum praesentium temporibus sint ratione qui.\n\nQuasi iste dolorem voluptatem quia rerum. Praesentium enim illo corrupti omnis. Ab et sint omnis soluta. Tempore quod numquam autem perspiciatis.', '2023-06-27 10:17:23', '2023-05-21 06:44:29'),
(22, 4, 1, 'Aut quia voluptatem aliquam.', 'Qui non et tenetur perferendis vero. Modi voluptas neque quaerat quod enim qui et.\n\nEt quo accusantium excepturi alias fugit. Temporibus aut sunt laboriosam. Voluptatem voluptatum ipsam dolorem numquam praesentium exercitationem.\n\nEa modi doloremque enim qui sunt. Quasi sit facere necessitatibus deserunt totam asperiores dolor. Eum sed modi autem alias in molestiae nobis soluta. Hic et enim possimus maiores.', '2023-06-03 15:06:39', '2023-05-21 06:44:29'),
(23, 3, 6, 'Accusantium saepe dolorem.', 'Velit sed repellendus qui non voluptas. Et dolores pariatur magni et fugiat delectus. Architecto adipisci et eius dolores. Maiores voluptas rerum optio quam sed aut.\n\nA ex voluptas non. Quis exercitationem inventore vel. Omnis architecto eos id aut consequatur a.\n\nVoluptatem blanditiis numquam numquam itaque. Est omnis quam quia. Necessitatibus dolorem illum ullam enim et debitis sed.', '2023-05-21 15:00:14', '2023-05-21 06:44:29'),
(24, 1, 5, 'Soluta enim.', 'Quia qui aperiam culpa doloremque. Ipsam et culpa et sint inventore ab adipisci. Labore sit quaerat aperiam reprehenderit autem.\n\nTotam aperiam molestias ipsa voluptatum sed est qui. Quos vero est distinctio ad atque. Aut et molestiae quia vel.\n\nTemporibus ab tenetur totam expedita velit in mollitia. Est officia maxime ea voluptatum cum vitae qui. At dicta amet voluptatem.', '2023-06-05 06:46:19', '2023-05-21 06:44:29'),
(25, 1, 5, 'Id aut ad.', 'Magni tenetur quod ducimus explicabo vitae a voluptatem. Corrupti aut qui repudiandae excepturi deleniti voluptas. Corporis exercitationem molestiae optio suscipit reiciendis quia praesentium doloribus.\n\nQuas laudantium consequuntur labore. Voluptas voluptatem culpa possimus atque voluptatem saepe. Omnis debitis illo veniam tempora eos veritatis. Omnis delectus ut esse.\n\nNon consequatur cupiditate consectetur unde tempora quis. Doloribus ut voluptatem asperiores expedita. Placeat quisquam laboriosam temporibus deleniti quis et unde dolorem.', '2023-07-04 13:53:26', '2023-05-21 06:44:29'),
(26, 3, 7, 'Qui accusamus ullam.', 'Qui saepe sint explicabo et tenetur sint. Eum voluptatem at magnam magnam. Sint nihil et esse et neque vitae. Quis et ipsam optio et necessitatibus eos. Repellendus voluptatum odit eaque in eum.\n\nQuam maiores in doloremque voluptatibus odio deserunt. Modi amet illum ex perspiciatis. Voluptatum et fugiat iusto et exercitationem voluptas ut.\n\nCum sunt ad est quam iusto ad. Sequi necessitatibus sit est voluptatem mollitia nobis dolores. Voluptatem magnam id in eos cum ut. Aut ullam aliquam fuga et ea beatae.', '2023-06-07 13:09:33', '2023-05-21 06:44:29'),
(27, 1, 1, 'Autem cumque fugiat.', 'Sint accusantium est at sit. Atque voluptas est veniam velit.\n\nEos autem temporibus maiores beatae reiciendis animi. Quos facere ipsam labore consequatur asperiores rem saepe. Ex a reiciendis officiis facere ratione aut eligendi. Sequi velit sed mollitia dignissimos tenetur quos ipsum.\n\nNon fugit hic sit quia similique tempora. Aut cumque voluptas atque aperiam earum. Harum at voluptas hic cum sed architecto.', '2023-05-22 03:02:57', '2023-05-21 06:44:29'),
(28, 4, 6, 'Laudantium assumenda.', 'Asperiores voluptas quaerat voluptatem nisi. Est doloribus nulla iusto eos est ullam sequi fugiat.\n\nEst modi est et debitis et iste deserunt et. Sit aspernatur nemo ipsum odio. Dolor ipsum et harum quo deserunt. Qui dolor voluptates iste quibusdam.\n\nAutem culpa voluptas expedita. Perspiciatis adipisci iure est fuga quasi fuga vero architecto. Ut doloremque facilis dolores sed.', '2023-06-26 18:24:47', '2023-05-21 06:44:29'),
(29, 2, 7, 'Dolorum temporibus qui.', 'Vero cupiditate quis rem laudantium eius reiciendis. Veritatis rerum non velit asperiores est voluptate. Hic eos expedita deleniti. Nihil quod nihil eaque error facilis.\n\nQui officia necessitatibus totam quia. Explicabo earum fugit maiores quibusdam sunt. Eaque harum atque aliquid corporis.\n\nId illo harum nam dolores dolore ut. Vitae voluptatem sit excepturi eos non adipisci.', '2023-06-04 11:50:06', '2023-05-21 06:44:29'),
(30, 3, 1, 'Dolores laudantium doloremque.', 'Sequi et reprehenderit sint magni hic. Error cum omnis aliquam labore exercitationem. Voluptatem voluptate et qui unde.\n\nRepudiandae quo nemo quas accusantium ut. Qui laudantium officiis aliquam quos sapiente. Iusto non sint et debitis corporis exercitationem dolor. Tempora aut doloribus error ipsam. Doloribus magnam qui consequatur in omnis molestiae.\n\nVoluptates aliquam nam nulla esse facilis. Sed sunt natus animi eveniet laborum. Ea iste praesentium molestiae et vel veritatis. Numquam quis placeat deleniti ea.', '2023-06-16 03:46:37', '2023-05-21 06:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL DEFAULT 8,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` varchar(255) NOT NULL DEFAULT 'eksternal',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `division_id`, `name`, `username`, `email`, `password`, `level_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lexy Erresta', 'lexluthor', 'lexluthor@gmail.com', '$2y$10$Xtw/h4AGH5P4VkI1r6sgde7wlMzu24js8OETC0IcjBustU90HJawu', 'admin', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(2, 7, 'Made Mila', 'mdmila', 'mdmila@gmail.com', '$2y$10$oE.JGVy1GbNwHiArgYHOKuupQd8Fk2VfVCh4DoF3SZDJZzPoIw6f2', 'admin', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(3, 1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$6Z63saHzZFJYO0NNGqRXjuGi3FmIH5UpbHaeWXLXzMgN1f3AEi8HS', 'admin', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(4, 4, 'Staff', 'staff', 'staff@gmail.com', '$2y$10$mnzxxftCLm2wChYSWUxp8Of/kOndoOIzGAyhE46aHae9ZJPkYujMi', 'staff', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(5, 8, 'Eksternal', 'eksternal', 'eksternal@gmail.com', '$2y$10$IvRi4tx4w8LeKFI9AsGdV.YOTObhObEfoAzJV6YM9nPYkzkeCTgNy', 'eksternal', NULL, '2023-05-21 06:44:28', '2023-05-21 06:44:28'),
(6, 7, 'Admin Humas', 'adminhumas', 'adminhumas@gmail.com', '$2y$10$qZ8hRdUUXqdr8CJKpMgSH.WIxQJ6isqT1SZODuxYwDpIuENZVcoqK', 'admin', NULL, '2023-05-21 07:56:34', '2023-05-21 07:56:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kunjungans`
--
ALTER TABLE `kunjungans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narasumbers`
--
ALTER TABLE `narasumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kunjungans`
--
ALTER TABLE `kunjungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `narasumbers`
--
ALTER TABLE `narasumbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
