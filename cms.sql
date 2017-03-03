-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: wipek95.nazwa.pl:3306
-- Czas generowania: 03 Mar 2017, 22:38
-- Wersja serwera: 5.5.53-MariaDB
-- Wersja PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--

--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  `parent_page` varchar(100) NOT NULL,
  `positive` int(100) NOT NULL,
  `negative` int(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `pubdate`, `body`, `created`, `modified`, `created_by`, `modified_by`, `category`, `tags`, `parent_page`, `positive`, `negative`, `views`, `logo`) VALUES
(1, 'testetst', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">mieniła się pod wpływem dodanego humoru czy przypadkowych sł&oacute;w, kt&oacute;re nawet w najmniejszym stopniu nie przypominają istniejących. Jeśli masz zamiar użyć fragmentu Lorem Ipsum, lepiej mieć pewność, że nie ma niczego &bdquo;dziwnego&rdquo; w środku tekstu. Wszystkie Internetowe generatory Lorem Ipsum mają tendencje do kopiowania już istniejących blok&oacute;w, co czyni nasz pierwszym prawdziwym generatorem w&nbsp;</span></p>', '2017-03-03 21:50:55', '2017-03-03 21:50:55', 'wipek', '', 'kot', 'test, kawa, kot, pies', 'Inna_testowa', 0, 0, 1, 'assets/articles_logos/1c5818d39fac832e87e8eeb9f9e6db69.png'),
(2, 'dsfgdsfds', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 21:57:25', '2017-03-03 22:02:44', 'wipek', 'wipek', 'kot', 'fdsfsd', 'For_fun', 0, 0, 1, 'assets/articles_logos/b151d2b00fe2d00ef9ddc11aab869be0.png'),
(3, 'fdsfdsfds', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:04:31', '2017-03-03 22:04:31', 'wipek', '', 'fdsfsd', 'fdsfdsf', 'For_fun', 0, 0, 0, 'assets/articles_logos/8e421035705ebe79f9e881f46426a5ef.png'),
(4, 'gdfgdfgfdgfd', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:05:40', '2017-03-03 22:05:40', 'wipek', '', 'gdfgsdfgfd', 'gfdgdf', 'Inna_testowa', 0, 0, 0, 'assets/articles_logos/018fd2eb72d0391d009c561de82dd865.png'),
(5, 'gfdghbfghbngf', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:05:56', '2017-03-03 22:10:50', 'wipek', 'wipek', 'fdgfdgdf', 'fgdgfdg', 'For_fun', 0, 0, 1, 'assets/articles_logos/2d8dedde27773cc832e12dc108fc5fbe.png'),
(6, 'rgtbfh', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:07:08', '2017-03-03 22:07:08', 'wipek', '', 'fdgdfgdfgfd', 'gfdg', 'Inna_testowa', 0, 0, 0, 'assets/articles_logos/d110320e91f5f1240e0af04056fe7349.png'),
(7, 'fdsfsd', '2017-03-03', '<p>gfdbh<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:07:23', '2017-03-03 22:07:23', 'wipek', '', 'fdsfgdsf', 'fdsfdsdsf', 'For_fun', 0, 0, 0, 'assets/articles_logos/7aa6b6e69f16a93101bc51832f331b1f.png'),
(8, 'fdgsgesrfg', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:08:39', '2017-03-03 22:08:39', 'wipek', '', 'gdfgsdfgfd', 'stonoga', 'For_fun', 0, 0, 0, 'assets/articles_logos/398e16634fde5c655201acb39f5a4f68.png'),
(9, 'fetrhsgyh', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:08:58', '2017-03-03 22:08:58', 'wipek', '', 'kot', 'fsdfsdf', 'For_fun', 0, 0, 0, 'assets/articles_logos/889e04c615899f3fb5ff9197fcd51bb2.png'),
(10, 'bhdrtfhdhgt', '2017-03-03', '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z frag</span></p>', '2017-03-03 22:09:24', '2017-03-03 22:09:24', 'wipek', '', 'fdgfdgdf', 'fsdfsdf', 'For_fun', 0, 0, 3, 'assets/articles_logos/5ad5beac1e64946362e3f1998c4bb2fb.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(10, 1488454017, '81.209.177.189', '79RPLF5N');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `change_data`
--

CREATE TABLE `change_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `old_pw` varchar(128) DEFAULT NULL,
  `new_pw` varchar(128) DEFAULT NULL,
  `key_pw` varchar(100) DEFAULT NULL,
  `old_email` varchar(255) DEFAULT NULL,
  `new_email` varchar(255) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `key_email` varchar(100) DEFAULT NULL,
  `old_del_code` int(8) DEFAULT NULL,
  `new_del_code` int(8) DEFAULT NULL,
  `key_del_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('164134ecd65b3762260d8701e8f98df2', '66.249.64.241', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488577293, ''),
('292ae34d6f8edbe6a3f13e6c14fc16ae', '66.249.64.241', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488569783, ''),
('37c2bba2fbab1d4b86983e94a4ccbba8', '66.249.64.237', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488569572, ''),
('5b4e3fadc0e280d04dc6c471df010a10', '66.249.64.237', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488569996, ''),
('7ca0e91ead2a562229114252add1d013', '66.249.64.233', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488572741, ''),
('ae55765dc5a2860913c9cc073a106c21', '68.180.228.253', 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)', 1488572246, ''),
('b9985940e77a5ba487c81a6cad00180b', '94.154.56.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1488571056, 'a:4:{s:9:"user_data";s:0:"";s:5:"login";s:5:"wipek";s:4:"mods";s:5:"admin";s:8:"loggedin";b:1;}'),
('b9d54c060175f5506f5bd28fc230e797', '68.180.228.253', 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)', 1488572247, ''),
('d32c515f272b40e700e07b1ca2cc5a2a', '66.249.64.241', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488569643, ''),
('edc6d7b34ce3d3b9b5d6dbfdff62d182', '66.249.64.233', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1488569743, ''),
('f93a705c7ae9f0fd34988befdc4b66db', '94.154.56.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1488569670, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cmsconfig`
--

CREATE TABLE `cmsconfig` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `regulamin` text,
  `favicon_url` varchar(100) DEFAULT NULL,
  `logo_url` varchar(100) DEFAULT NULL,
  `fb_link` varchar(200) NOT NULL DEFAULT '',
  `about` text,
  `today_post` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `cmsconfig`
--

INSERT INTO `cmsconfig` (`id`, `name`, `regulamin`, `favicon_url`, `logo_url`, `fb_link`, `about`, `today_post`, `description`, `keywords`) VALUES
(1, 'WiPeK', 'Test', 'assets/images/favicon.ico', 'assets/logo/wipek.png', 'https://www.facebook.com/Komputerswiat?fref=nf', 'CMS by WiPeK', '2', 'CMS', 'cms');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_title` varchar(105) NOT NULL,
  `file_who_add` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `extension` varchar(20) NOT NULL DEFAULT '',
  `raw_name` varchar(50) DEFAULT NULL,
  `file_size` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `files`
--

INSERT INTO `files` (`id`, `file_title`, `file_who_add`, `add_date`, `file_url`, `extension`, `raw_name`, `file_size`) VALUES
(1, 'ghfghgf', 'wipek', '2017-03-03 21:56:34', '75fc6679a74538716e43f13e70f251b8.png', '.png', '75fc6679a74538716e43f13e70f251b8', 31.06);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_title` varchar(105) NOT NULL,
  `img_describe` text,
  `img_who_add` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `catalog` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`id`, `img_title`, `img_describe`, `img_who_add`, `add_date`, `img_url`, `thumb_url`, `catalog`) VALUES
(1, 'fghgfhgf', '0', 'wipek', '2017-03-03 21:51:48', 'assets/gallery/202dac906d768d90a6c4ec70f49837d4.png', 'assets/gallery/thumbs/202dac906d768d90a6c4ec70f49837d4.png', NULL),
(2, 'fdsfdsfds', '0', 'wipek', '2017-03-03 21:52:24', 'assets/gallery/8e421035705ebe79f9e881f46426a5ef.png', 'assets/gallery/thumbs/8e421035705ebe79f9e881f46426a5ef.png', NULL),
(3, 'fdsfdsfdsfsd', '0', 'wipek', '2017-03-03 21:52:31', 'assets/gallery/ccc226a1aec9bb5c64d61cc296cd838d.png', 'assets/gallery/thumbs/ccc226a1aec9bb5c64d61cc296cd838d.png', NULL),
(4, 'fdbghfdbh', '0', 'wipek', '2017-03-03 21:52:39', 'assets/gallery/53431e9d2a5067e387fde700ccbf8ada.png', 'assets/gallery/thumbs/53431e9d2a5067e387fde700ccbf8ada.png', NULL),
(5, 'wewqredf', '0', 'wipek', '2017-03-03 21:52:45', 'assets/gallery/de0d9e12e592ce689e6baa9f695964f8.png', 'assets/gallery/thumbs/de0d9e12e592ce689e6baa9f695964f8.png', NULL),
(6, 'fcvbcnbvnbv', '0', 'wipek', '2017-03-03 21:52:53', 'assets/gallery/8e3d0dc740e4d9094f53e7c522205d4a.png', 'assets/gallery/thumbs/8e3d0dc740e4d9094f53e7c522205d4a.png', NULL),
(7, 'cv ndfgth', '0', 'wipek', '2017-03-03 21:53:02', 'assets/gallery/b42db5c49df407eb5aa6f71502076930.png', 'assets/gallery/thumbs/b42db5c49df407eb5aa6f71502076930.png', NULL),
(8, 'mnbmhjkhy', '0', 'wipek', '2017-03-03 21:53:12', 'assets/gallery/2e15e377bd0fe3b6bbad076e4ae37c58.png', 'assets/gallery/thumbs/2e15e377bd0fe3b6bbad076e4ae37c58.png', NULL),
(9, 'ertreghfd', '0', 'wipek', '2017-03-03 21:53:20', 'assets/gallery/2db6777188ebca4a26a4a257bbbfd367.png', 'assets/gallery/thumbs/2db6777188ebca4a26a4a257bbbfd367.png', NULL),
(10, 'cxvfdsgbhsdrf', '0', 'wipek', '2017-03-03 21:53:31', 'assets/gallery/9bd61b6f91fede070564a1a547b81605.png', 'assets/gallery/thumbs/9bd61b6f91fede070564a1a547b81605.png', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `logdate` datetime NOT NULL,
  `logbody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `logdate`, `logbody`) VALUES
(1, '2017-03-03 21:42:36', 'Administrator: wipek stworzył stronę o <a href="http://www.cms.wipek.pl/test">ID</a> = 2 Tytuł: <a href="http://www.cms.wipek.pl/test">Test</a>'),
(2, '2017-03-03 21:47:04', 'Administrator: wipek stworzył stronę o <a href="http://www.cms.wipek.pl/iststs">ID</a> = 3 Tytuł: <a href="http://www.cms.wipek.pl/iststs">Inna testowa</a>'),
(3, '2017-03-03 21:47:43', 'Administrator: wipek stworzył stronę o <a href="http://www.cms.wipek.pl/dddddd">ID</a> = 4 Tytuł: <a href="http://www.cms.wipek.pl/dddddd">Kolejna</a>'),
(4, '2017-03-03 21:50:55', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//1">ID</a> = 1 Tytuł: <a href="http://www.cms.wipek.pl/article//1">testetst</a>'),
(5, '2017-03-03 21:51:37', 'Administrator: wipek zmienił kolejność stron na <a href="http://www.cms.wipek.pl/admin/page/order">Aktualna kolejność</a>'),
(6, '2017-03-03 21:51:48', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/fghgfhgf.jpg">fghgfhgf</a>'),
(7, '2017-03-03 21:52:24', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/fdsfdsfds.jpg">fdsfdsfds</a>'),
(8, '2017-03-03 21:52:31', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/fdsfdsfdsfsd.jpg">fdsfdsfdsfsd</a>'),
(9, '2017-03-03 21:52:39', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/fdbghfdbh.jpg">fdbghfdbh</a>'),
(10, '2017-03-03 21:52:45', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/wewqredf.jpg">wewqredf</a>'),
(11, '2017-03-03 21:52:53', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/fcvbcnbvnbv.jpg">fcvbcnbvnbv</a>'),
(12, '2017-03-03 21:53:02', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/cv ndfgth.jpg">cv ndfgth</a>'),
(13, '2017-03-03 21:53:12', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/mnbmhjkhy.jpg">mnbmhjkhy</a>'),
(14, '2017-03-03 21:53:20', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/ertreghfd.jpg">ertreghfd</a>'),
(15, '2017-03-03 21:53:31', 'Administrator: wipek zuploadowal obrazek o tytule: <a href="http://www.cms.wipek.pl/../assets/images/cxvfdsgbhsdrf.jpg">cxvfdsgbhsdrf</a>'),
(16, '2017-03-03 21:54:39', 'Administrator: wipek stworzył użytkownika o <a href="http://www.cms.wipek.pl//user/2">ID</a> = 2 Login: popopop Email: dfdsfds@o2.pl'),
(17, '2017-03-03 21:56:16', 'Administrator: wipek stworzył stronę o <a href="http://www.cms.wipek.pl/fffff">ID</a> = 5 Tytuł: <a href="http://www.cms.wipek.pl/fffff">For fun</a>'),
(18, '2017-03-03 21:56:34', 'Administrator: wipek zuploadowal plik: ghfghgf.png'),
(19, '2017-03-03 21:57:25', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//2">ID</a> = 2 Tytuł: <a href="http://www.cms.wipek.pl/article//2">dsfgdsfds</a>'),
(20, '2017-03-03 22:02:44', 'Administrator: wipek edytował artukuł o <a href="http://www.cms.wipek.pl/article/For_fun/2">ID</a> = 2 Tytuł: <a href="http://www.cms.wipek.pl/article/For_fun/2">dsfgdsfds</a>'),
(21, '2017-03-03 22:04:31', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//3">ID</a> = 3 Tytuł: <a href="http://www.cms.wipek.pl/article//3">fdsfdsfds</a>'),
(22, '2017-03-03 22:05:40', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//4">ID</a> = 4 Tytuł: <a href="http://www.cms.wipek.pl/article//4">gdfgdfgfdgfd</a>'),
(23, '2017-03-03 22:05:56', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//5">ID</a> = 5 Tytuł: <a href="http://www.cms.wipek.pl/article//5">gfdghbfghbngf</a>'),
(24, '2017-03-03 22:07:08', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//6">ID</a> = 6 Tytuł: <a href="http://www.cms.wipek.pl/article//6">rgtbfh</a>'),
(25, '2017-03-03 22:07:23', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//7">ID</a> = 7 Tytuł: <a href="http://www.cms.wipek.pl/article//7">fdsfsd</a>'),
(26, '2017-03-03 22:08:39', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//8">ID</a> = 8 Tytuł: <a href="http://www.cms.wipek.pl/article//8">fdgsgesrfg</a>'),
(27, '2017-03-03 22:08:58', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//9">ID</a> = 9 Tytuł: <a href="http://www.cms.wipek.pl/article//9">fetrhsgyh</a>'),
(28, '2017-03-03 22:09:24', 'Administrator: wipek stworzył artukuł o <a href="http://www.cms.wipek.pl/article//10">ID</a> = 10 Tytuł: <a href="http://www.cms.wipek.pl/article//10">bhdrtfhdhgt</a>'),
(29, '2017-03-03 22:10:16', 'Administrator: wipek zmienił kolejność stron na <a href="http://www.cms.wipek.pl/admin/page/order">Aktualna kolejność</a>'),
(30, '2017-03-03 22:10:50', 'Administrator: wipek edytował artukuł o <a href="http://www.cms.wipek.pl/article/For_fun/5">ID</a> = 5 Tytuł: <a href="http://www.cms.wipek.pl/article/For_fun/5">gfdghbfghbngf</a>'),
(31, '2017-03-03 22:22:00', 'Administrator: wipek zmienił post dnia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(14);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(105) NOT NULL,
  `slug` varchar(105) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `body` text NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(200) DEFAULT '',
  `pageadress` varchar(200) DEFAULT NULL,
  `inc_def` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `order`, `body`, `parent_id`, `template`, `views`, `logo`, `pageadress`, `inc_def`) VALUES
(1, 'Homepage', '', 1, 'Strona główna', 0, 'homepage', 156, '', NULL, 1),
(2, 'Test', 'test', 3, '<p><strong style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem pr&oacute;bnej książki. Pięć wiek&oacute;w p&oacute;źniej zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym r&oacute;żne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druk&oacute;w na komputerach osobistych, jak Aldus PageMaker</span></p>', 0, 'page', 2, 'assets/pages_logos/0cbc6611f5540bd0809a388dc95a615b.png', NULL, 1),
(3, 'Inna testowa', 'iststs', 4, '<p>O<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">g&oacute;lnie znana teza głosi, iż użytkownika może rozpraszać zrozumiała zawartość strony, kiedy ten chce zobaczyć sam jej wygląd. Jedną z mocnych stron używania Lorem Ipsum jest to, że ma wiele r&oacute;żnych &bdquo;kombinacji&rdquo; zdań, sł&oacute;w i akapit&oacute;w, w przeciwieństwie do zwykłego: &bdquo;tekst, tekst, tekst&rdquo;, sprawiającego, że wygląda to &bdquo;zbyt czytelnie&rdquo; po polsku. Wielu webmaster&oacute;w i designer&oacute;w używa Lorem Ipsum jako domyślnego modelu tekstu i wpisanie w internetowej wyszukiwarce &lsquo;lorem ipsum&rsquo; spowoduje znalezienie bardzo wielu stron, kt&oacute;</span></p>', 0, 'news_archive', 2, 'assets/pages_logos/022c75fc3d506fa4c839bcb52ac4132d.png', NULL, 1),
(4, 'Kolejna', 'dddddd', 5, '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">cznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z fragment&oacute;w (1.10.32 i 1.10.33) &bdquo;de Finibus Bonorum et Malorum&rdquo;, czyli &bdquo;O granicy dobra i zła&rdquo;, napisanej właśnie w 45 p</span></p>', 3, 'page', 1, 'assets/pages_logos/6db9eb291382fc6adf01a8b9f58c26aa.png', NULL, 1),
(5, 'For fun', 'fffff', 2, '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">owy blok Lorem Ipsum, używany od XV wieku, jest odtworzony niżej dla zainteresowanych. Fragmenty 1.10.32 i 1.10.33 z &bdquo;de Finibus Bonorum et Malorum&rdquo; Cycerona, są odtworzone w dokładnej, oryginalnej formie, wraz z angielskimi tłumaczeniami H. Rackhama z 1914 rok</span></p>', 0, 'news_archive', 2, 'assets/pages_logos/cb7133542df1e8fc5f838e70efd8df7f.png', NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `robots_visit`
--

CREATE TABLE `robots_visit` (
  `id` int(11) UNSIGNED NOT NULL,
  `googlebot` bigint(11) NOT NULL DEFAULT '0',
  `msnbot` bigint(11) NOT NULL DEFAULT '0',
  `baiduspider` bigint(11) NOT NULL DEFAULT '0',
  `bing` bigint(11) NOT NULL DEFAULT '0',
  `inktomi_slurp` bigint(11) NOT NULL DEFAULT '0',
  `yahoo` bigint(11) NOT NULL DEFAULT '0',
  `askjeeves` bigint(11) NOT NULL DEFAULT '0',
  `fastcrawler` bigint(11) NOT NULL DEFAULT '0',
  `infoseek_robot_1_0` bigint(11) NOT NULL DEFAULT '0',
  `lycos` bigint(11) NOT NULL DEFAULT '0',
  `yandexbot` bigint(11) NOT NULL DEFAULT '0',
  `mediapartners_google` bigint(11) NOT NULL DEFAULT '0',
  `crazy_webcrawler` bigint(11) NOT NULL DEFAULT '0',
  `adsbot_google` bigint(11) NOT NULL DEFAULT '0',
  `feedfetcher_google` bigint(11) NOT NULL DEFAULT '0',
  `curious_george` bigint(11) NOT NULL DEFAULT '0',
  `other_robot` bigint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `robots_visit`
--

INSERT INTO `robots_visit` (`id`, `googlebot`, `msnbot`, `baiduspider`, `bing`, `inktomi_slurp`, `yahoo`, `askjeeves`, `fastcrawler`, `infoseek_robot_1_0`, `lycos`, `yandexbot`, `mediapartners_google`, `crazy_webcrawler`, `adsbot_google`, `feedfetcher_google`, `curious_george`, `other_robot`) VALUES
(1, 2092, 0, 27, 0, 144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `support`
--

CREATE TABLE `support` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `send_date` datetime NOT NULL,
  `answer_date` datetime DEFAULT NULL,
  `who_answer` varchar(100) DEFAULT NULL,
  `answer_body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tempusers`
--

CREATE TABLE `tempusers` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `del_code` int(8) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `del_code` int(8) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `mods` varchar(10) NOT NULL,
  `remind_key` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `del_code`, `create_date`, `last_login`, `mods`, `remind_key`) VALUES
(1, 'wipek', '827ccb0eea8a706c4c34a16891f84e7b', 'wipekxxx@gmail.com', 1234567, '2015-01-09 21:49:00', '2017-03-03 21:35:02', 'admin', NULL),
(2, 'popopop', '25d55ad283aa400af464c76d713c07ad', 'dfdsfds@o2.pl', 123456, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_browsers`
--

CREATE TABLE `user_browsers` (
  `id` int(11) UNSIGNED NOT NULL,
  `opera` bigint(11) NOT NULL DEFAULT '0',
  `flock` bigint(11) NOT NULL DEFAULT '0',
  `chrome` bigint(11) NOT NULL DEFAULT '0',
  `internet_explorer` bigint(11) NOT NULL DEFAULT '0',
  `shiira` bigint(11) NOT NULL DEFAULT '0',
  `firefox` bigint(11) NOT NULL DEFAULT '0',
  `chimera` bigint(11) NOT NULL DEFAULT '0',
  `phoenix` bigint(11) NOT NULL DEFAULT '0',
  `firebird` bigint(11) NOT NULL DEFAULT '0',
  `camino` bigint(11) NOT NULL DEFAULT '0',
  `netscape` bigint(11) NOT NULL DEFAULT '0',
  `omniweb` bigint(11) NOT NULL DEFAULT '0',
  `safari` bigint(11) NOT NULL DEFAULT '0',
  `mozilla` bigint(11) NOT NULL DEFAULT '0',
  `konqueror` bigint(11) NOT NULL DEFAULT '0',
  `icab` bigint(11) NOT NULL DEFAULT '0',
  `lynx` bigint(11) NOT NULL DEFAULT '0',
  `links` bigint(11) NOT NULL DEFAULT '0',
  `hotjava` bigint(11) NOT NULL DEFAULT '0',
  `amaya` bigint(11) NOT NULL DEFAULT '0',
  `ibrowse` bigint(11) NOT NULL DEFAULT '0',
  `maxthon` bigint(11) NOT NULL DEFAULT '0',
  `ubuntu_web_browser` bigint(11) NOT NULL DEFAULT '0',
  `mobile_browser` bigint(11) NOT NULL DEFAULT '0',
  `other_browser` bigint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user_browsers`
--

INSERT INTO `user_browsers` (`id`, `opera`, `flock`, `chrome`, `internet_explorer`, `shiira`, `firefox`, `chimera`, `phoenix`, `firebird`, `camino`, `netscape`, `omniweb`, `safari`, `mozilla`, `konqueror`, `icab`, `lynx`, `links`, `hotjava`, `amaya`, `ibrowse`, `maxthon`, `ubuntu_web_browser`, `mobile_browser`, `other_browser`) VALUES
(1, 37, 1, 1251, 15, 2, 64, 1, 2, 1, 2, 1, 2, 5, 1066, 1, 2, 1, 2, 1, 2, 1, 3, 1, 37, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_systems`
--

CREATE TABLE `user_systems` (
  `id` int(11) UNSIGNED NOT NULL,
  `windows_8_1` bigint(11) NOT NULL DEFAULT '0',
  `windows_8` bigint(11) NOT NULL DEFAULT '0',
  `windows_7` bigint(11) NOT NULL DEFAULT '0',
  `windows_vista` bigint(11) NOT NULL DEFAULT '0',
  `windows_2003` bigint(11) NOT NULL DEFAULT '0',
  `windows_xp` bigint(11) NOT NULL DEFAULT '0',
  `windows_2000` bigint(11) NOT NULL DEFAULT '0',
  `windows_nt_4_0` bigint(11) NOT NULL DEFAULT '0',
  `windows_nt` bigint(11) NOT NULL DEFAULT '0',
  `windows_98` bigint(11) NOT NULL DEFAULT '0',
  `windows_95` bigint(11) NOT NULL DEFAULT '0',
  `windows_phone` bigint(11) NOT NULL DEFAULT '0',
  `unknown_windows` bigint(11) NOT NULL DEFAULT '0',
  `android` bigint(11) NOT NULL DEFAULT '0',
  `blackberry` bigint(11) NOT NULL DEFAULT '0',
  `ios` bigint(11) NOT NULL DEFAULT '0',
  `mac_osx` bigint(11) NOT NULL DEFAULT '0',
  `power_pc_mac` bigint(11) NOT NULL DEFAULT '0',
  `freebsd` bigint(11) NOT NULL DEFAULT '0',
  `macintosh` bigint(11) NOT NULL DEFAULT '0',
  `linux` bigint(11) NOT NULL DEFAULT '0',
  `debian` bigint(11) NOT NULL DEFAULT '0',
  `sun_solaris` bigint(11) NOT NULL DEFAULT '0',
  `beos` bigint(11) NOT NULL DEFAULT '0',
  `apachebench` bigint(11) NOT NULL DEFAULT '0',
  `aix` bigint(11) NOT NULL DEFAULT '0',
  `irix` bigint(11) NOT NULL DEFAULT '0',
  `decosf` bigint(11) NOT NULL DEFAULT '0',
  `hp_ux` bigint(11) NOT NULL DEFAULT '0',
  `netbsd` bigint(11) NOT NULL DEFAULT '0',
  `bsdi` bigint(11) NOT NULL DEFAULT '0',
  `openbsd` bigint(11) NOT NULL DEFAULT '0',
  `gnu_linux` bigint(11) NOT NULL DEFAULT '0',
  `unknown_unix` bigint(11) NOT NULL DEFAULT '0',
  `symbian_os` bigint(11) NOT NULL DEFAULT '0',
  `other_system` bigint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user_systems`
--

INSERT INTO `user_systems` (`id`, `windows_8_1`, `windows_8`, `windows_7`, `windows_vista`, `windows_2003`, `windows_xp`, `windows_2000`, `windows_nt_4_0`, `windows_nt`, `windows_98`, `windows_95`, `windows_phone`, `unknown_windows`, `android`, `blackberry`, `ios`, `mac_osx`, `power_pc_mac`, `freebsd`, `macintosh`, `linux`, `debian`, `sun_solaris`, `beos`, `apachebench`, `aix`, `irix`, `decosf`, `hp_ux`, `netbsd`, `bsdi`, `openbsd`, `gnu_linux`, `unknown_unix`, `symbian_os`, `other_system`) VALUES
(1, 880, 5, 12, 5, 4, 20, 0, 0, 0, 0, 0, 0, 398, 32, 4, 3, 7, 1, 2, 3, 30, 5, 6, 7, 8, 9, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1065);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `change_data`
--
ALTER TABLE `change_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `cmsconfig`
--
ALTER TABLE `cmsconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robots_visit`
--
ALTER TABLE `robots_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempusers`
--
ALTER TABLE `tempusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_browsers`
--
ALTER TABLE `user_browsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_systems`
--
ALTER TABLE `user_systems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `change_data`
--
ALTER TABLE `change_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `cmsconfig`
--
ALTER TABLE `cmsconfig`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `robots_visit`
--
ALTER TABLE `robots_visit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `tempusers`
--
ALTER TABLE `tempusers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `user_browsers`
--
ALTER TABLE `user_browsers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `user_systems`
--
ALTER TABLE `user_systems`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;