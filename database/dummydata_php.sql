
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE AdmissionsManagement;

--
-- Drop table `Account`
--
DROP TABLE IF EXISTS Account;

--
-- Drop table `Application`
--
DROP TABLE IF EXISTS Application;

--
-- Drop table `ResultExam`
--
DROP TABLE IF EXISTS ResultExam;

--
-- Drop table `AdmissionsMajor`
--
DROP TABLE IF EXISTS AdmissionsMajor;

--
-- Drop table `AdmissionsYear`
--
DROP TABLE IF EXISTS AdmissionsYear;

--
-- Drop table `Majors`
--
DROP TABLE IF EXISTS Majors;

--
-- Set default database
--
USE AdmissionsManagement;

--
-- Create table `Majors`
--
CREATE TABLE Majors (
  idMajors char(10) NOT NULL,
  nameMajors varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  descriptionMajors varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  enabled int(11) NOT NULL,
  PRIMARY KEY (idMajors)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 546,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `AdmissionsYear`
--
CREATE TABLE AdmissionsYear (
  idAdmissionsYear char(10) NOT NULL,
  valueAdmissionsYear int(11) NOT NULL,
  PRIMARY KEY (idAdmissionsYear)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `AdmissionsMajor`
--
CREATE TABLE AdmissionsMajor (
  idAdmissionsYear char(10) NOT NULL,
  idMajors char(10) NOT NULL,
  numberOf int(11) NOT NULL COMMENT 'Chỉ tiêu',
  `groups` varchar(45) NOT NULL COMMENT 'tổ hợp xét tuyển',
  `condition` int(11) NOT NULL COMMENT 'điểm điều kiện',
  PRIMARY KEY (idAdmissionsYear, idMajors)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 327,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create index `fk_AdmissionsMajor_AdmissionsYear1_idx` on table `AdmissionsMajor`
--
ALTER TABLE AdmissionsMajor
ADD INDEX fk_AdmissionsMajor_AdmissionsYear1_idx (idAdmissionsYear);

--
-- Create index `fk_AdmissionsMajor_Majors1_idx` on table `AdmissionsMajor`
--
ALTER TABLE AdmissionsMajor
ADD INDEX fk_AdmissionsMajor_Majors1_idx (idMajors);

--
-- Create foreign key
--
ALTER TABLE AdmissionsMajor
ADD CONSTRAINT fk_AdmissionsMajor_AdmissionsYear1 FOREIGN KEY (idAdmissionsYear)
REFERENCES AdmissionsYear (idAdmissionsYear) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE AdmissionsMajor
ADD CONSTRAINT fk_AdmissionsMajor_Majors1 FOREIGN KEY (idMajors)
REFERENCES Majors (idMajors) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `ResultExam`
--
CREATE TABLE ResultExam (
  idResultExam char(10) NOT NULL,
  nguVan float DEFAULT NULL,
  toan float DEFAULT NULL,
  ngoaiNgu float DEFAULT NULL,
  vatLy float DEFAULT NULL,
  hoaHoc float DEFAULT NULL,
  sinhHoc float DEFAULT NULL,
  lichSu float DEFAULT NULL,
  diaLy float DEFAULT NULL,
  gdcd float DEFAULT NULL,
  diemCong float DEFAULT NULL,
  PRIMARY KEY (idResultExam)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 327,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `Application`
--
CREATE TABLE Application (
  idApplication char(10) NOT NULL,
  avatar longtext DEFAULT NULL,
  name varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  gender int(11) NOT NULL,
  birthday date NOT NULL,
  birthplace varchar(100) NOT NULL,
  ethnic varchar(20) NOT NULL COMMENT 'Dân tộc',
  Identification varchar(45) NOT NULL COMMENT 'Số CMND',
  expiration date NOT NULL COMMENT 'Ngày hết hạn',
  phoneNumber varchar(45) NOT NULL,
  email varchar(45) DEFAULT NULL,
  address varchar(100) NOT NULL,
  idResultExam char(10) NOT NULL,
  idAdmissionsYear char(10) NOT NULL,
  idMajors char(10) NOT NULL,
  PRIMARY KEY (idApplication)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 327,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create index `fk_Application_ResultExam1_idx` on table `Application`
--
ALTER TABLE Application
ADD INDEX fk_Application_ResultExam1_idx (idResultExam);

--
-- Create index `fk_Application_AdmissionsMajor1_idx` on table `Application`
--
ALTER TABLE Application
ADD INDEX fk_Application_AdmissionsMajor1_idx (idAdmissionsYear, idMajors);

--
-- Create foreign key
--
ALTER TABLE Application
ADD CONSTRAINT fk_Application_AdmissionsMajor1 FOREIGN KEY (idAdmissionsYear, idMajors)
REFERENCES AdmissionsMajor (idAdmissionsYear, idMajors) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE Application
ADD CONSTRAINT fk_Application_ResultExam1 FOREIGN KEY (idResultExam)
REFERENCES ResultExam (idResultExam) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `Account`
--
CREATE TABLE Account (
  username varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  password varchar(32) NOT NULL,
  name varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  phoneNumber varchar(45) NOT NULL,
  role varchar(45) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (username)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

-- 
-- Dumping data for table Majors
--
INSERT INTO Majors VALUES
('00216', 'Lupita4', 'A alias est voluptatum velit qui sint quia voluptas. Iure unde itaque veniam voluptas nemo voluptatem laudantium error. Consequatur voluptas perspiciatis et est culpa consequuntur vitae nam.', 1),
('03317', 'Cleary6', 'Necessitatibus qui veniam quasi est cupiditate rerum. Cumque quis ut magnam nisi ut molestiae non? Dolores dolorum dolor voluptatem. Iste veniam quasi voluptatem. Illo et repudiandae velit necessitatibus sed non omnis! Quidem iure sed velit neque voluptates? Dolores ipsa repellendus nulla delectus nesciunt quam omnis recusandae. Quidem ab iste porro!', 1),
('04959', 'Jovan494', 'Velit aut enim fugit excepturi eligendi quidem fugit. Iusto quasi laborum eius veniam. Sit aut est ducimus? Esse et unde debitis illo minus et sit quia. Officiis molestiae quis atque error ut velit voluptas numquam! Possimus at voluptas alias sed quia sed omnis unde...', 1),
('08394', 'Quintin42', 'Perspiciatis totam tempora et ipsum non in qui cupiditate. Tempore dolore dolor officiis quos blanditiis odit iste labore.', 1),
('10123', 'Wendi434', 'Dolorem voluptatem harum molestiae culpa mollitia dolores. Sit neque voluptatum nostrum. Commodi ut mollitia quia voluptatibus quis; incidunt rem dolorem quia consequatur quam ratione quibusdam. Perspiciatis sed voluptatem sed nulla? Sunt quisquam adipisci sunt eos omnis commodi quae. Sed dolor facere sit? Animi distinctio perspiciatis. Quia dolorum sapiente aut et dolores pariatur sed.', 1),
('17618', 'Beau73', 'Vitae excepturi illo et non distinctio unde et vitae...', 1),
('18346', 'Domingo2029', 'Corrupti inventore cupiditate et suscipit molestiae omnis. Possimus dicta porro molestiae et ab a. Est molestiae eum laborum sit. Velit voluptas expedita explicabo inventore dolor nesciunt omnis sed. Dolorum dolorem ratione laborum qui id deleniti sed quasi! Eius labore ipsum perspiciatis repudiandae est explicabo beatae doloribus.', 1),
('23248', 'Arsenault944', 'Architecto ut sit omnis quasi. Sit doloribus perspiciatis ut minima error; rerum alias aut est sit sed. Alias molestiae eaque consequatur sint laborum et facilis! Amet minus totam laboriosam. Omnis possimus eius numquam. Similique est natus modi quidem voluptatem architecto omnis unde. Omnis magnam ratione! Tenetur dolor quisquam. Sunt ratione ut!', 1),
('25943', 'Burgess1955', 'Est a unde asperiores repudiandae enim sapiente ut cum. At rerum voluptatem culpa similique ut id atque repellat. Et voluptas velit minus expedita enim excepturi perspiciatis corporis. Omnis sapiente exercitationem doloremque dolores molestiae error voluptas aliquid. Voluptatem dicta ut dolorum corrupti in odio aspernatur rerum.', 1),
('26123', 'Elliot684', 'Aut sit voluptatem minima porro repellat corrupti veritatis ratione. Asperiores non ad magnam a sit id laboriosam est.', 1),
('33847', 'Alexandra2015', 'Error quis atque velit unde enim esse rerum; ipsum perspiciatis et dicta. Ullam cupiditate minima sit beatae ullam omnis unde. Qui distinctio fugit officia aspernatur facere libero omnis vel. Incidunt omnis rerum consequatur omnis eaque hic voluptatem iste! Corporis ipsam quasi nihil repudiandae voluptatem obcaecati repellendus magni.', 1),
('35472', 'Brunilda8', 'In quasi in omnis aut. Sit eveniet aut quisquam qui accusamus impedit harum cum? Qui est aut rem sit molestiae. Nihil veniam iusto numquam consequatur? Suscipit consequuntur iure ullam voluptas tempore suscipit nesciunt asperiores. Eum facilis perspiciatis error odio voluptas et perspiciatis omnis. Autem ut aut est facere fugiat obcaecati perspiciatis...', 1),
('38549', 'Adam1966', 'Cumque doloremque adipisci laudantium illum officiis ullam fugit praesentium. Quia explicabo temporibus ex rem consequatur voluptatem quisquam perspiciatis? Consequatur ea saepe velit vitae in facilis error sed.', 1),
('38742', 'Perkins1963', 'Soluta animi voluptas. Soluta quis ut. Corrupti reiciendis eaque reiciendis totam! Repellendus non doloribus dolor. Aut et non dolorem vel natus voluptatem perspiciatis! Culpa maiores natus ipsam. Voluptas consequatur magni hic est nobis delectus voluptatem sequi. Quos iste dolores quae est ratione molestiae beatae commodi...', 1),
('38928', 'Emmy64', 'Ut tempora magnam aut nesciunt in aliquid architecto dolores. Qui deserunt laboriosam sint sequi consequuntur molestiae mollitia porro! Voluptatem iste voluptas esse earum sed iste velit corrupti. Vel ipsum iure qui voluptate nostrum quis aliquam est!', 1),
('42296', 'Abrams4', 'Unde quis aliquid consectetur. Blanditiis ipsum incidunt numquam optio accusantium dolorem blanditiis iste. Iste eligendi aut ad iste dolorum minus? Aliquid eveniet voluptas fugiat qui molestiae ut explicabo iste. Assumenda ut sunt sapiente animi placeat quo veniam perferendis. Velit sit nisi rerum autem unde non itaque consequatur.', 1),
('43757', 'Trent226', 'Quae error ad dolore unde dolor eveniet. Dolor et ratione; quam aut illum alias ipsa sit. Voluptatem maxime consequuntur dolor illum velit. Ad porro deserunt id. Totam ea illo at exercitationem voluptatibus deserunt? Sed molestias eum unde est vero deserunt excepturi suscipit. Eius natus quod! Aut vitae accusamus praesentium quia amet fugiat ut et.', 1),
('45580', 'Felix1961', 'Nisi omnis nulla est quis nam quibusdam qui id. Nesciunt eos quisquam architecto fugit quidem temporibus reprehenderit eius. Tempora error quas dolorum voluptatem beatae dolor quisquam id? Natus veniam hic sunt quae voluptates nulla natus error.', 1),
('49858', 'Swanson4', 'Architecto iste tempora temporibus sunt qui magnam autem et; ut est nisi odit voluptas facilis. Sint repellat obcaecati accusamus aperiam. Praesentium voluptas eaque explicabo non dicta et aut error! Autem velit aliquam aut non aperiam hic quis nostrum; est dignissimos omnis asperiores consequuntur et unde. Dolore aut delectus est officia nesciunt impedit.', 1),
('57133', 'Travis2026', 'Soluta animi ducimus natus impedit. Rerum deleniti veniam harum adipisci explicabo ipsum est. Quis est mollitia aperiam quos? Tempora culpa laboriosam quibusdam rem impedit ab. Quisquam et unde excepturi nulla laborum magnam! Quia qui voluptatem. Omnis ut perferendis illo non adipisci distinctio sit tempore. Saepe suscipit minus nesciunt est ullam dicta amet.', 1),
('60963', 'Branham885', 'Deleniti ipsa non qui perferendis soluta magnam perspiciatis accusantium; et delectus quisquam aut rerum molestiae dolor quae fuga. Vel voluptatem ullam doloribus ipsa omnis qui ut quia; beatae voluptatem qui dolores quis fuga sit sed maxime...', 1),
('64696', 'Acevedo679', 'Omnis quasi nihil cum quia voluptatibus sit animi. Unde nesciunt velit quis. Non laboriosam quo alias placeat? Nemo odio eum quam qui cupiditate ut sed. Repellendus qui aliquam. Nobis id et incidunt dolore iste officiis voluptatem autem! Earum et sed iste earum eos omnis accusantium aut.', 1),
('65300', 'Jerry175', 'Unde tempora aperiam quibusdam officiis sit facilis eum sed. Enim laudantium nostrum dolorem debitis labore accusantium voluptatem blanditiis! Consequatur molestias saepe nulla cumque est accusantium et animi.', 1),
('65341', 'Malinda2004', 'Quia culpa minima ipsam at quisquam dolorem ut. Dolores deserunt perspiciatis dolorem minus reprehenderit. Ipsa laboriosam quae voluptates; molestias sed nulla ut molestias expedita. Quo in ex sed nobis magnam et? Accusantium eos perspiciatis veniam! Mollitia aut numquam neque quisquam perspiciatis dolorem. Cupiditate sed velit consequuntur tenetur; atque iste dolores dolorem.', 1),
('67586', 'Margorie3', 'Dolorem voluptatem a dolor placeat numquam eaque et architecto. Omnis voluptas velit assumenda iste perspiciatis sed illo modi.', 1),
('74332', 'Milliken2004', 'Quidem inventore ducimus. Et aut blanditiis et voluptas exercitationem laudantium. Voluptatem quod officiis nesciunt dolorem unde! Qui dolor eum et vel. Error et dolorem nihil modi doloribus eaque architecto quod. Perspiciatis corrupti est ut aut in unde dicta repudiandae. Ut quo aliquam nisi dignissimos quo dicta et nam.', 1),
('81138', 'Abe9', 'Dolores rem aliquam omnis vel iste non expedita ad. Dolorem facilis et doloremque omnis voluptatibus et delectus quas? Vel molestias est tenetur quaerat assumenda ipsa architecto deserunt.', 1),
('82404', 'Drummond36', 'Ut molestiae et. Temporibus tempore qui assumenda qui possimus voluptatem velit repellendus. Dolorum dolorem error eius quis unde possimus temporibus praesentium. Quis voluptatem sunt consequatur non recusandae! Magnam et perferendis vitae ut vero quos quis et. Perspiciatis provident deserunt et temporibus rem voluptas sunt possimus.', 1),
('88873', 'Adelina79', 'Blanditiis exercitationem vitae voluptate laudantium sunt expedita totam illum. Fugiat est quia in quo id et aspernatur placeat.', 1),
('98805', 'Scotty85', 'Magnam ipsa quia placeat et unde eum natus dolor. Cupiditate repellendus perspiciatis at vero blanditiis exercitationem id voluptatem; ut beatae voluptatibus quia quis minima sunt aut a.', 1);

-- 
-- Dumping data for table AdmissionsYear
--
INSERT INTO AdmissionsYear VALUES
('25568', 2020),
('64850', 2021),
('67407', 2022);

-- 
-- Dumping data for table ResultExam
--
INSERT INTO ResultExam VALUES
('01752', 7, 6, 4, 6, 6, 4, 2, 4, 10, 0),
('05933', 8, 3, 6, 9, 8, 9, 10, 3, 4, 3),
('06712', 10, 7, 5, 10, 10, 1, 5, 8, 5, 1),
('06826', 7, 10, 3, 10, 8, 4, 6, 8, 5, 2),
('07607', 1, 6, 5, 2, 3, 10, 1, 9, 6, 1),
('09807', 3, 2, 2, 1, 6, 10, 5, 3, 9, 0),
('13550', 4, 1, 8, 10, 2, 1, 10, 3, 8, 2),
('17667', 3, 4, 9, 8, 2, 6, 6, 3, 5, 2),
('19425', 6, 5, 2, 9, 7, 4, 6, 8, 9, 1),
('23214', 0, 9, 8, 3, 9, 3, 3, 1, 8, 3),
('25376', 2, 0, 3, 5, 1, 9, 2, 8, 7, 3),
('25813', 0, 0, 8, 6, 10, 6, 8, 6, 10, 3),
('26634', 4, 0, 9, 8, 5, 8, 4, 10, 8, 0),
('27014', 9, 1, 2, 2, 5, 3, 2, 7, 4, 0),
('28477', 5, 9, 9, 5, 10, 4, 5, 6, 9, 1),
('30090', 10, 3, 9, 8, 7, 8, 8, 6, 2, 0),
('30971', 5, 2, 4, 7, 9, 8, 8, 5, 3, 3),
('31862', 4, 1, 7, 3, 2, 3, 7, 6, 10, 2),
('36971', 1, 9, 8, 2, 3, 2, 10, 2, 10, 3),
('42721', 4, 10, 6, 9, 6, 3, 6, 3, 9, 0),
('45302', 8, 0, 1, 6, 6, 1, 10, 9, 2, 2),
('48208', 9, 6, 4, 2, 7, 3, 8, 2, 10, 1),
('49037', 1, 5, 6, 10, 8, 7, 3, 9, 8, 3),
('50590', 5, 6, 1, 2, 4, 8, 1, 2, 9, 1),
('50730', 9, 0, 4, 7, 10, 2, 2, 10, 9, 3),
('51343', 3, 8, 7, 5, 5, 7, 7, 7, 9, 1),
('54030', 2, 3, 6, 2, 9, 6, 3, 6, 4, 2),
('54518', 5, 6, 4, 6, 6, 2, 9, 5, 10, 1),
('54828', 6, 5, 5, 8, 3, 5, 9, 10, 3, 3),
('56631', 4, 1, 4, 9, 8, 4, 5, 9, 9, 0),
('57077', 3, 10, 3, 10, 9, 9, 2, 4, 7, 2),
('58852', 9, 1, 8, 6, 6, 8, 5, 3, 7, 1),
('64166', 3, 8, 10, 1, 4, 2, 9, 10, 1, 1),
('68440', 4, 1, 7, 6, 1, 8, 2, 4, 6, 3),
('70235', 3, 5, 5, 3, 4, 3, 10, 5, 8, 0),
('73759', 10, 0, 2, 5, 2, 9, 3, 10, 10, 1),
('75446', 3, 3, 7, 4, 5, 6, 2, 4, 7, 3),
('75541', 4, 8, 6, 5, 8, 3, 3, 1, 9, 3),
('75699', 2, 9, 3, 10, 5, 4, 2, 6, 5, 2),
('80185', 0, 9, 2, 10, 6, 5, 9, 10, 5, 3),
('82415', 8, 8, 7, 2, 6, 9, 7, 10, 10, 2),
('82506', 0, 4, 1, 6, 6, 8, 3, 2, 8, 3),
('86989', 0, 5, 7, 9, 8, 4, 4, 8, 3, 0),
('87437', 5, 5, 6, 8, 4, 4, 3, 7, 1, 2),
('88184', 5, 7, 7, 9, 3, 10, 8, 6, 3, 0),
('89303', 8, 3, 4, 8, 5, 5, 7, 9, 3, 0),
('90287', 7, 0, 2, 8, 1, 8, 9, 2, 2, 2),
('91066', 5, 1, 9, 3, 5, 5, 3, 4, 2, 0),
('92422', 3, 2, 10, 6, 5, 6, 1, 10, 2, 3),
('96555', 2, 7, 6, 5, 2, 8, 8, 8, 3, 1);

-- 
-- Dumping data for table AdmissionsMajor
--
INSERT INTO AdmissionsMajor VALUES
('25568', '00216', 51, 'D8,C4,A5,D5,B9', 23),
('25568', '03317', 33, 'A5,A9,A3,B0,C5', 12),
('25568', '08394', 70, 'A1,A5', 12),
('25568', '17618', 69, 'C4,D4,D5,A9,B6', 12),
('25568', '23248', 94, 'C3,C3,D4,D4,A9', 25),
('25568', '25943', 90, 'C1,A0,D9,D4,A3', 26),
('25568', '26123', 77, 'C7,B9,A5,B7,D7', 13),
('25568', '35472', 35, 'B2,A2,A3,A1', 22),
('25568', '38549', 99, 'D5,C8,A8', 10),
('25568', '38928', 42, 'D1,D7,B7,B3,D1', 10),
('25568', '49858', 20, 'D1,A6,A4', 10),
('25568', '57133', 28, 'B3,C1,B4,A2', 19),
('25568', '67586', 50, 'A7,D4,A3,A9', 29),
('25568', '74332', 94, 'B7,C5,D2,A2', 21),
('25568', '82404', 97, 'A2,C7,A5', 24),
('25568', '88873', 91, 'D7,A5,C1,A2', 19),
('64850', '00216', 91, 'D1,A7', 13),
('64850', '03317', 42, 'C9,B5,A6', 25),
('64850', '08394', 82, 'D0,C8,A5,B4,B4', 12),
('64850', '17618', 73, 'D6,A5', 19),
('64850', '23248', 66, 'A2,A1,D8,C3,A8', 18),
('64850', '25943', 36, 'B9,C7,A3,A5', 22),
('64850', '26123', 51, 'D0,D4,D4,C4,C7', 26),
('64850', '33847', 56, 'C2,A8,A0,C1,C5', 13),
('64850', '35472', 99, 'D5,D8,A7', 28),
('64850', '38549', 35, 'B1,B1,A2', 14),
('64850', '38928', 53, 'D7,D5,C1,D1,A3', 24),
('64850', '49858', 76, 'D7,B3,D0,A4,C5', 15),
('64850', '57133', 55, 'A9,A7', 19),
('64850', '67586', 45, 'B8,B4,D9,C0,C4', 11),
('64850', '74332', 39, 'C9,C9,B5,B2,D3', 27),
('64850', '82404', 83, 'B9,A7,A6,A7,B0', 23),
('64850', '88873', 69, 'A4,C0,A9,D4,B7', 21),
('67407', '00216', 77, 'B3,B6,A0', 22),
('67407', '03317', 99, 'A3,B8,D4,A8,A7', 11),
('67407', '08394', 65, 'D7,D5,A8,A6,B5', 14),
('67407', '17618', 81, 'C5,B4,A2,B2,D8', 28),
('67407', '23248', 55, 'C1,D8,D1,D2,B5', 14),
('67407', '26123', 84, 'D8,A8', 15),
('67407', '33847', 41, 'C4,C4,C3,B9,B7', 27),
('67407', '35472', 62, 'D9,A6,B1,D0,C0', 24),
('67407', '38549', 72, 'B7,A6', 26),
('67407', '38928', 63, 'A6,A0,D6,A0', 16),
('67407', '43757', 35, 'D5,D7,A4', 22),
('67407', '49858', 47, 'D5,B6,D7,C8,D2', 25),
('67407', '57133', 86, 'C7,A1', 29),
('67407', '67586', 100, 'D9,C2,C9,A1', 24),
('67407', '74332', 54, 'D8,D8,A1', 29),
('67407', '82404', 61, 'C4,A3,D2,D0,D5', 26),
('67407', '88873', 34, 'B4,A1,A2', 15);

-- 
-- Dumping data for table Application
--
INSERT INTO Application VALUES
('04010', 'H8YXFWD3SZFW43G', 'Xuân Ninh', 0, '2014-07-30', 'Tỉnh Đắk Nông', 'Swedes', '49031', '1972-10-20', '(180) 991-7881', 'Montoya@nowhere.com', '591 E Chapel Hill Way, Des Moines, IA, 80172', '30090', '25568', '00216'),
('04117', '2T8E9Z9B72FO7QA6HO4J260VA1', 'Kiên Trung', 1, '2014-11-29', 'Tỉnh Hòa Bình', 'Manchu', '97695', '1970-01-08', '(803) 731-7882', 'Aguilera912@nowhere.com', '31 Red Fox Hill Parkway, Comcast Bldg, Sacramento, California, 19722', '51343', '64850', '17618'),
('06222', '780FN1Q368KOPU9SV8EY9N8', 'Anh Tuấn', 0, '2012-09-06', 'Tỉnh Hậu Giang', 'Zhuang', '98918', '1983-01-28', '(178) 106-1821', 'Burgos@nowhere.com', '662 Hidden Church Loop, Austin, TX, 91304', '50730', '64850', '08394'),
('06837', 'ZRWLCV', 'Hữu Bình', 1, '2012-02-01', 'Tỉnh Tây Ninh', 'Poles', '51365', '2013-12-07', '(569) 969-3917', 'Rigby@example.com', '1366 Old Riddle Hill Way, Buhl Building, Atlanta, GA, 36882', '07607', '25568', '57133'),
('07653', 'KV0XINGNO', 'Gia Kiên', 0, '2020-01-20', 'Tỉnh Quảng Bình', 'Tuaregs', '22638', '1982-06-26', '(275) 641-6046', 'Abrams@example.com', '1255 Meadowview Court, STE 1281, Denver, CO, 14016', '31862', '64850', '03317'),
('09319', '55ML602L1PW76H4D4DD1XA03904514M649K3QGA6H9TVXVW8708A273B69H8', 'Trường Sa', 0, '2021-01-31', 'Tỉnh Bắc Ninh', 'Slovaks', '48685', '1994-03-17', '(970) 832-2114', 'FlorencioF_Marlow7@nowhere.com', '2563 Red Social Ave, APT 143, Phoenix, Arizona, 67534', '13550', '25568', '25943'),
('15156', '2A94121MYBN8F8H98PU7L7DP2Y88PX6', 'Xuân Quý', 1, '2021-11-29', 'Tỉnh Bạc Liêu', 'Japanese', '19450', '1970-04-06', '(218) 545-0360', 'Stiltner@example.com', '2285 Red Deepwood Rd, Buhl Bldg, Honolulu, Hawaii, 68754', '58852', '64850', '74332'),
('21454', '0I73ZJABCO67U1QP4X8C4MSAL', 'Gia Kiệt', 1, '2013-11-03', 'Tỉnh Tuyên Quang', 'Bengalis', '12554', '1971-04-14', '(316) 276-5489', 'Forrest718@nowhere.com', '2895 Meadowview Highway, 2nd Floor, Trenton, New Jersey, 72720', '27014', '64850', '23248'),
('22148', 'CZS55N3496C3A21B', 'Thanh Thuận', 0, '2017-09-19', 'Tỉnh Nam Định', 'Irish', '49252', '2008-01-25', '(643) 035-9613', 'kqavbr3100@example.com', '1351 White Hazelwood Parkway, 3rd Floor, Springfield, Illinois, 77085', '06826', '25568', '17618'),
('25421', 'AS1MN4DEW0OO4', 'Quốc Ðại', 1, '2021-09-06', 'Tỉnh Hà Tĩnh', 'Hungarians', '27381', '1980-03-19', '(316) 490-1413', 'Ada_Anglin6@nowhere.com', '238 North Mountain Loop, Helena, MT, 08007', '96555', '67407', '82404'),
('26120', 'C12C27A8YL89Y2U1619QRO83Q8V5S5Y0', 'Kiên Cường', 0, '2021-02-15', 'Thành phố Hải Phòng', 'Bulgarians', '15938', '2008-05-31', '(255) 324-8320', 'LoydBranham258@example.com', '523 Edgewood Ct, Salt Lake City, UT, 51686', '06712', '25568', '74332'),
('28810', '75R68W3Q01TJ1I4810RRWTT6427IXW', 'Gia Khiêm', 0, '2021-04-12', 'Tỉnh Thái Nguyên', 'Assyrians', '52663', '1980-06-13', '(155) 307-2140', 'Houser@example.com', '3466 Chapel Hill Pkwy, Duke Energy Building, Lincoln, NE, 93850', '58852', '64850', '38549'),
('30750', '1V7U770RZ2720D8OH7EFL2QF5', 'Anh Tùng', 0, '2012-11-19', 'Tỉnh Trà Vinh', 'Tamils', '37873', '2008-10-16', '(528) 827-7365', 'Acosta@example.com', '1234 E Farmview Rd, Frankfort, KY, 17137', '54828', '67407', '33847'),
('31170', 'LQYL881P3ZSNT381R59C29798MDL2V9L92J7RGW528B6D07134H', 'Quốc Bình', 1, '2021-10-18', 'Tỉnh Yên Bái', 'Laz', '96821', '1991-12-19', '(680) 879-5957', 'NorrisCalderon@example.com', '3707 South Market Hwy, Indianapolis, Indiana, 26120', '96555', '64850', '38928'),
('34662', 'M65GVT4', 'Kiến Ðức', 0, '2018-01-14', 'Tỉnh Kon Tum', 'Tibetan', '78096', '1993-05-18', '(868) 262-1317', 'MorrisAbraham@example.com', '3998 Highland Loop, Augusta, Maine, 97437', '75446', '25568', '35472'),
('40587', 'ZE3LO946690DT9OU2PN322YO', 'Trường Sinh', 1, '2013-07-11', 'Thành phố Đà Nẵng', 'Turkmens', '92568', '2013-07-13', '(378) 514-3326', 'stnhpti6@nowhere.com', '622 Hidden Ski Hill Ct, Boston, MA, 23438', '23214', '64850', '03317'),
('41347', '1O', 'Trường Phúc', 1, '2018-12-22', 'Tỉnh Hưng Yên', 'Catalans', '60676', '1992-07-26', '(458) 258-2516', 'GerryBarrow@example.com', '2490 Hidden Meadowview Loop, 1st Floor, Jefferson City, MO, 74975', '82506', '25568', '03317'),
('41437', '0', 'Quốc Hải', 1, '2018-01-14', 'Tỉnh Điện Biên', 'Ukrainians', '48708', '1972-07-11', '(590) 754-6714', 'Enoch_Tillery@nowhere.com', '3575 Red Rock Hill Ct, 3rd Floor, Pierre, SD, 89000', '42721', '25568', '74332'),
('46213', 'G316B47VJ7NJBZ3FC6', 'Hữu Cảnh', 0, '2015-01-29', 'Thành phố Hồ Chí Minh', 'Vietnamese', '91427', '1995-09-29', '(112) 314-2339', 'fazsmgzr.vbbx@example.com', '3595 Red Ashwood Highway, APT 490, Juneau, AK, 66435', '75699', '25568', '74332'),
('49011', 'X13K', 'Quốc Hoài', 0, '2016-07-27', 'Tỉnh Quảng Ngãi', 'Scottish', '65154', '1970-01-07', '(582) 573-6897', 'Drew_Brennan3@nowhere.com', '99 NW Stonewood Parkway, Phoenix, Arizona, 54338', '27014', '64850', '88873'),
('50025', 'J3Y2PQO61VF93OB', 'Nghĩa Dũng', 0, '2012-11-15', 'Tỉnh Bình Định', 'Filipinos', '99830', '1996-02-10', '(385) 448-6451', 'Sharpe26@example.com', '3525 Hidden Edgewood Highway, 5th Floor, Raleigh, North Carolina, 87239', '48208', '64850', '35472'),
('50103', '8TFTX323CVX53', 'Thành Tín', 1, '2017-11-17', 'Tỉnh Hải Dương', 'Kurds', '65934', '1989-07-20', '(742) 462-7381', 'Fortner@nowhere.com', '2117 South Farmview Circle, Juneau, Alaska, 04226', '91066', '64850', '25943'),
('50419', '256C956TN61FN96MUB5J792E03F17074168SL47547297IV1T8Z70S009OP2', 'Nghị Quyền', 0, '2012-08-26', 'Tỉnh Bình Thuận', 'Balochis', '69351', '1973-11-14', '(214) 519-9069', 'Mac_Amaya79@nowhere.com', '54 E Hope Loop, Trenton, New Jersey, 89734', '23214', '64850', '67586'),
('51870', '35W0VXBA5Q5597HH2SW8', 'Ðắc Thái', 0, '2020-09-04', 'Tỉnh Lào Cai', 'Kyrgyz', '57980', '1970-08-15', '(585) 192-5051', 'Perryman455@nowhere.com', '220 Hidden Town Pkwy, Austin, Texas, 75826', '50590', '67407', '74332'),
('57474', 'Q2D16150MEGZTJ5Z2RLH1U1CY9MLQ6A7F1J816R2OS09X1EXGIN1I62B129PWJ93K3543V28CSG2L62A75GMD5207D8I46091550TPQT0OP5Q4K6M8659Z5X9BLA30754R05PLY3YPT6XDW722', 'Thanh Sơn', 1, '2020-06-30', 'Tỉnh Phú Thọ', 'Germans', '91981', '1976-05-09', '(372) 155-1270', 'JoeannPHuang@example.com', '609 East Rushwood Court, Kearns Bldg, Little Rock, AR, 92652', '92422', '64850', '38549'),
('58769', 'X8', 'Quốc Hiển', 0, '2011-10-24', 'Tỉnh Vĩnh Phúc', 'Greeks', '23539', '2008-07-10', '(480) 084-5340', 'Mccue@example.com', '2532 1st Ln, Denver, Colorado, 31725', '06826', '67407', '33847'),
('60938', 'Y6S5DCQIKI638J5G14V79A30603C5JKB5ZQD96JC7A9928FA0X32G2U34L2X0FY737I147J3663BNR1Q2569TYZC64527FWMAO354DAUB3J61N233B3', 'Quốc Hạnh', 0, '2020-10-01', 'Tỉnh Vĩnh Long', 'Chuvash', '73979', '1988-11-09', '(981) 250-1004', 'AdanHuerta523@example.com', '380 North Fox Hill Loop, Sacramento, California, 85419', '89303', '25568', '03317'),
('62140', 'T5FNALJK', 'Trường Vinh', 0, '2014-01-25', 'Tỉnh Đồng Nai', 'Basques', '73086', '2001-06-10', '(899) 568-3468', 'MichalEdmond@example.com', '628 White Ironwood Ct, Nipper Bldg, Baton Rouge, LA, 10862', '26634', '25568', '08394'),
('63258', 'RNT4L5E02', 'Xuân Nam', 1, '2018-05-20', 'Tỉnh Bến Tre', 'Spaniards', '11796', '2015-12-15', '(314) 895-5534', 'Cota424@example.com', '63 Fox Hill Lane, Columbus, Ohio, 83243', '58852', '64850', '67586'),
('63492', '2S09DR34T338S08BC7230WE298I45H5V338C33I15A8R81M45CMN28S87K0X2RTBR33D9QYS771', 'Thanh Tịnh', 1, '2021-08-24', 'Tỉnh Lai Châu', 'Portuguese', '09929', '1987-10-23', '(810) 858-2641', 'LeighP_Redding7@example.com', '1965 Riverside Highway, Carson City, NV, 20587', '54518', '64850', '25943'),
('63877', 'G8PK8G74824031PYM3MV01090', 'Thành Thiện', 0, '2021-05-21', 'Tỉnh Lạng Sơn', 'Uyghur', '95191', '1984-10-12', '(623) 190-9724', 'DinoJaeger742@example.com', '11 Front Way, 1st Floor, Nashville, TN, 29288', '27014', '67407', '03317'),
('64201', 'AO24FQBN7B3S516HVJ587PAAC4CFSF4VO1Y01S2K8U7B3', 'Nam Việt', 1, '2021-10-25', 'Tỉnh Kiên Giang', 'Armenians', '67589', '1975-04-23', '(108) 076-7346', 'Moreno@nowhere.com', '3500 Ironwood Blvd, Fisher Bldg, Honolulu, HI, 71721', '05933', '64850', '38928'),
('66085', '3676LC989Q56XO7NM6N07IE26XV1IB56212G0H16BZIQ8D0N0RUGO8Z6DI60T55YD52QBYECVDD03', 'Hữu Canh', 1, '2020-11-04', 'Tỉnh Thừa Thiên - Huế', 'Koreans', '49673', '2005-12-30', '(101) 719-8901', 'CharlieNoriega688@example.com', '3218 East Hunting Hill Avenue, Columbus, OH, 20032', '17667', '25568', '88873'),
('68634', 'OLO4JN9EV09LP6SI873S41B1C18Q4TR811P6J', 'Trường Sơn', 1, '2020-02-21', 'Tỉnh Sơn La', 'Faroese', '18486', '1973-12-31', '(547) 644-0440', 'Slone@nowhere.com', '81 Riverview Lane, Appartment 2, Harrisburg, Pennsylvania, 19130', '54030', '67407', '33847'),
('69570', '81QC5CMN13', 'Nghị Lực', 1, '2011-06-06', 'Tỉnh Đắk Lắk', 'Telugu', '91853', '2009-02-25', '(353) 195-4925', 'sneygl8904@example.com', '395 Rock Hill Road, Frankfort, Kentucky, 88250', '92422', '64850', '23248'),
('70974', 'WKO32CPH55J', 'Thanh Toản', 0, '2015-05-11', 'Tỉnh Ninh Bình', 'Han Chinese', '83937', '2012-12-10', '(154) 059-9183', 'Rock@example.com', '58 Monument Court, Superior Bldg, Montgomery, Alabama, 84801', '57077', '67407', '67586'),
('72355', 'H15', 'Ðắc Lực', 1, '2011-06-29', 'Tỉnh Quảng Nam', 'Estonians', '39782', '1970-04-11', '(703) 696-6178', 'Abney@nowhere.com', '205 New Oak Blvd, Albany, New York, 11805', '82415', '64850', '35472'),
('72825', 'L1O0916X7V2UVI', 'Thanh Thiên', 1, '2021-04-04', 'Tỉnh Phú Yên', 'Thais', '25316', '2019-12-08', '(560) 175-6513', 'tsredn9393@example.com', '1678 N Monument Ave, Jackson, Mississippi, 86777', '36971', '67407', '43757'),
('73323', 'Q02C1855MIM1PB6389IM8O081VF3N2FX11A25RO178OC1UB4G', 'Thanh Thế', 1, '2021-07-27', 'Tỉnh Bắc Kạn', 'Kazakhs', '11427', '2007-07-04', '(629) 337-3734', 'oytxgpgm.ebekzhq@example.com', '3040 Fox Hill Ct, MidAmerican Bldg, Columbia, SC, 74842', '87437', '67407', '08394'),
('76640', 'C8G600113N008B69R2UY15Q9830AGOOC79F374H85T6I1HX5Q9BN540T0HJ69AS5UU769X7J7BS37P8L57346B1S48VG18', 'Quốc Hòa', 1, '2020-12-11', 'Tỉnh Tiền Giang', 'Georgians', '53178', '2020-12-27', '(377) 116-7586', 'Zack_Mcnair199@example.com', '61 Glenwood Loop, Buhl Building, Juneau, AK, 11862', '05933', '67407', '23248'),
('77059', 'C3S3F416651XCCD5GLX30948D9AX6T', 'Nam Tú', 1, '2013-08-05', 'Tỉnh Thái Bình', 'Kannada', '12831', '1990-06-06', '(352) 451-9124', 'TaggartY@example.com', '3080 W Waterview Hwy, Oklahoma City, OK, 01413', '31862', '67407', '23248'),
('81506', 'NR3CC84K2255627DR11RJCPH200O0K1', 'Kiên Giang', 0, '2019-09-11', 'Tỉnh Gia Lai', 'Punjabis', '48851', '1970-06-25', '(817) 785-1182', 'mlocd761@example.com', '1291 2nd Parkway, Standard Bldg, Honolulu, HI, 80561', '26634', '67407', '67586'),
('83127', '12CL6D39860UOUQIF4S', 'Quốc Ðiền', 1, '2011-07-01', 'Tỉnh Sóc Trăng', 'English', '27438', '1986-01-11', '(860) 387-6223', 'SamuelGunn@example.com', '82 Rock Hill Rd, Baton Rouge, LA, 02620', '82506', '67407', '03317'),
('84373', '8ODC98XB9282LC', 'Xuân Quân', 0, '2018-06-09', 'Tỉnh Bình Dương', 'Gujaratis', '87829', '2020-06-09', '(507) 797-5355', 'AbernathyF@nowhere.com', '919 Ashwood Street, Baton Rouge, LA, 64889', '23214', '25568', '00216'),
('87627', '4U187AWCVAVGO348Z5969BPK2FINF55DFE40U26J3U7K8U912Y3M85Q848S82FIU02435W8M0LK8A185JF2UPQ6YRS95862', 'Xuân Minh', 1, '2019-02-10', 'Thành phố Hà Nội', 'Icelanders', '75243', '2000-11-03', '(167) 010-3850', 'Iliana.Acevedo52@example.com', '3022 East Market Circle, Columbus, OH, 37568', '73759', '25568', '17618'),
('91783', 'O9', 'Kiên Lâm', 0, '2011-11-15', 'Tỉnh Bà Rịa - Vũng Tàu', 'Romanians', '03179', '1971-08-27', '(761) 292-5094', 'Baugh@example.com', '3016 SW Ski Hill Highway, Bismarck, ND, 01337', '57077', '67407', '23248'),
('92549', '0OAJV9RK53U6BO', 'Trường Thành', 0, '2018-06-28', 'Tỉnh Long An', 'Circassians', '80270', '1993-12-31', '(822) 473-2204', 'Williford893@example.com', '3035 Hunting Hill Ln, Juneau, Alaska, 23052', '25376', '64850', '17618'),
('95168', 'IO8G37396EQJQC80189537LJ8T89EW847', 'Quốc Hiền', 0, '2019-12-02', 'Tỉnh An Giang', 'Turks', '74078', '2020-02-09', '(187) 375-7374', 'Brant.Abreu@example.com', '617 Prospect Hill Ln, Des Moines, IA, 18375', '86989', '25568', '03317'),
('95658', '2G2JR44Z52457H41K6XS2501', 'Xuân Phúc', 0, '2012-07-03', 'Tỉnh Nghệ An', 'Italians', '61469', '1989-05-13', '(757) 409-5418', 'Roush@example.com', '2694 Rushwood Lane, Austin, Texas, 38739', '82415', '64850', '26123'),
('99710', 'H5489092', 'Thanh Toàn', 0, '2017-02-01', 'Tỉnh Thanh Hóa', 'Congolese', '12641', '1998-10-29', '(187) 475-0399', 'vbzbfpb0034@nowhere.com', '3328 Glenwood Blvd, APT 37, Phoenix, AZ, 26645', '13550', '64850', '67586');

-- 
-- Dumping data for table Account
--
INSERT INTO Account VALUES
('Admin', md5('admin'), 'Florida343', '(465) 454-8347', 'admin', 1),
('Emp1', md5('emp'), 'Ada2005', '(282) 510-9326', 'user', 1),
('Emp2', md5('emp'), 'Carmela778', '(157) 934-3116', 'user', 0);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;