/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : ll_newscms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-13 17:13:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ll_apply
-- ----------------------------
DROP TABLE IF EXISTS `ll_apply`;
CREATE TABLE `ll_apply` (
  `ll_apid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_uid` int(10) DEFAULT NULL,
  `ll_type` int(10) DEFAULT NULL,
  `ll_pass` int(10) DEFAULT '2',
  `ll_aptime` varchar(255) DEFAULT NULL,
  `ll_ptime` varchar(255) DEFAULT NULL,
  `ll_msg` text,
  PRIMARY KEY (`ll_apid`),
  KEY `ll_uid` (`ll_uid`),
  KEY `ll_type` (`ll_type`),
  CONSTRAINT `ll_apply_ibfk_1` FOREIGN KEY (`ll_uid`) REFERENCES `ll_user` (`ll_uid`),
  CONSTRAINT `ll_apply_ibfk_2` FOREIGN KEY (`ll_type`) REFERENCES `ll_usertype` (`ll_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_article
-- ----------------------------
DROP TABLE IF EXISTS `ll_article`;
CREATE TABLE `ll_article` (
  `ll_aid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_title` varchar(255) NOT NULL,
  `ll_time` varchar(255) DEFAULT NULL,
  `ll_pics` varchar(255) DEFAULT NULL COMMENT '图片',
  `ll_content` text,
  `ll_cid` int(10) DEFAULT NULL,
  `ll_rnum` int(10) DEFAULT '0',
  `ll_uid` int(10) DEFAULT NULL,
  `ll_state` int(10) DEFAULT '2' COMMENT '1是启用，2不启用，默认2',
  PRIMARY KEY (`ll_aid`),
  KEY `ll_cid` (`ll_cid`),
  KEY `ll_uid` (`ll_uid`),
  CONSTRAINT `ll_article_ibfk_1` FOREIGN KEY (`ll_cid`) REFERENCES `ll_category` (`ll_cid`),
  CONSTRAINT `ll_article_ibfk_2` FOREIGN KEY (`ll_uid`) REFERENCES `ll_user` (`ll_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_category
-- ----------------------------
DROP TABLE IF EXISTS `ll_category`;
CREATE TABLE `ll_category` (
  `ll_cid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_catname` varchar(255) DEFAULT NULL,
  `ll_pcid` int(10) DEFAULT NULL,
  PRIMARY KEY (`ll_cid`),
  KEY `ll_pcid` (`ll_pcid`),
  CONSTRAINT `ll_category_ibfk_1` FOREIGN KEY (`ll_pcid`) REFERENCES `ll_category` (`ll_cid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_collect
-- ----------------------------
DROP TABLE IF EXISTS `ll_collect`;
CREATE TABLE `ll_collect` (
  `ll_coid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_uid` int(10) DEFAULT NULL,
  `ll_aid` int(10) DEFAULT NULL,
  PRIMARY KEY (`ll_coid`),
  KEY `ll_uid` (`ll_uid`),
  KEY `ll_aid` (`ll_aid`),
  CONSTRAINT `ll_collect_ibfk_1` FOREIGN KEY (`ll_uid`) REFERENCES `ll_user` (`ll_uid`),
  CONSTRAINT `ll_collect_ibfk_2` FOREIGN KEY (`ll_aid`) REFERENCES `ll_article` (`ll_aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_comments
-- ----------------------------
DROP TABLE IF EXISTS `ll_comments`;
CREATE TABLE `ll_comments` (
  `ll_cmtid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_uid` int(10) DEFAULT NULL,
  `ll_aid` int(10) DEFAULT NULL,
  `ll_comments` text,
  `ll_cmtime` varchar(255) DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`ll_cmtid`),
  KEY `ll_uid` (`ll_uid`),
  KEY `ll_aid` (`ll_aid`),
  CONSTRAINT `ll_comments_ibfk_1` FOREIGN KEY (`ll_uid`) REFERENCES `ll_user` (`ll_uid`),
  CONSTRAINT `ll_comments_ibfk_2` FOREIGN KEY (`ll_aid`) REFERENCES `ll_article` (`ll_aid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_user
-- ----------------------------
DROP TABLE IF EXISTS `ll_user`;
CREATE TABLE `ll_user` (
  `ll_uid` int(10) NOT NULL AUTO_INCREMENT,
  `ll_password` varchar(255) NOT NULL COMMENT '密码',
  `ll_username` varchar(255) NOT NULL COMMENT '用户名',
  `ll_type` int(10) DEFAULT '3' COMMENT '1可以登录，2以上不可以登录后台',
  PRIMARY KEY (`ll_uid`),
  UNIQUE KEY `ll_username` (`ll_username`) USING BTREE,
  KEY `ll_type` (`ll_type`),
  CONSTRAINT `ll_user_ibfk_1` FOREIGN KEY (`ll_type`) REFERENCES `ll_usertype` (`ll_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ll_usertype
-- ----------------------------
DROP TABLE IF EXISTS `ll_usertype`;
CREATE TABLE `ll_usertype` (
  `ll_type` int(10) NOT NULL AUTO_INCREMENT,
  `ll_typename` varchar(255) DEFAULT NULL COMMENT '身份名称',
  PRIMARY KEY (`ll_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
DROP TRIGGER IF EXISTS `ll_triger_pass_add`;
DELIMITER ;;
CREATE TRIGGER `ll_triger_pass_add` BEFORE INSERT ON `ll_apply` FOR EACH ROW begin
IF NEW.ll_pass > 3 OR NEW.ll_pass < 1 THEN
      set NEW.ll_pass =2;
END IF;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ll_triger_pass_upate`;
DELIMITER ;;
CREATE TRIGGER `ll_triger_pass_upate` BEFORE UPDATE ON `ll_apply` FOR EACH ROW begin
IF NEW.ll_pass > 3 OR NEW.ll_pass < 1 THEN
      set NEW.ll_pass =2;
END IF;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ll_trigger_state_add`;
DELIMITER ;;
CREATE TRIGGER `ll_trigger_state_add` BEFORE INSERT ON `ll_article` FOR EACH ROW begin
IF NEW.ll_state > 2 OR NEW.ll_state < 1 THEN
      set NEW.ll_state=2;
END IF;
IF NEW.ll_rnum <0  THEN
      set NEW.ll_rnum=0;
END IF;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ll_trigger_state_updete`;
DELIMITER ;;
CREATE TRIGGER `ll_trigger_state_updete` BEFORE UPDATE ON `ll_article` FOR EACH ROW begin
IF NEW.ll_state > 2 OR NEW.ll_state < 1 THEN
      set NEW.ll_state=2;
END IF;
IF NEW.ll_rnum <0  THEN
      set NEW.ll_rnum=0;
END IF;
end
;;
DELIMITER ;
