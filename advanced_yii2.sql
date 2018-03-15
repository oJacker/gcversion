/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : advanced_yii2

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-15 15:05:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', null);
INSERT INTO `auth_assignment` VALUES ('create-branch', '6', null);
INSERT INTO `auth_assignment` VALUES ('create-company', '6', null);

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '1', 'admin can create branches and create companies', null, null, null, null);
INSERT INTO `auth_item` VALUES ('create-branch', '1', 'allow a user to add a branch', null, null, null, null);
INSERT INTO `auth_item` VALUES ('create-company', '1', 'allow a user to create company', null, null, null, null);

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', 'create-branch');
INSERT INTO `auth_item_child` VALUES ('admin', 'create-company');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `branches`
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `companies_company_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_created_date` datetime DEFAULT NULL,
  `branch_status` enum('inactive','active') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES ('1', '1', 'main branch', 'some Branch address', '2017-06-10 09:06:29', 'inactive');
INSERT INTO `branches` VALUES ('2', '1', 'another branch', 'another branch address', '2017-06-12 03:06:55', 'active');
INSERT INTO `branches` VALUES ('3', '2', 'BBC Branch name', 'BBC branch address', '2017-06-12 07:06:23', 'inactive');
INSERT INTO `branches` VALUES ('4', '3', 'doingIteasy branch ', 'doingiteasy address', '2017-06-12 07:06:32', 'active');
INSERT INTO `branches` VALUES ('5', '3', 'test Ajax submit', 'submit address', '2017-06-14 09:06:35', 'active');
INSERT INTO `branches` VALUES ('6', '2', 'asdgasdg', 'adgasdf', '2017-06-14 09:06:33', 'active');
INSERT INTO `branches` VALUES ('7', '3', 'adsf', 'qeqwer', '2017-06-14 09:06:43', 'active');
INSERT INTO `branches` VALUES ('8', '2', 'sdad', 'asdgadg', '2017-06-15 01:06:25', 'active');
INSERT INTO `branches` VALUES ('9', '2', 'asdga', 'asdga', '2017-06-15 02:06:22', 'active');
INSERT INTO `branches` VALUES ('10', '2', 'sdgasd', 'asdgasd', '2017-06-15 02:06:42', 'active');
INSERT INTO `branches` VALUES ('11', '2', 'dasdg', 'ag', '2017-06-15 02:06:17', 'active');
INSERT INTO `branches` VALUES ('12', '3', 'some Branch name', 'some where address', '2017-06-15 02:06:45', 'inactive');
INSERT INTO `branches` VALUES ('13', '3', 'ad', 'asdgadg', '2017-06-15 10:06:04', 'inactive');

-- ----------------------------
-- Table structure for `companies`
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `company_start_date` date DEFAULT NULL,
  `company_created_date` datetime DEFAULT NULL,
  `company_status` enum('inactive','active') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', 'ABC', 'abc@gmail.com', 'some address', null, null, '2017-06-10 09:06:50', 'active');
