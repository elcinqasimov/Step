/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : u146572988_step

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 05/11/2023 15:42:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `shorttext` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `regdate` datetime NULL DEFAULT NULL,
  `userid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog
-- ----------------------------

-- ----------------------------
-- Table structure for camps
-- ----------------------------
DROP TABLE IF EXISTS `camps`;
CREATE TABLE `camps`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city_id` int NULL DEFAULT NULL,
  `country_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of camps
-- ----------------------------
INSERT INTO `camps` VALUES (1, 'Camp 1', 1, 1);
INSERT INTO `camps` VALUES (2, 'Camp2', 2, 3);

-- ----------------------------
-- Table structure for children
-- ----------------------------
DROP TABLE IF EXISTS `children`;
CREATE TABLE `children`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parentid` int NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `language` int NULL DEFAULT NULL COMMENT '0 -az, 1-rus, 2-türk, 3-ingilis',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of children
-- ----------------------------
INSERT INTO `children` VALUES (1, 12, 'Elchin Gasimov', 'M', '1990-09-14', 0);

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES (1, 'Praqa', 'Prague');
INSERT INTO `city` VALUES (2, 'Valetta', 'Valetta');

-- ----------------------------
-- Table structure for consultant
-- ----------------------------
DROP TABLE IF EXISTS `consultant`;
CREATE TABLE `consultant`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_az` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hour` int NULL DEFAULT 1,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fullname_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fullname_az` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `about_en` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status_az` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status_en` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of consultant
-- ----------------------------
INSERT INTO `consultant` VALUES (1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', '5', 1, 'consultant/tehran.jpg', 'Asgarova Tehrana Ramiz', 'Əsgərova Tehranə Ramiz qızı', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', 'Hipnoterapevt, Karmik Numeroloq, Psixoloq, Master kouç', 'Hipnoterapevt, Karmik Numeroloq, Psixoloq, Master kouç');
INSERT INTO `consultant` VALUES (2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', '5', 1, 'consultant/turkan.jpg', 'Ilyasova Turkana Ramiz', 'İlyasova Türkanə Ramiz qızı', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', 'Konsultant', 'Konsultant');
INSERT INTO `consultant` VALUES (3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', '5', 1, 'consultant/nigar.jpg', 'Nigar Məmmədova Məhəmmədəli', 'Məmmədova Nigar ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the..', 'Psixoloq', 'Psixoloq');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_az` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, 'Çexiya Respublikası', 'Czech Republic');
INSERT INTO `countries` VALUES (2, 'Macarıstan Respbublikası', 'Hungary Republic');
INSERT INTO `countries` VALUES (3, 'Malta Respublikası', 'Republic of Malta');
INSERT INTO `countries` VALUES (4, 'Birləşmiş Ərəb Əmirliyi', 'United Araab Emirates');
INSERT INTO `countries` VALUES (5, 'Türkiyə Respublikası', 'Republic of Turkey');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `term_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES (1, 'assets/images/gallery/1.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (2, 'assets/images/gallery/2.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (3, 'assets/images/gallery/2-1.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (4, 'assets/images/gallery/3.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (5, 'assets/images/gallery/4.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (6, 'assets/images/gallery/5.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (7, 'assets/images/gallery/6.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (8, 'assets/images/gallery/7.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (9, 'assets/images/gallery/8.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (10, 'assets/images/gallery/9.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (11, 'assets/images/gallery/10.jpg', '1', 'Summer Time 1');
INSERT INTO `gallery` VALUES (13, 'assets/images/gallery/12.jpg', '1', 'Summer Time 1');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `subid` int NULL DEFAULT NULL,
  `name_az` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `closed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` int NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `show` int NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `shorttext` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `fulltext` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, NULL, 'Ana səhifə', 'Home', '0', 0, '', 'home', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (2, NULL, 'Haqqımızda', 'About', '0', 0, NULL, 'about', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (4, NULL, 'Qalereya', 'Gallery', '0', 0, NULL, 'gallery', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (5, NULL, 'Xidmətlər', 'Services', '0', 1, NULL, 'services', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (6, NULL, 'Bloq', 'Blog', '0', 1, NULL, 'blog', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (7, 5, 'Düşərgələr', 'Camps', '0', 0, NULL, 'camps', 1, 'assets/images/tent.png', NULL, NULL);
INSERT INTO `pages` VALUES (9, 5, 'Xaricdə təhsil', 'International Education', '0', 0, NULL, 'intedu', 1, 'assets/images/education.png', NULL, NULL);
INSERT INTO `pages` VALUES (10, 5, 'Səyahət', 'Travel', '0', 0, NULL, 'travel', 0, NULL, NULL, NULL);
INSERT INTO `pages` VALUES (14, 5, 'Psixoloji dəstək', 'Psychology support', '0', 0, NULL, 'psiychology', 1, 'assets/images/mental.png', NULL, NULL);

-- ----------------------------
-- Table structure for psychology
-- ----------------------------
DROP TABLE IF EXISTS `psychology`;
CREATE TABLE `psychology`  (
  `id` int NOT NULL,
  `userid` int NULL DEFAULT NULL,
  `regdate` datetime NULL DEFAULT NULL,
  `startdate` datetime NULL DEFAULT NULL,
  `consultant` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of psychology
-- ----------------------------

-- ----------------------------
-- Table structure for registration
-- ----------------------------
DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `childid` int NULL DEFAULT NULL,
  `term` int NULL DEFAULT NULL,
  `regdate` datetime NULL DEFAULT NULL,
  `verify` int NULL DEFAULT 0,
  `payment` int NULL DEFAULT 0 COMMENT '0-No payment, 1- Half Payment, 2- Full payment',
  `visa` int NULL DEFAULT 0,
  `tools` int NULL DEFAULT 0,
  `parentid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registration
