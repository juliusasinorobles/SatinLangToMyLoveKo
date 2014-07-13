/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.5.27 : Database - underdogidols
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`underdogidols` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `underdogidols`;

/*Table structure for table `cms_user` */

DROP TABLE IF EXISTS `cms_user`;

CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '0 = custom, 1 = admin',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_user` */

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `ipaddress` varchar(25) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contactus` */

insert  into `contactus`(`id`,`name`,`email`,`message`,`ipaddress`,`date_created`) values (1,'Julius Robles','juliusblue04@yahoo.com','kjasldkjflaksjflk','0','2014-05-10 12:42:58'),(2,'Julius Robles','juliusblue04@yahoo.com','kjasldkjflaksjflk','0','2014-05-10 12:43:02');

/*Table structure for table `contestant` */

DROP TABLE IF EXISTS `contestant`;

CREATE TABLE `contestant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthdate` varchar(25) DEFAULT NULL COMMENT 'mm-dd-yyyy',
  `about` varchar(250) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `pre_launch` tinyint(1) DEFAULT '1',
  `ipaddress` varchar(25) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `contestant` */

insert  into `contestant`(`id`,`full_name`,`password`,`email`,`gender`,`birthdate`,`about`,`picture`,`pre_launch`,`ipaddress`,`active`,`date_created`) values (1,'Julius Robles','password123','juliusblue04@yahoo.com','male','05-18-2014','Just think','uploads/profilepic/profile1image.jpg',1,NULL,1,NULL),(5,'julius','jjjjjjjj','jrobles@egg.ph1',NULL,NULL,NULL,NULL,1,NULL,1,NULL),(6,'julius robles','password','jrobles@egg.ph12',NULL,NULL,NULL,'uploads/profilepic/profile6image.jpg',1,'127.0.0.1',1,'2014-05-31 20:28:10'),(7,'julius robles','password','jrobles@egg.ph12',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:30:35'),(8,'julius robles','password','jrobles@egg.ph3',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:35:38'),(9,'julius robles','password','jrobles@egg.ph5',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:39:03'),(10,'julius robles','password','jrobles@egg.ph4',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:45:04'),(11,'julius robles','password','jrobles@egg.ph5',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:46:25'),(12,'julius robles','password','jrobles@egg.ph6',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:48:47'),(13,'julius robles','password','jrobles@egg.ph7',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:50:33'),(14,'julius robles','password','jrobles@egg.ph8',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 20:53:00'),(15,'julius robles','password','jrobles@egg.ph9',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 21:02:49'),(16,'julius robles','password','jrobles@egg.ph1',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 21:13:19'),(17,'julius robles','password','jrobles@egg.ph42',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 21:15:49'),(18,'julius robles','password','jrobles@egg.ph123',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 21:18:52'),(19,'julius robles','password','jrobles@egg.ph123',NULL,NULL,NULL,NULL,1,'127.0.0.1',1,'2014-05-31 21:20:28'),(20,'julius robles','password','jrobles@egg.ph','male','07-22-1993','Something about just make feel different','uploads/profilepic/profile20image.jpg',1,'127.0.0.1',1,'2014-05-31 21:22:05');

/*Table structure for table `faq` */

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `question` varchar(250) DEFAULT NULL,
  `ipaddress` varchar(25) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `active` tinyint(1) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `faq` */

insert  into `faq`(`id`,`name`,`email`,`question`,`ipaddress`,`status`,`active`,`date_created`) values (1,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 14:44:46'),(2,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 14:59:29'),(3,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 14:59:47'),(4,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 15:02:28'),(5,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 15:04:05'),(6,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending',1,'2014-05-04 15:04:52'),(7,'Julius Robles','juliusarobles@gmail.com','why is the world keep on spinning','127.0.0.1','pending',1,'2014-05-04 15:41:04'),(8,'Julius Robles','juliusarobles@gmail.com','test','0','pending',1,'2014-05-04 16:22:08'),(9,'Julius Robles','juliusarobles@gmail.com','test question','0','pending',1,'2014-05-10 11:55:47'),(10,'Julius Robles','juliusarobles@gmail.com','test question','0','pending',1,'2014-05-10 11:55:53'),(11,'Julius Robles','juliusarobles@gmail.com','test question','0','pending',1,'2014-05-10 11:57:54'),(12,'Julius Robles','juliusarobles@gmail.com','test question','0','pending',1,'2014-05-10 11:58:25'),(13,'Julius Robles','juliusarobles@gmail.com','test question','0','pending',1,'2014-05-10 11:59:06');