INSERT INTO `companies` VALUES ('2', 'BBC', 'BBC@gmail.com', 'BBC some where address', null, null, '2017-06-12 07:06:45', 'active');
INSERT INTO `companies` VALUES ('3', 'DoingITeasy', 'do@sdf.com', 'asdfasdf', null, null, '2017-06-12 07:06:06', 'active');
INSERT INTO `companies` VALUES ('4', 'CCB', 'CCB@sina.com', 'ccb some address', null, '2017-06-07', '2017-06-07 00:00:00', 'active');

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for `demandes`
-- ----------------------------
DROP TABLE IF EXISTS `demandes`;
CREATE TABLE `demandes` (
  `demand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增',
  `demand_name` text NOT NULL COMMENT '需求',
  `demand_status` enum('Inactive','Production','QuasiProduction','Testing','Develop') NOT NULL DEFAULT 'Inactive' COMMENT '状态',
  `demand_leading` varchar(16) NOT NULL COMMENT '负责人',
  `demand_created_date` date NOT NULL COMMENT '创建日期',
  `demand_update_date` date NOT NULL COMMENT '更新日期',
  `demand_begin_date` date NOT NULL COMMENT '规划上线日期',
  `demand_end_date` date DEFAULT NULL COMMENT '实际上线日期',
  `demand_remarks` text COMMENT '备注',
  PRIMARY KEY (`demand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of demandes
-- ----------------------------
INSERT INTO `demandes` VALUES ('1', '1:关于新增提现失败处理功能的请求\r\n', 'Production', '何清强', '2017-06-20', '2017-06-20', '2017-06-22', null, 'sdasdfasd');
INSERT INTO `demandes` VALUES ('2', '1:媒介推广页面修改 ', 'QuasiProduction', '朱学峰', '2017-06-20', '2017-06-20', '2017-06-20', null, '');

-- ----------------------------
-- Table structure for `departments`
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `branches_branch_id` int(11) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `companies_company_id` int(11) DEFAULT NULL,
  `department_created_date` datetime DEFAULT NULL,
  `department_status` enum('inactive','active') DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', '1', 'IT Department', '1', '2017-06-10 09:06:11', 'active');
INSERT INTO `departments` VALUES ('3', '1', 'TEST Department', '1', '2017-06-12 05:06:31', 'active');

-- ----------------------------
-- Table structure for `emails`
-- ----------------------------
DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `branch_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emails
-- ----------------------------

-- ----------------------------
-- Table structure for `embranches`
-- ----------------------------
DROP TABLE IF EXISTS `embranches`;
CREATE TABLE `embranches` (
  `embranch_id` int(11) NOT NULL AUTO_INCREMENT,
  `demandes_demand_id` int(11) DEFAULT NULL,
  `enbranch_projectend` enum('Wap','Frontend','Admin','Api') NOT NULL,
  `embranch_version` varchar(32) NOT NULL,
  `embranch_developer` varchar(32) NOT NULL,
  `embranch_created_date` datetime DEFAULT NULL,
  `embranch_status` enum('inactive','active') NOT NULL DEFAULT 'active',
  `embranch_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`embranch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of embranches
-- ----------------------------
INSERT INTO `embranches` VALUES ('2', '2', 'Wap', 'wap2.83.1.170620_Bate', '冯志强', '2017-06-20 04:06:48', 'active', '');
INSERT INTO `embranches` VALUES ('5', '1', 'Admin', 'admin1.113.1.170620_bate', '刘世娟', null, 'inactive', '');

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('1', 'test event', 'some test description', '2017-06-15 00:00:00');
INSERT INTO `events` VALUES ('2', 'test taskes', 'some description', '2017-06-15 03:06:52');
INSERT INTO `events` VALUES ('3', 'do this on the 16th', 'here is how to do it ', '2017-06-06 00:00:00');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` enum('3','2','1','0') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------

-- ----------------------------
-- Table structure for `hashbodies`
-- ----------------------------
DROP TABLE IF EXISTS `hashbodies`;
CREATE TABLE `hashbodies` (
  `hashbody_id` varchar(50) NOT NULL COMMENT 'hash值',
  `hashbody_text` text COMMENT '内容',
  `hashbody_project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hashbody_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hashbodies
-- ----------------------------

-- ----------------------------
-- Table structure for `hashes`
-- ----------------------------
DROP TABLE IF EXISTS `hashes`;
CREATE TABLE `hashes` (
  `hash_id` varchar(50) NOT NULL COMMENT '版本hash值',
  `hash_source` varchar(64) DEFAULT NULL COMMENT 'hash 来源',
  `hash_source_branch` varchar(100) DEFAULT NULL COMMENT '来源分支',
  `hash_committer_name` varchar(32) DEFAULT NULL COMMENT '提交者姓名',
  `has_committer_email` varchar(32) DEFAULT NULL COMMENT '提交者邮箱',
  `has_committer_date` datetime DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`hash_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hashes
-- ----------------------------

-- ----------------------------
-- Table structure for `hashes_temp`
-- ----------------------------
DROP TABLE IF EXISTS `hashes_temp`;
CREATE TABLE `hashes_temp` (
  `hash_id` varchar(50) NOT NULL COMMENT '版本hash值',
  `hash_source` varchar(64) DEFAULT NULL COMMENT 'hash 来源',
  `hash_source_branch` varchar(100) DEFAULT NULL COMMENT '来源分支',
  `hash_committer_name` varchar(32) DEFAULT NULL COMMENT '提交者姓名',
  `has_committer_email` varchar(32) DEFAULT NULL COMMENT '提交者邮箱',
  `has_committer_date` datetime DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`hash_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hashes_temp
-- ----------------------------

-- ----------------------------
-- Table structure for `hashfiles`
-- ----------------------------
DROP TABLE IF EXISTS `hashfiles`;
CREATE TABLE `hashfiles` (
  `hashfile_id` int(11) NOT NULL AUTO_INCREMENT,
  `hashfile_oldhash` varchar(50) DEFAULT NULL COMMENT '老的hash值',
  `hashfile_newhash` varchar(50) DEFAULT NULL COMMENT '新的hash值',
  `hashfile_project_id` int(11) DEFAULT NULL,
  `hashfile_version` varchar(50) DEFAULT NULL COMMENT '版本号',
  `hashfile_usestatus` enum('history','unused','used') DEFAULT 'history',
  `hashfile_date` datetime DEFAULT NULL,
  PRIMARY KEY (`hashfile_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hashfiles
-- ----------------------------
INSERT INTO `hashfiles` VALUES ('1', 'f85fc5c34c93eef3027b1ef41343ba0fcb97e23e', '5a7e9bd5807ac9df9a281bccc5c437d7fcb24da2', '1', null, 'used', '2017-07-03 17:18:26');
INSERT INTO `hashfiles` VALUES ('3', '5a7e9bd5807ac9df9a281bccc5c437d7fcb24da2', '630bc084aa924ba13cc20d3cba84b7d39349b265', '1', null, 'used', '2017-07-03 20:38:39');
INSERT INTO `hashfiles` VALUES ('4', '630bc084aa924ba13cc20d3cba84b7d39349b265', '2dc5dd4591de45a695f4c5c684d7873b248579d3', '1', null, 'used', '2017-07-03 20:36:48');
INSERT INTO `hashfiles` VALUES ('7', '2dc5dd4591de45a695f4c5c684d7873b248579d3', '83f1633c557134bce5e93d07bf0dbf3267b078ce', '1', null, 'unused', '2017-07-06 19:00:31');

-- ----------------------------
-- Table structure for `locations`
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES ('1', '1111', 'colombo', 'Westem');
INSERT INTO `locations` VALUES ('2', '2222', 'Galle', 'Southerm');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) NOT NULL,
  `translation` text,
  PRIMARY KEY (`id`,`language`),
  KEY `idx_message_language` (`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1497082421');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1497082425');

-- ----------------------------
-- Table structure for `po`
-- ----------------------------
DROP TABLE IF EXISTS `po`;
CREATE TABLE `po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(12) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of po
-- ----------------------------
INSERT INTO `po` VALUES ('1', 'po-1', 'some Description');
INSERT INTO `po` VALUES ('2', 'po-1', 'some Description');
INSERT INTO `po` VALUES ('3', 'po-3', 'poitem-3 description');

-- ----------------------------
-- Table structure for `po_item`
-- ----------------------------
DROP TABLE IF EXISTS `po_item`;
CREATE TABLE `po_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_item_no` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `po_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `po_id` (`po_id`) USING BTREE,
  KEY `po_id_2` (`po_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of po_item
-- ----------------------------
INSERT INTO `po_item` VALUES ('1', 'po-item-1', '10', '2');
INSERT INTO `po_item` VALUES ('2', 'po-item-3', '20', '2');
INSERT INTO `po_item` VALUES ('3', 'po-item-3', '10', '3');
INSERT INTO `po_item` VALUES ('4', 'po-item-4', '12', '3');
INSERT INTO `po_item` VALUES ('5', 'po-item-5', '15', '3');

-- ----------------------------
-- Table structure for `projectes`
-- ----------------------------
DROP TABLE IF EXISTS `projectes`;
CREATE TABLE `projectes` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(50) NOT NULL,
  `project_path` varchar(200) NOT NULL,
  `project_status` enum('inactive','active') NOT NULL DEFAULT 'inactive',
  `project_date` datetime NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projectes
-- ----------------------------
INSERT INTO `projectes` VALUES ('1', 'APIM', 'D:\\wamp\\www\\ApiModule\\ApiM', 'active', '2017-07-03 17:17:45');

-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'User ID',
  `name` varchar(50) DEFAULT NULL COMMENT '项目名字',
  `level` int(11) DEFAULT NULL COMMENT '环境级别',
  `status` int(2) DEFAULT NULL COMMENT 'Status',
  `version` varchar(50) DEFAULT NULL COMMENT 'Version',
  `repo_url` varchar(100) DEFAULT NULL COMMENT 'git/svn地址',
  `repo_username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `repo_password` varchar(255) DEFAULT NULL COMMENT '密码',
  `repo_mode` varchar(200) DEFAULT NULL COMMENT '分支/tag',
  `repo_type` varchar(200) DEFAULT NULL,
  `deploy_from` varchar(200) DEFAULT NULL COMMENT '检出仓库',
  `excludes` text COMMENT '排除文件列表',
  `release_user` varchar(200) DEFAULT NULL COMMENT '目标机器部署代码用户',
  `release_to` varchar(100) DEFAULT NULL COMMENT '代码的webroot',
  `release_library` varchar(100) DEFAULT NULL COMMENT '发布版本库',
  `hosts` varchar(50) DEFAULT NULL COMMENT '目标机器',
  `pre_deploy` varchar(100) DEFAULT NULL COMMENT '宿主机代码检出前置任务',
  `post_deploy` varchar(100) DEFAULT NULL COMMENT '宿主机同步前置任务',
  `pre_release` varchar(100) DEFAULT NULL COMMENT '目标机更新版本前置任务',
  `post_release` varchar(100) DEFAULT NULL COMMENT '目标机更新版本后置任务',
  `post_release_delay` varchar(100) DEFAULT NULL COMMENT '后置任务时间间隔/延迟',
  `audit` int(11) DEFAULT NULL COMMENT '任务需要审核？',
  `ansible` int(11) DEFAULT NULL COMMENT '开启Ansible？',
  `keep_version_num` int(11) DEFAULT NULL COMMENT '线上版本保留数',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projects
-- ----------------------------

-- ----------------------------
-- Table structure for `records`
-- ----------------------------
DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `command` text,
  `duration` int(11) DEFAULT NULL,
  `memo` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of records
-- ----------------------------

-- ----------------------------
-- Table structure for `source_message`
-- ----------------------------
DROP TABLE IF EXISTS `source_message`;
CREATE TABLE `source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  KEY `idx_source_message_category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of source_message
-- ----------------------------

-- ----------------------------
-- Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `link_id` varchar(32) DEFAULT NULL,
  `ex_link_id` varchar(32) DEFAULT NULL,
  `commit_id` varchar(64) DEFAULT NULL,
  `created_at` int(10) DEFAULT NULL,
  `updated_at` int(10) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `file_list` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tasks
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', null, null, 'doingITeasy', 'b8tz5dm0FtOzrtKVPsDt7tHl2VZjCI5x', '$2y$13$f73990n0w7AS6yJXM2RHLe5gjBsXTfCa5Y02stxV4LUFivN3jN/R6', null, 'doingITeasy@gmail.com', '10', '1497082474', '1497082474');
INSERT INTO `user` VALUES ('2', 'ouyang', 'zhijie', 'kup', 'JZNzuvUYfyMqvbrafuNgRcJvtv33g-bQ', '$2y$13$WsNYelZyE1gG4UziSXop8OuwiFnLv1MX6C6B1IERkXLnywpOzvFpO', null, 'kup@gmail.com', '10', '1497082885', '1497082885');
INSERT INTO `user` VALUES ('3', 'somename', 'sonemname', 'same', 'rASAHYl_aADuDgm8OYEkntq_K2MdStIA', '$2y$13$r4KOCBpn0ig2JDci2j9c8uQxMbBHjVsBniKZ2QckqHniY2a55hSr2', null, 'same@gmail.com', '10', '1497406183', '1497406183');
INSERT INTO `user` VALUES ('4', 'some', 'some', 'sme', 'lik8Ar9-7XwLCUW_j1dGbGtGhyGmNhL9', '$2y$13$RRtWwH2VOXc4qTS7BnixfucLj5D5mngsrLmGm8vFajmDQkLOFC3eS', null, 'sme@gmail.com', '10', '1497406358', '1497406358');
INSERT INTO `user` VALUES ('5', 'john', 'john', 'john', 's9OWh-mrSxz4miQaWGTcVKG_z8SmptJr', '$2y$13$KsBw0MBG4Z5nJrgbHmHhvu/8oa1QfJ3MQGA3we.JKA7Ev5Zg3x1e6', null, 'john@gmial.comadmin', '10', '1497406638', '1497406638');
INSERT INTO `user` VALUES ('6', 'adfasd', 'asgasdf', 'asdga', 'VwDKAlyNQ3STnYqY2WlMy1L6z9uWTdmG', '$2y$13$NH5Ww0fABLiZmRtJFx3ij./jmujUoq.MQaz8LmswN..BtyED5nGXe', null, 'adg@din.com', '10', '1497406866', '1497406866');
