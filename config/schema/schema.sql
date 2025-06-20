CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Holiday_name` varchar(60) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `IR_PROCEDURES` varchar(70) DEFAULT NULL,
  `reg_date` date NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_date` (`reg_date`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `depts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `deptno` decimal(2,0) DEFAULT NULL,
  `dname` varchar(14) DEFAULT NULL,
  `loc` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deptno` (`deptno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `OnSchedule` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `dept_id` int DEFAULT NULL,
  `procedures_id` int DEFAULT NULL,
  `announcement_id` bigint DEFAULT NULL,
  `Office_extension` varchar(20) DEFAULT NULL,
  `Cell` varchar(20) DEFAULT NULL,
  `Pager` varchar(20) DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dept_id` (`dept_id`),
  KEY `procedures_id` (`procedures_id`),
  KEY `announcement_id` (`announcement_id`),
  KEY `admin_id` (`admin_id`),
  KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `doctor_procedures` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int DEFAULT NULL,
  `procedure_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `procedure_id` (`procedure_id`),
  KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `procedures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `procedure_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `procedure_name` (`procedure_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `procedures` (`id`, `procedure_name`) VALUES
(49, 'NJ_tub_insertion'),
(48, 'GJ_tube_insertion'),
(47, 'PICC_insertion'),
(46, 'Kenalog_Asp/Injection_Joints'),
(45, 'US_guided_Chest_tube'),
(44, 'CT_guided_Chest_tube'),
(43, 'CT_guided_Biopsy'),
(42, 'CT_guided_dge'),
(41, 'Us_Drainage'),
(40, 'Whitakers'),
(39, 'Lumbar_puncture'),
(38, 'PTC');

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '''1''=>Active, ''0''=>inacative',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `created` (`created`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`, `status`) VALUES
(2, 'Admin1', '$2y$10$A2HGr/xiFPfgqY30mEtuuO079oxGzCQeuLXG93I40qKS/e4TajtZi', '2017-04-14 00:00:00', '2022-11-30 05:30:00', '1'),
(3, 'Admin2', '$2y$10$GHzksVc5nzkNj8MBUbZ26uOFbc2DIJIiBfx0BJOFeeby59pLMD7T.', '2017-07-05 00:00:00', '2022-11-30 05:30:00', '1'),
(5, 'Admin11', '$2y$10$cwdJl83UpGnG4AzQTxNvn.Ss8Qsjog01pUEifWbAgUmcOifBZTaOW', '2024-10-28 08:38:13', '2024-10-28 08:38:13', '1');