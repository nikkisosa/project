/*
Navicat MariaDB Data Transfer

Source Server         : server
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : sti_db_dev

Target Server Type    : MariaDB
Target Server Version : 100113
File Encoding         : 65001

Date: 2018-02-07 21:11:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `is_archive` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  KEY `FK_account` (`user_id`),
  KEY `section` (`section`),
  CONSTRAINT `FK_account` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `section` FOREIGN KEY (`section`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('1', '1', 'Rodrigo', 'D', 'Duterte', 'profile/default.png', null, '09777052366', 'false', 'email@gmail.com');
INSERT INTO `account` VALUES ('2', '2', 'K', 'K', 'Brosas', 'profile/default.png', null, '09956220315', 'false', null);
INSERT INTO `account` VALUES ('3', '3', 'T', 'T', 'Tado', 'profile/default.png', null, '09366978125', 'false', '');
INSERT INTO `account` VALUES ('4', '4', 'Sampl', 'Smple', 'smple', 'profile/16864452_1769738613343901_7253412407926162323_n.jpg', null, '09366978125', 'false', 'sample@gmail.com');
INSERT INTO `account` VALUES ('5', '5', 'Mama', 'm', 'Mam', 'profile/default.png', null, '09366978125', 'false', 'mam@gmail.com');

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `is_pending` varchar(10) DEFAULT NULL,
  `date_created` varchar(20) DEFAULT NULL,
  `disapproved` varchar(10) DEFAULT NULL,
  `priority` varchar(10) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `account_idsx` (`account_id`),
  CONSTRAINT `account_idsx` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announcement
-- ----------------------------
INSERT INTO `announcement` VALUES ('1', '1', 'Test1', 'helo test announcement', 'announcement/16864452_1769738613343901_7253412407926162323_n.jpg', 'true', 'false', 'Jan 30, 2018', 'notyet', 'yes', null);
INSERT INTO `announcement` VALUES ('2', '1', 'Test2', 'helo test announcement as', 'announcement/default.jpg', 'true', 'false', 'Jan 28, 2018', 'notyet', 'yes', null);
INSERT INTO `announcement` VALUES ('3', '1', 'Test1', 'helo test announcement', 'announcement/16864452_1769738613343901_7253412407926162323_n.jpg', 'false', 'false', 'Jan 29, 2018', 'yes', 'no', null);
INSERT INTO `announcement` VALUES ('4', '3', 'Test22', 'helo test announcement', 'announcement/default.jpg', 'false', 'false', 'Jan 30, 2018', 'yes', 'yes', null);
INSERT INTO `announcement` VALUES ('5', '3', 'Test Test ETs', 'asd dsd asd asdas ada sda d', 'announcement/default.jpg', 'false', 'false', 'Jan 30, 2018', 'yes', 'no', null);
INSERT INTO `announcement` VALUES ('6', '1', 'Test 123', 'Hahahah hahahaah hah hahaha hah a', 'announcement/', 'false', 'false', 'Jan 30, 2018', 'yes', 'no', '2018-02-07');
INSERT INTO `announcement` VALUES ('7', '3', 'test 12345', 'aha haha ha hha hah ahaa haha h hh h test nga lang e', 'announcement/', 'true', 'true', 'Jan 30, 2018', 'no', 'yes', null);
INSERT INTO `announcement` VALUES ('8', '1', 'Test po ito. kaya ok lang', 'Alright ahahahahahaha test po ito....', 'announcement/', 'false', 'false', 'Feb 04, 2018', 'yes', 'no', '2018-02-04');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Computer Programming', 'false');
INSERT INTO `category` VALUES ('2', 'Cooking', 'false');
INSERT INTO `category` VALUES ('3', 'Trouble Shooting', 'false');
INSERT INTO `category` VALUES ('12', '1', 'true');
INSERT INTO `category` VALUES ('13', 'HRM', 'false');
INSERT INTO `category` VALUES ('14', 'asdasdasdasdasdasdasdasdasdasdasdasdadasdasdadasdasdsadasdsad', 'true');
INSERT INTO `category` VALUES ('15', 'asdasdasdasdasdasdasdasdasdasdasdasdadasdasasdasdasdasdasdasdasdasdasdasdasdasdadasdasdadasdasdsadasdsaddadasdasdsadasdsad', 'true');
INSERT INTO `category` VALUES ('16', 'asd', 'false');
INSERT INTO `category` VALUES ('17', 'asdasd', 'false');
INSERT INTO `category` VALUES ('18', 'asdadsasd', 'false');
INSERT INTO `category` VALUES ('19', 'sdadasdasdasdadasdasdadasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdsadasdasdasd', 'true');
INSERT INTO `category` VALUES ('20', '12345678901234567890', 'false');
INSERT INTO `category` VALUES ('21', 'asdasdsadasdasdasdas', 'false');
INSERT INTO `category` VALUES ('22', 'asdasdasdasdasdasdas', 'false');
INSERT INTO `category` VALUES ('23', 'weqeqeqeqweqeweqw', 'false');

-- ----------------------------
-- Table structure for class_sched
-- ----------------------------
DROP TABLE IF EXISTS `class_sched`;
CREATE TABLE `class_sched` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  `time_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `fk_year_idx` (`year_id`),
  KEY `fk_time_idx` (`time_id`),
  CONSTRAINT `fk_time_idx` FOREIGN KEY (`time_id`) REFERENCES `time` (`time_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_year_idx` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class_sched
-- ----------------------------
INSERT INTO `class_sched` VALUES ('4', '3', 'Mapeh', 'false', '2');
INSERT INTO `class_sched` VALUES ('5', '3', 'Physical Education', 'false', '1');
INSERT INTO `class_sched` VALUES ('6', '3', 'English 1', 'false', '3');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) DEFAULT NULL,
  `commentator_id` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `date_commented` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `thread_id` (`thread_id`),
  KEY `account_idx` (`commentator_id`),
  CONSTRAINT `account_idx` FOREIGN KEY (`commentator_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `thread_id` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '1', 'ahhahhahaha', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('2', '1', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, accusamus adipisci rem voluptatem molestiae et obcaecati ipsa ab ullam debitis explicabo fugiat, sit, exercitationem sapiente. Corrupti delectus facilis error expedita?', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('3', '1', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, accusamus adipisci rem voluptatem molestiae et obcaecati ipsa ab ullam debitis explicabo fugiat, sit, exercitationem sapiente. Corrupti delectus facilis error expedita?', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('4', '1', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, accusamus adipisci rem voluptatem molestiae et obcaecati ipsa ab ullam debitis explicabo fugiat, sit, exercitationem sapiente. Corrupti delectus facilis error expedita?', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('5', '1', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, accusamus adipisci rem voluptatem molestiae et obcaecati ipsa ab ullam debitis explicabo fugiat, sit, exercitationem sapiente. Corrupti delectus facilis error expedita?', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('6', '1', '2', 'Ok OK', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('7', '1', '1', 'adasdasdsd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('8', '1', '1', 'asdasdasdasd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('9', '1', '1', 'aaaaa', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('10', '1', '1', 'ok ok ok', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('11', '1', '1', 'asdasdads', 'Jan 25, 2018');
INSERT INTO `comment` VALUES ('12', '1', '1', 'asdasd', 'Jan 25, 2018');
INSERT INTO `comment` VALUES ('13', '1', '1', 'dasdasd', 'Jan 25, 2018');
INSERT INTO `comment` VALUES ('14', '1', '1', 'a', 'Jan 25, 2018');
INSERT INTO `comment` VALUES ('15', '1', '1', 'asd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('16', '1', '1', 'asd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('17', '1', '1', 'a', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('18', '1', '1', 'we', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('19', '1', '1', 'we', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('20', '1', '1', 'wwwwww', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('21', '1', '1', 'sdsd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('22', '1', '1', 'sdsd', 'Jan 24, 2018');
INSERT INTO `comment` VALUES ('23', '3', '1', 'alright\r\nahaahah edi wow', 'Feb 07, 2018');

-- ----------------------------
-- Table structure for event
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `account_ids` (`account_id`),
  CONSTRAINT `account_ids` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of event
-- ----------------------------

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `files_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `allowed_user` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grade
-- ----------------------------

-- ----------------------------
-- Table structure for grade_details
-- ----------------------------
DROP TABLE IF EXISTS `grade_details`;
CREATE TABLE `grade_details` (
  `gdetails` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`gdetails`),
  KEY `grade_id` (`grade_id`),
  CONSTRAINT `grade_id` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grade_details
-- ----------------------------

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`notif_id`),
  KEY `type_idx` (`type_id`),
  CONSTRAINT `type_idx` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notification
-- ----------------------------
INSERT INTO `notification` VALUES ('1', 'Hello ', 'test', '1', 'true');
INSERT INTO `notification` VALUES ('2', 'test 2 test 2 test 2', 'test 213123', '1', null);
INSERT INTO `notification` VALUES ('3', 'asdadsasdasd', 'asdasdasdasd', '1', 'true');
INSERT INTO `notification` VALUES ('4', 'asdadsasdasd', '12323123123', '1', 'true');
INSERT INTO `notification` VALUES ('5', 'asdadsasdasd', '1111111111', '1', 'true');
INSERT INTO `notification` VALUES ('6', 'asdadsasdasd', '222222222222222222', '1', 'true');
INSERT INTO `notification` VALUES ('7', 'asdadsasdasd', '333333333333333333', '1', 'true');
INSERT INTO `notification` VALUES ('8', 'addadsddasdasdad', 'asdasdadasdadsd', '6', 'true');
INSERT INTO `notification` VALUES ('9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex', 'Test Message', '6', 'false');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin');
INSERT INTO `role` VALUES ('2', 'student');
INSERT INTO `role` VALUES ('3', 'teacher');
INSERT INTO `role` VALUES ('4', 'parent');

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`),
  KEY `year_id` (`year_id`),
  KEY `section` (`section`),
  CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', 'Sampaguita', 'false', '1');
INSERT INTO `section` VALUES ('2', 'Sampalok', 'false', '2');
INSERT INTO `section` VALUES ('4', 'Sunflower', 'false', '3');

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(20) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `session` (`session`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('1', '2017-2018', 'active');
INSERT INTO `session` VALUES ('2', '2018-2019', '');
INSERT INTO `session` VALUES ('3', '2019-2020', '');
INSERT INTO `session` VALUES ('4', '2020-2021', '');
INSERT INTO `session` VALUES ('5', '2021-2022', '');

-- ----------------------------
-- Table structure for sms
-- ----------------------------
DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `modem_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `modem_name` varchar(255) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`modem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sms
-- ----------------------------

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('2', 'History', 'false');
INSERT INTO `subject` VALUES ('3', 'Aralin Panlipunan', 'false');
INSERT INTO `subject` VALUES ('4', 'English 1', 'false');
INSERT INTO `subject` VALUES ('5', 'Mapeh', 'false');
INSERT INTO `subject` VALUES ('6', 'Physical Education', 'false');

-- ----------------------------
-- Table structure for subject_section
-- ----------------------------
DROP TABLE IF EXISTS `subject_section`;
CREATE TABLE `subject_section` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `section_fk_ids` (`section_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `section_fk_ids` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject_section
-- ----------------------------
INSERT INTO `subject_section` VALUES ('2', '1', '2', 'false');
INSERT INTO `subject_section` VALUES ('4', '2', '2', 'false');
INSERT INTO `subject_section` VALUES ('5', '4', '6', 'false');
INSERT INTO `subject_section` VALUES ('6', '4', '4', 'false');
INSERT INTO `subject_section` VALUES ('7', '4', '5', 'false');
INSERT INTO `subject_section` VALUES ('8', '4', '3', 'false');
INSERT INTO `subject_section` VALUES ('9', '4', '2', 'false');

-- ----------------------------
-- Table structure for thread
-- ----------------------------
DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_close` varchar(10) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `FK_thread` (`account_id`),
  KEY `FK_category` (`category_id`),
  CONSTRAINT `FK_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_thread` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of thread
-- ----------------------------
INSERT INTO `thread` VALUES ('1', '2', '1', 'Unable to save PHP MySql', 'di ko po alam kung ano mali sa code ko', null, 'true', 'Jan 22, 2018');
INSERT INTO `thread` VALUES ('2', '2', '1', 'No bootable device', 'Nung Inopen ko po ung laptop ko kagabi No Bootable Device na po ung nalabas. kahit nirestart ko na po. Help nyo po ako.', null, 'false', 'Jan 22, 2018');
INSERT INTO `thread` VALUES ('3', '1', '1', 'admin ako pero patulong ako dito', 'dsdadasdasd', null, 'false', 'Jan 25, 2018');
INSERT INTO `thread` VALUES ('4', '1', '2', 'admin ako pero patulong ako dito hahaahh', 'asdasdasdasdasdasdsadasdasdasdasdasdasd', null, 'false', 'Jan 25, 2018');
INSERT INTO `thread` VALUES ('8', '1', '20', 'aaaaassss', 'asdasdas', null, 'false', 'Jan 25, 2018');

-- ----------------------------
-- Table structure for time
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of time
-- ----------------------------
INSERT INTO `time` VALUES ('1', '6:00 am - 6:30 am', 'false');
INSERT INTO `time` VALUES ('2', '6:30 am - 7:00 am', 'false');
INSERT INTO `time` VALUES ('3', '7:30 am - 8:00 am', 'false');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'Emergencys', 'true');
INSERT INTO `type` VALUES ('5', 'Injuries', 'true');
INSERT INTO `type` VALUES ('6', 'Injury', 'false');
INSERT INTO `type` VALUES ('7', 'Hellos', 'false');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_users` (`role_id`),
  CONSTRAINT `FK_users` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', 'admin', '2018-01-06 12:27:45', 'login');
INSERT INTO `users` VALUES ('2', '2', 'student', 'student', '2018-01-06 13:59:15', 'logout');
INSERT INTO `users` VALUES ('3', '3', 'teacher', 'teacher', '2018-01-06 14:01:06', 'logout');
INSERT INTO `users` VALUES ('4', '3', 'fsa1234', 'fsa1234', null, 'logout');
INSERT INTO `users` VALUES ('5', '4', 'parent', 'parent', null, 'logout');

-- ----------------------------
-- Table structure for year
-- ----------------------------
DROP TABLE IF EXISTS `year`;
CREATE TABLE `year` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(50) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`year_id`),
  KEY `year_session_id_fk` (`session_id`),
  CONSTRAINT `year_session_id_fk` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of year
-- ----------------------------
INSERT INTO `year` VALUES ('1', 'Grade 1', '1', 'false');
INSERT INTO `year` VALUES ('2', 'Grade 2', '1', 'false');
INSERT INTO `year` VALUES ('3', 'Grade 3', '1', 'false');
