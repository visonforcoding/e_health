# Host: localhost  (Version: 5.6.11)
# Date: 2015-09-28 12:26:34
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "store_msg"
#

DROP TABLE IF EXISTS `store_msg`;
CREATE TABLE `store_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `sid` int(11) NOT NULL DEFAULT '0' COMMENT '店铺id',
  `content` varchar(200) NOT NULL DEFAULT '0',
  `ctime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isRead` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已读，1:已读0:未读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='消息';

#
# Data for table "store_msg"
#

INSERT INTO `store_msg` VALUES (1,'恭喜你',1,'我就看看，不说话！','2015-07-10 00:00:00','0000-00-00 00:00:00',0),(2,'恭喜你',1,'预约成功！','2015-07-10 12:10:04','0000-00-00 00:00:00',1),(3,'提现成功',1,'您2015.09.18申请提现已到帐','2015-09-20 00:00:00','0000-00-00 00:00:00',0);