-- ----------------------------
INSERT INTO `registration` VALUES (1, 1, 2, '2023-11-05 00:26:33', 0, 0, 0, 0, 12);

-- ----------------------------
-- Table structure for term
-- ----------------------------
DROP TABLE IF EXISTS `term`;
CREATE TABLE `term`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `startdate` date NULL DEFAULT NULL,
  `enddate` date NULL DEFAULT NULL,
  `count` int NULL DEFAULT 10,
  `finish` int NULL DEFAULT 0,
  `price` int NULL DEFAULT NULL,
  `description_az` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `camp_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of term
-- ----------------------------
INSERT INTO `term` VALUES (1, 'Summer Time 1 (A)', '2024-06-30', '2024-07-07', 3, 0, 1100, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (2, 'Summer Time 2 (A)', '2024-07-07', '2024-07-14', 4, 0, 1100, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (3, 'Summer Time 3 (R)', '2024-07-14', '2024-07-21', 2, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (4, 'Summer Time 4 (R)', '2024-07-21', '2024-07-28', 0, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (5, 'Summer Time 5 (R)', '2024-07-28', '2024-08-04', 1, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (6, 'Summer Time 6 (R)', '2024-08-04', '2024-08-11', 5, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 1);
INSERT INTO `term` VALUES (7, 'Summer Time 7 (R)', '2024-08-11', '2024-08-18', 8, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 2);
INSERT INTO `term` VALUES (8, 'Summer Time 8 (R)', '2024-08-19', '2024-08-28', 10, 0, 1000, 'Avropa Birliyinin hər bir üzvü özünün ən yaxşı keyfiyyətlərini nümayiş etdirmək istəyir və Çexiya da ondan fərqlənmir. Geniş çeşidli mədəni ənənələrimiz arasında bizi digər xarici ölkələrdən fərqləndirən bir xüsusiyyəti, uşaqlar üçün yay düşərgələrini unutmayaq. Bu düşərgələrdə ölkəmiz uşaq baxımı üçün əla çeşid təklif edir', 'Every member of the European Union wants to show its best qualities, and the Czech Republic is no different. Among our wide variety of cultural traditions, let\'s not forget summer camps for children, a feature that sets us apart from other foreign countries. Our country offers an excellent range of childcare at these camps.', 2);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `group` int NULL DEFAULT 0,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `online` datetime NULL DEFAULT NULL,
  `regdate` datetime NULL DEFAULT NULL,
  `ban` int NULL DEFAULT 0,
  PRIMARY KEY (`id`, `mail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:07:37', '2023-11-01 00:07:37', 0);
INSERT INTO `users` VALUES (2, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:12:02', '2023-11-01 00:12:02', 0);
INSERT INTO `users` VALUES (3, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:16:15', '2023-11-01 00:16:15', 0);
INSERT INTO `users` VALUES (4, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:16:34', '2023-11-01 00:16:34', 0);
INSERT INTO `users` VALUES (5, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:17:42', '2023-11-01 00:17:42', 0);
INSERT INTO `users` VALUES (6, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:17:48', '2023-11-01 00:17:48', 0);
INSERT INTO `users` VALUES (7, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:18:16', '2023-11-01 00:18:16', 0);
INSERT INTO `users` VALUES (8, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:18:43', '2023-11-01 00:18:43', 0);
INSERT INTO `users` VALUES (9, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:19:21', '2023-11-01 00:19:21', 0);
INSERT INTO `users` VALUES (10, 'elcinqasimov@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-01 00:22:22', '2023-11-01 00:22:22', 0);
INSERT INTO `users` VALUES (11, 'elcinqasimov@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 'Elchin Gasimov', '+994502999798', 'boris674', NULL, NULL, '::1', '2023-11-02 23:20:41', '2023-11-02 23:20:41', 0);
INSERT INTO `users` VALUES (12, 'elcinqasimov2@gmail.com', 'bd336701cdbf4af7a07d5ad2717b381c0401dd6bc67f9090a1e85d2f9a1465e6', 0, 'Elchin Gasimov', '+994502999798', 'BAKI ŞƏHƏRİ, YASAMAL RAYONU, , ALATAVA-7 KÜÇƏSİ, YENİ YASAMAL YAŞAYIŞ MASSİVİ, EV 88 GİRİŞ-3, MƏNZİL 196', NULL, NULL, '::1', '2023-11-04 23:38:15', '2023-11-04 23:38:15', 0);

SET FOREIGN_KEY_CHECKS = 1;
