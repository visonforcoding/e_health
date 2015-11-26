# Host: localhost  (Version: 5.6.11)
# Date: 2015-11-26 19:01:30
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "store_service"
#

DROP TABLE IF EXISTS `store_service`;
CREATE TABLE `store_service` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `storeId` tinyint(3) DEFAULT '0' COMMENT '店铺id',
  `name` varchar(32) DEFAULT NULL COMMENT '服务名称',
  `price` float(8,2) DEFAULT NULL COMMENT '售价',
  `efficacy` text COMMENT '功效',
  `taboo` text COMMENT '禁忌',
  `ctime` datetime DEFAULT NULL,
  `stime` smallint(6) DEFAULT NULL COMMENT '服务时长(单位分钟)',
  `cargo` text COMMENT '绑定料材',
  `isVisit` tinyint(3) NOT NULL DEFAULT '0' COMMENT '1表示可上门服务',
  `cover` varchar(250) DEFAULT NULL COMMENT '示意图',
  `utime` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "store_service"
#

INSERT INTO `store_service` VALUES (1,1,'防感冒推拿',134.00,'全身推拿着重于人体全身的十四条经络，由头至足全面展开操作，遵循中医学整体观念，有效改善人体亚健康症状，并能化解身体内在颗粒、条索、块状等淤堵现象，对人体展全面的经络疏通，从而起到促进气血温养、经络疏通、筋骨理顺的作用功效，从总体上调整机体功能、增强抗病能力。','\r\n\r\n    推拿可以帮您放松身体、但在不适宜的情况下进行推拿，可能使问题加重甚至恶化。以下这些情况下，禁忌使用推拿服务：\r\n\r\n    •高烧发热\r\n\r\n    •严重心脏病\r\n\r\n    •骨折、骨质疏松\r\n\r\n    •严重皮肤感染或大面积皮肤破损\r\n\r\n    •心脑血管病发病期\r\n\r\n    •急性传染病（如肝炎或肺结核）\r\n\r\n    •有出血倾向（如血小板减少者、恶性贫血、白血病）\r\n\r\n    •大病初愈或大手术伤口处于恢复\r\n\r\n    •精神病情绪不稳定\r\n\r\n    •疼痛但诊断不明确\r\n\r\n    •恶性肿瘤和艾滋病\r\n\r\n','2015-11-26 16:29:57',45,NULL,0,'/uploads/admin/20151126042734RY.jpg','2015-11-26 16:29:57',1),(2,1,' 拿拿一身推',90.00,'由头至足全面展开操作，遵循中医学整体观念，有效改善人体亚健康症状，并能化解身体内在颗粒、条索、块状等淤堵现象。头面颈肩推拿运用点按、拿捏、弹拨、击拍、揉摩等传统推拿手法疏通头部、颈项经络，有效促进脑部供血，减轻大脑负担。\r\n\r\n','\r\n\r\n    推拿可以帮您放松身体、但在不适宜的情况下进行推拿，可能使问题加重甚至恶化。以下这些情况下，禁忌使用推拿服务：\r\n\r\n    •高烧发热\r\n\r\n    •严重心脏病\r\n\r\n    •骨折、骨质疏松\r\n\r\n    •严重皮肤感染或大面积皮肤破损\r\n\r\n    •心脑血管病发病期\r\n\r\n    •急性传染病（如肝炎或肺结核）\r\n\r\n    •有出血倾向（如血小板减少者、恶性贫血、白血病）\r\n\r\n    •大病初愈或大手术伤口处于恢复\r\n\r\n    •精神病情绪不稳定\r\n\r\n','2015-11-26 18:43:34',40,NULL,0,'/uploads/admin/2015112606433031.jpg','2015-11-26 18:43:34',1),(3,1,' 轻松头面肩 ',168.00,'中医经络学认为头为诸阳之会，头部经络通则精神气色佳，头面颈肩推拿运用点按、拿捏、弹拨、击拍、揉摩等传统推拿手法疏通头部、颈项经络，有效促进脑部供血，减轻大脑负担，缓解视力疲劳、头晕目眩等症状，大大提高人体免疫力，补充元气能量。','\r\n\r\n    推拿可以帮您放松身体、但在不适宜的情况下进行推拿，可能使问题加重甚至恶化。以下这些情况下，禁忌使用推拿服务：\r\n\r\n    •高烧发热\r\n\r\n    •严重心脏病\r\n\r\n    •骨折、骨质疏松\r\n\r\n    •严重皮肤感染或大面积皮肤破损\r\n\r\n    •心脑血管病发病期\r\n\r\n    •急性传染病（如肝炎或肺结核）\r\n\r\n    •有出血倾向（如血小板减少者、恶性贫血、白血病）\r\n\r\n    •大病初愈或大手术伤口处于恢复\r\n\r\n    •精神病情绪不稳定\r\n\r\n    •疼痛但诊断不明确\r\n\r\n    •恶性肿瘤和艾滋病\r\n','2015-11-26 18:49:19',60,NULL,1,'/uploads/admin/20151126064846U0.jpg','2015-11-26 18:49:19',1);
