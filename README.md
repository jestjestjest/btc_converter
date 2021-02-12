1)
Запрос

SELECT
	name,
	author,
	books
FROM
	(
		SELECT
			CONCAT(first_name, ' ', last_name) NAME,
			age,
			b.author author,
			GROUP_CONCAT(b. NAME SEPARATOR ', ') books,
			COUNT(b.author) OVER (PARTITION BY u.id) author_cnt,
			COUNT(b.id) book_cnt
		FROM
			users u
		JOIN user_books ub ON u.id = ub.user_id
		JOIN books b ON ub.book_id = b.id
		GROUP BY
			u.id,
			b.author
	) res
WHERE
	author_cnt = 1
AND book_cnt = 2
AND age BETWEEN 7 AND 17
AND age IS NOT NULL


Дамп базы

/*
Navicat MySQL Data Transfer

Source Server         : foodblog
Source Server Version : 80018
Source Host           : localhost:3306
Source Database       : newtest

Target Server Type    : MYSQL
Target Server Version : 80018
File Encoding         : 65001

Date: 2021-02-12 05:20:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'Romeo and Juliet', 'William Shakespeare');
INSERT INTO `books` VALUES ('2', 'War and Peace', 'Leo Tolstoy');
INSERT INTO `books` VALUES ('3', 'Makbet', 'William Shakespeare');
INSERT INTO `books` VALUES ('4', 'Gamlet', 'William Shakespeare');
INSERT INTO `books` VALUES ('5', 'Three Musketeers', 'Aleksandr Duma');
INSERT INTO `books` VALUES ('6', 'Count of Monte Cristo', 'Aleksandr Duma');
INSERT INTO `books` VALUES ('7', 'Landlord\'s Morning', 'Leo Tolstoy');
INSERT INTO `books` VALUES ('8', 'Two hussars', 'Leo Tolstoy');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ivan', 'ivanov', '18');
INSERT INTO `users` VALUES ('2', 'marina', 'ivanova', '14');
INSERT INTO `users` VALUES ('3', 'egor', 'titov', '14');
INSERT INTO `users` VALUES ('4', 'petr', 'getrov', '16');
INSERT INTO `users` VALUES ('5', 'gena', 'bobkov', '15');
INSERT INTO `users` VALUES ('6', 'olga', 'petrova', '18');
INSERT INTO `users` VALUES ('7', 'semen', 'gladkov', '20');

-- ----------------------------
-- Table structure for user_books
-- ----------------------------
DROP TABLE IF EXISTS `user_books`;
CREATE TABLE `user_books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_books
-- ----------------------------
INSERT INTO `user_books` VALUES ('1', '1', '2');
INSERT INTO `user_books` VALUES ('2', '2', '1');
INSERT INTO `user_books` VALUES ('3', '3', '1');
INSERT INTO `user_books` VALUES ('4', '3', '3');
INSERT INTO `user_books` VALUES ('5', '3', '4');
INSERT INTO `user_books` VALUES ('6', '4', '5');
INSERT INTO `user_books` VALUES ('7', '4', '6');
INSERT INTO `user_books` VALUES ('8', '5', '5');
INSERT INTO `user_books` VALUES ('9', '5', '6');
INSERT INTO `user_books` VALUES ('10', '2', '4');
INSERT INTO `user_books` VALUES ('11', '2', '2');
SET FOREIGN_KEY_CHECKS=1;

