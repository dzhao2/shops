-- MySQL dump 10.13  Distrib 5.6.12, for Win32 (x86)
--
-- Host: localhost    Database: shop_cms
-- ------------------------------------------------------
-- Server version	5.6.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cms_category`
--

DROP TABLE IF EXISTS `cms_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_category` (
  `sca_id` int(11) NOT NULL AUTO_INCREMENT,
  `sca_shop_id` int(11) NOT NULL,
  `sca_parent_id` int(11) DEFAULT '0',
  `sca_type` int(11) DEFAULT '0',
  `sca_title` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`sca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_category`
--

LOCK TABLES `cms_category` WRITE;
/*!40000 ALTER TABLE `cms_category` DISABLE KEYS */;
INSERT INTO `cms_category` VALUES (3,1,0,0,'最新教育资讯'),(4,1,0,0,'默认类别');
/*!40000 ALTER TABLE `cms_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_goods`
--

DROP TABLE IF EXISTS `cms_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_goods` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_shop_id` int(11) NOT NULL,
  `g_title` varchar(280) DEFAULT NULL,
  `g_price` float DEFAULT '0',
  `g_picurl` varchar(140) DEFAULT NULL,
  `g_createdate` datetime DEFAULT NULL,
  `g_updatedate` datetime DEFAULT NULL,
  `g_detail` text,
  `g_category_id` int(11) DEFAULT '0',
  `g_count` int(11) DEFAULT '0',
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_goods`
--

LOCK TABLES `cms_goods` WRITE;
/*!40000 ALTER TABLE `cms_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_goods_attribute`
--

DROP TABLE IF EXISTS `cms_goods_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_goods_attribute` (
  `ga_id` int(11) NOT NULL AUTO_INCREMENT,
  `ga_goods_id` int(11) NOT NULL,
  `ga_name` varchar(80) NOT NULL,
  `ga_value` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ga_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_goods_attribute`
--

