--
-- Table structure for table `account`
--

DROP SCHEMA IF EXISTS `AdmissionsManagement`;
CREATE SCHEMA IF NOT EXISTS `AdmissionsManagement`;
USE `AdmissionsManagement`;

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`username`)
);

--
-- Dumping data for table `account`
--

INSERT INTO `account` VALUES ('Admin','21232f297a57a5a743894a0e4a801fc3','Trung Phạm','(465) 454-8347','admin',1),('nguyenhue','202cb962ac59075b964b07152d234b70','Nguyễn Huệ','+31 412 653','user',1);


--
-- Table structure for table `admissionsyear`
--

DROP TABLE IF EXISTS `admissionsyear`;
CREATE TABLE `admissionsyear` (
  `idAdmissionsYear` int NOT NULL AUTO_INCREMENT,
  `valueAdmissionsYear` int NOT NULL,
  PRIMARY KEY (`idAdmissionsYear`)
);

--
-- Dumping data for table `admissionsyear`
--

INSERT INTO `admissionsyear` VALUES (25568,2020),(64850,2021),(67407,2022);

--
-- Table structure for table `majors`
--

DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `idMajors` int NOT NULL AUTO_INCREMENT,
  `nameMajors` varchar(50) NOT NULL,
  `descriptionMajors` varchar(500) DEFAULT NULL,
  `enabled` int NOT NULL,
  PRIMARY KEY (`idMajors`)
);

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` VALUES (123,'Khoa học máy tính','Khoa học máy tính (tiếng Anh: Computer Science) là ngành nghiên cứu các cơ sở lý thuyết về thông tin và tính toán cùng sự thực hiện và ứng dụng của chúng trong các hệ thống máy tính. ',0),(216,'Luffy123123','A alias est voluptatum velit qui sint quia voluptas.',0),(424,'Kỹ thuật phần mềm','Ngành Kỹ thuật phần mềm đào tạo những kiến thức liên quan đến quy trình phát triển phần mềm một cách chuyên nghiệp nhằm tạo ra sản phẩm phần mềm đạt chất lượng cao, đáp ứng các nhu cầu nghiệp vụ cụ thể trong nền sản xuất của xã hội.',0),(454,'Công nghệ thông tin','Công nghệ thông tin là một ngành học được đào tạo để sử dụng máy tính và các phần mềm máy tính để phân phối và xử lý các dữ liệu thông tin, đồng thời dùng để trao đổi, lưu trữ và chuyển đổi các dữ liệu thông tin dưới nhiều hình thức khác nhau.',0),(2545,'Cơ khí','Kỹ thuật cơ khí là một ngành Khoa học kỹ thuật, ứng dụng các nguyên lý vật lý, kỹ thuật và khoa học vật liệu để thiết kế, phân tích, chế tạo và bảo dưỡng các loại máy móc và hệ thống cơ khí.',0),(7220204,'Ngôn ngữ Trung Quốc','Ngôn ngữ Trung Quốc là ngành học nghiên cứu và sử dụng ngôn ngữ Trung Quốc trên nhiều lĩnh vực khác nhau như kinh tế, thương mại, du lịch, ngoại giao.',1),(7480101,'Khoa học máy tính','Khoa học máy tính (tiếng Anh: Computer Science) là ngành nghiên cứu các cơ sở lý thuyết về thông tin và tính toán cùng sự thực hiện và ứng dụng của chúng trong các hệ thống máy tính.',1),(7480103,'Kỹ thuật phần mềm','Kỹ thuật phần mềm (tiếng Anh: software engineering) là sự áp dụng một cách tiếp cận có hệ thống, có kỷ luật, và định lượng được cho việc phát triển, sử dụng và bảo trì phần mềm.',1),(7480104,'Hệ thống thông tin','Hệ thống thông tin (tiếng Anh là Information System) là một hệ thống bao gồm các yếu tố có quan hệ với nhau cùng làm nhiệm vụ thu thập, xử lý, lưu trữ và phân phối thông tin và dữ liệu và cung cấp một cơ chế phản hồi để đạt được một mục tiêu định trước.',1),(7480201,'Công nghệ thông tin','Công nghệ thông tin, viết tắt CNTT, (tiếng Anh: Information technology hay là IT) là một nhánh ngành kỹ thuật sử dụng máy tính và phần mềm máy tính để chuyển đổi, lưu trữ, bảo vệ, xử lý, truyền tải và thu thập thông tin.',1),(7510201,'Công nghệ kỹ thuật cơ khí','Công nghệ kỹ thuật cơ khí là một ngành Khoa học kỹ thuật, ứng dụng các nguyên lý vật lý, kỹ thuật và khoa học vật liệu để thiết kế, phân tích, chế tạo và bảo dưỡng các loại máy móc và hệ thống cơ khí.',1),(7810101,'Du lịch','Du lịch là ngành đào tạo ra những sinh viên có năng lực làm việc ở các vị trí điều hành và quản lý điều hành trong lĩnh vực du lịch khách sạn nhà hàng trong nước và quốc tế.',1);


--
-- Table structure for table `admissionsmajor`
--

DROP TABLE IF EXISTS `admissionsmajor`;
CREATE TABLE `admissionsmajor` (
  `idAdmissionsYear` int NOT NULL,
  `idMajors` int NOT NULL,
  `numberOf` int NOT NULL COMMENT 'Chỉ tiêu',
  `groups` varchar(45) NOT NULL COMMENT 'tổ hợp xét tuyển',
  `condition` int NOT NULL COMMENT 'điểm điều kiện',
  PRIMARY KEY (`idAdmissionsYear`,`idMajors`),
  KEY fk_AdmissionsMajor_AdmissionsYear1_idx (`idAdmissionsYear`),
  KEY fk_AdmissionsMajor_Majors1_idx (`idMajors`),
  CONSTRAINT fk_AdmissionsMajor_AdmissionsYear1 FOREIGN KEY (`idAdmissionsYear`) REFERENCES `admissionsyear` (`idAdmissionsYear`),
  CONSTRAINT fk_AdmissionsMajor_Majors1 FOREIGN KEY (`idMajors`) REFERENCES `majors` (`idMajors`)
);

--
-- Dumping data for table `admissionsmajor`
--

INSERT INTO `admissionsmajor` VALUES (67407,7480101,114,'A00, A01',22),(67407,7480103,234,'A00, A01',22),(67407,7480201,369,'A00, A01',23);


--
-- Table structure for table `examresult`
--

DROP TABLE IF EXISTS `examresult`;
CREATE TABLE `examresult` (
  `idExamResult` int NOT NULL AUTO_INCREMENT,
  `nguVan` float DEFAULT NULL,
  `toan` float DEFAULT NULL,
  `ngoaiNgu` float DEFAULT NULL,
  `vatLy` float DEFAULT NULL,
  `hoaHoc` float DEFAULT NULL,
  `sinhHoc` float DEFAULT NULL,
  `lichSu` float DEFAULT NULL,
  `diaLy` float DEFAULT NULL,
  `gdcd` float DEFAULT NULL,
  `diemCong` float DEFAULT NULL,
  PRIMARY KEY (`idExamResult`)
);

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` VALUES (96560,5,7.8,6.2,7.2,7.2,5.5,4,7,9.5,0.75),(96561,4,9,9,8.5,6.5,4,10,10,10,1);


