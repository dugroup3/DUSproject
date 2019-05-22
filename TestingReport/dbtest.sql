/*
 Navicat Premium Data Transfer

 Source Server         : aws_connection
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : dbtest.ce12oaotat2e.eu-west-2.rds.amazonaws.com:3306
 Source Schema         : dbtest

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : 65001

 Date: 22/05/2019 14:06:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Booking
-- ----------------------------
DROP TABLE IF EXISTS `Booking`;
CREATE TABLE `Booking` (
  `BookingID` int(11) NOT NULL AUTO_INCREMENT,
  `FacilityID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Starttime` datetime NOT NULL COMMENT 'When the booking begin',
  `Endtime` datetime NOT NULL COMMENT 'When the booking end',
  `Totalcost` double(11,2) NOT NULL COMMENT 'How much people need to pay',
  PRIMARY KEY (`BookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Booking
-- ----------------------------
BEGIN;
INSERT INTO `Booking` VALUES (15, 14, 1, '2019-05-09 16:00:00', '2019-05-09 17:00:00', 6.00);
INSERT INTO `Booking` VALUES (16, 16, 1, '2019-05-09 11:00:00', '2019-05-09 13:00:00', 20.00);
INSERT INTO `Booking` VALUES (17, 15, 1, '2019-05-09 07:00:00', '2019-05-09 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (35, 14, 1, '2019-05-10 04:00:00', '2019-05-10 06:00:00', 11.00);
INSERT INTO `Booking` VALUES (40, 16, 7, '2019-05-26 07:00:00', '2019-05-30 12:00:00', 0.00);
INSERT INTO `Booking` VALUES (42, 17, 1, '2019-05-14 09:00:00', '2019-05-14 11:00:00', 3.00);
INSERT INTO `Booking` VALUES (43, 16, 1, '2019-05-15 07:00:00', '2019-05-15 09:00:00', 20.00);
INSERT INTO `Booking` VALUES (44, 16, 7, '2019-06-02 07:00:00', '2019-06-05 17:00:00', 0.00);
INSERT INTO `Booking` VALUES (51, 16, 5, '2019-05-18 14:00:00', '2019-05-18 21:00:00', 70.00);
INSERT INTO `Booking` VALUES (56, 16, 1, '2019-05-25 07:00:00', '2019-05-25 09:00:00', 20.00);
INSERT INTO `Booking` VALUES (57, 14, 1, '2019-05-23 07:00:00', '2019-05-23 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (58, 16, 5, '2019-05-31 11:00:00', '2019-05-31 19:00:00', 80.00);
INSERT INTO `Booking` VALUES (64, 16, 1, '2019-05-17 07:00:00', '2019-05-17 08:00:00', 10.00);
INSERT INTO `Booking` VALUES (69, 17, 1, '2019-05-17 07:00:00', '2019-05-17 10:00:00', 9.00);
INSERT INTO `Booking` VALUES (97, 14, 1, '2019-05-20 07:00:00', '2019-05-20 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (98, 14, 1, '2019-05-19 07:00:00', '2019-05-19 09:00:00', 12.00);
INSERT INTO `Booking` VALUES (101, 14, 1, '2019-05-21 07:00:00', '2019-05-21 10:00:00', 18.00);
INSERT INTO `Booking` VALUES (103, 14, 1, '2019-05-20 11:00:00', '2019-05-20 15:00:00', 24.00);
INSERT INTO `Booking` VALUES (105, 16, 1, '2019-05-22 07:00:00', '2019-05-22 09:00:00', 20.00);
INSERT INTO `Booking` VALUES (106, 16, 7, '2019-05-19 07:00:00', '2019-05-19 09:00:00', 20.00);
INSERT INTO `Booking` VALUES (107, 16, 7, '2019-05-21 07:00:00', '2019-05-21 10:00:00', 30.00);
INSERT INTO `Booking` VALUES (108, 14, 1, '2019-05-27 07:00:00', '2019-05-27 09:00:00', 12.00);
INSERT INTO `Booking` VALUES (109, 15, 1, '2019-07-01 07:00:00', '2019-07-01 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (111, 16, 1, '2019-05-21 14:00:00', '2019-05-21 15:00:00', 10.00);
INSERT INTO `Booking` VALUES (112, 16, 1, '2019-05-17 08:00:00', '2019-05-17 08:00:00', 10.00);
INSERT INTO `Booking` VALUES (114, 15, 7, '2019-05-22 07:00:00', '2019-05-22 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (115, 15, 7, '2019-05-22 08:00:00', '2019-05-22 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (116, 14, 7, '2019-05-28 10:00:00', '2019-05-28 12:00:00', 12.00);
INSERT INTO `Booking` VALUES (117, 14, 7, '2019-05-30 07:00:00', '2019-05-30 09:00:00', 12.00);
INSERT INTO `Booking` VALUES (118, 14, 1, '2019-07-08 07:00:00', '2019-07-08 09:00:00', 12.00);
INSERT INTO `Booking` VALUES (131, 14, 1, '2019-07-09 07:00:00', '2019-07-09 09:00:00', 12.00);
INSERT INTO `Booking` VALUES (132, 14, 7, '2019-08-01 07:00:00', '2019-08-01 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (140, 14, 5, '2019-05-29 07:00:00', '2019-05-29 08:00:00', 4.80);
INSERT INTO `Booking` VALUES (142, 17, 7, '2019-05-18 07:00:00', '2019-05-18 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (144, 17, 7, '2019-05-22 12:00:00', '2019-05-22 16:00:00', 12.00);
INSERT INTO `Booking` VALUES (145, 15, 7, '2019-05-23 07:00:00', '2019-05-23 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (146, 17, 7, '2019-05-17 17:00:00', '2019-05-17 18:00:00', 3.00);
INSERT INTO `Booking` VALUES (147, 16, 7, '2019-08-01 08:00:00', '2019-08-01 10:00:00', 20.00);
INSERT INTO `Booking` VALUES (148, 17, 7, '2019-09-01 07:00:00', '2019-09-01 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (149, 17, 1, '2019-09-01 07:00:00', '2019-09-01 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (150, 15, 1, '2019-09-02 07:00:00', '2019-09-02 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (152, 14, 1, '2019-05-25 10:00:00', '2019-05-25 11:00:00', 6.00);
INSERT INTO `Booking` VALUES (159, 17, 1, '2019-05-30 07:00:00', '2019-05-30 12:00:00', 15.00);
INSERT INTO `Booking` VALUES (160, 17, 7, '2019-05-17 12:00:00', '2019-05-17 14:00:00', 6.00);
INSERT INTO `Booking` VALUES (162, 15, 7, '2019-05-19 13:00:00', '2019-05-19 14:00:00', 20.00);
INSERT INTO `Booking` VALUES (165, 17, 7, '2019-10-01 07:00:00', '2019-10-01 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (166, 17, 7, '2019-10-01 09:00:00', '2019-10-01 10:00:00', 3.00);
INSERT INTO `Booking` VALUES (167, 17, 7, '2019-05-23 09:00:00', '2019-05-23 10:00:00', 3.00);
INSERT INTO `Booking` VALUES (168, 14, 7, '2019-05-24 13:00:00', '2019-05-24 14:00:00', 6.00);
INSERT INTO `Booking` VALUES (170, 17, 5, '2019-05-22 07:00:00', '2019-05-22 08:00:00', 2.40);
INSERT INTO `Booking` VALUES (171, 16, 5, '2019-05-20 11:00:00', '2019-05-20 16:00:00', 40.00);
INSERT INTO `Booking` VALUES (186, 16, 7, '2019-11-01 00:00:00', '2019-11-15 12:00:00', 0.00);
INSERT INTO `Booking` VALUES (188, 17, 1, '2019-12-02 07:00:00', '2019-12-02 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (189, 16, 1, '2019-10-01 07:00:00', '2019-10-01 08:00:00', 10.00);
INSERT INTO `Booking` VALUES (190, 16, 1, '2019-11-18 07:00:00', '2019-11-18 08:00:00', 10.00);
INSERT INTO `Booking` VALUES (191, 17, 7, '2019-05-21 12:00:00', '2019-05-21 13:00:00', 3.00);
INSERT INTO `Booking` VALUES (192, 15, 7, '2019-05-20 11:00:00', '2019-05-20 13:00:00', 40.00);
INSERT INTO `Booking` VALUES (198, 15, 7, '2019-05-20 07:00:00', '2019-05-20 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (199, 15, 7, '2019-05-20 14:00:00', '2019-05-20 15:00:00', 20.00);
INSERT INTO `Booking` VALUES (201, 17, 7, '2019-12-02 08:00:00', '2019-12-02 09:00:00', 3.00);
INSERT INTO `Booking` VALUES (206, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (207, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (208, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (209, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (210, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (211, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (212, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (213, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (214, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (215, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (216, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (217, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (218, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (219, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (220, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (221, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (222, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (223, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (224, 17, 4, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (231, 17, 1, '2019-07-03 07:00:00', '2019-07-03 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (232, 17, 1, '2019-07-03 08:00:00', '2019-07-03 09:00:00', 3.00);
INSERT INTO `Booking` VALUES (233, 14, 5, '2019-05-26 07:00:00', '2019-05-26 08:00:00', 4.80);
INSERT INTO `Booking` VALUES (234, 14, 7, '2019-09-02 07:00:00', '2019-09-02 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (235, 14, 7, '2019-09-02 09:00:00', '2019-09-02 10:00:00', 6.00);
INSERT INTO `Booking` VALUES (236, 14, 5, '2019-05-26 08:00:00', '2019-05-26 09:00:00', 4.80);
INSERT INTO `Booking` VALUES (237, 14, 7, '2019-09-02 11:00:00', '2019-09-02 12:00:00', 6.00);
INSERT INTO `Booking` VALUES (238, 14, 5, '2019-05-24 12:00:00', '2019-05-24 13:00:00', 4.80);
INSERT INTO `Booking` VALUES (254, 14, 12, '2019-05-21 10:00:00', '2019-05-21 11:00:00', 4.80);
INSERT INTO `Booking` VALUES (255, 15, 12, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 16.00);
INSERT INTO `Booking` VALUES (256, 17, 12, '2019-05-23 07:00:00', '2019-05-23 08:00:00', 2.40);
INSERT INTO `Booking` VALUES (258, 15, 12, '2019-05-24 07:00:00', '2019-05-24 08:00:00', 16.00);
INSERT INTO `Booking` VALUES (260, 16, 9, '2019-05-21 11:00:00', '2019-05-21 12:00:00', 8.00);
INSERT INTO `Booking` VALUES (261, 14, 12, '2019-05-21 11:00:00', '2019-05-21 12:00:00', 4.80);
INSERT INTO `Booking` VALUES (262, 15, 12, '2019-05-21 13:00:00', '2019-05-21 18:00:00', 80.00);
INSERT INTO `Booking` VALUES (265, 14, 1, '2019-12-01 07:00:00', '2019-12-01 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (267, 16, 1, '2019-05-21 10:00:00', '2019-05-21 11:00:00', 10.00);
INSERT INTO `Booking` VALUES (273, 15, 1, '2019-05-22 10:00:00', '2019-05-22 11:00:00', 20.00);
INSERT INTO `Booking` VALUES (275, 17, 1, '2019-05-31 07:00:00', '2019-05-31 08:00:00', 3.00);
INSERT INTO `Booking` VALUES (277, 15, 1, '2019-05-09 07:00:00', '2019-05-09 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (278, 15, 1, '2019-05-09 07:00:00', '2019-05-09 08:00:00', 20.00);
INSERT INTO `Booking` VALUES (283, 16, 4, '2019-05-22 09:00:00', '2019-05-22 10:00:00', 8.00);
INSERT INTO `Booking` VALUES (284, 16, 4, '2019-05-25 07:00:00', '2019-05-25 09:00:00', 20.00);
INSERT INTO `Booking` VALUES (286, 14, 1, '2019-05-26 07:00:00', '2019-05-26 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (292, 14, 1, '2019-09-03 07:00:00', '2019-09-03 08:00:00', 6.00);
INSERT INTO `Booking` VALUES (293, 14, 21, '2019-05-22 07:00:00', '2019-05-22 08:00:00', 4.80);
COMMIT;

-- ----------------------------
-- Table structure for Event
-- ----------------------------
DROP TABLE IF EXISTS `Event`;
CREATE TABLE `Event` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `Eventname` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FacilityID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `EventStartTime` time NOT NULL,
  `EventEndTime` time NOT NULL,
  `DaysOfWeek` varchar(255) DEFAULT NULL COMMENT 'If it is null means all week',
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Event
-- ----------------------------
BEGIN;
INSERT INTO `Event` VALUES (2, 'Sport Exam', 7, 16, 40, '07:00:00', '17:00:00', '1,2,3,4,5');
INSERT INTO `Event` VALUES (4, 'Tennis Exam', 7, 16, 44, '07:00:00', '12:00:00', '1,2,3,4,5');
INSERT INTO `Event` VALUES (19, 'Tennis Course', 7, 16, 186, '07:00:00', '11:00:00', '1,2,4');
COMMIT;

-- ----------------------------
-- Table structure for Facility
-- ----------------------------
DROP TABLE IF EXISTS `Facility`;
CREATE TABLE `Facility` (
  `FacilityID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Opentime` time NOT NULL,
  `Closetime` time NOT NULL,
  `Description` text COMMENT 'The Information about the facility',
  `Capacity` int(11) NOT NULL COMMENT 'How many people can book this facility',
  `Picture` varchar(200) NOT NULL,
  `Prices` int(11) NOT NULL COMMENT 'How much the public people need to pay per hour',
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`FacilityID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Facility
-- ----------------------------
BEGIN;
INSERT INTO `Facility` VALUES (14, 'Squash Courts', '07:00:00', '22:00:00', 'Squash Courts: Â£6 per court, per hour.', 3, 'Squash-Courts.jpg', 6, 0);
INSERT INTO `Facility` VALUES (15, 'Aerobics Room', '07:00:00', '22:00:00', 'A mirrored studio is avaliable for group classes such as dance, yoga and pilates. This space can also be used for presentations and functions.', 3, 'Aerobics Room.jpeg', 20, 0);
INSERT INTO `Facility` VALUES (16, 'Tennis', '07:00:00', '22:00:00', 'Â£10.00 per court per hour', 2, 'EoL_TeamDurham_2631.jpg', 10, 0);
INSERT INTO `Facility` VALUES (17, 'Athletics track', '07:00:00', '22:00:00', 'Only 20 bookings per hour', 20, 'AthleticsTrack.jpg', 3, 0);
COMMIT;

-- ----------------------------
-- Table structure for User
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text NOT NULL COMMENT 'Username should be email address',
  `Password` text NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `Phone` text,
  `Role` text NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of User
-- ----------------------------
BEGIN;
INSERT INTO `User` VALUES (1, '604722853@qq.com', '$2y$10$kmhegzOzhFFPeoAyx.dMieyYHJJnkhT6kK4jL6JvnSGvsQ7iS9T.m', 'chiying', 'jiang', '7864554584', 'Admin');
INSERT INTO `User` VALUES (2, 'jiangchiying2017@qq.com', '$2y$10$Xvqws/H1U4x6uiQoTrd03OXzY760YVP9BW/IQ.GVlcsL2PbT/qP5.', 'chiying', 'jiang', '7864554585', 'Staff');
INSERT INTO `User` VALUES (3, '604722852@qq.com', '$2y$10$mF7gjzwZNKz3pogR3ZYjA.ABIzLo9GFOJLgpf8IC/bKLDLYnSzj7C', 'chiying', 'jiang', '7864554585', 'Public');
INSERT INTO `User` VALUES (4, 'test@163.com', '$2y$10$0npMySzT.iyV0jwtQmDT1ewEz4ZmsivAArd4il6d4TIaLCvMp2v4q', 'chiy', 'jia', '07864554', 'Student');
INSERT INTO `User` VALUES (5, 'btrzoe@163.com', '$2y$10$AQ.MtAH09FvGTO7Uy/Tp4OnSHWBn4irdAYTJMeIRgiFqNVkiKxA3S', 'T', 'Bian', '07422588161', 'Student');
INSERT INTO `User` VALUES (6, '649965979@qq.com', '$2y$10$mIqwTKEcPN9Qpbw7fpQyOOUey1Jbs2N5LGNLmSfP6ZEhaA3F5U8XO', 'llll', '1111lll', '1111111', 'Student');
INSERT INTO `User` VALUES (7, 'jiangchiying2017@163.com', '$2y$10$j7VGEQ2G/fv3Lhsix.LMBeYaQpzqsSqcBxodSskQm0yrAjhUQCFMe', 'chiying', 'jiang', '1866607504', 'Trainer');
INSERT INTO `User` VALUES (8, 'bob@gmail.com', '$2y$10$pCEAC8D6xBOoBsQGyOwayeE.jvTKxYE0HolkoVjb3H3ij9K0hKP/u', 'bob', 'bob', '12345678', 'Public');
INSERT INTO `User` VALUES (9, '870573759@qq.com', '$2y$10$vl0ZJZTaQx0V9MZfFlw0s.nVqWvIKZkIC6q/Nhz7JD0kYw3z41XSu', 'L', 'Y', '1234567', 'Student');
INSERT INTO `User` VALUES (10, '87057379@qq.com', '$2y$10$pv6VGNOidySy2kbqon6N4uN2b0ovZJEP34JplC8jjnVmuornfbia.', 'lin', 'yang', '', 'Student');
INSERT INTO `User` VALUES (11, '87057359@qq.com', '$2y$10$kxtHnzii.BCOJ4E8gFtm7.FL7AEv9..u960TxAObexXSF0u0bi8Ji', '12', '12', '12', 'Student');
INSERT INTO `User` VALUES (12, '411652310@qq.com', '$2y$10$VuVIAMQaSawb8hkvlD2IH.oXnVr3lEVUyt1EMjXdZED8u/xxU6biG', 'ZHANG', 'ZIXIN', '12345678', 'Student');
INSERT INTO `User` VALUES (13, '1234567@qq.com', '$2y$10$oNgxakMfB8mFvya4YNRvtuwt0qW53K6DjY/iufOTq7GFtlYo2vAEq', 'Lin', 'Yang', '1234567', 'Student');
INSERT INTO `User` VALUES (14, '727684949@qq.com', '$2y$10$gd6TD2mywFbXW82ZryIAfemNXKLitTOe.p1ebN32g0/UGHhBdOPJ2', 'xinyi', 'li', '12345678', 'Student');
INSERT INTO `User` VALUES (16, '444560263@qq.com', '$2y$10$yy85sm1A8mAD5KcOSiWQk.cYnQrLctQyxX/s8wJcq16uffYETRk/S', 'xiaohe', 'lu', '7864554569', 'Student');
INSERT INTO `User` VALUES (18, 'zixin.zhang@durham.ac.uk', '$2y$10$a9v6bsbsC7CddY1W3vBMr.VUwkOeaqiIfyE.mEHmpoUeCjraIDRr.', 'Zixin', 'Zhang', '12345678', 'Student');
INSERT INTO `User` VALUES (21, 'btrzoe1@163.com', '$2y$10$ArEjaqVNqE9UY4N4l50Zr.G1GXRI/T8uiPJG6jL6nR2szyhb3dydK', 'chiying', 'jiang', '7864554585', 'Student');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
