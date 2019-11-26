/*
 Navicat MySQL Data Transfer

 Source Server         : me
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : fn

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 27/11/2019 02:05:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '管理员', 'admin', '123456');

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT 0,
  `nid` int(11) NOT NULL DEFAULT 0,
  `author` int(11) NOT NULL DEFAULT 0,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES (1, 2, 1, 2, '<p>123<br/></p>', 1574790963);
INSERT INTO `chat` VALUES (2, 2, 1, 2, '<p>123123<br/></p>', 1574790978);
INSERT INTO `chat` VALUES (3, 2, 1, 2, '<p>123123<br/></p>', 1574790991);
INSERT INTO `chat` VALUES (4, 2, 1, 2, '<p>123123<br/></p>', 1574790998);
INSERT INTO `chat` VALUES (5, 2, 1, 2, '<p>123123123<br/></p>', 1574791004);
INSERT INTO `chat` VALUES (6, 2, 1, 2, '<p>1231<br/></p>', 1574791011);
INSERT INTO `chat` VALUES (7, 2, 1, 2, '<p>1231asd<br/></p>', 1574791023);
INSERT INTO `chat` VALUES (8, 2, 1, 2, '<p>阿瑟东<br/>阿瑟东<br/>阿德亲吻请问</p>', 1574791076);

-- ----------------------------
-- Table structure for needs
-- ----------------------------
DROP TABLE IF EXISTS `needs`;
CREATE TABLE `needs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `disease` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `reward` int(10) NOT NULL DEFAULT 0,
  `worktime` int(10) NOT NULL DEFAULT 0,
  `needs` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `addtime` int(10) NOT NULL DEFAULT 0,
  `endtime` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1未开始，2已开始，3已结束，4已失效',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of needs
-- ----------------------------
INSERT INTO `needs` VALUES (1, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457087, 1574061887, 2);
INSERT INTO `needs` VALUES (2, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457163, 1574061963, 3);
INSERT INTO `needs` VALUES (3, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457180, 1574061980, 4);
INSERT INTO `needs` VALUES (4, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457183, 1574061983, 4);
INSERT INTO `needs` VALUES (5, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457186, 1574061986, 4);
INSERT INTO `needs` VALUES (6, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1574681270, 1575286070, 1);
INSERT INTO `needs` VALUES (7, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457194, 1574061994, 4);
INSERT INTO `needs` VALUES (8, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457199, 1574061999, 4);
INSERT INTO `needs` VALUES (9, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1574681016, 1575285816, 1);
INSERT INTO `needs` VALUES (10, 2, 'aaa！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1574676397, 1575281197, 1);
INSERT INTO `needs` VALUES (11, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457277, 1573457277, 4);
INSERT INTO `needs` VALUES (12, 3, 'wo shi xin lai de ', 'wuliao', 12, 1, '<p>超级无聊boring</p>', 1573612216, 1574217016, 4);
INSERT INTO `needs` VALUES (13, 2, 'test', 'wuliao', 24, 24, '<p>23232321231344</p>', 1574676411, 1575281211, 1);
INSERT INTO `needs` VALUES (14, 2, 'test1', 'test1', 112, 1232, '<p>2222222222222222222222222222222</p><p>test1<img src=\"/ueditor/php/upload/image/20191125/1574669382117603.jpg\" title=\"1574669382117603.jpg\" alt=\"07datun.jpg\"/></p><p>test12222222</p><p><br/></p>', 1574673131, 1575277931, 4);
INSERT INTO `needs` VALUES (15, 2, '123', '3213', 12, 123, '<p>123213adsadadasdaasd</p><p>asdasdad</p>', 1574676420, 1575281220, 4);

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `hot` int(11) NOT NULL DEFAULT 1,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `addtime` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES (1, 'test1', 6, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (2, 'test2', 5, '管理员', '<p>test22222222</p>', 1, 1573056000);
INSERT INTO `notice` VALUES (3, 'test3', 42, '管理员', '<p>请新编辑内容</p>', 1, 1573117385);
INSERT INTO `notice` VALUES (4, 'test1', 10, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (5, 'test1', 7, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (6, 'test1', 1, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (7, 'test1', 1, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (8, 'test1', 1, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (9, 'test1', 1, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (10, 'test1', 5, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (11, 'test11', 1, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);

-- ----------------------------
-- Table structure for nurse
-- ----------------------------
DROP TABLE IF EXISTS `nurse`;
CREATE TABLE `nurse`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `account` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `card` bigint(18) NOT NULL,
  `work-year` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `work-add` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `work-expertise` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `merits` bigint(128) NOT NULL DEFAULT 0,
  `remark` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nurse
-- ----------------------------
INSERT INTO `nurse` VALUES (1, 'Nurse', 'test001', '123456', 'test1', 1, 18, 12312312300, 12345678900987654, '2', 'qwadasd', NULL, 0, 'asdasdasdaf', 1, 1572687086);
INSERT INTO `nurse` VALUES (2, 'Nurse', 'test002', '123456', 'test2', 2, 41, 12312312301, 123123123123123123, '15', '123213', NULL, 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (3, 'Nurse', 'test003', '123456', 'test3', 1, 41, 12312312302, 123123123123123124, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (4, 'Nurse', 'test004', '123456', 'test4', 2, 41, 12312312303, 123123123123123125, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (5, 'Nurse', 'test005', '123456', 'test5', 1, 41, 12312312304, 123123123123123126, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (6, 'Nurse', 'test006', '123456', 'test6', 2, 41, 12312312305, 123123123123123127, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (7, 'Nurse', 'test007', '123456', 'test7', 1, 41, 12312312306, 123123123123123128, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (8, 'Nurse', 'test008', '123456', 'test8', 2, 41, 12312312307, 123123123123123129, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (9, 'Nurse', 'test009', '123456', 'test9', 1, 41, 12312312308, 1231231231231231210, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (10, 'Nurse', 'test010', '123456', 'test10', 2, 41, 12312312309, 1231231231231231211, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);
INSERT INTO `nurse` VALUES (11, 'Nurse', 'test011', '123456', 'test11', 1, 41, 12312312310, 1231231231231231212, '10', '123213', '感冒', 0, 'testtest', 1, 1572687086);

-- ----------------------------
-- Table structure for nurse_collection
-- ----------------------------
DROP TABLE IF EXISTS `nurse_collection`;
CREATE TABLE `nurse_collection`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL DEFAULT 0,
  `ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nurse_collection
-- ----------------------------
INSERT INTO `nurse_collection` VALUES (8, 2, '{\"1\":8,\"2\":7,\"4\":12,\"5\":1,\"6\":2,\"7\":6,\"8\":15}');

-- ----------------------------
-- Table structure for nurse_needs
-- ----------------------------
DROP TABLE IF EXISTS `nurse_needs`;
CREATE TABLE `nurse_needs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL DEFAULT 0,
  `nurse` int(11) NOT NULL DEFAULT 0,
  `addtime` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of nurse_needs
-- ----------------------------
INSERT INTO `nurse_needs` VALUES (1, 1, 2, 1575281220);
INSERT INTO `nurse_needs` VALUES (2, 2, 2, 1575281220);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `account` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `card` bigint(18) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'User', 'test001', '123456', 'test1', 1, 18, 12312312300, 12345678900987654, 1, 1572687034);
INSERT INTO `user` VALUES (2, 'User', 'test002', '123456', 'test2', 1, 26, 12312312301, 123123123123123123, 1, 1572687034);
INSERT INTO `user` VALUES (3, 'User', 'test003', '123456', 'test3', 1, 32, 12312312302, 123123123123123132, 1, 1573612148);

-- ----------------------------
-- Table structure for user_collection
-- ----------------------------
DROP TABLE IF EXISTS `user_collection`;
CREATE TABLE `user_collection`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_collection
-- ----------------------------
INSERT INTO `user_collection` VALUES (1, 2, '{\"2\":3,\"3\":6,\"4\":8}');

SET FOREIGN_KEY_CHECKS = 1;
