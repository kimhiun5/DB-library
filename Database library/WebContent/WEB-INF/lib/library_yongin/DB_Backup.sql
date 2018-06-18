/*
Navicat MySQL Data Transfer

Source Server         : db.rushbro.co.kr
Source Server Version : 50639
Source Host           : db.rushbro.co.kr:3306
Source Database       : db_rushbro

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2018-06-18 16:26:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for db_book_donation
-- ----------------------------
DROP TABLE IF EXISTS `db_book_donation`;
CREATE TABLE `db_book_donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_publisher` varchar(255) DEFAULT NULL,
  `book_count` int(11) DEFAULT '1',
  `add_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_book_donation
-- ----------------------------

-- ----------------------------
-- Table structure for db_book_favorite
-- ----------------------------
DROP TABLE IF EXISTS `db_book_favorite`;
CREATE TABLE `db_book_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `is_favorite` int(11) DEFAULT '1',
  `add_date` datetime DEFAULT NULL,
  `last_change_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_book_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for db_books
-- ----------------------------
DROP TABLE IF EXISTS `db_books`;
CREATE TABLE `db_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL COMMENT '도서(DVD) 유형 - (예 : book, dvd)',
  `class` varchar(255) DEFAULT NULL COMMENT '도서(DVD) 분류',
  `name` varchar(255) DEFAULT NULL COMMENT '도서(DVD) 이름',
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL COMMENT '도서(DVD) 저자',
  `publisher` varchar(255) DEFAULT NULL COMMENT '도서(DVD) 출판사',
  `rent_date` int(11) NOT NULL DEFAULT '7',
  `stock_count` int(11) DEFAULT NULL,
  `rent_count` int(11) DEFAULT '0',
  `price` decimal(10,0) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_books
-- ----------------------------
INSERT INTO `db_books` VALUES ('1', 'Book', '교재', '컴파일러의 이해', '9791156642411', '박두순', '한빛아카데미', '7', '5', '0', '30000', '2018-06-18 13:54:56');
INSERT INTO `db_books` VALUES ('2', 'Book', '문학', '고양이 1', '9788932919126', '베르나르 베르베르', '열린책들', '7', '1', '1', '11000', '2018-06-18 13:59:54');
INSERT INTO `db_books` VALUES ('3', 'DVD', '아동/가족', '잇웃집 토토로', null, '마야지키 하야오', '스튜디오 지브리', '7', '5', '0', '18000', '2018-06-18 13:58:10');
INSERT INTO `db_books` VALUES ('4', 'Book', '문학', '고양이2', '9788932919133', '베르나르베르베르', '열린책들', '7', '5', '0', '11000', '2018-06-18 14:01:03');
INSERT INTO `db_books` VALUES ('5', 'Book', '문학', '모든 순간이 너였다', '9791162202913', '하태원', '위즈덤하우스', '7', '5', '0', '12000', '2018-06-18 14:02:49');
INSERT INTO `db_books` VALUES ('6', 'Book', '문학', '나는 나로 살기로 했다', '9791187119845', '김수현', '마음의 숲', '7', '5', '0', '12000', '2018-06-18 14:04:07');
INSERT INTO `db_books` VALUES ('7', 'Book', '문학', 'Holes', '9780440414803', '루이스 쌔커', 'Yearing Book', '7', '5', '3', '11000', '2018-06-18 14:06:40');
INSERT INTO `db_books` VALUES ('8', 'DvD', 'SF', '블랙팬써', null, 'Ryan Cruger', '윌트디즈니', '7', '5', '5', '18000', '2018-06-18 14:11:32');
INSERT INTO `db_books` VALUES ('9', 'Book', '문학', '어디서 살 것인가', '9788932473802', '유현준', '을유문화사', '7', '5', '3', '11000', '2018-06-18 14:09:34');

-- ----------------------------
-- Table structure for db_books_booking
-- ----------------------------
DROP TABLE IF EXISTS `db_books_booking`;
CREATE TABLE `db_books_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_ok` varchar(255) NOT NULL DEFAULT '1' COMMENT '기본값 1, 예약 취소시 0으로 변경',
  `booking_date` datetime DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_books_booking
-- ----------------------------
INSERT INTO `db_books_booking` VALUES ('1', '5', '2', '1', '2018-06-18 14:42:45', '0000-00-00 00:00:00');
INSERT INTO `db_books_booking` VALUES ('2', '6', '2', '1', '2018-05-17 14:46:10', null);

-- ----------------------------
-- Table structure for db_member
-- ----------------------------
DROP TABLE IF EXISTS `db_member`;
CREATE TABLE `db_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `reg_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_member
-- ----------------------------
INSERT INTO `db_member` VALUES ('1', 'admin@yongin.ac.kr', '$2y$10$L0ME5GD6CplbVFerBy7syOAH3YOlVDlljmu8jZL.soKIN7nP11QxG', '관리자', '2000-01-01 00:00:00', '010-0000-0000', '환경과학대학 컴퓨터과학과', '10', '2000-01-01 00:00:00', null);
INSERT INTO `db_member` VALUES ('2', 'user@yongin.ac.kr', '$2y$10$W6dDmGsp/c1FVv4j5X6aau.1Eb208PpJm0OWebmLOEB8tgIZUv0dS', '김겸용', '1993-08-01 00:00:00', '010-1234-1234', '환경과학대학 컴퓨터과학과', '1', '2018-06-18 14:19:56', null);

-- ----------------------------
-- Table structure for db_member_log
-- ----------------------------
DROP TABLE IF EXISTS `db_member_log`;
CREATE TABLE `db_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `detail_log` varchar(255) NOT NULL,
  `ip_log` varchar(255) NOT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '작업 날짜',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_member_log
-- ----------------------------
INSERT INTO `db_member_log` VALUES ('1', '', '로그인 실패', '175.209.211.82', '2018-06-15 14:38:12');
INSERT INTO `db_member_log` VALUES ('2', '', '로그인 실패', '175.209.211.82', '2018-06-15 14:43:20');
INSERT INTO `db_member_log` VALUES ('3', '', '로그인 실패', '175.209.211.82', '2018-06-15 14:43:25');
INSERT INTO `db_member_log` VALUES ('4', '', '로그인 실패', '175.209.211.82', '2018-06-15 14:44:21');
INSERT INTO `db_member_log` VALUES ('5', 'admin@yongin.ac.kr', '로그인 실패', '175.209.211.82', '2018-06-15 14:45:18');
INSERT INTO `db_member_log` VALUES ('6', 'admin@yongin.ac.kr', '로그인 실패', '211.219.71.96', '2018-06-18 12:26:42');
INSERT INTO `db_member_log` VALUES ('7', 'admin@yongin.ac.kr', '로그인 실패', '211.219.71.96', '2018-06-18 13:35:45');
INSERT INTO `db_member_log` VALUES ('8', 'admin@yongin,ac,kr', '로그인 실패', '220.66.64.194', '2018-06-18 15:56:06');
INSERT INTO `db_member_log` VALUES ('9', 'admin@yongin,ac,kr', '로그인 실패', '220.66.64.194', '2018-06-18 15:56:16');

-- ----------------------------
-- Table structure for db_rent_detail
-- ----------------------------
DROP TABLE IF EXISTS `db_rent_detail`;
CREATE TABLE `db_rent_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `rent_limit_date` datetime DEFAULT NULL,
  `rent_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_rent_detail
-- ----------------------------
INSERT INTO `db_rent_detail` VALUES ('1', '2', '2', '2018-06-24 14:07:06', '2018-06-18 14:07:11');

-- ----------------------------
-- Table structure for db_room_detail
-- ----------------------------
DROP TABLE IF EXISTS `db_room_detail`;
CREATE TABLE `db_room_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) DEFAULT NULL,
  `total_num` int(11) DEFAULT NULL,
  `use_num` int(11) DEFAULT NULL,
  `last_update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_room_detail
-- ----------------------------
INSERT INTO `db_room_detail` VALUES ('1', '1층', '50', '39', '2018-06-18 12:35:15');
INSERT INTO `db_room_detail` VALUES ('2', '2층', '60', '32', '2018-06-18 12:35:18');
INSERT INTO `db_room_detail` VALUES ('3', '3층', '60', '15', '2018-06-18 12:35:31');

-- ----------------------------
-- Table structure for db_suggestion_board
-- ----------------------------
DROP TABLE IF EXISTS `db_suggestion_board`;
CREATE TABLE `db_suggestion_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_title` varchar(255) DEFAULT NULL,
  `board_content` varchar(255) DEFAULT NULL,
  `board_mb_id` int(11) DEFAULT NULL,
  `board_last_fix_time` datetime DEFAULT NULL,
  `board_write_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_suggestion_board
-- ----------------------------