/*Table structure for table `faq_answer` */

DROP TABLE IF EXISTS `faq_answer`;

CREATE TABLE `faq_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_id` int(11) DEFAULT NULL,
  `cms_user_id` int(11) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `faq_answer` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `contestant_id` int(11) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `trans_id` varchar(100) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `refunded` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`id`,`video_id`,`contestant_id`,`invoice`,`trans_id`,`amount`,`refunded`,`active`,`date_created`) values (1,15,6,'UIVREG20140712055316c6v15','45S24048CN994503M','10',0,1,'2014-07-12 14:24:05'),(2,15,6,'UIVREG20140712055316c6v15','45S24048CN994503M','10',0,1,'2014-07-12 14:24:59');

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) DEFAULT NULL,
  `video_title` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `embeded_link` varchar(250) DEFAULT NULL,
  `thumbnail_link` varchar(250) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `review` varchar(15) DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `viewable` tinyint(1) DEFAULT '1',
  `active` tinyint(1) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `video` */

insert  into `video`(`id`,`contestant_id`,`video_title`,`link`,`embeded_link`,`thumbnail_link`,`genre`,`review`,`viewable`,`active`,`date_created`) values (1,1,NULL,'http://localhost/projects/underdogidols/profile#',NULL,NULL,'Rock','pending',1,0,'2014-05-25 16:04:08'),(2,0,NULL,NULL,NULL,NULL,'Rock','pending',1,0,'2014-05-31 20:50:33'),(3,0,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 20:53:00'),(4,15,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:02:49'),(5,16,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:13:19'),(6,17,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:15:49'),(7,18,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:18:52'),(8,19,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:20:28'),(9,20,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 21:22:05'),(10,20,NULL,'https://www.youtube.com/watch?v=iIj07LL57RA',NULL,NULL,'Rock','pending',1,0,'2014-05-31 22:48:42'),(11,6,NULL,'https://www.youtube.com/watch?v=a6mnQ14MPZU',NULL,NULL,'Rock','pending',1,0,'2014-07-06 21:33:25'),(12,6,NULL,'https://www.youtube.com/watch?v=3iuZmQpQ1Wc',NULL,NULL,'Rock','pending',1,0,'2014-07-06 22:22:04'),(13,6,NULL,'https://www.youtube.com/watch?v=EcsaMlu1mEs',NULL,NULL,'Rock','pending',1,0,'2014-07-12 11:09:22'),(14,20,'Magkabilang Mundo - Jerih Lim [Video Lyrics]','https://www.youtube.com/watch?v=TMQpzgDaRa0','https://www.youtube.com/v/TMQpzgDaRa0','https://img.youtube.com/vi/TMQpzgDaRa0/0.jpg','Rock','pending',1,1,'2014-07-12 11:48:01'),(15,20,'Avicii - Wake Me Up (Official Video)','https://www.youtube.com/watch?v=IcrbM1l_BoI','https://www.youtube.com/v/IcrbM1l_BoI','https://img.youtube.com/vi/IcrbM1l_BoI/0.jpg','Rock','pending',1,1,'2014-07-12 11:53:16');

/*Table structure for table `vote` */

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `contestant_id` int(11) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `vote` */

insert  into `vote`(`id`,`video_id`,`contestant_id`,`ip`,`date_created`) values (1,15,20,'127.0.0.1','0000-00-00 00:00:00'),(2,15,20,'127.0.0.1','2014-07-12 22:25:41'),(3,14,20,'127.0.0.1','2014-07-12 22:29:34');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
