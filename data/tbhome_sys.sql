/*
Navicat MySQL Data Transfer

Source Server         : localPHPStudy
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : vcards

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-11-05 17:17:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbhome_sys
-- ----------------------------
DROP TABLE IF EXISTS `tbhome_sys`;
CREATE TABLE `tbhome_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sitetitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `qq` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `siteurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `icp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbhome_sys
-- ----------------------------
INSERT INTO `tbhome_sys` VALUES ('1', 'adminusername', 'gg770880', '唯卡微名片', '唯卡科技', '电话15873', '798904845', 'admin@tbhome.com.cn', '', '', '', 'http://www.vcards.top', '备案号111', '', '10', '121.15.123.99');
INSERT INTO `tbhome_sys` VALUES ('2', 'adminusername', 'gg770880', '站点名称', '公司', '1564564531', '4576866', '22sd@qq.com', '地址的煎熬了剪短发', '', '', 'http://', '版权', 'ICP备案号', '10', null);
INSERT INTO `tbhome_sys` VALUES ('3', 'adminusername', 'gg770880', '站点名称', '公司', '1564564531', '4576866', '22sd@qq.com', '地址的煎熬了剪短发', '', '', 'http://', '版权123', 'ICP备案号', '10', null);
INSERT INTO `tbhome_sys` VALUES ('4', '云来科技', 'gg770880', '网站的标题开始', '', '15988855566', '798904888', 'Email@qq.com', '', '', '', 'http://www.vcards.com', '', '', '10', '154.1567.com');
INSERT INTO `tbhome_sys` VALUES ('5', '云用户1', 'gg770880', '我的网站1', '', '15988888888', '798904888', 'asfjlj@qq.com', '', '', '', 'whwljlaf.com.', '', '', '10', '154.1567.com');
INSERT INTO `tbhome_sys` VALUES ('6', '云用户1', '987654321', '我的网站1', '', '15988999999', '798904888', 'asfjlj@qq.com', '', '', '', 'whwljlaf.com.', '', '', '10', '121.207.36.188');
INSERT INTO `tbhome_sys` VALUES ('7', '云用户1', '987654321', '9999999', '', '15988888888', '798904888', 'asfjlj@qq.com', '', '', '', '123456.com.', '', '', '10', '121.207.36.188');
INSERT INTO `tbhome_sys` VALUES ('8', '云用户1', '987654321', '我的网站1', '', '15988889999', '798904888', 'asfjlj@qq.com', '', '', '', '1688f.com.', '', '', '10', '121.207.36.188');
INSERT INTO `tbhome_sys` VALUES ('9', '云用户1', '987654321', '88网站1', '', '15988888888', '798904888', 'asfjlj@qq.com', '', '', '', 'whwljlaf.com.', '', '', '10', '121.207.36.188');
INSERT INTO `tbhome_sys` VALUES ('10', '平台用户名户88', '987654321', '888', '', '88888899', '798904899', 'l6699jfsljf@qq.com', '', '', '', '1688.com', '', '', '10', '');
INSERT INTO `tbhome_sys` VALUES ('11', '999户名户8899', '987654321', '888网站标99', '', '159800999', '798904899', 'l6699jfsljf@qq.com9', '', '', '', 'ada1688.com', '', '', '10', '121.207.36.188');
INSERT INTO `tbhome_sys` VALUES ('12', '无论有', 'gg770880', '中名列用户管理系统', '', '1598863264', '798904845', 'kljl@qq.com', '', '', '', 'http://www.vcards.top', '', '', '10', '');
INSERT INTO `tbhome_sys` VALUES ('13', '云用户2', 'gg770880', '99名片用户管理系统', '', '99991145522', '999904845', '99321345@l.com', '', '', '', 'safljl://asdfjljl.com', '百元投币版权所有', '闽ICP备', '10', '');
INSERT INTO `tbhome_sys` VALUES ('14', '四面楚歌', 'gg770880', '99微名片用户管理系统', '', '991598632', '999904845', 'fafa@qq.com', '', '', '', 'http://www.vcards.com', 'XX版权所有', '备案号', '10', '');
INSERT INTO `tbhome_sys` VALUES ('15', '四面楚歌', 'gg770880', '99微名片用户管理系统', '', '991598632', '999904899', 'fafa@qq.com', '', '', '', 'http://www.vcards.com', 'XX版权所有', '备案号', '10', null);
