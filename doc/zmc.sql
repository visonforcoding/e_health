/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.6.24 : Database - zmc
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`zmc` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zmc`;

/*Table structure for table `Tata` */

DROP TABLE IF EXISTS `Tata`;

CREATE TABLE `Tata` (
  `a` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '地区名称',
  `type` int(8) DEFAULT NULL COMMENT '一级：1  二级：2',
  `pid` int(8) DEFAULT NULL COMMENT '父级id，一级填0',
  `no` int(8) DEFAULT NULL COMMENT '地区代号',
  `weatherId` varchar(32) DEFAULT '101010100' COMMENT '天气预报地区代码',
  PRIMARY KEY (`id`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `collectShop` */

DROP TABLE IF EXISTS `collectShop`;

CREATE TABLE `collectShop` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '用户id',
  `sid` int(8) DEFAULT NULL COMMENT '微店Id',
  `collectTime` datetime DEFAULT NULL COMMENT '收藏时间',
  `default` enum('0','1') DEFAULT '0' COMMENT '是否默认店铺',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
  `uid` int(8) DEFAULT NULL COMMENT '用户ID',
  `sid` int(8) DEFAULT NULL COMMENT '微店ID',
  `oid` int(8) DEFAULT NULL COMMENT '服务单ID',
  `type` varchar(32) DEFAULT NULL COMMENT '订单类型 1微店  2救援',
  `score` int(8) DEFAULT NULL COMMENT '评价等级',
  `total` int(8) DEFAULT NULL COMMENT '总分',
  `comTime` datetime DEFAULT NULL COMMENT '评价时间',
  `desc` varchar(300) DEFAULT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Table structure for table `coupon` */

DROP TABLE IF EXISTS `coupon`;

CREATE TABLE `coupon` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '名称',
  `type` int(8) NOT NULL DEFAULT '0' COMMENT '0全场 1洗车 2美容 3套餐 4拖车',
  `amount1` float(8,2) DEFAULT '0.00' COMMENT '扣减金额1',
  `amount2` float(8,2) DEFAULT '0.00' COMMENT '扣减金额2',
  `areaId` int(8) DEFAULT '0' COMMENT '适用地区 一级地区id，0是全部',
  `shopId` int(8) DEFAULT '0' COMMENT '适用微店 0是全部',
  `serviceId` int(8) DEFAULT '0' COMMENT '适用服务id',
  `beginTime` datetime NOT NULL COMMENT '开始时间',
  `endTime` datetime NOT NULL COMMENT '结束时间',
  `logo` varchar(64) DEFAULT NULL COMMENT '图片',
  `desc` varchar(300) DEFAULT NULL COMMENT '描述',
  `flag` enum('0','1') DEFAULT '1' COMMENT '启动停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Table structure for table `driverCount` */

DROP TABLE IF EXISTS `driverCount`;

CREATE TABLE `driverCount` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `num` int(8) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `helpType` */

DROP TABLE IF EXISTS `helpType`;

CREATE TABLE `helpType` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL COMMENT '救援title，一级标题',
  `name` varchar(32) DEFAULT NULL COMMENT '救援名称，二级标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Table structure for table `helper` */

DROP TABLE IF EXISTS `helper`;

CREATE TABLE `helper` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '救援者ID',
  `name` varchar(32) DEFAULT NULL COMMENT '救援者名称',
  `phoneNo` varchar(32) DEFAULT NULL COMMENT '救援者联系电话',
  `coordinate` varchar(32) DEFAULT NULL COMMENT '救援者坐标',
  `carId` varchar(16) DEFAULT NULL COMMENT '救援者车牌',
  `logo` varchar(64) DEFAULT NULL COMMENT '救援者图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `name` varchar(32) DEFAULT NULL COMMENT '管理员昵称',
  `phoneNo` varchar(32) DEFAULT NULL COMMENT '管理员手机号码',
  `mail` varchar(64) DEFAULT NULL COMMENT '管理员邮箱',
  `password` varchar(32) DEFAULT NULL COMMENT '管理员密码 md5',
  `role` int(8) DEFAULT NULL COMMENT '管理员权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `orderCard` */

DROP TABLE IF EXISTS `orderCard`;

CREATE TABLE `orderCard` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '会员iD',
  `vcid` int(8) DEFAULT NULL COMMENT 'vipcard ID',
  `cardNo` varchar(32) DEFAULT NULL COMMENT '会员卡编号 日期+id  和orderNo要一致',
  `orderNo` varchar(32) DEFAULT NULL COMMENT '订单编号 日期+id',
  `price` float(8,2) DEFAULT NULL COMMENT '售价',
  `amount` float(8,2) DEFAULT NULL COMMENT '实付金额',
  `payType` int(1) DEFAULT NULL COMMENT '1微信 2支付宝 3银联 4预付卡 5现金',
  `payStatus` int(1) DEFAULT NULL COMMENT '1未付款 2已付款 3已退款 4已经服务，退款审核不通过',
  `orderStatus` int(2) DEFAULT NULL COMMENT '1已下单 2已经付款  21付款确认中  3取消，已审核 31取消中，待审核  4已退款  41退款中 42退款失败   5服务已经完成',
  `createTime` datetime DEFAULT NULL COMMENT '订单生成时间',
  `payTime` datetime DEFAULT NULL COMMENT '支付时间',
  `charge_id` varchar(100) DEFAULT NULL COMMENT '支付的charge_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `orderCharge` */

DROP TABLE IF EXISTS `orderCharge`;

CREATE TABLE `orderCharge` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `orderNo` varchar(32) DEFAULT NULL COMMENT '订单号',
  `charge` varchar(64) DEFAULT NULL COMMENT 'charge id',
  `status` int(8) DEFAULT NULL COMMENT '同order表',
  `dt` datetime DEFAULT NULL COMMENT '插入时间',
  `chargeStr` text COMMENT '整个charge对象',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Table structure for table `orderHelper` */

DROP TABLE IF EXISTS `orderHelper`;

CREATE TABLE `orderHelper` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '会员id',
  `hid` int(8) DEFAULT NULL COMMENT '救援者id',
  `orderNo` varchar(32) NOT NULL COMMENT '救援订单ID',
  `serviceId` int(8) DEFAULT NULL COMMENT '服务号Id',
  `address` varchar(128) DEFAULT NULL COMMENT '详细地址',
  `coordinate` varchar(32) DEFAULT NULL COMMENT '坐标',
  `orderStatus` int(2) DEFAULT NULL COMMENT '1已下单 2已经付款  21付款确认中  3取消，已审核 31取消中，待审核  4已退款  41退款中 42退款失败   5服务已经完成',
  `payStatus` int(1) DEFAULT NULL COMMENT '1未付款 2已付款 3已退款 4已经服务，退款审核不通过',
  `payType` int(1) DEFAULT NULL COMMENT '1微信 2支付宝 3银联 4预付卡 5现金',
  `ucid` int(8) DEFAULT NULL COMMENT '优惠券ID',
  `price` float(8,2) DEFAULT NULL COMMENT '支付金额',
  `beginTime` datetime DEFAULT NULL COMMENT '接单时间',
  `orderTime` datetime DEFAULT NULL COMMENT '声称订单时间',
  `payTime` datetime DEFAULT NULL COMMENT '支付时间',
  `finishTime` datetime DEFAULT NULL COMMENT '完成时间',
  `charge_id` varchar(100) DEFAULT NULL COMMENT '支付的charge_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

/*Table structure for table `orderLog` */

DROP TABLE IF EXISTS `orderLog`;

CREATE TABLE `orderLog` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `oid` int(8) DEFAULT NULL COMMENT '订单id',
  `type` int(1) DEFAULT NULL COMMENT '预约1 救援2',
  `num` int(3) DEFAULT NULL COMMENT '唯一标识，待定',
  `desc` varchar(30) DEFAULT NULL COMMENT '描述',
  `time` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

/*Table structure for table `orderShop` */

DROP TABLE IF EXISTS `orderShop`;

CREATE TABLE `orderShop` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '会员iD',
  `sid` int(8) DEFAULT NULL COMMENT '微店ID',
  `serviceId` int(8) DEFAULT '0' COMMENT '服务id',
  `carId` int(8) DEFAULT NULL COMMENT '用户车辆ID',
  `orderNo` varchar(32) DEFAULT NULL COMMENT '订单编号 日期+id',
  `price` float(8,2) DEFAULT NULL COMMENT '售价',
  `amount` float(8,2) DEFAULT NULL COMMENT '实付金额',
  `payType` int(1) DEFAULT NULL COMMENT '1微信 2支付宝 3银联 4预付卡 5现金',
  `payStatus` int(1) DEFAULT NULL COMMENT '1未付款 2已付款 3已退款 4已经服务，退款审核不通过',
  `orderStatus` int(2) DEFAULT NULL COMMENT '1已下单 2已经付款  21付款确认中  3取消，已审核 31取消中，待审核  4已退款  41退款中 42退款失败   5服务已经完成',
  `createTime` datetime DEFAULT NULL COMMENT '订单生成时间',
  `serviceTime` datetime DEFAULT NULL COMMENT '预约服务时间',
  `payTime` datetime DEFAULT NULL COMMENT '支付时间',
  `finishTime` datetime DEFAULT NULL COMMENT '订单完成时间',
  `ucid` varchar(16) DEFAULT NULL COMMENT '优惠卷id',
  `isGetkey` enum('0','1') DEFAULT '0' COMMENT '是否上门取钥匙',
  `charge_id` varchar(100) DEFAULT NULL COMMENT '支付的charge_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

/*Table structure for table `orderTmp` */

DROP TABLE IF EXISTS `orderTmp`;

CREATE TABLE `orderTmp` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'orderTmp id',
  `userId` int(8) DEFAULT NULL COMMENT 'user ID',
  `shopId` int(8) DEFAULT NULL COMMENT 'shop ID',
  `carId` int(8) DEFAULT NULL COMMENT '用户车辆ID',
  `stId` int(8) DEFAULT NULL COMMENT '服务时段ID',
  `sdate` date DEFAULT NULL COMMENT '服务日期',
  `stInfo` varchar(100) DEFAULT NULL COMMENT '时间段',
  `sType` int(1) DEFAULT NULL COMMENT '1洗车 2服务 3套餐 4救援',
  `serviceId` varchar(20) DEFAULT NULL COMMENT '服务id',
  `isGetKey` enum('0','1') DEFAULT '0' COMMENT '上门取钥匙',
  `couponId` int(8) DEFAULT NULL COMMENT 'coupon ID',
  `addTime` datetime DEFAULT NULL,
  `flag` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3025 DEFAULT CHARSET=utf8;

/*Table structure for table `reply` */

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `cid` int(8) NOT NULL COMMENT 'common ID',
  `sid` int(8) DEFAULT NULL COMMENT 'shop ID',
  `content` varchar(300) DEFAULT NULL COMMENT '内容',
  `comTime` datetime DEFAULT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `state` varchar(32) DEFAULT NULL COMMENT '服务订单状态',
  `type` varchar(16) DEFAULT NULL COMMENT '1洗车 2美容 3套餐',
  `name` varchar(32) DEFAULT NULL COMMENT '服务名称',
  `mprice` float(8,2) DEFAULT NULL COMMENT '原价',
  `price` float(8,2) DEFAULT NULL COMMENT '售价',
  `desc` varchar(64) DEFAULT NULL COMMENT '描述',
  `titleId` int(8) DEFAULT '0' COMMENT '名称id serviceTile id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Table structure for table `serviceTime` */

DROP TABLE IF EXISTS `serviceTime`;

CREATE TABLE `serviceTime` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '预约时间段ID',
  `time` varchar(16) DEFAULT NULL COMMENT '预约时间段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Table structure for table `serviceTitle` */

DROP TABLE IF EXISTS `serviceTitle`;

CREATE TABLE `serviceTitle` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `order` int(8) DEFAULT NULL COMMENT '排序，越大越前',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `shop` */

DROP TABLE IF EXISTS `shop`;

CREATE TABLE `shop` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '微店ID',
  `areaId` int(8) NOT NULL COMMENT '二级地区id',
  `name` varchar(32) DEFAULT NULL COMMENT '微店名称',
  `address` varchar(128) DEFAULT NULL COMMENT '微店地址',
  `coordinate` varchar(32) DEFAULT NULL COMMENT '微店坐标',
  `workTime` varchar(32) DEFAULT NULL COMMENT '营业时间',
  `logo1` varchar(64) DEFAULT NULL COMMENT '图片1',
  `logo2` varchar(64) DEFAULT NULL COMMENT '图片2',
  `logo3` varchar(64) DEFAULT NULL COMMENT '图片3',
  `tel` varchar(32) DEFAULT NULL COMMENT '联系电话',
  `phoneNo` varchar(32) DEFAULT NULL COMMENT '店长手机',
  `email` varchar(63) DEFAULT NULL COMMENT '邮箱',
  `desc` tinytext,
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `score` int(8) DEFAULT NULL COMMENT '评价等级',
  `busyST` int(8) DEFAULT NULL COMMENT '忙碌时间id',
  `busyDate` varchar(32) DEFAULT NULL COMMENT '忙碌日期',
  `flag` enum('0','1') DEFAULT '1' COMMENT '启动停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Table structure for table `shopPrice` */

DROP TABLE IF EXISTS `shopPrice`;

CREATE TABLE `shopPrice` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `sid` int(8) DEFAULT NULL COMMENT '微店ID',
  `serviceId` int(8) DEFAULT NULL COMMENT '服务ID',
  `mprice` float(8,2) DEFAULT NULL COMMENT '原价',
  `price` float(8,2) DEFAULT NULL COMMENT '售价',
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=633 DEFAULT CHARSET=utf8;

/*Table structure for table `smslog` */

DROP TABLE IF EXISTS `smslog`;

CREATE TABLE `smslog` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '短信流水id',
  `phone` varchar(16) DEFAULT NULL COMMENT '手机号',
  `time` varchar(32) DEFAULT NULL COMMENT '发短信时间',
  `content` varchar(64) DEFAULT NULL COMMENT '短信内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `cardId` int(8) DEFAULT NULL COMMENT '会员卡ID',
  `phoneNo` varchar(32) NOT NULL COMMENT '手机号',
  `nike` varchar(32) DEFAULT NULL COMMENT '昵称',
  `sex` enum('女','男') DEFAULT '男' COMMENT '性别',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `address` varchar(128) DEFAULT NULL COMMENT '地址',
  `coordinate` varchar(32) DEFAULT NULL COMMENT '坐标',
  `logo` varchar(64) DEFAULT NULL COMMENT '头像',
  `address2` varchar(128) DEFAULT NULL COMMENT '地址2',
  `flag` enum('0','1') DEFAULT '1' COMMENT '启动停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

/*Table structure for table `userAddress` */

DROP TABLE IF EXISTS `userAddress`;

CREATE TABLE `userAddress` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '用户ID',
  `type` int(8) DEFAULT NULL COMMENT '地址类型 公司2  家1',
  `address` varchar(128) DEFAULT NULL COMMENT '标准中文地址--地图选址',
  `address2` varchar(128) DEFAULT NULL COMMENT '地址补充',
  `coordinate` varchar(32) DEFAULT NULL COMMENT '坐标',
  `default` enum('0','1') DEFAULT '0' COMMENT '默认选项',
  `flag` enum('0','1') DEFAULT '1' COMMENT '是否停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `userCar` */

DROP TABLE IF EXISTS `userCar`;

CREATE TABLE `userCar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '会员ID ',
  `carBrand` varchar(16) DEFAULT NULL COMMENT '汽车品牌',
  `carSeries` varchar(16) DEFAULT NULL COMMENT '汽车系列',
  `proname` varchar(16) DEFAULT NULL COMMENT '省名简写',
  `carNO` varchar(16) DEFAULT NULL COMMENT '车牌',
  `carColor` varchar(16) DEFAULT NULL COMMENT '汽车颜色',
  `default` enum('0','1') DEFAULT '0' COMMENT '默认选项',
  `flag` enum('0','1') DEFAULT '1' COMMENT '启动停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

