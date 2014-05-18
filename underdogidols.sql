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
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `contestant` */

insert  into `contestant`(`id`,`full_name`,`password`,`email`,`gender`,`birthdate`,`about`,`picture`,`pre_launch`,`ipaddress`,`date_created`) values (1,'julius robles','password','juliusblue04@yahoo.com','male','07-22-1993','Somewhere over the rainbow, \r\nthere\'s a pot of gold...',NULL,1,NULL,NULL),(5,'julius','jjjjjjjj','jrobles@egg.ph',NULL,NULL,NULL,NULL,1,NULL,NULL);

/*Table structure for table `faq` */

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `question` varchar(250) DEFAULT NULL,
  `ipaddress` varchar(25) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `faq` */

insert  into `faq`(`id`,`name`,`email`,`question`,`ipaddress`,`status`,`date_created`) values (1,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 14:44:46'),(2,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 14:59:29'),(3,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 14:59:47'),(4,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 15:02:28'),(5,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 15:04:05'),(6,'julius robles','juliusblue04@yahoo.com','test question','127.0.0.1','pending','2014-05-04 15:04:52'),(7,'Julius Robles','juliusarobles@gmail.com','why is the world keep on spinning','127.0.0.1','pending','2014-05-04 15:41:04'),(8,'Julius Robles','juliusarobles@gmail.com','test','0','pending','2014-05-04 16:22:08'),(9,'Julius Robles','juliusarobles@gmail.com','test question','0','pending','2014-05-10 11:55:47'),(10,'Julius Robles','juliusarobles@gmail.com','test question','0','pending','2014-05-10 11:55:53'),(11,'Julius Robles','juliusarobles@gmail.com','test question','0','pending','2014-05-10 11:57:54'),(12,'Julius Robles','juliusarobles@gmail.com','test question','0','pending','2014-05-10 11:58:25'),(13,'Julius Robles','juliusarobles@gmail.com','test question','0','pending','2014-05-10 11:59:06');

/*Table structure for table `faq_answer` */

DROP TABLE IF EXISTS `faq_answer`;

CREATE TABLE `faq_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_id` int(11) DEFAULT NULL,
  `cms_user_id` int(11) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `faq_answer` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `contesttant_id` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `refunded` tinyint(1) DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `review` varchar(15) DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `viewable` tinyint(1) DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `video` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
