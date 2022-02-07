-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 04:18 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `clo`
--

CREATE TABLE `clo` (
  `subject_id` int(6) NOT NULL,
  `clo_id` int(2) NOT NULL,
  `clo_des` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo`
--

INSERT INTO `clo` (`subject_id`, `clo_id`, `clo_des`) VALUES
(111222, 1, 'aaaaaaaaaaaaaaaaa'),
(111222, 2, 'bbbbbbbbbbbbbb'),
(111222, 3, 'cccccccccc'),
(204111, 1, 'อธิบายเกี่ยวกับอัลกอริทึมและการแก้ปัญหาการทำงานของคอมพิวเตอร์ ตลอดทั้งแนวคิดของภาษาโปรแกรม'),
(204111, 2, 'ออกแบบและพัฒนาอัลกอริทึม และเขียนโปรแกรมขั้นต้นได้'),
(204217, 1, 'เพื่อให้นักศึกษามีความรู้ภาษาโปรแกรมคอมพิวเตอร์ที่นิยมใช้ในปัจจุบัน'),
(204217, 2, 'เพื่อให้นักศึกษามีพื้นฐานในการพัฒนาโปรแกรม'),
(204217, 3, 'เพื่อให้นักศึกษามีความคุ้นเคยในการเขียนโปรแกรมในภาษาระดับสูง');

-- --------------------------------------------------------

--
-- Table structure for table `clo_score`
--

CREATE TABLE `clo_score` (
  `subject_id` int(6) NOT NULL,
  `clo_id` int(2) NOT NULL,
  `type` varchar(20) NOT NULL,
  `percent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo_score`
--

INSERT INTO `clo_score` (`subject_id`, `clo_id`, `type`, `percent`) VALUES
(111222, 1, 'คะแนนเก็บ', 10),
(111222, 1, 'สอบกลางภาค', 5),
(111222, 1, 'โปรเจค', 60),
(204111, 1, 'คะแนนเก็บ', 15),
(204111, 1, 'สอบกลางภาค', 30),
(204111, 2, 'สอบปลายภาค', 50),
(204217, 2, 'Lab assignment', 20),
(204217, 2, 'สอบกลางภาค', 30),
(204217, 3, 'คะแนนฟรี', 100),
(204217, 3, 'สอบปลายภาค', 45);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `student_id` int(9) NOT NULL,
  `subject_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_plo`
--

CREATE TABLE `main_plo` (
  `plo_id` int(2) NOT NULL,
  `plo_des` varchar(1000) NOT NULL COMMENT 'Main PLO Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_plo`
--

INSERT INTO `main_plo` (`plo_id`, `plo_des`) VALUES
(1, 'บัณฑิตสามารถประยุกต์ความรู้ในเชิงลึกและแนวกว้างในศาสตร์ด้านวิทยาการคอมพิวเตอร์ โดยนําบูรณาการกับความก้าวหน้าทางเทคโนโลยีและความรู้พื้นฐานทางวิทยาศาสตร์ คณิตศาสตร์ และสถิติ รวมถึงศาสตร์สาขาต่าง ๆ เพื่อแก้ปัญหาหรือนําเสนอแนวทางแก้ปัญหาได้อย่างมีประสิทธิภาพและเหมาะสม'),
(2, 'บัณฑิตสามารถประยุกต์ความรู้ ทักษะ และเครื่องมือที่เหมาะสมกับการแก้ไขปัญหาทางคอมพิวเตอร์ด้วยกระบวนการทางวิทยาศาสตร์อย่างเป็นระบบ'),
(3, 'บัณฑิตมีแนวคิดพื้นฐานของการผลิตนวัตกรรมด้านคอมพิวเตอร์ รวมทั้งแสดงออกถึงความเป็นผู้มีความคิดริเริ่มสร้างสรรค์และถ่ายทอดคุณค่าของผลงานได้อย่างเหมาะสมภายใต้หลักการ แนวคิด ทฤษฎี ความก้าวหน้าทางวิชาการและเทคโนโลยี'),
(4, 'บัณฑิตสามารถสื่อสารกับบุคคลที่เกี่ยวข้องในทุกระดับได้อย่างดี รวมทั้งสามารถทํางานเป็นทีมและการประสานงานกับผู้อื่นได้'),
(5, 'บัณฑิตสามารถแสวงหาความรู้ด้วยตนเองและมีคุณลักษณะของการเป็นผู้ที่สามารถเรียนรู้ได้ด้วยตนเองตลอดชีวิต'),
(6, 'บัณฑิตแสดงพฤติกรรมความเป็นผู้มีจรรยาบรรณทางวิชาชีพ มีวินัย ตรงต่อเวลา รวมทั้งมีความรับผิดชอบต่อตนเองและสังคม รวมทั้งตระหนักถึงคุณค่าการเป็นพลเมืองที่ดีต่อสังคม'),
(7, 'Test เห็นใน DB ลบด้วย +++ updated +2'),
(8, 'Test ++5');

-- --------------------------------------------------------

--
-- Table structure for table `matching`
--

CREATE TABLE `matching` (
  `clo_id` int(2) NOT NULL,
  `subject_id` int(6) NOT NULL,
  `main_plo` int(2) NOT NULL,
  `sub_plo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matching`
--

INSERT INTO `matching` (`clo_id`, `subject_id`, `main_plo`, `sub_plo`) VALUES
(1, 111222, 2, 1),
(1, 204217, 4, 2),
(2, 111222, 4, 1),
(2, 204217, 2, 2),
(3, 111222, 1, 1),
(3, 204217, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prequisite`
--

CREATE TABLE `prequisite` (
  `subject_id` int(6) NOT NULL,
  `pre_condition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prequisite`
--

INSERT INTO `prequisite` (`subject_id`, `pre_condition`) VALUES
(111222, '204100'),
(111222, '204111,20100'),
(204217, '204100,204103,204113'),
(204217, '204111'),
(204251, '204111,204100'),
(204251, '204113');

-- --------------------------------------------------------

--
-- Table structure for table `sscore`
--

CREATE TABLE `sscore` (
  `student_id` int(9) NOT NULL,
  `type` varchar(20) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sscore`
--

INSERT INTO `sscore` (`student_id`, `type`, `score`) VALUES
(620510590, 'คะแนนเข้าชั้นเรียน', 20),
(620510595, 'สอบกลางภาค', 100),
(620510601, 'สอบปลายภาค', 0),
(620510614, 'คะแนนเก็บ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`) VALUES
(620510590),
(620510595),
(620510601),
(620510614);

-- --------------------------------------------------------

--
-- Table structure for table `st_score_cal`
--

CREATE TABLE `st_score_cal` (
  `student_id` int(9) NOT NULL,
  `subject_id` int(6) NOT NULL,
  `clo_id` int(2) NOT NULL,
  `type` varchar(20) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(6) NOT NULL,
  `t_name` char(100) NOT NULL,
  `e_name` char(100) NOT NULL,
  `t_detail` varchar(1000) NOT NULL,
  `e_detail` varchar(1000) NOT NULL,
  `course_outline` varchar(1000) NOT NULL,
  `type` char(20) NOT NULL,
  `credits` int(2) NOT NULL,
  `lec_credits` int(2) NOT NULL,
  `lab_credits` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `t_name`, `e_name`, `t_detail`, `e_detail`, `course_outline`, `type`, `credits`, `lec_credits`, `lab_credits`) VALUES
(111222, 'bbbba', 'dsadsad', 'dsadsad', 'dsad', 'dsadsdadsad', 'ddsadas', 3, 3, 0),
(204111, 'การเขียนโปรแกรมเบื้องต้น', 'Fundamentals of Programming', 'บทนำสู่ระบบฐานข้อมูล แนวคิดระบบฐานข้อมูลและสถาปัตยกรรม แบบจำลองข้อมูลโดยใช้แบบจำลองข้อมูลเชิงสัมพันธ์ ฐานข้อมูลเชิงสัมพันธ์ ฐานข้อมูลเชิงวัตถุ ฐานข้อมูลโนเอสคิวแอล ฐานข้อมูลเอ็กซ์เอ็มแอล', 'Introduction to database system, database system concepts and architectures, data modeling using relational data model, relational database, object-oriented database, NoSQL database, and XML database.', '- Intro to Computer Science\r\n- History of Computing\r\n- Computational Thinking\r\n- Visual Programming\r\n- Math for CS: Numbers\r\n- Programming with Python\r\n- Types, Literals, Variables, Operators, and Expressions\r\n- Problem Solving Processes\r\n- Functions Part I\r\n- Functions Part II\r\n- Input/ output Redirection\r\n- Math for CS: Boolean Algebra	\r\n- Conditionals Part I\r\n- Case Study: Min, Max and More\r\n- Conditionals Part II\r\n- Syntax, Semantic, Testing and Debugging	\r\n- Boolean Algebra and Logic Gates\r\n- Python Style Guide', 'lec&lab', 3, 2, 1),
(204217, 'ภาษาโปรแกรมคอมพิวเตอร์', 'Computer Programming Languages', 'กระบวนวิชานี้ต้องการแนะนำภาษาโปรแกรมคอมพิวเตอร์ที่เป็นที่นิยมในปัจจุบัน เนื้อหาประกอบด้วยแนวคิดพื้นฐานเกี่ยวกับภาษาโปรแกรม การใช้โปรแกรมระบบและโปรแกรมอรรถประโยชน์ องค์ประกอบพื้นฐานของภาษาโปรแกรม คำสั่ง โปรแกรมย่อย แฟ้มข้อมูล และการประยุกต์', 'This course would like to introduce a computer programming language that is popular today. The content includes basic concepts about programming languages. Using system programs and utilities Basic elements of programming languages, commands, subprograms, data files and applications.', 'Flowcharts\r\nGetting Started\r\nTypes, Literals, Variables, Operators, and Expressions\r\nConditionals and Iteration\r\nErrors and Exceptions\r\nFunctions\r\nStrings\r\nLists and Tuples I	\r\nList and Tuples II	\r\nSorting and Searching	\r\nSets and Dictionaries	\r\nFiles I/O', 'lec&lab', 3, 2, 1),
(204251, 'โครงสร้างข้อมูล', 'Data Structures', 'การแก้ปัญหาและแนวคิดเชิงนามธรรม ลิสต์เชิงเส้น กองซ้อน คิว คิวแบบมีลำดับความสำคัญ เซต การส่งและแฮชชิง การเรียงลำดับ ต้นไม้ และกราฟ', 'Problem solving and concept of abstraction, linear lists, stacks, queues, priority queues, sets, maps and hashing, sorting, trees, and graphs.', 'Linear Linked List\r\nDoubly Linked List\r\nApplication of Linked List\r\nStack\r\npostfix\r\nQueue\r\nSearch and Sort\r\nPriority Queue\r\nTree Traversal\r\nBinary Search Tree\r\nGraph', 'lecture', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_plo`
--

CREATE TABLE `sub_plo` (
  `main_plo_id` int(2) NOT NULL,
  `sub_plo_id` int(2) NOT NULL,
  `sub_plo_des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_plo`
--

INSERT INTO `sub_plo` (`main_plo_id`, `sub_plo_id`, `sub_plo_des`) VALUES
(1, 1, 'สามารถอธิบายหลักการ แนวคิด และทฤษฎีที่สําคัญในเนื้อหาวิชาของสาขาวิชาวิทยาการคอมพิวเตอร์ได้'),
(2, 1, 'สามารถรวบรวม ศึกษา วิเคราะห์ และสรุปประเด็นปัญหาและควมต้องการได้อย่างมีวิจารณญาณ'),
(2, 2, 'สามารถออกแบบงานด้านคอมพิวเตอร์เพื่อตอบสนองความต้องการภายใต้ข้อจํากัดในสถานการณ์ต่าง ๆ ได้ รวมทั้งเลือกใช้เครื่องมือที่เหมาะสมเพื่อแก้ปัญหาได้อย่างเป็นระบบ'),
(4, 1, 'สามารถนําเสนอผลงานแบบปากเปล่าโดยใช้ภาษาไทยได้ในระดับดี และภาษาอังกฤษได้ รวมทั้งสามารถเลือกใช้สื่อสําหรับการนําเสนอได้อย่างเหมาะสมและมีประสิทธิภาพ'),
(4, 2, 'สามารถเขียนบทความสั้น รายงาน หรือเอกสารทางวิชาโดยใช้ภาษาไทยได้ในระดับดี และภาษาอังกฤษได้'),
(4, 3, 'สามารถทํางานเป็นทีมและประสานงานกับผู้ร่วมงานได้ บัณฑิตเคารพสิทธิ คุณค่าและศักดิ์ศรีของความเป็นมนุษย์ และรับฟังความคิดเห็นของผู้อื่น'),
(5, 1, 'ทดสอบ เห็นแล้วสามารถลบได้'),
(7, 1, ' เทสๆ แก้ไขแล้ว +1'),
(8, 1, 'tttttt++88');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('admin', '123456', 0),
('user', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clo`
--
ALTER TABLE `clo`
  ADD PRIMARY KEY (`subject_id`,`clo_id`),
  ADD KEY `subj_fk` (`subject_id`);

--
-- Indexes for table `clo_score`
--
ALTER TABLE `clo_score`
  ADD PRIMARY KEY (`subject_id`,`clo_id`,`type`),
  ADD KEY `clo_fk` (`subject_id`,`clo_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`student_id`,`subject_id`),
  ADD KEY `subj_enfk` (`subject_id`);

--
-- Indexes for table `main_plo`
--
ALTER TABLE `main_plo`
  ADD PRIMARY KEY (`plo_id`);

--
-- Indexes for table `matching`
--
ALTER TABLE `matching`
  ADD PRIMARY KEY (`clo_id`,`subject_id`,`main_plo`,`sub_plo`),
  ADD KEY `clo_mtfk` (`subject_id`,`clo_id`),
  ADD KEY `matching_ibfk_1` (`sub_plo`,`main_plo`);

--
-- Indexes for table `prequisite`
--
ALTER TABLE `prequisite`
  ADD PRIMARY KEY (`subject_id`,`pre_condition`);

--
-- Indexes for table `sscore`
--
ALTER TABLE `sscore`
  ADD PRIMARY KEY (`student_id`,`type`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `st_score_cal`
--
ALTER TABLE `st_score_cal`
  ADD PRIMARY KEY (`student_id`,`subject_id`,`clo_id`,`type`),
  ADD KEY `st_calfk` (`subject_id`,`clo_id`,`type`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `sub_plo`
--
ALTER TABLE `sub_plo`
  ADD PRIMARY KEY (`main_plo_id`,`sub_plo_id`),
  ADD KEY `sub_plo_id` (`sub_plo_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clo`
--
ALTER TABLE `clo`
  ADD CONSTRAINT `subj_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `clo_score`
--
ALTER TABLE `clo_score`
  ADD CONSTRAINT `clo_fk` FOREIGN KEY (`subject_id`,`clo_id`) REFERENCES `clo` (`subject_id`, `clo_id`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `subj_enfk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `matching`
--
ALTER TABLE `matching`
  ADD CONSTRAINT `clo_mtfk` FOREIGN KEY (`subject_id`,`clo_id`) REFERENCES `clo` (`subject_id`, `clo_id`),
  ADD CONSTRAINT `matching_ibfk_1` FOREIGN KEY (`sub_plo`,`main_plo`) REFERENCES `sub_plo` (`sub_plo_id`, `main_plo_id`);

--
-- Constraints for table `prequisite`
--
ALTER TABLE `prequisite`
  ADD CONSTRAINT `pre_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `sscore`
--
ALTER TABLE `sscore`
  ADD CONSTRAINT `sscore_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `st_score_cal`
--
ALTER TABLE `st_score_cal`
  ADD CONSTRAINT `st_calfk` FOREIGN KEY (`subject_id`,`clo_id`) REFERENCES `clo_score` (`subject_id`, `clo_id`),
  ADD CONSTRAINT `st_calfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `sub_plo`
--
ALTER TABLE `sub_plo`
  ADD CONSTRAINT `sub_plo_ibfk_1` FOREIGN KEY (`main_plo_id`) REFERENCES `main_plo` (`plo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
