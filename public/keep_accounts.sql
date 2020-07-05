/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : keep_accounts

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-07-05 14:51:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ka_category
-- ----------------------------
DROP TABLE IF EXISTS `ka_category`;
CREATE TABLE `ka_category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT '' COMMENT '分类名称',
  `create_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `pid_id` int(11) unsigned DEFAULT '0' COMMENT '父类id',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='分类表';

-- ----------------------------
-- Records of ka_category
-- ----------------------------
INSERT INTO `ka_category` VALUES ('1', '粮油调味', '2020-07-03 10:51:20', '0');
INSERT INTO `ka_category` VALUES ('2', '手机消耗品', '2020-07-03 10:51:24', '0');
INSERT INTO `ka_category` VALUES ('3', '生鲜蔬果', '2020-07-03 10:51:26', '0');
INSERT INTO `ka_category` VALUES ('4', '肉禽蛋鱼', '2020-07-03 10:51:30', '0');
INSERT INTO `ka_category` VALUES ('5', '休闲零食', '2020-07-03 10:51:32', '0');
INSERT INTO `ka_category` VALUES ('6', '美妆个护', '2020-07-03 10:51:34', '0');
INSERT INTO `ka_category` VALUES ('7', '服饰百货', '2020-07-03 10:51:37', '0');
INSERT INTO `ka_category` VALUES ('8', '纸品', '2020-07-03 10:51:39', '0');
INSERT INTO `ka_category` VALUES ('9', '公共交通', '2020-07-03 10:51:41', '0');
INSERT INTO `ka_category` VALUES ('10', '自驾车开销', '2020-07-03 10:51:44', '0');

-- ----------------------------
-- Table structure for ka_goods
-- ----------------------------
DROP TABLE IF EXISTS `ka_goods`;
CREATE TABLE `ka_goods` (
  `goods_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_category_id` int(11) unsigned DEFAULT '0' COMMENT '分类id',
  `goods_name` varchar(30) DEFAULT '' COMMENT '标签名称',
  `goods_status` tinyint(1) unsigned DEFAULT '0' COMMENT '使用启用 0-启用 1-禁止',
  `create_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='商品';

-- ----------------------------
-- Records of ka_goods
-- ----------------------------
INSERT INTO `ka_goods` VALUES ('1', '1', '米', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('2', '1', '酱油', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('3', '1', '盐', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('4', '1', '生粉', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('5', '1', '面', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('6', '1', '耗油', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('7', '1', '味精', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('8', '2', '手机话费充值', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('9', '4', '猪肉', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('10', '4', '鱼', '0', '0000-00-00 00:00:00');
INSERT INTO `ka_goods` VALUES ('11', '4', '鸡肉', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for ka_records
-- ----------------------------
DROP TABLE IF EXISTS `ka_records`;
CREATE TABLE `ka_records` (
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_code` varchar(30) DEFAULT '' COMMENT '记录单号',
  `fk_user_id` int(11) unsigned DEFAULT '0' COMMENT '用户id',
  `fk_category_id` int(11) unsigned DEFAULT '0' COMMENT '分类id',
  `create_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `user_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '使用时间',
  `record_title` varchar(30) DEFAULT '' COMMENT '标题',
  `record_amount` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '金额',
  `description` text COMMENT '备注',
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='记录表';

-- ----------------------------
-- Records of ka_records
-- ----------------------------

-- ----------------------------
-- Table structure for ka_records_items
-- ----------------------------
DROP TABLE IF EXISTS `ka_records_items`;
CREATE TABLE `ka_records_items` (
  `item_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_record_id` int(11) unsigned DEFAULT '0' COMMENT '记录主键id',
  `fk_category_id` int(11) unsigned DEFAULT '0' COMMENT '分类id',
  `fk_goods_id` int(11) unsigned DEFAULT '0' COMMENT '商品id',
  `goods_name` varchar(30) DEFAULT '' COMMENT '商品名称',
  `goods_num` int(11) unsigned DEFAULT '0' COMMENT '数量',
  `goods_price` decimal(11,0) unsigned DEFAULT '0' COMMENT '单价',
  `goods_amount` decimal(11,0) unsigned DEFAULT '0' COMMENT '商品小计金额',
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ka_records_items
-- ----------------------------

-- ----------------------------
-- Table structure for ka_users
-- ----------------------------
DROP TABLE IF EXISTS `ka_users`;
CREATE TABLE `ka_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT '' COMMENT '用户名',
  `user_mobile` char(12) DEFAULT '' COMMENT '手机号',
  `password` varchar(300) DEFAULT '' COMMENT '密码',
  `create_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Records of ka_users
-- ----------------------------
INSERT INTO `ka_users` VALUES ('1', 'json', '18024125081', 'eyJpdiI6InVycmtqQzBuUnY1Vm91TDJacE9cL1FnPT0iLCJ2YWx1ZSI6InBoOHhseVo0UDQ4UVNoRDZRYjE2ckE9PSIsIm1hYyI6ImZjZDgwYjJiOWM3MTExZThhZTMzNzI4YWYyMjc2MDdhNWRiZTc4ZjEyYTY0YzRjZWMyYTA0OTQ0NzE4M2ZiMDUifQ==', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ka_users` VALUES ('2', 'nian', '18024125081', 'eyJpdiI6InVycmtqQzBuUnY1Vm91TDJacE9cL1FnPT0iLCJ2YWx1ZSI6InBoOHhseVo0UDQ4UVNoRDZRYjE2ckE9PSIsIm1hYyI6ImZjZDgwYjJiOWM3MTExZThhZTMzNzI4YWYyMjc2MDdhNWRiZTc4ZjEyYTY0YzRjZWMyYTA0OTQ0NzE4M2ZiMDUifQ==', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
