# Host: localhost  (Version: 5.6.11)
# Date: 2015-10-27 10:07:42
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "user_coupon"
#

DROP TABLE IF EXISTS `user_coupon`;
CREATE TABLE `user_coupon` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL COMMENT '会员iD',
  `cid` int(8) NOT NULL DEFAULT '0' COMMENT '优惠券ID (劵种id)',
  `code` varchar(32) DEFAULT NULL COMMENT '优惠券编号 时间+uid',
  `beginTime` datetime DEFAULT NULL COMMENT '开始时间，这里优先级高于coupon表',
  `endTime` datetime DEFAULT NULL COMMENT '结束时间 这里优先级高于coupon表',
  `flag` int(1) DEFAULT '1' COMMENT '1正常 2已经使用 3过期 4停用 ',
  `ctime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='优惠券';
