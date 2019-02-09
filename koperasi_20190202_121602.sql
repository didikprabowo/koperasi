-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "transaksis" -----------------------------------
CREATE TABLE `transaksis` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`jenis` Enum( 'kredit', 'debit' ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`nominal` VarChar( 20 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`user_id` Int( 10 ) UNSIGNED NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`bulan` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 25;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`alamat` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`no_hp` Char( 14 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`remember_token` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `users_email_unique` UNIQUE( `email` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "admins" ---------------------------------------
CREATE TABLE `admins` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`username` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`remember_token` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- Dump data of "transaksis" -------------------------------
INSERT INTO `transaksis`(`id`,`jenis`,`nominal`,`user_id`,`created_at`,`updated_at`,`bulan`) VALUES 
( '12', 'kredit', '10000', '1', '2018-02-01 18:04:31', '2019-02-01 18:04:31', '1' ),
( '13', 'kredit', '20000', '2', '2018-02-01 18:04:38', '2019-02-01 18:04:38', '1' ),
( '14', 'kredit', '20000', '1', '2018-02-01 18:04:42', '2019-02-01 18:04:42', '1' ),
( '15', 'kredit', '70000', '2', '2018-02-01 18:12:46', '2019-02-01 18:12:46', '2' ),
( '16', 'debit', '4000', '1', '2018-02-01 18:12:46', NULL, '2' ),
( '17', 'kredit', '2000', '1', '2018-02-01 18:51:21', '2019-02-01 18:51:21', '2' ),
( '22', 'debit', '27840', '1', '2019-02-01 21:39:13', '2019-02-01 21:39:13', '2' ),
( '23', 'kredit', '45000', '1', '2019-02-01 21:39:54', '2019-02-01 21:39:54', '2' ),
( '24', 'kredit', '56000', '1', '2019-02-01 21:40:33', '2019-02-01 21:40:33', '2' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`name`,`email`,`alamat`,`no_hp`,`remember_token`,`created_at`,`updated_at`) VALUES 
( '1', 'Sumawan', 'sumawan@gmail.com', 'Solo', '08221060025', NULL, '2019-02-01 00:00:00', NULL ),
( '2', 'Kariman', 'kariwan@gmail.com', 'Hogya', '384035', NULL, '2018-08-09 00:00:00', NULL ),
( '3', 'Putra', 'putra@gmail.com', 'Jakarta', '083454656', NULL, '2018-08-09 00:00:00', NULL ),
( '4', 'jarwo', 'admin@gmail.com', 'd', '083545464', NULL, '2019-02-01 10:42:52', '2019-02-01 10:42:52' ),
( '7', 'Juki', 'jukina@gmail.com', 'jos', '083454656', NULL, '2019-02-01 10:46:25', '2019-02-01 10:46:25' ),
( '8', 'Bambang', 'bambang@gmail.com', 'solo', '034545', NULL, '2019-02-01 10:47:41', '2019-02-01 10:47:41' );
-- ---------------------------------------------------------


-- Dump data of "admins" -----------------------------------
INSERT INTO `admins`(`id`,`username`,`email`,`password`,`created_at`,`updated_at`,`remember_token`) VALUES 
( '5', 'didikprabowo', 'didik@gmail.com', '$2y$10$YkGGDeh9EAj9jQNVwVXS8.Eh.DaE9ZKP2W/80SUCzoTgaGFwtf4ny', '2019-02-02 04:40:02', '2019-02-02 04:40:02', 'h0p2127fMR8cN9dk767ZDgIoR17aU5l7CbEoJ0Q560JqL9BWOQ31ZshFCmxI' );
-- ---------------------------------------------------------


-- CREATE INDEX "transaksis_user_id_foreign" -------------------
CREATE INDEX `transaksis_user_id_foreign` USING BTREE ON `transaksis`( `user_id` );
-- -------------------------------------------------------------


-- CREATE LINK "transaksis_user_id_foreign" --------------------
ALTER TABLE `transaksis`
	ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY ( `user_id` )
	REFERENCES `users`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


