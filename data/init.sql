CREATE DATABASE IF NOT EXISTS `db_studentprofile`;
USE `db_studentprofile`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `cls_id` int(11) NOT NULL,
  `cls_name` varchar(200) NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT '1' COMMENT '1: active, 2: deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`cls_id`, `cls_name`, `status_id`) VALUES
(1, 'Class 1', 1),
(2, 'Class 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mode`
--

CREATE TABLE `tbl_mode` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mode`
--

INSERT INTO `tbl_mode` (`id`, `description`) VALUES
(1, 'Add student.'),
(2, 'Edit student.'),
(3, 'View single student.'),
(4, 'View student list.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ic_num` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL COMMENT '1: male, 2: female, 3: other',
  `cls_id` int(11) NOT NULL COMMENT 'link tbl_class',
  `stu_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `father_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_ic` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_ic` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `eme_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eme_relationship` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eme_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT '1' COMMENT '1: active, 2: deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stu_id`, `stu_name`, `ic_num`, `phone_no`, `gender`, `cls_id`, `stu_image`, `father_name`, `father_ic`, `mother_name`, `mother_ic`, `eme_name`, `eme_relationship`, `eme_phone`, `status_id`) VALUES
(1, 'Ah Jib Goh', '780909081323', '111111111111111', 1, 1, 'media/images/student-1.jpg', 'Ah Jib Father', '580909081323', 'Ah Jib Mother', '580909081322', 'Ah Jib Brother', 'Brother', '888888888888888', 1),
(2, 'Shinnosuke Nohara', '000000000000', '000000000000000', 1, 1, 'media/images/student-2.jpg', 'Hiroshi Nohara', '000000000000', 'Misae Koyama', '000000000000', 'Shiro ', 'Pet dog', '000000000000000', 1),
(3, 'Lan Yang Yang', '001122334455', '000006954', 3, 1, 'media/images/student-3.jpg', 'Lan Papa', '000000000000', 'Lan Mama', '111111111111', 'Xi Yang Yang', 'Friend', '666', 1),
(4, 'Santa Claus', '121390124991', '1247326582567', 2, 2, 'media/images/student-4.png', 'Papa', '134189438818', 'Mama', '123981480189', 'GrandPa', 'Grandfather', '102413983191300', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`cls_id`);

--
-- Indexes for table `tbl_mode`
--
ALTER TABLE `tbl_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `cls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mode`
--
ALTER TABLE `tbl_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

