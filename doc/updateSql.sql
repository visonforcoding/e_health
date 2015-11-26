# Host: localhost  (Version: 5.6.11)
# Date: 2015-10-27 10:07:01
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "coupon"
#

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE `coupon` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '名称',
  `type` int(8) NOT NULL DEFAULT '0' COMMENT '0现金劵 1满减劵',
  `amount1` float(8,2) DEFAULT '0.00' COMMENT '满减金额，使用条件',
  `amount2` float(8,2) DEFAULT '0.00' COMMENT '扣减金额',
  `shopId` int(8) NOT NULL DEFAULT '0' COMMENT '适用店铺  0是全部',
  `areaId` tinyint(3) DEFAULT '0',
  `serviceId` int(8) NOT NULL DEFAULT '0' COMMENT '适用服务id，0则适用全部店铺',
  `beginTime` datetime NOT NULL COMMENT '开始时间',
  `endTime` datetime NOT NULL COMMENT '结束时间',
  `logo` varchar(64) DEFAULT NULL COMMENT '图片',
  `desc` varchar(64) DEFAULT NULL COMMENT '描述',
  `flag` enum('0','1') DEFAULT '1' COMMENT '启动停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