LOCK TABLES `cms_goods_attribute` WRITE;
/*!40000 ALTER TABLE `cms_goods_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_goods_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_news`
--

DROP TABLE IF EXISTS `cms_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_shop_id` int(11) NOT NULL,
  `n_title` varchar(280) DEFAULT NULL,
  `n_createdate` datetime DEFAULT NULL,
  `n_updatedate` datetime DEFAULT NULL,
  `n_author` varchar(40) DEFAULT NULL,
  `n_picurl` varchar(140) DEFAULT NULL,
  `n_content` text,
  `n_summary` varchar(300) DEFAULT NULL,
  `n_category_id` int(11) DEFAULT '0',
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_news`
--

LOCK TABLES `cms_news` WRITE;
/*!40000 ALTER TABLE `cms_news` DISABLE KEYS */;
INSERT INTO `cms_news` VALUES (2,1,'热烈祝贺伯克利微官网上线啦','2014-04-24 10:08:52','2014-04-25 04:35:37','于老师','images/upload/bokeli0.jpg','<span style=\"font-size:16px;\">热烈祝贺伯克利一对一精英教育微官网上线啦！伯克利精英教育将不断开拓进取，精益求精，为实现您和孩子的梦想全力相助！</span>','热烈祝贺伯克利一对一精英教育微官网上线啦！伯克利精英教育将不断开拓进取，精益求精，为实现您和孩子的梦想全力相助！',3),(3,1,'哈尔滨伯克利精英教育科技有限公司','2014-04-25 01:28:47','2014-04-25 01:28:47','伯克利精英教育','images/upload/bokeli0.jpg','<div>\r\n	<p align=\"center\">\r\n		<span style=\"font-size:16px;\"><img src=\"images/upload/bokeli0.jpg\" alt=\"\" height=\"292\" width=\"299\" /><br />\r\n</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 哈尔滨伯克利精英教育科技有限公司，是一家从事高端青少年教育培训文化机构，以高知识密集型教育研究为基础，机构管理人员均来自北京大学，哈尔滨工业大学，厦门大学等高等学府毕业的研究生，熟悉中国精英的培养模式，研创出适用于中国式教学的培养体系，旨在培养出精英少年，为青少年成才提供科学有效的方法和更广阔的平台。伯克利精英教育机构，具备5星级的美式教学环境，以及知名大学教授，省重点、市重点在职名师，和毕业于985院校的精英老师团队，是一家具备实力，不断创新，高端品质的学习平台。</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\"><br />\r\n</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">联系人：于老师</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">联系电话：0451-87009162/87009163</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">电子邮箱：bklstudy@163.com</span>\r\n	</p>\r\n<span style=\"font-size:16px;\">联系地址：开发区长江路省图书馆正对面世纪广场顺益街17号4楼整层</span><br />\r\n<br />\r\n</div>',NULL,4),(4,1,'教学环境','2014-04-25 01:31:50','2014-04-25 04:33:46','伯克利精英教育','','教学环境介绍<br />','',4),(5,1,'优秀团队','2014-04-25 01:36:27','2014-04-25 01:36:27','伯克利精英教育','','优秀团队介绍',NULL,3),(6,1,'联系我们','2014-04-25 01:43:10','2014-04-25 01:43:10','伯克利精英教育','','<div>\r\n	<h2>\r\n		哈尔滨伯克利精英教育科技有限公司\r\n	</h2>\r\n	<p>\r\n		<span style=\"font-size:18px;\">联系人：于老师</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:18px;\">电子邮箱：bklstudy@163.com<span style=\"font-size:18px;\"></span>\r\n		<p>\r\n			<span style=\"font-size:18px;\">联系电话：0451-87009162/87009163</span>\r\n		</p>\r\n</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:18px;\">联系地址：开发区长江路省图书馆正对面世纪广场顺益街17号4楼整层</span>\r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:18px;\"><img src=\"http://api.map.baidu.com/staticimage?center=126.692349%2C45.756406&zoom=17&width=558&height=360&markers=126.692349%2C45.756406&markerStyles=l%2CA\" alt=\"\" /><br />\r\n</span>\r\n	</p>\r\n</div>',NULL,3),(7,1,'课程预约方式','2014-04-25 04:06:59','2014-04-25 04:06:59','伯克利精英教育','','<p>\r\n	<span style=\"font-size:16px;\"><span><strong>预约电话：</strong></span><span style=\"font-size:18px;\"><strong>0451-87009162/87009163</strong></span></span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\"><span style=\"font-size:18px;\"><strong>联系人：于老师<br />\r\n</strong></span></span>\r\n</p>',NULL,3),(8,1,'我们的位置','2014-04-25 04:10:21','2014-04-25 04:10:21','伯克利精英教育','','<p>\r\n	<span style=\"font-size:18px;\">公交路线：</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:18px;\">位置信息：<span style=\"font-size:18px;\">开发区长江路省图书馆正对面世纪广场顺益街17号4楼</span><br />\r\n</span>\r\n</p>\r\n<p>\r\n	<img src=\"http://api.map.baidu.com/staticimage?center=126.690427%2C45.756154&zoom=16&width=558&height=360&markers=126.690427%2C45.756154&markerStyles=l%2CA\" alt=\"\" />\r\n</p>',NULL,3);
/*!40000 ALTER TABLE `cms_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_shop`
--

DROP TABLE IF EXISTS `cms_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_shop` (
  `sh_id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_title` varchar(80) NOT NULL,
  `sh_weixin` varchar(80) NOT NULL,
  `sh_tempid` varchar(10) DEFAULT NULL,
  `sh_isfake` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`sh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_shop`
--

LOCK TABLES `cms_shop` WRITE;
/*!40000 ALTER TABLE `cms_shop` DISABLE KEYS */;
INSERT INTO `cms_shop` VALUES (1,'伯克利精英教育','JerryAtBeijing','10023',0),(2,'伯克利精英教育','JerryAtBeijing','10023',1);
/*!40000 ALTER TABLE `cms_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_shop_attribute`
--

DROP TABLE IF EXISTS `cms_shop_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_shop_attribute` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sa_shop_id` int(11) NOT NULL,
  `sa_name` varchar(80) NOT NULL,
  `sa_value` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_shop_attribute`
--

LOCK TABLES `cms_shop_attribute` WRITE;
/*!40000 ALTER TABLE `cms_shop_attribute` DISABLE KEYS */;
INSERT INTO `cms_shop_attribute` VALUES (39,2,'menu1_title','企业文化'),(40,2,'menu1_linkurl','?r=view&id=1&page=read&n_id=3'),(41,2,'menu1_color','#35aae7'),(42,2,'menu1_icon','icon-home'),(43,2,'menu1_width','2'),(44,2,'menu2_title','教学环境'),(45,2,'menu2_linkurl','?r=view&id=1&page=read&n_id=4'),(46,2,'menu2_color','#678ce1'),(47,2,'menu2_icon','icon-picture'),(48,2,'menu2_width','1'),(49,2,'menu3_title','优秀团队'),(50,2,'menu3_linkurl','?r=view&id=1&page=read&n_id=5'),(51,2,'menu3_color','#8c67df'),(52,2,'menu3_icon','icon-user'),(53,2,'menu3_width','1'),(54,2,'menu4_title','最新教育资讯'),(55,2,'menu4_linkurl','?r=view&id=1&page=list&n_category_id=4'),(56,2,'menu4_color','#84d018'),(57,2,'menu4_icon','icon-list-ul'),(58,2,'menu4_width','2'),(59,2,'menu5_title','课程预约'),(60,2,'menu5_linkurl','?r=view&id=1&page=read&n_id=7'),(61,2,'menu5_color','#14c760'),(62,2,'menu5_icon','icon-pencil'),(63,2,'menu5_width','1'),(64,2,'menu6_title','我们的位置'),(65,2,'menu6_linkurl','?r=view&id=1&page=read&n_id=8'),(66,2,'menu6_color','#f3b613'),(67,2,'menu6_icon','icon-map-marker'),(68,2,'menu6_width','1'),(69,2,'menu7_title','联系我们'),(70,2,'menu7_linkurl','?r=view&id=1&page=read&n_id=6'),(71,2,'menu7_color','#ff8a4a'),(72,2,'menu7_icon','icon-phone'),(73,2,'menu7_width','1'),(74,2,'menu8_title',''),(75,2,'menu8_linkurl',''),(76,2,'menu8_color','#fc5366'),(77,2,'menu8_icon','icon-spinner'),(78,2,'menu8_width','1'),(79,1,'menu1_title','企业文化'),(80,1,'menu1_linkurl','?r=view&id=1&page=read&n_id=3'),(81,1,'menu1_color','#35aae7'),(82,1,'menu1_icon','icon-home'),(83,1,'menu1_width','2'),(84,1,'menu2_title','教学环境'),(85,1,'menu2_linkurl','?r=view&id=1&page=read&n_id=4'),(86,1,'menu2_color','#678ce1'),(87,1,'menu2_icon','icon-picture'),(88,1,'menu2_width','1'),(89,1,'menu3_title','优秀团队'),(90,1,'menu3_linkurl','?r=view&id=1&page=read&n_id=5'),(91,1,'menu3_color','#8c67df'),(92,1,'menu3_icon','icon-user'),(93,1,'menu3_width','1'),(94,1,'menu4_title','最新教育资讯'),(95,1,'menu4_linkurl','?r=view&id=1&page=list&n_category_id=4'),(96,1,'menu4_color','#84d018'),(97,1,'menu4_icon','icon-list-ul'),(98,1,'menu4_width','2'),(99,1,'menu5_title','课程预约'),(100,1,'menu5_linkurl','?r=view&id=1&page=read&n_id=7'),(101,1,'menu5_color','#14c760'),(102,1,'menu5_icon','icon-pencil'),(103,1,'menu5_width','1'),(104,1,'menu6_title','我们的位置'),(105,1,'menu6_linkurl','?r=view&id=1&page=read&n_id=8'),(106,1,'menu6_color','#f3b613'),(107,1,'menu6_icon','icon-map-marker'),(108,1,'menu6_width','1'),(109,1,'menu7_title','联系我们'),(110,1,'menu7_linkurl','?r=view&id=1&page=read&n_id=6'),(111,1,'menu7_color','#ff8a4a'),(112,1,'menu7_icon','icon-phone'),(113,1,'menu7_width','1'),(114,1,'menu8_title',''),(115,1,'menu8_linkurl',''),(116,1,'menu8_color','#fc5366'),(117,1,'menu8_icon','icon-spinner'),(118,1,'menu8_width','1'),(119,2,'copyright','伯克利精英教育'),(120,1,'copyright','伯克利精英教育'),(121,2,'logo_url','images/upload/bokeli0.jpg'),(122,1,'logo_url','images/upload/bokeli0.jpg'),(123,2,'phone','0451-87009162'),(124,1,'phone','0451-87009162');
/*!40000 ALTER TABLE `cms_shop_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_shop_menu`
--

DROP TABLE IF EXISTS `cms_shop_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_shop_menu` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_shop_id` int(11) NOT NULL,
  `sm_picurl` varchar(140) DEFAULT NULL,
  `sm_title` varchar(140) DEFAULT NULL,
  `sm_desc` varchar(300) DEFAULT NULL,
  `sm_linkurl` varchar(140) DEFAULT NULL,
  `sm_index` int(11) DEFAULT '0',
  `sm_group_id` varchar(45) DEFAULT '0',
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_shop_menu`
--

LOCK TABLES `cms_shop_menu` WRITE;
/*!40000 ALTER TABLE `cms_shop_menu` DISABLE KEYS */;
INSERT INTO `cms_shop_menu` VALUES (122,2,'images/upload/bokeli0.jpg','sdfs',NULL,NULL,1,'index_slide'),(123,2,'images/upload/bokeli1.jpg','',NULL,NULL,2,'index_slide'),(124,2,'images/upload/bokeli2.jpg','',NULL,NULL,3,'index_slide'),(125,2,'images/upload/bokeli3.jpg','',NULL,NULL,4,'index_slide'),(126,1,'images/upload/bokeli0.jpg','sdfs',NULL,NULL,1,'index_slide'),(127,1,'images/upload/bokeli1.jpg','',NULL,NULL,2,'index_slide'),(128,1,'images/upload/bokeli2.jpg','',NULL,NULL,3,'index_slide'),(129,1,'images/upload/bokeli3.jpg','',NULL,NULL,4,'index_slide');
/*!40000 ALTER TABLE `cms_shop_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_shop_static_content`
--

DROP TABLE IF EXISTS `cms_shop_static_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_shop_static_content` (
  `ssc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ssc_shop_id` int(11) NOT NULL,
  `ssc_name` varchar(80) DEFAULT NULL,
  `ssc_title` varchar(140) DEFAULT NULL,
  `ssc_contetn` text,
  PRIMARY KEY (`ssc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_shop_static_content`
--

LOCK TABLES `cms_shop_static_content` WRITE;
/*!40000 ALTER TABLE `cms_shop_static_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_shop_static_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_user`
--

DROP TABLE IF EXISTS `cms_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL,
  `u_shop_id` int(11) NOT NULL,
  `u_fake_shop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user`
--

LOCK TABLES `cms_user` WRITE;
/*!40000 ALTER TABLE `cms_user` DISABLE KEYS */;
INSERT INTO `cms_user` VALUES (1,'jerry','202cb962ac59075b964b07152d234b70',1,2);
/*!40000 ALTER TABLE `cms_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-28 11:48:42
