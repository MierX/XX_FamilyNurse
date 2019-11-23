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

 Date: 23/11/2019 15:30:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '管理员', 'admin', '123456');

-- ----------------------------
-- Table structure for needs
-- ----------------------------
DROP TABLE IF EXISTS `needs`;
CREATE TABLE `needs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `disease` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reward` int(10) NOT NULL,
  `workTime` int(10) NOT NULL,
  `needs` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `addtime` int(10) NOT NULL,
  `endtime` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of needs
-- ----------------------------
INSERT INTO `needs` VALUES (1, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457087, 1574061887, 1);
INSERT INTO `needs` VALUES (2, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457163, 1574061963, 1);
INSERT INTO `needs` VALUES (3, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457180, 1574061980, 1);
INSERT INTO `needs` VALUES (4, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457183, 1574061983, 1);
INSERT INTO `needs` VALUES (5, 1, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457186, 1574061986, 1);
INSERT INTO `needs` VALUES (6, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457191, 1574061991, 4);
INSERT INTO `needs` VALUES (7, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457194, 1574061994, 1);
INSERT INTO `needs` VALUES (8, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457199, 1574061999, 1);
INSERT INTO `needs` VALUES (9, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457204, 1573457204, 4);
INSERT INTO `needs` VALUES (10, 2, 'aaa！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457207, 1574062007, 1);
INSERT INTO `needs` VALUES (11, 2, '【重病求医！】帮我买个板蓝根！', '感冒', 20, 5, '<p>帮我买盒板蓝根！</p><p><img src=\"/ueditor/php/upload/image/20191111/1573457078877817.jpg\" title=\"1573457078877817.jpg\" alt=\"chan.jpg\"/></p>', 1573457277, 1573457277, 4);
INSERT INTO `needs` VALUES (12, 3, 'wo shi xin lai de ', 'wuliao', 12, 1, '<p>超级无聊boring</p>', 1573612216, 1574217016, 1);
INSERT INTO `needs` VALUES (13, 2, 'test', 'wuliao', 24, 24, '<p>23232321231344</p>', 1573614408, 1573457087, 4);

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hot` int(11) NOT NULL DEFAULT 1,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES (1, 'test1', 6, '管理员', '<p>test1</p><p><span style=\"font-size: 20px;\">test1</span></p><p><span style=\"font-size: 24px;\">test1</span></p><p><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20191107/1573107649761427.gif\" title=\"1573107649761427.gif\" alt=\"ball.gif\"/></span></p>', 1, 1522101156);
INSERT INTO `notice` VALUES (2, 'test2', 4, '管理员', '<p>test22222222</p>', 1, 1573056000);
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
  `nid` int(11) NOT NULL,
  `ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nurse_collection
-- ----------------------------
INSERT INTO `nurse_collection` VALUES (8, 2, '{\"1\":8,\"2\":7,\"3\":13,\"4\":12,\"5\":1,\"6\":2}');

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
INSERT INTO `user` VALUES (2, 'User', 'test002', '123456', 'test2', 1, 27, 12312312301, 123123123123123123, 1, 1572687034);
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
INSERT INTO `user_collection` VALUES (1, 2, '[1,2]');

SET FOREIGN_KEY_CHECKS = 1;
