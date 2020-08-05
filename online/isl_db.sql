/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.0.51b-community-nt : Database - isl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`isl` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `isl`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`user`,`password`) values (1,'isladmin','12345');

/*Table structure for table `exam_venue` */

DROP TABLE IF EXISTS `exam_venue`;

CREATE TABLE `exam_venue` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `class` varchar(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `exam_venue` */

/*Table structure for table `payment_evidence` */

DROP TABLE IF EXISTS `payment_evidence`;

CREATE TABLE `payment_evidence` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(225) NOT NULL,
  `screenshot` varchar(225) NOT NULL,
  `refcode` varchar(225) NOT NULL,
  `bank` varchar(225) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `payee_acct_name` varchar(225) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `unique_code` varchar(7) NOT NULL,
  `code_use` enum('unused','used') NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payment_evidence` */

insert  into `payment_evidence`(`id`,`name`,`screenshot`,`refcode`,`bank`,`payment_date`,`amount`,`payee_acct_name`,`phone_number`,`unique_code`,`code_use`) values (1,'Jane Doe','','123456789','Gtbank','2020-01-18',5000,'Jane Doe','09086743521','','unused'),(2,'Young Henrys','','246897531','Gtbank','2020-01-18',5000,'Young Hentys','09087653425','2f669c','unused'),(3,'Ajanlekoko Emeka','','435g5g4','Gtbank','2020-01-09',2800,'Jane Doe','09086743521','bebfec','used'),(4,'Mary Adebayo','','25362738','Gtbank','2020-01-01',2800,'Adebayo Seun','09087653425','aa07cd','used');

/*Table structure for table `student_details` */

DROP TABLE IF EXISTS `student_details`;

CREATE TABLE `student_details` (
  `exam_no` int(5) NOT NULL auto_increment,
  `surname` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `age` int(2) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `present_school` varchar(50) NOT NULL,
  `last_class` varchar(50) NOT NULL,
  `present_class` varchar(50) NOT NULL,
  `next_class` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `postal_address` varchar(225) NOT NULL,
  `who_will_pay` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `full_address` varchar(225) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_address` varchar(225) NOT NULL,
  `father_phone` varchar(11) NOT NULL,
  `father_workplace` varchar(225) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_address` varchar(225) NOT NULL,
  `mother_phone` varchar(11) NOT NULL,
  `mother_workplace` varchar(225) NOT NULL,
  `staff_father` varchar(50) NOT NULL,
  `staff_father_no` varchar(50) NOT NULL,
  `staff_father_fac` varchar(100) NOT NULL,
  `staff_father_dept` varchar(100) NOT NULL,
  `staff_father_offNum` varchar(11) NOT NULL,
  `staff_mother` varchar(50) NOT NULL,
  `staff_mother_no` varchar(50) NOT NULL,
  `staff_mother_fac` varchar(100) NOT NULL,
  `staff_mother_dept` varchar(100) NOT NULL,
  `staff_mother_offNum` varchar(11) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `guardian_address` varchar(225) NOT NULL,
  `guardian_email` varchar(225) NOT NULL,
  `guardian_phone` varchar(11) NOT NULL,
  `guardian_workplace` varchar(225) NOT NULL,
  `relationship_with_g` varchar(50) NOT NULL,
  `attestation_name` varchar(50) NOT NULL,
  `attestation_date` date NOT NULL,
  `rkeys` varchar(11) NOT NULL,
  PRIMARY KEY  (`exam_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

/*Data for the table `student_details` */

insert  into `student_details`(`exam_no`,`surname`,`first_name`,`age`,`dob`,`nationality`,`gender`,`present_school`,`last_class`,`present_class`,`next_class`,`address`,`postal_address`,`who_will_pay`,`relationship`,`full_address`,`father_name`,`father_address`,`father_phone`,`father_workplace`,`mother_name`,`mother_address`,`mother_phone`,`mother_workplace`,`staff_father`,`staff_father_no`,`staff_father_fac`,`staff_father_dept`,`staff_father_offNum`,`staff_mother`,`staff_mother_no`,`staff_mother_fac`,`staff_mother_dept`,`staff_mother_offNum`,`guardian`,`guardian_address`,`guardian_email`,`guardian_phone`,`guardian_workplace`,`relationship_with_g`,`attestation_name`,`attestation_date`,`rkeys`) values (1000,'Doe','Jane',10,'2010-01-01','Nigeria','Male','Evaton','Basic 4','Basic 5','Basic 7','76 Wilford Street, Newtown, NSW','10001','Mr. Doe','Father','76 Wilford Street, Newtown, NSW','Mr. Doe','76 Wilford Street, Newtown, NSW','09098987654','Dangote Plc','Mrs. Doe','76 Wilford Street, Newtown, NSW','09087255525','Glo plc','Mr. Doe','000123','Faculty of Science','Cell Biology','RM111','','','','','','','','','','','','Mr. Doe','2020-01-18','12341g'),(1001,'Ajanlekoko','Emeka',12,'2008-01-01','Nigeria','Male','Evaton','Basic 4','Basic 5','Basic 7','148, Ibafo road, Mowe','10001','Mr. Ajanlekoko','Father','148, Ibafo road, Mowe','Mr. Ajanlekoko','148, Ibafo road, Mowe','09098987654','Dangote Plc','Mrs. Ajanlekoko','148, Ibafo road, Mowe','09087255525','Glo plc','','','','','','','','','','','','','','','','','Mr. Ajanlekoko','2020-01-08','22e3f4'),(1002,'Adebayo','Mary',10,'2010-01-01','Nigeria','Female','Evaton','Basic 4','Basic 5','Basic 7','123, Meiran road','10001','Mr. Adebayo','Father','123, Meiran road','Mr. Adebayo','123, Meiran road','09098987654','Dangote Plc','','','','','','','','','','','','','','','','','','','','','Mr. Adebayo','2020-01-18','8b0c29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