--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `idApplication` int NOT NULL AUTO_INCREMENT,
  `avatar` longtext,
  `name` varchar(50) NOT NULL,
  `gender` int NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `ethnic` varchar(20) NOT NULL COMMENT 'Dân tộc',
  `identification` varchar(45) NOT NULL COMMENT 'Số CMND',
  `expiration` date NOT NULL COMMENT 'Ngày hết hạn',
  `phoneNumber` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `idExamResult` int DEFAULT NULL,
  `idAdmissionsYear` int NOT NULL,
  `idMajors` int NOT NULL,
  PRIMARY KEY (`idApplication`),
  KEY fk_Application_ResultExam1_idx (`idExamResult`),
  KEY fk_Application_AdmissionsMajor1_idx (`idAdmissionsYear`,`idMajors`),
  CONSTRAINT fk_Application_AdmissionsMajor1 FOREIGN KEY (`idAdmissionsYear`, `idMajors`) REFERENCES `admissionsmajor` (`idAdmissionsYear`, `idMajors`),
  CONSTRAINT fk_Application_ResultExam1 FOREIGN KEY (`idExamResult`) REFERENCES `examresult` (`idExamResult`)
);

--
-- Dumping data for table `application`
--

INSERT INTO `application` VALUES (4014,'','Phạm Quang Trung',1,'2000-11-05','Kon Tum','Kinh','233201411','2025-04-04','0935425623','trungdeptrai@gmail.com','Tay Tuu Street, Tay Tuu Ward, Bac Tu Liem District, Ha Noi City',96560,67407,7480103),(4015,'','Nguyễn Huệ',0,'2000-05-11','New York','Kinh','223135912','2028-03-21','0321248541','huenguyen@gmail.com','Quy Nhơn, Bình Định',96561,67407,7480201);


-- Dump completed
