-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 08 Sty 2020, 10:12
-- Wersja serwera: 5.7.26-0ubuntu0.18.04.1
-- Wersja PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `symfony_cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `app__category`
--

CREATE TABLE `app__category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `app__collection`
--

CREATE TABLE `app__collection` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `app__element`
--

CREATE TABLE `app__element` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `app__element`
--

INSERT INTO `app__element` (`id`, `name`) VALUES
(1, 'składnik 1'),
(2, 'składnik 2'),
(3, 'składnik 3'),
(4, 'składnik 4'),
(5, 'składnik 5'),
(6, 'składnik 6'),
(7, 'składnik 7'),
(8, 'składnik 8'),
(9, 'składnik 9'),
(10, 'składnik 10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `app__elements_collections`
--

CREATE TABLE `app__elements_collections` (
  `element_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `data_list`
--

CREATE TABLE `data_list` (
  `id` int(11) NOT NULL,
  `tree_root` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `laveled_title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `data_list`
--

INSERT INTO `data_list` (`id`, `tree_root`, `parent_id`, `laveled_title`, `name`, `enabled`, `lft`, `rgt`, `lvl`) VALUES
(1, 1, NULL, ' == ROOT == ', ' == ROOT == ', 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media__content`
--

CREATE TABLE `media__content` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trans_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trans_decsription` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media__gallery`
--

CREATE TABLE `media__gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media__gallery_media`
--

CREATE TABLE `media__gallery_media` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media__media`
--

CREATE TABLE `media__media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `tree_root` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `laveled_title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menu`
--

INSERT INTO `menu` (`id`, `tree_root`, `parent_id`, `page_id`, `laveled_title`, `name`, `enabled`, `lft`, `rgt`, `lvl`) VALUES
(1, 1, NULL, 1, ' == ROOT == ', ' == ROOT == ', 1, 1, 10, 0),
(2, 1, 1, 2, NULL, 'Menu 1', 1, 2, 3, 1),
(3, 1, 1, 3, NULL, 'Menu 2', 1, 4, 5, 1),
(4, 1, 1, 4, NULL, 'Menu 3', 1, 6, 7, 1),
(5, 1, 1, 5, NULL, 'Menu 4', 1, 8, 9, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu__content`
--

CREATE TABLE `menu__content` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menu__content`
--

INSERT INTO `menu__content` (`id`, `menu_id`, `locale`, `content`, `title`) VALUES
(1, 2, 'pl', 'odnośnik 1', 'odnośnik 1'),
(2, 2, 'en', 'link 1', 'link 1'),
(3, 3, 'pl', 'odnośnik 2', 'odnośnik 2'),
(4, 3, 'en', 'link 2', 'link 2'),
(5, 4, 'pl', 'odnośnik 3', 'odnośnik 3'),
(6, 4, 'en', 'link 3', 'link 3'),
(7, 5, 'pl', 'odnośnik 4', 'odnośnik 4'),
(8, 5, 'en', 'link 4', 'link 4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `updated_at`, `created_at`, `position`) VALUES
(1, 'Home page', 'home-page', '2020-01-07 21:40:54', '2020-01-07 21:40:54', 0),
(2, 'page 1', 'page-1', '2020-01-07 22:29:30', '2020-01-07 22:29:30', 1),
(3, 'page 2', 'page-2', '2020-01-07 22:29:32', '2020-01-07 22:29:32', 2),
(4, 'page 3', 'page-3', '2020-01-07 22:29:34', '2020-01-07 22:29:34', 3),
(5, 'page 4', 'page-4', '2020-01-07 22:29:40', '2020-01-07 22:29:40', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page__content`
--

CREATE TABLE `page__content` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `page__content`
--

INSERT INTO `page__content` (`id`, `page_id`, `locale`, `position`, `name`, `content`) VALUES
(1, 1, 'pl', 1, 'Content home page', '<h1><span style=\"color:#999999\">Strona gł&oacute;wna.</span></h1>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:26px\">L</span></span>orem ipsum dolor sit amet, consectetur adipiscing elit...</p>'),
(2, 2, 'pl', 3, 'Content page 1', '<h1><span style=\"font-family:Georgia,serif\"><span style=\"color:#8e44ad\">Strona 1</span></span>.</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(3, 2, 'en', 4, 'Content page 1', '<p>Page 1.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(4, 3, 'pl', 5, 'Content page 2', '<p>Strona 2.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(5, 3, 'en', 6, 'Content page 2', '<p>Page 2.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(6, 4, 'pl', 7, 'Content page 3', '<p>Strona 3.&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(7, 4, 'en', 8, 'Content page 3', '<p>Page 3.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(8, 5, 'pl', 9, 'Content page 4', '<p>Strona 4.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(9, 5, 'en', 9, 'Content page 4', '<p>Page 4.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>'),
(10, 1, 'en', 2, 'Content home page', '<p>Home page.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. Cras suscipit, urna at aliquam rhoncus, urna quam viverra nisi, in interdum massa nibh nec erat.</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page__gallery`
--

CREATE TABLE `page__gallery` (
  `page_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user__group`
--

CREATE TABLE `user__group` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user__user`
--

CREATE TABLE `user__user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user__user`
--

INSERT INTO `user__user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@host.local', 'admin@host.local', 1, NULL, '$2y$13$hodCJ0NLgTU4vb19K3cUiu32y7kU1OhOlP41Fwaj6dRjIOwqu7Bie', '2020-01-08 09:50:16', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user__user_group`
--

CREATE TABLE `user__user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `app__category`
--
ALTER TABLE `app__category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app__collection`
--
ALTER TABLE `app__collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C6E3B3F612469DE2` (`category_id`),
  ADD KEY `IDX_C6E3B3F6EA9FDD75` (`media_id`);

--
-- Indexes for table `app__element`
--
ALTER TABLE `app__element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app__elements_collections`
--
ALTER TABLE `app__elements_collections`
  ADD PRIMARY KEY (`element_id`,`collection_id`),
  ADD KEY `IDX_A90C73D91F1F2A24` (`element_id`),
  ADD KEY `IDX_A90C73D9514956FD` (`collection_id`);

--
-- Indexes for table `data_list`
--
ALTER TABLE `data_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FF8733FAA977936C` (`tree_root`),
  ADD KEY `IDX_FF8733FA727ACA70` (`parent_id`),
  ADD KEY `name_idx` (`name`);

--
-- Indexes for table `media__content`
--
ALTER TABLE `media__content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_85ECFF66EA9FDD75` (`media_id`);

--
-- Indexes for table `media__gallery`
--
ALTER TABLE `media__gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_80D4C5414E7AF8F` (`gallery_id`),
  ADD KEY `IDX_80D4C541EA9FDD75` (`media_id`);

--
-- Indexes for table `media__media`
--
ALTER TABLE `media__media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D053A93A977936C` (`tree_root`),
  ADD KEY `IDX_7D053A93727ACA70` (`parent_id`),
  ADD KEY `IDX_7D053A93C4663E4` (`page_id`),
  ADD KEY `name_idx` (`name`);

--
-- Indexes for table `menu__content`
--
ALTER TABLE `menu__content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A6DC9442CCD7E912` (`menu_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_140AB620989D9B62` (`slug`);

--
-- Indexes for table `page__content`
--
ALTER TABLE `page__content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A12D6F4C4663E4` (`page_id`);

--
-- Indexes for table `page__gallery`
--
ALTER TABLE `page__gallery`
  ADD PRIMARY KEY (`page_id`,`gallery_id`),
  ADD KEY `IDX_B3FC9E67C4663E4` (`page_id`),
  ADD KEY `IDX_B3FC9E674E7AF8F` (`gallery_id`);

--
-- Indexes for table `user__group`
--
ALTER TABLE `user__group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_82AAB3645E237E06` (`name`);

--
-- Indexes for table `user__user`
--
ALTER TABLE `user__user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_32745D0A92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_32745D0AA0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_32745D0AC05FB297` (`confirmation_token`);

--
-- Indexes for table `user__user_group`
--
ALTER TABLE `user__user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_45528670A76ED395` (`user_id`),
  ADD KEY `IDX_45528670FE54D947` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `app__category`
--
ALTER TABLE `app__category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `app__collection`
--
ALTER TABLE `app__collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `app__element`
--
ALTER TABLE `app__element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `data_list`
--
ALTER TABLE `data_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `media__content`
--
ALTER TABLE `media__content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `media__gallery`
--
ALTER TABLE `media__gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `media__media`
--
ALTER TABLE `media__media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `menu__content`
--
ALTER TABLE `menu__content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `page__content`
--
ALTER TABLE `page__content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `user__group`
--
ALTER TABLE `user__group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `user__user`
--
ALTER TABLE `user__user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `app__collection`
--
ALTER TABLE `app__collection`
  ADD CONSTRAINT `FK_C6E3B3F612469DE2` FOREIGN KEY (`category_id`) REFERENCES `app__category` (`id`),
  ADD CONSTRAINT `FK_C6E3B3F6EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`);

--
-- Ograniczenia dla tabeli `app__elements_collections`
--
ALTER TABLE `app__elements_collections`
  ADD CONSTRAINT `FK_A90C73D91F1F2A24` FOREIGN KEY (`element_id`) REFERENCES `app__collection` (`id`),
  ADD CONSTRAINT `FK_A90C73D9514956FD` FOREIGN KEY (`collection_id`) REFERENCES `app__element` (`id`);

--
-- Ograniczenia dla tabeli `data_list`
--
ALTER TABLE `data_list`
  ADD CONSTRAINT `FK_FF8733FA727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `data_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FF8733FAA977936C` FOREIGN KEY (`tree_root`) REFERENCES `data_list` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `media__content`
--
ALTER TABLE `media__content`
  ADD CONSTRAINT `FK_85ECFF66EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`);

--
-- Ograniczenia dla tabeli `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
  ADD CONSTRAINT `FK_80D4C5414E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_80D4C541EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A93727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7D053A93A977936C` FOREIGN KEY (`tree_root`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7D053A93C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Ograniczenia dla tabeli `menu__content`
--
ALTER TABLE `menu__content`
  ADD CONSTRAINT `FK_A6DC9442CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `page__content`
--
ALTER TABLE `page__content`
  ADD CONSTRAINT `FK_A12D6F4C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Ograniczenia dla tabeli `page__gallery`
--
ALTER TABLE `page__gallery`
  ADD CONSTRAINT `FK_B3FC9E674E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
  ADD CONSTRAINT `FK_B3FC9E67C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Ograniczenia dla tabeli `user__user_group`
--
ALTER TABLE `user__user_group`
  ADD CONSTRAINT `FK_45528670A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user__user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_45528670FE54D947` FOREIGN KEY (`group_id`) REFERENCES `user__group` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
