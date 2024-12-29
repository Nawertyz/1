-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 10, 2024 lúc 06:22 PM
-- Phiên bản máy phục vụ: 10.6.17-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cmiensieuvip1_lebao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_recharges`
--

CREATE TABLE `account_recharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `qr_code` longtext DEFAULT NULL,
  `logo` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actives`
--

CREATE TABLE `actives` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `domain` varchar(999) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `domain` varchar(99) DEFAULT NULL,
  `slug` longtext DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_histories`
--

CREATE TABLE `data_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `old_data` longtext DEFAULT NULL,
  `new_data` longtext DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `data_json` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `history_cards`
--

CREATE TABLE `history_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `card_amount` varchar(255) DEFAULT NULL,
  `card_code` varchar(255) DEFAULT NULL,
  `card_serial` varchar(255) DEFAULT NULL,
  `card_real_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `tranid` varchar(255) DEFAULT NULL,
  `promotion` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_recharges`
--

CREATE TABLE `history_recharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name_bank` varchar(255) DEFAULT NULL,
  `type_bank` varchar(255) DEFAULT NULL,
  `tranid` longtext DEFAULT NULL,
  `amount` longtext DEFAULT NULL,
  `promotion` longtext DEFAULT NULL,
  `real_amount` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) NOT NULL DEFAULT '127.0.0.1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `server_service` varchar(255) DEFAULT NULL,
  `price` longtext DEFAULT NULL,
  `quantity` longtext DEFAULT NULL,
  `total_payment` longtext DEFAULT NULL,
  `order_link` longtext DEFAULT NULL,
  `start` longtext DEFAULT NULL,
  `buff` longtext DEFAULT NULL,
  `actual_service` longtext DEFAULT NULL,
  `actual_path` longtext DEFAULT NULL,
  `actual_server` longtext DEFAULT NULL,
  `status` longtext DEFAULT NULL,
  `action` longtext DEFAULT NULL,
  `dataJson` longtext DEFAULT NULL,
  `error` varchar(255) DEFAULT NULL,
  `isShow` longtext DEFAULT NULL,
  `history` longtext DEFAULT NULL,
  `refund` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `proxy` text DEFAULT NULL,
  `host` text DEFAULT NULL,
  `port` text DEFAULT NULL,
  `ipv6` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `loai` text DEFAULT NULL,
  `quocgia` text DEFAULT NULL,
  `timebuy` text DEFAULT NULL,
  `timeend` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `timestart` date DEFAULT NULL,
  `name` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `speed` text DEFAULT NULL,
  `user` text DEFAULT NULL,
  `order_code` longtext DEFAULT NULL,
  `proxy_id` text DEFAULT NULL,
  `order_codes` longtext DEFAULT NULL,
  `warranty` varchar(25) DEFAULT NULL,
  `order_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_tainguyen`
--

