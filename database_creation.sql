CREATE TABLE `login_tokens` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `token` char(64) DEFAULT NULL,
 `user_id` int(11) unsigned DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `token` (`token`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=584 DEFAULT CHARSET=utf8

CREATE TABLE `menu_items` (
 `id` int(32) NOT NULL AUTO_INCREMENT,
 `name` varchar(32) COLLATE utf8mb4_bin NOT NULL,
 `price` int(32) NOT NULL,
 `description` mediumtext COLLATE utf8mb4_bin NOT NULL,
 `picture` mediumtext COLLATE utf8mb4_bin NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin

CREATE TABLE `order_cart` (
 `id` int(32) NOT NULL AUTO_INCREMENT,
 `user_id` int(32) NOT NULL,
 `item_id` int(32) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8

CREATE TABLE `password_tokens` (
 `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `token` char(64) DEFAULT NULL,
 `user_id` int(11) unsigned DEFAULT NULL,
 PRIMARY KEY (`ID`),
 UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8

CREATE TABLE `users` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `username` varchar(32) DEFAULT NULL,
 `email` text DEFAULT NULL,
 `password` varchar(60) DEFAULT NULL,
 `status` set('online','away','offline','dnd') NOT NULL DEFAULT 'offline',
 `admin` tinyint(1) NOT NULL DEFAULT 0,
 `staff` tinyint(1) NOT NULL DEFAULT 0,
 `createdAt` datetime DEFAULT current_timestamp(),
 `updatedAt` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8