/*Table structure for table `userCoupon` */

DROP TABLE IF EXISTS `userCoupon`;

CREATE TABLE `userCoupon` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL COMMENT '会员iD',
  `cid` int(8) NOT NULL COMMENT '优惠券ID',
  `code` varchar(32) DEFAULT NULL COMMENT '优惠券编号 时间+uid',
  `beginTime` datetime DEFAULT NULL COMMENT '开始时间，这里优先级高于coupon表',
  `endTime` datetime DEFAULT NULL COMMENT '结束时间 这里优先级高于coupon表',
  `twice` int(8) NOT NULL DEFAULT '0' COMMENT '总次数',
  `used` int(8) NOT NULL DEFAULT '0' COMMENT '总使用次数',
  `carId` int(8) NOT NULL DEFAULT '0' COMMENT '针对用户指定车辆',
  `flag` int(1) DEFAULT '1' COMMENT '1正常 2已经使用 3过期 4停用 ',
  `uvcid` int(8) DEFAULT '0' COMMENT '用户vip卡id',
  `addTime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=utf8;

/*Table structure for table `vipcard` */

DROP TABLE IF EXISTS `vipcard`;

CREATE TABLE `vipcard` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL COMMENT '预付卡名称',
  `carnum` int(8) NOT NULL COMMENT '可添加车辆数',
  `price` float(8,2) NOT NULL COMMENT '售价',
  `oldPrice` float(8,2) NOT NULL COMMENT '原价',
  `effect` int(8) DEFAULT '1' COMMENT '有效期（年）',
  `desc` varchar(300) DEFAULT NULL COMMENT '赠品、描述...',
  `freebee` varchar(200) DEFAULT NULL COMMENT '赠品',
  `flag` enum('0','1') DEFAULT '1' COMMENT '是否停用',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `vipcardCar` */

DROP TABLE IF EXISTS `vipcardCar`;

CREATE TABLE `vipcardCar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ucard` int(8) NOT NULL COMMENT '用户vip卡id',
  `car` int(8) NOT NULL COMMENT '车辆id',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `vipcardService` */

DROP TABLE IF EXISTS `vipcardService`;

CREATE TABLE `vipcardService` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `vcid` int(8) NOT NULL COMMENT 'vipcard ID',
  `cid` int(8) NOT NULL COMMENT 'coupon ID',
  `twice` int(8) NOT NULL COMMENT '次数，9999代表无限次',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Table structure for table `vipcardUser` */

DROP TABLE IF EXISTS `vipcardUser`;

CREATE TABLE `vipcardUser` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL COMMENT 'userID',
  `vcid` int(8) NOT NULL COMMENT 'vipcard id',
  `cardNo` varchar(32) NOT NULL COMMENT 'vip卡卡号，同order表里面',
  `benginTime` datetime NOT NULL COMMENT '默认当天',
  `endTime` datetime NOT NULL COMMENT '结束时间',
  `addTime` datetime NOT NULL COMMENT '添加时间',
  `status` int(8) NOT NULL DEFAULT '2' COMMENT '1正常使用 2待审核 3过期 4取消',
  `adminId` int(8) DEFAULT '0' COMMENT '发放者id，默认0',
  `shopId` int(8) DEFAULT '0' COMMENT '发放者id，默认0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `vipcardUserCar` */

DROP TABLE IF EXISTS `vipcardUserCar`;

CREATE TABLE `vipcardUserCar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uvcid` int(8) NOT NULL COMMENT '用户vip卡id',
  `car` int(8) NOT NULL COMMENT '车辆id',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `wzmsg` */

DROP TABLE IF EXISTS `wzmsg`;

CREATE TABLE `wzmsg` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `msg` varchar(300) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