CREATE TABLE `order_tainguyen` (
  `id` int(11) NOT NULL,
  `username` longtext DEFAULT NULL,
  `total_payment` longtext DEFAULT NULL,
  `order_codes` longtext DEFAULT NULL,
  `thongtin` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_services`
--

CREATE TABLE `server_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `socialll` varchar(255) DEFAULT NULL,
  `server` varchar(255) DEFAULT NULL,
  `price` longtext DEFAULT NULL,
  `price_collaborator` longtext DEFAULT NULL,
  `price_agency` longtext DEFAULT NULL,
  `price_distributor` longtext DEFAULT NULL,
  `min` longtext DEFAULT NULL,
  `max` longtext DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `actual_service` varchar(255) DEFAULT NULL,
  `actual_server` varchar(255) DEFAULT NULL,
  `actual_path` varchar(255) DEFAULT NULL,
  `actual_price` varchar(255) DEFAULT NULL,
  `action` varchar(999) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `reaction` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `service_social` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_socials`
--

CREATE TABLE `service_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_cons`
--

CREATE TABLE `site_cons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `domain_name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `zone_id` varchar(255) DEFAULT NULL,
  `status_cloudflare` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_data`
--

CREATE TABLE `site_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namesite` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_mini` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `keyword` longtext DEFAULT NULL,
  `image_seo` longtext DEFAULT NULL,
  `notice` longtext DEFAULT NULL,
  `collaborator` int(11) NOT NULL DEFAULT 0,
  `agency` int(11) NOT NULL DEFAULT 0,
  `distributor` int(11) NOT NULL DEFAULT 0,
  `code_tranfer` varchar(255) DEFAULT 'naptien',
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `card_discount` int(11) NOT NULL DEFAULT 0,
  `min_recharge` int(11) NOT NULL DEFAULT 10000,
  `recharge_promotion` int(11) NOT NULL DEFAULT 0,
  `show_promotion` varchar(255) DEFAULT 'hide',
  `start_promotion` varchar(255) DEFAULT NULL,
  `end_promotion` varchar(255) DEFAULT NULL,
  `partner_id` varchar(255) DEFAULT NULL,
  `partner_key` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `google_client_id` varchar(255) DEFAULT NULL,
  `google_client_secret` varchar(255) DEFAULT NULL,
  `google_redirect` varchar(255) DEFAULT NULL,
  `facebook_client_id` varchar(255) DEFAULT NULL,
  `facebook_client_secret` varchar(255) DEFAULT NULL,
  `facebook_redirect` varchar(255) DEFAULT NULL,
  `balance_telegram` varchar(999) DEFAULT NULL,
  `telegram_bot` varchar(999) DEFAULT NULL,
  `telegram_token` varchar(999) DEFAULT NULL,
  `telegram_chat_id` varchar(999) DEFAULT NULL,
  `telegram_callback` varchar(999) DEFAULT NULL,
  `notice_order` varchar(255) NOT NULL DEFAULT 'off',
  `notice_login` varchar(255) NOT NULL DEFAULT 'off',
  `script_header` longtext DEFAULT NULL,
  `script_footer` longtext DEFAULT NULL,
  `is_admin` text DEFAULT NULL,
  `token_web` longtext DEFAULT NULL,
  `username_web` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `subgiare` text DEFAULT NULL,
  `hacklike17` text DEFAULT NULL,
  `trumsubre` text DEFAULT NULL,
  `twomxh` text DEFAULT NULL,
  `onedg` text DEFAULT NULL,
  `submeta` text DEFAULT NULL,
  `muafl` text DEFAULT NULL,
  `sain` text DEFAULT NULL,
  `passwordtds` text DEFAULT NULL,
  `usenametds` text DEFAULT NULL,
  `trumvip` text DEFAULT NULL,
  `tuongtacsale` text DEFAULT NULL,
  `alosmm` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `site_key` text DEFAULT NULL,
  `secret_key` text DEFAULT NULL,
  `telegram_token_tb` text DEFAULT NULL,
  `nameadmin` text DEFAULT NULL,
  `idpage` varchar(100) DEFAULT NULL,
  `theme` text DEFAULT NULL,
  `group_member` longtext DEFAULT NULL,
  `cuphap` longtext DEFAULT NULL,
  `image_modal` longtext DEFAULT NULL,
  `telegram_token_tb_smm` longtext DEFAULT NULL,
  `price` text DEFAULT '8',
  `price_collaborator` text DEFAULT '6',
  `price_agency` text DEFAULT '4',
  `price_distributor` text DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `text` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `reply` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tainguyen`
--

CREATE TABLE `tainguyen` (
  `id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(999) DEFAULT NULL,
  `price_collaborator` varchar(999) DEFAULT NULL,
  `price_agency` varchar(999) DEFAULT NULL,
  `price_distributor` varchar(999) DEFAULT NULL,
  `domain` varchar(999) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thongtin` longtext DEFAULT NULL,
  `category_id` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `daban` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_recharge` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_deduct` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `api_token` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(999) DEFAULT '/dist/images/profile/user-1.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_chat_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `email_verified` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telegram_verified` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `telegram_notice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_link` varchar(255) DEFAULT NULL,
  `referral_money` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '2023-07-29 15:31:56',
  `last_login` timestamp NULL DEFAULT '2023-07-29 15:31:50',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website_traffic`
--

CREATE TABLE `website_traffic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_recharges`
--
ALTER TABLE `account_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `actives`
--
ALTER TABLE `actives`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_histories`
--
ALTER TABLE `data_histories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `history_cards`
--
ALTER TABLE `history_cards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_recharges`
--
ALTER TABLE `history_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_tainguyen`
--
ALTER TABLE `order_tainguyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `server_services`
--
ALTER TABLE `server_services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service_socials`
--
ALTER TABLE `service_socials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `site_cons`
--
ALTER TABLE `site_cons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_cons_domain_name_unique` (`domain_name`);

--
-- Chỉ mục cho bảng `site_data`
--
ALTER TABLE `site_data`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tainguyen`
--
ALTER TABLE `tainguyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `website_traffic`
--
ALTER TABLE `website_traffic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_recharges`
--
ALTER TABLE `account_recharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `actives`
--
ALTER TABLE `actives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `data_histories`
--
ALTER TABLE `data_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_cards`
--
ALTER TABLE `history_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_recharges`
--
ALTER TABLE `history_recharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_tainguyen`
--
ALTER TABLE `order_tainguyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `server_services`
--
ALTER TABLE `server_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service_socials`
--
ALTER TABLE `service_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `site_cons`
--
ALTER TABLE `site_cons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `site_data`
--
ALTER TABLE `site_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tainguyen`
--
ALTER TABLE `tainguyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `website_traffic`
--
ALTER TABLE `website_traffic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
