CREATE TABLE `wd_goods` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_title` varchar(100) DEFAULT NULL,
  `g_default_pic` int(11) DEFAULT NULL,
  `g_default_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


CREATE TABLE `wd_goods_picture` (
  `gp_id` int(11) NOT NULL AUTO_INCREMENT,
  `gp_goods_id` int(11) DEFAULT NULL,
  `gp_pic` varchar(80) DEFAULT NULL,
  `gp_date` datetime DEFAULT NULL,
  PRIMARY KEY (`gp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;


CREATE TABLE `wd_goods_type` (
  `gt_id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_goods_id` int(11) DEFAULT NULL,
  `gt_title` varchar(45) DEFAULT NULL,
  `gt_price` float DEFAULT NULL,
  PRIMARY KEY (`gt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;


CREATE TABLE `wd_shop` (
  `sh_id` int(11) NOT NULL,
  `sh_title` varchar(45) DEFAULT NULL,
  `sh_weixin` varchar(45) DEFAULT NULL,
  `sh_desc` varchar(200) DEFAULT NULL,
  `sh_recm_1` int(11) DEFAULT NULL,
  `sh_recm_2` int(11) DEFAULT NULL,
  `sh_recm_3` int(11) DEFAULT NULL,
  `sh_recm_4` int(11) DEFAULT NULL,
  PRIMARY KEY (`sh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
