
SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `tbhome_anti_code`;
CREATE TABLE `tbhome_anti_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `replyid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `query_time` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `prize` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbhome_anti_code` VALUES ('1', '1', '554553455', '1', '2', '3', '4', '5');


DROP TABLE IF EXISTS `tbhome_anti_prize`;
CREATE TABLE `tbhome_anti_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `share` smallint(6) NOT NULL DEFAULT '10',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` smallint(6) NOT NULL,
  `hot` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `hot` (`hot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbhome_anti_product`;
CREATE TABLE `tbhome_anti_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `share` smallint(6) NOT NULL DEFAULT '10',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factory` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hot` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `hot` (`hot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tbhome_anti_reply`;
CREATE TABLE `tbhome_anti_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tag` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `success` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valid_clicks` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbhome_anti_reply` VALUES ('1', '1', '', '恭喜，您所查询的产品是正品', '您所查询的防伪码不存在，请谨防假冒', '10');


DROP TABLE IF EXISTS `tbhome_anti_setting`;
CREATE TABLE `tbhome_anti_setting` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_select` smallint(6) NOT NULL DEFAULT '10',
  `api_parameter` smallint(6) NOT NULL,
  `brand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbhome_anti_setting` VALUES ('1', '防伪系统', '', '30', '6', '雄盛机械');
INSERT INTO `tbhome_anti_setting` VALUES ('3', '雄盛机械防伪系统', '', '10', '1', '雄盛机械');

DROP TABLE IF EXISTS `tbhome_card_info`;
CREATE TABLE `tbhome_card_info` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `card_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `face_box` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business` text COLLATE utf8_unicode_ci NOT NULL,
  `signature` text COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `wechat_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wechat_qrcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbhome_card_info` VALUES ('1', '43234', '423234', 'Uploads/1/1444405423.png', '2434', '4234', '42343', '42343', '432432423', '24342', '42424', '23442', '43242');
INSERT INTO `tbhome_card_info` VALUES ('2', '', '', 'Uploads/2/1444244801.png', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_card_info` VALUES ('3', '', '', 'Uploads/3/1444245107.png', '', '', '', '', '', '', '', '', '');





DROP TABLE IF EXISTS `tbhome_label`;
CREATE TABLE `tbhome_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `card_label` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `card_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




INSERT INTO `tbhome_label` VALUES ('1', '1', '名片字段', '字段值1');
INSERT INTO `tbhome_label` VALUES ('2', '1', '字段2', '只2');
INSERT INTO `tbhome_label` VALUES ('4', '1', '是否的故事', '的分公司的法国是干啥');



DROP TABLE IF EXISTS `tbhome_microlink`;
CREATE TABLE `tbhome_microlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `link_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbhome_microlink` VALUES ('1', '1', '百度http://ba', 'http://baidu.com');



DROP TABLE IF EXISTS `tbhome_micropage`;
CREATE TABLE `tbhome_micropage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `page_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbhome_micropage` VALUES ('1', '1', '微网页', '<p>图文微网页内容</p><p><img src=\"/vcards/frontend/web/Uploads//20151005/1444036248119.png\" title=\"1444036248119.png\" alt=\"通宝科技绿色coin.png\" width=\"138\" height=\"136\" style=\"width: 138px; height: 136px;\"/><img src=\"/vcards/frontend/web/Uploads//20151005/1444036279110.png\" title=\"1444036279110.png\" alt=\"logo.png\"/></p><p><img src=\"/vcards/frontend/web/Uploads/1/20151001/1443714187362.png\" alt=\"1443714187362.png\"/></p>');
INSERT INTO `tbhome_micropage` VALUES ('2', '3', '微网页2', '<p>是的减肥啦空间的发了空间啊<br/></p><p><br/></p><p><br/></p>');
INSERT INTO `tbhome_micropage` VALUES ('3', '1', '标题333', '<p><img src=\"/vcards/frontend/web/Uploads//20151005/1444046619313.jpg\" style=\"width: 291px; height: 179px;\" title=\"1444046619313.jpg\" width=\"291\" height=\"179\"/><img src=\"/vcards/frontend/web/Uploads//20151005/1444046619813.jpg\" title=\"1444046619813.jpg\" width=\"275\" height=\"187\" style=\"width: 275px; height: 187px;\"/><img src=\"/vcards/frontend/web/Uploads//20151005/1444046619137.jpg\" title=\"1444046619137.jpg\" width=\"266\" height=\"160\" style=\"width: 266px; height: 160px;\"/></p><p><img src=\"/vcards/frontend/web/Uploads/3/20151007/1444217128508.jpg\" title=\"1444217128508.jpg\" alt=\"FmV3NC2V5MYyZOhTwJlSVyAZZDyJ_jpg!580x580.jpg\"/></p><p><img src=\"/vcards/frontend/web/Uploads/1/20151007/1444217225105.jpg\" title=\"1444217225105.jpg\" alt=\"Fv3fGqVNPz_8zMLY8Nz6UGwi_Jvv.jpg!730x0.jpg\"/></p><p><br/></p>');



DROP TABLE IF EXISTS `tbhome_migration`;
CREATE TABLE `tbhome_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




INSERT INTO `tbhome_migration` VALUES ('m000000_000000_base', '1444033589');
INSERT INTO `tbhome_migration` VALUES ('m130524_201442_init', '1444033697');
INSERT INTO `tbhome_migration` VALUES ('m130524_201443_init', '1444033783');



DROP TABLE IF EXISTS `tbhome_module`;
CREATE TABLE `tbhome_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `module_label` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `module_des` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbhome_relation`;
CREATE TABLE `tbhome_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid1` (`uid1`,`uid2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbhome_schoolmate`;
CREATE TABLE `tbhome_schoolmate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `sex` varchar(5) DEFAULT '1',
  `grade` varchar(20) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `studentid` varchar(30) DEFAULT NULL,
  `idcardnum` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `jobtitle` varchar(255) DEFAULT NULL,
  `honour` text,
  `worktel` varchar(20) DEFAULT NULL,
  `hometel` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;


INSERT INTO `tbhome_schoolmate` VALUES ('1', '陈霞', '女', '2011', '食品科学与工程', '070723026', '', '', '', '', '', '荣耀', '', '', '', '', '', '<p><br/></p><p><img src=\"/vcards/frontend/web/Uploads/1/20151001/1443688371518.jpg\" title=\"1443688371518.jpg\" alt=\"绿盾防伪中心.jpg\"/></p>');
INSERT INTO `tbhome_schoolmate` VALUES ('2', '张静雯', '女', '2011', '食品科学与工程', '070723078', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('3', '郑芳芳', '女', '2011', '食品科学与工程', '070625004', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('4', '徐玉宁', '女', '2011', '食品科学与工程', '070941123', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('6', '吴国虹', '女', '2011', '食品科学与工程', '070941125', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('7', '钟文静', '女', '2011', '食品科学与工程', '070941126', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('8', '林国钦', '男', '2011', '食品科学与工程', '070941127', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('9', '吴李玲', '女', '2011', '食品科学与工程', '070941128', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('10', '洪小蓉', '女', '2011', '食品科学与工程', '070941129', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('11', '林文胜', '男', '2011', '食品科学与工程', '070941130', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('12', '邓溦', '女', '2011', '食品科学与工程', '070941131', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('14', '林锡禄', '男', '2011', '食品科学与工程', '070941133', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('15', '苏丽莎', '女', '2011', '食品科学与工程', '070941134', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('16', '赫周勰', '女', '2011', '食品科学与工程', '070941135', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('17', '林西宝', '男', '2011', '食品科学与工程', '070941136', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('18', '颜婷', '女', '2011', '食品科学与工程', '070941137', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('19', '周其珍', '女', '2011', '食品科学与工程', '070941138', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('20', '林若楠', '男', '2011', '食品科学与工程', '070941139', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('21', '林青霞', '女', '2011', '食品科学与工程', '070941140', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('23', '林强', '男', '2011', '食品科学与工程', '070941142', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('24', '林玮玮', '女', '2011', '食品科学与工程', '070941143', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('25', '巫凤玲', '女', '2011', '食品科学与工程', '070941144', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('26', '林鑫', '男', '2011', '食品科学与工程', '070941145', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('27', '孔令君', '女', '2011', '食品科学与工程', '070941146', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('28', '姜敏翔', '女', '2011', '食品科学与工程', '070941147', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('29', '韩文杰', '男', '2011', '食品科学与工程', '070941148', '123456789965423', '', '上海', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('30', '毛娟', '女', '2011', '食品科学与工程', '070941149', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('31', '江闯', '女', '2011', '食品科学与工程', '070941150', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('32', '连龙浩', '男', '2011', '食品科学与工程', '070941151', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('33', '庄梅霞', '女', '2011', '食品科学与工程', '070941152', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('34', '蒋晓燕', '女', '2011', '食品科学与工程', '070941153', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('35', '江伟', '男', '2011', '食品科学与工程', '070941154', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('36', '蒋璇靓', '女', '2011', '食品科学与工程', '070941155', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('37', '郭芳敏', '女', '2011', '食品科学与工程', '070941156', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('38', '童开荣', '男', '2011', '食品科学与工程', '070941157', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('39', '郭金香', '女', '2011', '食品科学与工程', '070941158', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('40', '胡婷婷', '女', '2011', '食品科学与工程', '070941159', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('41', '郭冬', '男', '2011', '食品科学与工程', '070941160', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('42', '林翔凯', '男', '2011', '食品科学与工程', '070941161', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbhome_schoolmate` VALUES ('43', '谢婷婷', '女', '2011', '食品科学与工程', '070941162', '', '', '', '', '', '', '', '', '', '', '', '');


DROP TABLE IF EXISTS `tbhome_setting`;
CREATE TABLE `tbhome_setting` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `bg_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tpl` int(11) NOT NULL,
  `vip` smallint(6) NOT NULL DEFAULT '10',
  `upline` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbhome_sys`;
CREATE TABLE `tbhome_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sitetitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `qq` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `siteurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `icp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbhome_sys` VALUES ('1', 'admin', 'admin', '唯卡微名片', '通宝科技', '', '798904845', 'admin@tbhome.com.cn', '', '', '', 'http://www.vcards.top', '', '', '10');


DROP TABLE IF EXISTS `tbhome_tel`;
CREATE TABLE `tbhome_tel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tel_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tel_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbhome_user`;
CREATE TABLE `tbhome_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `qq` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `login` int(11) NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `created_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `updated_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbhome_user` VALUES ('1', '泉州通宝科技', '泉州通宝科技', '15980016080', '798904845', 'admin@tbhome.com.cn', '$2y$13$BEnvcOh/M1wgmzIxT/DcKOBwiBOJbWVof1XqPSiOALC0ABfhadDTm', '', '10', '0', null, '10', '', '', '0', '1444214027');
INSERT INTO `tbhome_user` VALUES ('2', '22', '', '222', '0', '22@22.com', '$2y$13$YwNpdoDYNuoVHsWAGX8h.OlFs06Bwy2f57tMNvWq625E5fbf3mb.q', 'wZFZHQIk7w_FQjLoACvLYBuZ2F4DC41u', '10', '0', null, '10', '', '', '1444243987', '1444243987');
INSERT INTO `tbhome_user` VALUES ('3', '333', '', '333333333', '0', '33@333.com', '$2y$13$tC7PntV6cpgHFHSf5tz7guarBx/FWGgn08TN5KhtpEUmbrEQacCyi', 'dGCtYDrDPeXGa7FwxEBl8k9CYnM59YX4', '10', '0', null, '10', '', '', '1444244855', '1444244855');


DROP TABLE IF EXISTS `tbhome_usermodule`;
CREATE TABLE `tbhome_usermodule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `module_satus` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `moduleid` (`moduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
