DROP DATABASE IF EXISTS `CreateProjectDB`;
CREATE DATABASE  IF NOT EXISTS `CreateProjectDB` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `CreateProjectDB`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS customer;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE customer (
  CustID varchar(4) NOT NULL DEFAULT '',
  `Password` varchar(10) NOT NULL,
  Surname varchar(15) NOT NULL,
  GivenName varchar(30) NOT NULL,
  DateOfBirth date NOT NULL,
  Gender varchar(1) NOT NULL,
  Passport varchar(15) NOT NULL,
  MobileNo varchar(15) NOT NULL,
  Nationality varchar(15) NOT NULL,
  BonusPoint int(11) DEFAULT '0',
  PRIMARY KEY (CustID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO customer VALUES ('C001','123456','Chan','Chi Ming','1982-03-15','M','F1842154','95215852','Chinese',0);
INSERT INTO customer VALUES ('C002','123456','Wong','Chun Tin','1991-03-31','F','G6645132','96254685','Chinese',0);
INSERT INTO customer VALUES ('C003','123456','Tang','Tai Chi','1979-09-24','M','T2165158','91254854','Chinese',0);
INSERT INTO customer VALUES ('C004','123456','Man','Chi Kuen','1952-01-18','M','G2514144','92548475','Chinese',0);
INSERT INTO customer VALUES ('C005','123456','Lee','Man Tao','1983-04-16','M','A1254855','92165845','Chinese',0);
INSERT INTO customer VALUES ('C006','123456','Leung','Shun Yee','1991-02-19','F','B1215485','91236545','Chinese',0);
INSERT INTO customer VALUES ('C007','123456','Lee','Ka Man','1998-06-05','F','R2315845','92548548','Chinese',0);
INSERT INTO customer VALUES ('C008','123456','Lung','Chi Kin','1985-12-06','M','R1254856','97584254','Chinese',0);
INSERT INTO customer VALUES ('C009','123456','Chan','Siu Dong','1973-08-19','M','G6584251','94652514','Chinese',0);
INSERT INTO customer VALUES ('C010','123456','Cheung','Tai Tim','1978-08-17','M','J56698452','94521575','Chinese',0);
INSERT INTO customer VALUES ('C011','123456','Fung','Chi Tak','1977-02-15','M','T15515155','96251675','Chinese',0);
INSERT INTO customer VALUES ('C012','123456','Chan','Man Sheung','1976-06-18','F','F21251515','95462415','Chinese',0);
DROP TABLE IF EXISTS room;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE room (
  HotelID int(11) NOT NULL,
  RoomType varchar(45) NOT NULL,
  NonSmoking tinyint(1) NOT NULL,
  RoomNum int(11) NOT NULL,
  RoomSize int(11) NOT NULL,
  AdultNum int(11) NOT NULL,
  ChildNum int(11) NOT NULL,
  RoomDesc varchar(50) NOT NULL,
  Price int(11) NOT NULL,
  PRIMARY KEY (HotelID,RoomType),
  KEY idx_room_HotelID (HotelID),
  CONSTRAINT fk_room_HotelID FOREIGN KEY (HotelID) REFERENCES hotel (HotelID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO room VALUES (1,'君悅客房 - 一大床',1,4,24,3,2,'1 張特大雙人床',2344);
INSERT INTO room VALUES (1,'君悅行政套房 - 一大床',1,5,70,3,2,'1 張特大雙人床',5485);
INSERT INTO room VALUES (1,'君悅豪華客房',1,3,40,3,2,'1 張特大雙人床',2493);
INSERT INTO room VALUES (1,'君悅豪華客房 - 二小床',1,4,40,3,2,'2 張單人床',2493);
INSERT INTO room VALUES (1,'嘉賓軒客房 一大床',1,3,56,3,2,'1 張特大雙人床',3241);
INSERT INTO room VALUES (1,'頂級套房, 1 張特大雙人床',0,4,80,3,2,'1 張特大雙人床',3989);
INSERT INTO room VALUES (1,'頂級標準客房',1,5,36,3,2,'2 張單人床',2344);
INSERT INTO room VALUES (2,'Metro Room',1,4,30,2,2,'1 張雙人床',1142);
INSERT INTO room VALUES (2,'四人房',1,5,45,4,2,'2 張床',1655);
INSERT INTO room VALUES (2,'套房',1,4,30,3,2,'1 張雙人床',1364);
INSERT INTO room VALUES (2,'高級客房',1,5,30,3,2,'1 張雙人床',948);
INSERT INTO room VALUES (2,'高級雙人房',1,5,30,3,2,'2 張單人床',1007);
INSERT INTO room VALUES (3,'尊爵高級套房',1,2,26,3,2,'1 張特大雙人床',1398);
INSERT INTO room VALUES (3,'尊爵高級雙人單床房',0,3,26,3,2,'1 張特大雙人床',1392);
INSERT INTO room VALUES (3,'標準單人房',1,5,23,2,1,'1 張單人床',991);
INSERT INTO room VALUES (3,'豪華雙人房',1,5,32,3,2,'1 張雙人床',906);
INSERT INTO room VALUES (4,'中房一中床',1,4,34,3,2,'1 張加大雙人床',758);
INSERT INTO room VALUES (4,'標準客房',1,4,35,3,2,'1 張特大雙人床',1646);
INSERT INTO room VALUES (4,'酷景房一中床',1,5,35,3,2,'1 張加大雙人床',971);
INSERT INTO room VALUES (4,'陽台房二單床',1,5,35,3,2,'2 張單人床',1112);
INSERT INTO room VALUES (5,'寰宇客房一大床',1,3,60,3,2,'1 張特大雙人床',2016);
INSERT INTO room VALUES (5,'精緻套房',1,4,60,3,2,'1 張特大雙人床',3747);
INSERT INTO room VALUES (5,'豪華客房一特大床客房',1,5,55,3,2,'1 張特大雙人床',1747);
INSERT INTO room VALUES (5,'高級客房',1,5,45,3,2,'1 張特大雙人床',1635);
INSERT INTO room VALUES (6,'普通套房',0,5,25,3,2,'1 張特大雙人床',1908);
INSERT INTO room VALUES (6,'行政標準客房',1,5,60,3,2,'1 張特大雙人床',1603);
INSERT INTO room VALUES (6,'豪華三人房',1,3,39,4,2,'3 張單人床',1460);
INSERT INTO room VALUES (6,'豪華標準客房',1,5,70,3,2,'1 張特大雙人床',1221);
INSERT INTO room VALUES (6,'豪華雙人房',0,5,30,3,2,'2 張單人床',1259);
INSERT INTO room VALUES (7,'傳統客房',1,3,30,3,2,'1 張日式床墊',724);
INSERT INTO room VALUES (7,'傳統客房 (8 Tatami mat)',1,5,30,3,2,'1 張日式床墊',706);
INSERT INTO room VALUES (8,'傳統客房 (Japanese Style Room)',1,5,60,6,2,'4 張日式床墊',918);
INSERT INTO room VALUES (8,'傳統客房 (Run of the House Japanese Style Room)',0,5,35,3,2,'1 張日式床墊',965);
INSERT INTO room VALUES (9,'普通套房 (B Type)',0,5,50,3,2,'2 張單人床',3175);
INSERT INTO room VALUES (9,'標準小木屋',1,5,70,6,2,'4 張床',3686);
INSERT INTO room VALUES (9,'豪華標準客房 (A Type)',1,3,50,3,2,'2 張單人床',2658);
INSERT INTO room VALUES (9,'豪華標準客房, 轉角',1,3,50,3,2,'2 張單人床',3522);
INSERT INTO room VALUES (10,'雙人房, 1 張雙人床',1,5,16,2,1,'1 張雙人床',680);
INSERT INTO room VALUES (10,'雙人房, 2 張單人床',1,5,22,3,1,'2 張單人床',781);
INSERT INTO room VALUES (11,'標準客房, 露台',1,5,60,3,2,'1 張特大雙人床',4452);
INSERT INTO room VALUES (11,'行政標準客房',1,5,60,3,2,'1 張特大雙人床 或 2 張單人床',3090);
INSERT INTO room VALUES (11,'豪華標準客房',1,5,56,3,2,'1 張特大雙人床 或 2 張單人床',2079);
INSERT INTO room VALUES (11,'開放式客房',1,5,60,3,2,'1 張特大雙人床',2859);
INSERT INTO room VALUES (12,'Swiss, 行政標準客房',1,5,34,3,2,'1 張特大雙人床 或 2 張單人床',1915);
INSERT INTO room VALUES (12,'標準客房 (Swiss Advantage)',1,2,40,3,2,'1 張雙人床或 1 張單人床',1571);
INSERT INTO room VALUES (12,'經典標準客房',0,5,61,3,2,'1 張特大雙人床 或 2 張單人床',1424);
INSERT INTO room VALUES (12,'頂級標準客房, 1 張特大雙人床',1,5,50,3,2,'1 張特大雙人床',1866);
INSERT INTO room VALUES (13,'公寓, 1 間臥室, 廚房',1,5,43,3,2,'1 張加大雙人床',1328);
INSERT INTO room VALUES (13,'公寓, 2 間臥室, 廚房',1,5,57,3,2,'1 張加大雙人床 或 1 張單人床',1733);
INSERT INTO room VALUES (14,'俱樂部標準客房',1,1,28,3,2,'1 張特大雙人床 或 2 張單人床',2285);
INSERT INTO room VALUES (14,'行政套房, 1 張特大雙人床',1,5,55,3,2,'1 張特大雙人床',2634);
INSERT INTO room VALUES (14,'豪華標準客房',1,5,28,3,2,'1 張特大雙人床 或 2 張單人床',1274);
INSERT INTO room VALUES (14,'高級客房, 海灣景',0,5,32,3,2,'1 張特大雙人床',1182);
INSERT INTO room VALUES (15,'Caroline Astor Suite, 1 King bed',0,5,90,3,2,'1 張特大雙人床',4732);
INSERT INTO room VALUES (15,'St. Regis Suite, 1 King Bed',1,5,100,3,2,'1 張特大雙人床',2883);
INSERT INTO room VALUES (15,'豪華標準客房, 1 張特大雙人床',1,5,45,3,2,'1 張特大雙人床',1546);
INSERT INTO room VALUES (15,'頂級標準客房, 1 張特大雙人床',1,5,55,3,2,'1 張特大雙人床',1898);
INSERT INTO room VALUES (16,'Execuplus Suite, 1 Double or 2 Single Beds',1,5,64,3,2,'1 張雙人床 或 2 張單人床',1137);
INSERT INTO room VALUES (16,'高級單人房',1,5,34,3,2,'1 張雙人床 或 2 張單人床',768);
INSERT INTO room VALUES (16,'高級雙人房',1,5,34,3,2,'1 張雙人床 或 2 張單人床',705);
INSERT INTO room VALUES (17,'套房, 1 間臥室',0,5,59,3,2,'1 張特大雙人床',1281);
INSERT INTO room VALUES (17,'套房, 2 間臥室',1,5,119,3,2,'2 張特大雙人床',2870);
INSERT INTO room VALUES (17,'尊貴標準客房, 1 張特大雙人床',1,5,48,3,2,'1 張特大雙人床',2120);
INSERT INTO room VALUES (17,'豪華標準客房, 1 張特大雙人床',1,5,48,3,2,'1 張特大雙人床',1006);
INSERT INTO room VALUES (18,'Family with Balcony',1,5,28,4,2,'2 張雙人床',372);
INSERT INTO room VALUES (18,'標準客房, 2 張單人床',1,5,21,2,2,'2 張單人床',196);
INSERT INTO room VALUES (18,'豪華標準客房, 1 張單人床',1,5,19,1,1,'1 張單人床',176);
INSERT INTO room VALUES (18,'豪華標準客房, 1 張雙人床',1,5,23,2,1,'1 張雙人床',244);
INSERT INTO room VALUES (18,'豪華標準客房, 3 張單人床',1,5,26,4,2,'3 張單人床',303);
INSERT INTO room VALUES (19,'Grand Deluxe',1,1,40,3,2,'1 張特大雙人床 或 2 張單人床',939);
INSERT INTO room VALUES (19,'套房',1,5,120,3,2,'1 張特大雙人床及 1 張加大雙人床',2504);
INSERT INTO room VALUES (19,'套房, 2 間臥室',1,5,120,3,2,'1 張特大雙人床及 2 張單人床',3452);
INSERT INTO room VALUES (20,'一樓客房',1,5,86,3,2,'1 張特大雙人床',3303);
INSERT INTO room VALUES (20,'一特大床客房',1,5,46,3,2,'1 張特大雙人床',1164);
INSERT INTO room VALUES (20,'二單人床客房',1,5,46,2,1,'2 張單人床',1164);
INSERT INTO room VALUES (20,'豪華標準客房',1,5,46,3,2,'1 張特大雙人床',2685);
INSERT INTO room VALUES (21,'一卧室套房',1,5,89,3,2,'1 張特大雙人床',3278);
INSERT INTO room VALUES (21,'特色江景套房',1,5,178,3,2,'1 張特大雙人床',5619);
INSERT INTO room VALUES (21,'費爾蒙房',1,5,49,3,2,'1 張特大雙人床 或 2 張加大雙人床',1873);
INSERT INTO room VALUES (21,'費爾蒙金尊客房',1,1,49,3,2,'1 張特大雙人床',2110);
INSERT INTO room VALUES (22,'帝皇套房',1,5,72,3,2,'1 張特大雙人床',11035);
INSERT INTO room VALUES (22,'皇家套房',1,5,92,4,2,'1 張特大雙人床',48494);
INSERT INTO room VALUES (22,'纯净客房',1,5,38,3,2,'1 張特大雙人床',1341);
INSERT INTO room VALUES (22,'艾美房',1,5,48,3,2,'1 張特大雙人床',1403);
INSERT INTO room VALUES (22,'豪華客房',1,5,38,3,2,'1 張特大雙人床 或 2 張單人床',1153);
INSERT INTO room VALUES (22,'高級豪華房',1,5,38,3,2,'1 張特大雙人床 或 2 張單人床',1278);
INSERT INTO room VALUES (23,'行政標準客房',1,5,30,3,2,'1 張特大雙人床 或 2 張單人床',911);
INSERT INTO room VALUES (23,'行政豪华房',1,5,45,3,2,'1 張特大雙人床',1041);
INSERT INTO room VALUES (23,'豪華大床房',1,5,28,3,2,'1 張特大雙人床',638);
INSERT INTO room VALUES (24,'尊貴套房',1,5,45,3,2,'1 張特大雙人床',5344);
INSERT INTO room VALUES (24,'標準客房',1,5,28,3,2,'2 張單人床',2732);
INSERT INTO room VALUES (24,'豪華套房, 1 張特大雙人床',1,5,45,3,2,'1 張特大雙人床',5344);
DROP TABLE IF EXISTS hotel;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE hotel (
  HotelID int(11) NOT NULL DEFAULT '0',
  `Password` varchar(10) NOT NULL,
  ChiName varchar(50) NOT NULL,
  EngName varchar(80) NOT NULL,
  Star decimal(4,1) DEFAULT NULL,
  Rating decimal(4,1) NOT NULL DEFAULT '0.0',
  Country varchar(30) NOT NULL,
  City varchar(30) NOT NULL,
  District varchar(30) NOT NULL,
  Address varchar(255) NOT NULL,
  Tel varchar(20) NOT NULL,
  PRIMARY KEY (HotelID),
  UNIQUE KEY ChiName_unique (ChiName),
  UNIQUE KEY EngName_unique (EngName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO hotel VALUES (1,'123456','台北君悅酒店','Grand Hyatt Taipei',4.5,4.3,'Taiwan','Taipei','信義','2 SongShou Road Taipei 11051 台灣 ','30774857');
INSERT INTO hotel VALUES (2,'123456','台北凱撒大飯店','Caesar Park Taipei',4.0,3.9,'Taiwan','Taipei','中正','38 Chung Hsiao West Road Section 1 Zhongzheng Taipei 100 台灣','30774857');
INSERT INTO hotel VALUES (3,'123456','台北福華大飯店','The Howard Plaza Hotel Taipei',4.0,3.9,'Taiwan','Taipei','大安','160, Sec.3, Ren Ai Rd Taipei 10657 台灣 ','30774857');
INSERT INTO hotel VALUES (4,'123456','台北中山意舍酒店','amba Taipei Zhongshan',3.5,4.0,'Taiwan','Taipei','中山','57-1 Zhongshan North Road Section 2 Taipei 10412 台灣 ','30774857');
INSERT INTO hotel VALUES (5,'123456','台北晶華酒店','Regent Taipei',5.0,4.4,'Taiwan','Taipei','中山','No 3, Lane 39, Section 2 ZhongShan North, Road Taipei 104 台灣 ','30774857');
INSERT INTO hotel VALUES (6,'123456','台北西華飯店','The Sherwood Taipei',4.5,4.5,'Taiwan','Taipei','松山','111 Min Sheng East Road Taipei 104 台灣 ','30774857');
INSERT INTO hotel VALUES (7,'123456','黑部觀光酒店','Kurobe Kanko Hotel',3.0,3.9,'Japan','Nagano','Omachi','2822 Taira Omachi Nagano-ken 398-0001 日本 ','30774857');
INSERT INTO hotel VALUES (8,'123456','落葉松莊酒店','Hotel Karamatsuso',3.0,3.0,'Japan','Nagano','Omachi','2884-109 Taira Omachi Nagano-ken 398-0001 日本 ','30774857');
INSERT INTO hotel VALUES (9,'123456','東根拉雪酒店','Hotel La Neige Higashi-kan',5.0,4.5,'Japan','Nagano','Hakuba','Happo Wadanonomori Hakuba Nagano-ken 399-9301 日本','30774857');
INSERT INTO hotel VALUES (10,'123456','松本多米酒店','Dormy Inn Matsumoto',4.0,4.6,'Japan','Nagano','Matsumoto','2-2-1 Fukashi Matsumoto Nagano-ken 390-0815 日本 ','30774857');
INSERT INTO hotel VALUES (11,'123456','新加坡唐購物中心萬豪酒店','Singapore Marriott Tang Plaza Hotel',5.0,4.4,'Singapore','Singapore','烏節路','320 Orchard Road Singapore 238865 新加坡','30774857');
INSERT INTO hotel VALUES (12,'123456','新加坡瑞士史丹福酒店','Swissotel The Stamford, Singapore',5.0,4.3,'Singapore','Singapore','殖民區 - 美芝路','2 Stamford Road Singapore 178882 新加坡 ','30774857');
INSERT INTO hotel VALUES (13,'123456','克萊蒙梭公園大道酒店','Park Avenue Clemenceau',4.0,3.8,'Singapore','Singapore','新加坡河','81A Clemenceau Avenue # 05 - 18 UE Square Singapore 239918 新加坡','30774857');
INSERT INTO hotel VALUES (14,'123456','新加坡國敦河畔大酒店','Grand Copthorne Waterfront Hotel Singapore',4.0,4.1,'Singapore','Singapore','新加坡河','392 Havelock Road Singapore 169663 新加坡','30774857');
INSERT INTO hotel VALUES (15,'123456','聖里吉斯曼谷酒店','The St. Regis Bangkok',5.0,4.6,'Thailand','Bangkok','市中心 - 暹邏廣場','159 Rajadamri Road Bangkok Bangkok 10330 泰國','30774857');
INSERT INTO hotel VALUES (16,'123456','帕色哇公主飯店','Pathumwan Princess Hotel',4.5,4.5,'Thailand','Bangkok','市中心 - 暹邏廣場','444 MBK Center, Phayathai Rd., Wangmai Pathumwan Bangkok Bangkok 10330 泰國','30774857');
INSERT INTO hotel VALUES (17,'123456','曼谷悅榕莊','Banyan Tree Bangkok',5.0,4.6,'Thailand','Bangkok','是隆路 - 沙吞','21/100 South Sathon Road Bangkok Bangkok 10120 泰國 ','30774857');
INSERT INTO hotel VALUES (18,'123456','D&D 旅館','D&D Inn',3.0,4.1,'Thailand','Bangkok','舊城','68-70 Khaosan Road, Pranakorn Bangkok 10200 泰國 ','30774857');
INSERT INTO hotel VALUES (19,'123456','曼谷東方公寓','Oriental Residence Bangkok',5.0,4.7,'Thailand','Bangkok','素坤逸路','110 Wireless Road, Lumpini, Pathumwan Bangkok Bangkok 10330 泰國 ','30774857');
INSERT INTO hotel VALUES (20,'123456','上海虹橋元一希爾頓酒店','Hilton Shanghai Hongqiao',5.0,4.2,'China','Shanghai','Minhang','No.1116 Hong Song East Road Minhang Shanghai 201103 中國','30774857');
INSERT INTO hotel VALUES (21,'123456','和平飯店','Fairmont Peace Hotel',5.0,4.7,'China','Shanghai','黃浦 - 外灘','20 Nanjing Road East, Huang Pu District Shanghai Shanghai 200002 中國','30774857');
INSERT INTO hotel VALUES (22,'123456','上海世茂皇家艾美酒店','Le Royal Meridien Shanghai',5.0,4.3,'China','Shanghai','黃浦 - 外灘','789 Nanjing Road East Shanghai Shanghai 200001 中國 ','30774857');
INSERT INTO hotel VALUES (23,'123456','華亨賓館','Jin Jiang Hua Ting Hotel & Towers',4.0,3.6,'China','Shanghai','徐匯','1200 Cao Xi Bei Road Shanghai Shanghai 200030 中國','30774857');
INSERT INTO hotel VALUES (24,'123456','上海靜安香格里拉大酒店','Jing An Shangri-La, West Shanghai',4.5,4.7,'China','Shanghai','長寧','1218 Middle Yan\'an Road Jing An Kerry Centre, West Nanjing Shanghai Shanghai 200040 中國','30774857');
DROP TABLE IF EXISTS hotelbooking;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE hotelbooking (
  BookingID varchar(7) NOT NULL,
  OrderDate date NOT NULL,
  StaffID varchar(10) NOT NULL,
  CustID varchar(4) NOT NULL,
  HotelID int(11) NOT NULL,
  RoomType varchar(45) NOT NULL,
  Price int(11) NOT NULL,
  RoomNum int(11) NOT NULL,
  TotalAmt int(11) NOT NULL,
  Checkin date NOT NULL,
  Checkout date NOT NULL,
  Remark varchar(255) NOT NULL,
  PRIMARY KEY (BookingID),
  KEY idx_hb_room (HotelID,RoomType),
  KEY idx_hb_StaffD (StaffID),
  KEY idx_hb_CustID (CustID),
  CONSTRAINT fk_hb_CustID FOREIGN KEY (CustID) REFERENCES customer (CustID),
  CONSTRAINT fk_hb_room FOREIGN KEY (HotelID, RoomType) REFERENCES room (HotelID, RoomType),
  CONSTRAINT fk_hb_StaffID FOREIGN KEY (StaffID) REFERENCES staff (StaffID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/

INSERT INTO `hotelbooking` (`BookingID`, `OrderDate`, `StaffID`, `CustID`, `HotelID`, `RoomType`, `Price`, `RoomNum`, `TotalAmt`, `Checkin`, `Checkout`, `Remark`) VALUES
('1', '2016-01-10', 'ning1', 'C005', 4, '標準客房', 1646, 4, 19752, '2017-04-21', '2017-04-24', ''),
('10', '2016-01-19', 'ming1', 'C002', 10, '雙人房, 2 張單人床', 781, 2, 1562, '2016-03-02', '2016-03-03', ''),
('11', '2016-01-27', 'fan1', 'C005', 6, '行政標準客房', 1603, 1, 4809, '2017-06-13', '2017-06-16', ''),
('12', '2016-01-23', 'tak1', 'C009', 17, '尊貴標準客房, 1 張特大雙人床', 2120, 4, 16960, '2016-08-24', '2016-08-26', ''),
('13', '2016-01-22', 'fai1', 'C008', 21, '費爾蒙房', 1873, 3, 28095, '2016-03-02', '2016-03-07', ''),
('14', '2016-02-05', 'shun1', 'C007', 15, 'St. Regis Suite, 1 King Bed', 2883, 3, 43245, '2016-03-15', '2016-03-20', ''),
('15', '2016-01-30', 'fai1', 'C006', 24, '豪華套房, 1 張特大雙人床', 5344, 5, 26720, '2016-09-20', '2016-09-21', ''),
('16', '2016-02-14', 'fan1', 'C010', 10, '雙人房, 1 張雙人床', 680, 3, 4080, '2017-10-09', '2017-10-11', ''),
('17', '2016-02-22', 'on1', 'C010', 21, '特色江景套房', 5619, 4, 44952, '2016-08-22', '2016-08-24', ''),
('18', '2016-02-05', 'cheong1', 'C006', 12, '經典標準客房', 1424, 1, 4272, '2017-08-12', '2017-08-15', ''),
('19', '2016-02-10', 'shun1', 'C007', 23, '行政標準客房', 911, 2, 3644, '2016-08-12', '2016-08-14', ''),
('2', '2016-02-10', 'fan1', 'C004', 2, '高級雙人房', 1007, 1, 3021, '2016-02-23', '2016-02-26', ''),
('20', '2016-01-24', 'lung1', 'C011', 22, '高級豪華房', 1278, 5, 12780, '2017-10-24', '2017-10-26', ''),
('21', '2016-02-15', 'lung1', 'C009', 20, '一樓客房', 3303, 4, 66060, '2016-06-25', '2016-06-30', ''),
('22', '2016-01-30', 'cheong1', 'C005', 17, '套房, 1 間臥室', 1281, 1, 5124, '2016-04-06', '2016-04-10', ''),
('23', '2016-01-24', 'tak1', 'C005', 14, '俱樂部標準客房', 2285, 1, 4570, '2017-06-13', '2017-06-15', ''),
('24', '2016-01-27', 'tak1', 'C009', 19, 'Grand Deluxe', 939, 1, 1878, '2016-10-22', '2016-10-24', ''),
('25', '2016-01-21', 'han1', 'C004', 10, '雙人房, 2 張單人床', 781, 2, 4686, '2016-09-21', '2016-09-24', ''),
('26', '2016-01-19', 'fai1', 'C001', 3, '尊爵高級雙人單床房', 1392, 3, 20880, '2016-04-19', '2016-04-24', ''),
('27', '2016-01-04', 'ming1', 'C001', 14, '俱樂部標準客房', 2285, 1, 11425, '2016-01-28', '2016-02-02', ''),
('28', '2016-02-06', 'ning1', 'C003', 23, '行政標準客房', 911, 3, 8199, '2016-03-02', '2016-03-05', ''),
('29', '2016-01-26', 'ning1', 'C001', 21, '費爾蒙金尊客房', 2110, 1, 8440, '2016-10-20', '2016-10-24', ''),
('3', '2016-01-22', 'fai1', 'C004', 22, '帝皇套房', 11035, 4, 44140, '2016-11-21', '2016-11-22', ''),
('30', '2016-02-17', 'ming1', 'C005', 11, '標準客房, 露台', 4452, 1, 13356, '2016-01-08', '2016-01-11', ''),
('31', '2016-02-19', 'cheong1', 'C001', 8, '傳統客房 (Japanese Style Room)', 918, 1, 918, '2016-02-26', '2016-02-27', ''),
('32', '2016-01-04', 'kuen1', 'C007', 14, '行政套房, 1 張特大雙人床', 2634, 5, 52680, '2016-11-17', '2016-11-21', ''),
('33', '2016-01-27', 'yum1', 'C011', 20, '一特大床客房', 1164, 4, 23280, '2016-11-17', '2016-11-22', ''),
('34', '2016-01-24', 'kuen1', 'C001', 14, '高級客房, 海灣景', 1182, 1, 2364, '2016-08-26', '2016-08-28', ''),
('35', '2016-01-15', 'kam1', 'C006', 3, '標準單人房', 991, 4, 11892, '2016-05-06', '2016-05-09', ''),
('36', '2016-01-12', 'ming1', 'C004', 1, '君悅客房 - 一大床', 2344, 3, 28128, '2016-07-01', '2016-07-05', ''),
('37', '2016-01-17', 'kam1', 'C004', 2, '四人房', 1655, 1, 1655, '2017-07-07', '2017-07-08', ''),
('38', '2016-02-09', 'ming1', 'C001', 16, '高級單人房', 768, 3, 4608, '2017-01-30', '2017-02-01', ''),
('39', '2016-02-17', 'ning1', 'C004', 11, '豪華標準客房', 2079, 3, 24948, '2016-03-03', '2016-03-07', ''),
('4', '2016-02-22', 'shun1', 'C004', 9, '豪華標準客房 (A Type)', 2658, 3, 7974, '2016-05-02', '2016-05-03', ''),
('40', '2016-02-14', 'fan1', 'C005', 12, '標準客房 (Swiss Advantage)', 1571, 1, 7855, '2017-01-17', '2017-01-22', ''),
('41', '2016-01-07', 'fan1', 'C001', 19, '套房', 2504, 5, 50080, '2016-03-11', '2016-03-15', ''),
('42', '2016-01-18', 'on1', 'C006', 9, '豪華標準客房, 轉角', 3522, 1, 14088, '2016-10-14', '2016-10-18', ''),
('43', '2016-01-05', 'on1', 'C001', 2, '四人房', 1655, 5, 24825, '2016-10-15', '2016-10-18', ''),
('44', '2016-02-10', 'kuen1', 'C003', 9, '普通套房 (B Type)', 3175, 1, 12700, '2016-11-10', '2016-11-14', ''),
('45', '2016-02-19', 'han1', 'C006', 2, '套房', 1364, 2, 13640, '2016-01-25', '2016-01-30', ''),
('46', '2016-01-08', 'han1', 'C005', 12, '經典標準客房', 1424, 4, 28480, '2017-05-09', '2017-05-14', ''),
('47', '2016-01-23', 'yum1', 'C010', 18, '豪華標準客房, 1 張雙人床', 244, 1, 976, '2017-06-18', '2017-06-22', ''),
('48', '2016-02-03', 'tak1', 'C001', 22, '艾美房', 1403, 4, 16836, '2016-10-12', '2016-10-15', ''),
('49', '2016-02-01', 'han1', 'C002', 17, '尊貴標準客房, 1 張特大雙人床', 2120, 4, 25440, '2016-08-04', '2016-08-07', ''),
('5', '2016-01-19', 'ning1', 'C009', 9, '豪華標準客房 (A Type)', 2658, 2, 26580, '2017-09-25', '2017-09-30', ''),
('50', '2016-01-29', 'fan1', 'C010', 1, '君悅行政套房 - 一大床', 5485, 2, 54850, '2016-04-09', '2016-04-14', ''),
('51', '2016-01-16', 'ming1', 'C010', 22, '艾美房', 1403, 1, 2806, '2017-03-07', '2017-03-09', ''),
('52', '2016-02-18', 'shun1', 'C005', 14, '俱樂部標準客房', 2285, 1, 6855, '2016-11-13', '2016-11-16', ''),
('53', '2016-01-11', 'ming1', 'C008', 19, 'Grand Deluxe', 939, 1, 1878, '2016-02-10', '2016-02-12', ''),
('54', '2016-02-19', 'on1', 'C005', 1, '君悅客房 - 一大床', 2344, 2, 9376, '2016-06-10', '2016-06-12', ''),
('55', '2016-02-21', 'kuen1', 'C001', 14, '高級客房, 海灣景', 1182, 3, 7092, '2016-11-14', '2016-11-16', ''),
('56', '2016-01-11', 'tak1', 'C006', 7, '傳統客房 (8 Tatami mat)', 706, 1, 3530, '2017-02-21', '2017-02-26', ''),
('57', '2016-02-08', 'kuen1', 'C005', 5, '精緻套房', 3747, 3, 44964, '2016-01-10', '2016-01-14', ''),
('58', '2016-01-04', 'kuen1', 'C010', 4, '中房一中床', 758, 3, 2274, '2016-07-09', '2016-07-10', ''),
('59', '2016-02-20', 'yum1', 'C008', 16, '高級單人房', 768, 3, 6912, '2016-12-03', '2016-12-06', ''),
('6', '2016-02-01', 'yum1', 'C008', 17, '套房, 1 間臥室', 1281, 3, 7686, '2016-03-23', '2016-03-25', ''),
('60', '2016-01-07', 'kuen1', 'C005', 3, '豪華雙人房', 906, 4, 7248, '2016-12-17', '2016-12-19', ''),
('61', '2016-01-17', 'fan1', 'C009', 18, '豪華標準客房, 1 張單人床', 176, 4, 2112, '2017-05-04', '2017-05-07', ''),
('62', '2016-02-18', 'kuen1', 'C004', 3, '標準單人房', 991, 2, 7928, '2017-02-24', '2017-02-28', ''),
('63', '2016-01-09', 'fai1', 'C003', 1, '頂級標準客房', 2344, 3, 21096, '2016-03-31', '2016-04-03', ''),
('64', '2016-02-21', 'fai1', 'C003', 23, '豪華大床房', 638, 5, 15950, '2016-03-08', '2016-03-13', ''),
('65', '2016-02-11', 'kam1', 'C001', 9, '標準小木屋', 3686, 4, 58976, '2016-12-27', '2016-12-31', ''),
('66', '2016-02-04', 'lung1', 'C007', 1, '君悅客房 - 一大床', 2344, 2, 23440, '2016-08-13', '2016-08-18', ''),
('67', '2016-02-01', 'kam1', 'C011', 6, '豪華雙人房', 1259, 5, 25180, '2016-06-22', '2016-06-26', ''),
('68', '2016-02-18', 'han1', 'C004', 12, 'Swiss, 行政標準客房', 1915, 1, 7660, '2016-11-25', '2016-11-29', ''),
('69', '2016-01-30', 'ning1', 'C009', 22, '豪華客房', 1153, 1, 1153, '2017-05-12', '2017-05-13', ''),
('7', '2016-01-05', 'on1', 'C012', 10, '雙人房, 2 張單人床', 781, 1, 3905, '2016-09-22', '2016-09-27', ''),
('70', '2016-02-15', 'kam1', 'C009', 24, '豪華套房, 1 張特大雙人床', 5344, 1, 21376, '2016-09-23', '2016-09-27', ''),
('71', '2016-01-07', 'yum1', 'C011', 5, '高級客房', 1635, 1, 6540, '2016-06-27', '2016-07-01', ''),
('72', '2016-01-22', 'ning1', 'C005', 16, '高級單人房', 768, 5, 11520, '2016-02-26', '2016-03-01', ''),
('8', '2016-01-03', 'yum1', 'C003', 20, '二單人床客房', 1164, 2, 6984, '2017-05-28', '2017-05-31', ''),
('9', '2016-01-07', 'cheong1', 'C002', 4, '中房一中床', 758, 4, 9096, '2017-01-08', '2017-01-11', '');

/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/
/*-------------------------------------------------------hotelbooking------------------------------------------------------------*/

DROP TABLE IF EXISTS flightbooking;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE flightbooking (
  BookingID varchar(7) NOT NULL,
  FlightNo varchar(6) NOT NULL,
  DepDateTime datetime NOT NULL,
  Class varchar(10) NOT NULL,
  OrderDate date NOT NULL,
  StaffID varchar(10) NOT NULL,
  CustID varchar(4) NOT NULL,
  AdultNum int(11) NOT NULL,
  ChildNum int(11) NOT NULL,
  InfantNum int(11) NOT NULL,
  AdultPrice int(11) NOT NULL,
  ChildPrice int(11) NOT NULL,
  InfantPrice int(11) NOT NULL,
  TotalAmt int(11) NOT NULL,
  PRIMARY KEY (BookingID,FlightNo,DepDateTime),
  KEY idx_fb_flightschedule (FlightNo,DepDateTime),
  KEY idx_fb_flightclass (FlightNo,Class),
  KEY idx_fb_StaffID (StaffID),
  KEY idx_fb_CustID (CustID),
  CONSTRAINT fk_fb_customer FOREIGN KEY (CustID) REFERENCES customer (CustID),
  CONSTRAINT fk_fb_flightclass FOREIGN KEY (FlightNo, Class) REFERENCES flightclass (FlightNo, Class),
  CONSTRAINT fk_fb_flightschedule FOREIGN KEY (FlightNo, DepDateTime) REFERENCES flightschedule (FlightNo, DepDateTime),
  CONSTRAINT fk_fb_staff FOREIGN KEY (StaffID) REFERENCES staff (StaffID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `flightbooking` (`BookingID`, `FlightNo`, `DepDateTime`, `Class`, `OrderDate`, `StaffID`, `CustID`, `AdultNum`, `ChildNum`, `InfantNum`, `AdultPrice`, `ChildPrice`, `InfantPrice`, `TotalAmt`) VALUES
('1', 'CX715', '2016-07-28 20:25:00', 'Business', '2015-01-11', 'fai1', 'C001', 1, 0, 0, 3500, 0, 0, 3500),
('2', 'EK385', '2016-07-23 21:50:00', 'Economy', '2015-01-26', 'fan1', 'C006', 1, 0, 0, 2200, 0, 0, 2200),
('3', 'HX246', '2016-06-28 13:15:00', 'Business', '2015-02-28', 'han1', 'C003', 3, 0, 1, 16800, 0, 3000, 19800),
('4', 'BR856', '2016-06-22 17:00:00', 'Economy', '2015-03-01', 'ming1', 'C003', 4, 0, 0, 4092, 0, 0, 4092),
('5', 'CI680', '2016-06-20 13:25:00', 'Business', '2015-03-01', 'ming1', 'C001', 1, 1, 1, 2977, 2977, 500, 6454),
('6', 'HX232', '2016-06-29 17:25:00', 'Economy', '2015-03-01', 'ming1', 'C001', 1, 0, 2, 2850, 0, 2400, 5250),
('7', 'CX735', '2016-07-30 14:30:00', 'Economy', '2015-04-20', 'cheong1', 'C001', 2, 0, 0, 3760, 0, 0, 3760),
('8', 'JL7050', '2016-06-23 01:45:00', 'Business', '2015-04-04', 'yum1', 'C004', 1, 2, 0, 11000, 14222, 0, 25222),
('9', 'SQ891', '2016-07-30 12:30:00', 'Economy', '2015-04-13', 'fai1', 'C007', 1, 2, 3, 3010, 6020, 2400, 11430),
('10', 'CI602', '2016-07-16 10:15:00', 'Business', '2016-07-10', 'fai1', 'C002', 1, 0, 0, 2999, 0, 0, 2999),
('11', 'CX715', '2016-07-28 20:25:00', 'Business', '2016-01-11', 'fai1', 'C002', 1, 1, 0, 3500, 3500, 0, 7000),
('12', 'CX703', '2016-07-14 17:05:00', 'Economy', '2016-07-10', 'fai1', 'C002', 1, 0, 0, 4300, 0, 0, 4300);

DROP TABLE IF EXISTS airline;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE airline (
  AirlineCode varchar(2) NOT NULL,
  `Password` varchar(10) NOT NULL,
  airlineName varchar(20) NOT NULL,
  icon varchar(20) NOT NULL,
  PRIMARY KEY (AirlineCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO airline VALUES ('BR','123456','長榮航空','Carrier2.png');
INSERT INTO airline VALUES ('CI','123456','中華航空','Carrier1.png');
INSERT INTO airline VALUES ('CX','123456','國泰航空','Carrier3.png');
INSERT INTO airline VALUES ('EK','123456','阿聯酋航空','Carrier11.png');
INSERT INTO airline VALUES ('HX','123456','香港航空','Carrier4.png');
INSERT INTO airline VALUES ('JL','123456','日本航空','Carrier7.png');
INSERT INTO airline VALUES ('KA','123456','港龍航空','Carrier5.png');
INSERT INTO airline VALUES ('MU','123456','中國東方航空','Carrier8.png');
INSERT INTO airline VALUES ('NH','123456','全日空航空','Carrier6.png');
INSERT INTO airline VALUES ('SQ','123456','新加坡航空','Carrier9.png');
INSERT INTO airline VALUES ('TG','123456','泰國國際航空','Carrier12.png');
INSERT INTO airline VALUES ('UA','123456','美國聯合航空','Carrier10.png');
DROP TABLE IF EXISTS flightclass;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE flightclass (
  FlightNo varchar(6) NOT NULL,
  Class varchar(10) NOT NULL,
  AirlineCode varchar(2) NOT NULL,
  Price_Adult int(11) NOT NULL,
  Price_Children int(11) NOT NULL,
  Price_Infant int(11) NOT NULL,
  Tax int(11) NOT NULL,
  PRIMARY KEY (FlightNo,Class),
  KEY idx_flightclass_AirlineCode (AirlineCode),
  CONSTRAINT fk_flightclass_AirlineCode FOREIGN KEY (AirlineCode) REFERENCES airline (AirlineCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO flightclass VALUES ('BR856','Economy','BR',1023,774,596,0);
INSERT INTO flightclass VALUES ('BR858','Business','BR',3088,3088,3088,0);
INSERT INTO flightclass VALUES ('BR858','Economy','BR',1023,774,596,0);
INSERT INTO flightclass VALUES ('BR872','Economy','BR',1023,774,596,0);
INSERT INTO flightclass VALUES ('CI602','Business','CI',2999,2999,500,0);
INSERT INTO flightclass VALUES ('CI602','Economy','CI',999,746,500,0);
INSERT INTO flightclass VALUES ('CI614','Economy','CI',931,694,500,0);
INSERT INTO flightclass VALUES ('CI680','Business','CI',2977,2977,500,0);
INSERT INTO flightclass VALUES ('CI680','Economy','CI',1098,792,500,0);
INSERT INTO flightclass VALUES ('CX360','Business','CX',6500,6500,2000,0);
INSERT INTO flightclass VALUES ('CX360','Economy','CX',3990,2990,1500,0);
INSERT INTO flightclass VALUES ('CX364','Business','CX',6500,6500,2000,0);
INSERT INTO flightclass VALUES ('CX364','Economy','CX',3990,2990,1500,0);
INSERT INTO flightclass VALUES ('CX400','Economy','CX',1490,1090,740,0);
INSERT INTO flightclass VALUES ('CX406','Economy','CX',1544,1155,740,0);
INSERT INTO flightclass VALUES ('CX510','Economy','CX',1554,1115,740,0);
INSERT INTO flightclass VALUES ('CX564','Economy','CX',1305,1174,760,0);
INSERT INTO flightclass VALUES ('CX617','Economy','CX',4300,3100,1300,0);
INSERT INTO flightclass VALUES ('CX659','Business','CX',3500,3500,800,0);
INSERT INTO flightclass VALUES ('CX659','Economy','CX',1760,1760,800,0);
INSERT INTO flightclass VALUES ('CX703','Economy','CX',4300,3100,1300,0);
INSERT INTO flightclass VALUES ('CX713','Business','CX',7500,7500,2000,0);
INSERT INTO flightclass VALUES ('CX713','Economy','CX',4300,3100,1300,0);
INSERT INTO flightclass VALUES ('CX715','Business','CX',3500,3500,800,0);
INSERT INTO flightclass VALUES ('CX715','Economy','CX',1880,1880,800,0);
INSERT INTO flightclass VALUES ('CX735','Economy','CX',1880,1880,800,0);
INSERT INTO flightclass VALUES ('EK385','Economy','EK',2200,1652,600,0);
INSERT INTO flightclass VALUES ('EK386','Economy','EK',2200,1652,600,0);
INSERT INTO flightclass VALUES ('EK395','Economy','EK',2200,1652,600,0);
INSERT INTO flightclass VALUES ('HX232','Business','HX',5600,5600,3000,0);
INSERT INTO flightclass VALUES ('HX232','Economy','HX',2850,1800,1200,0);
INSERT INTO flightclass VALUES ('HX234','Economy','HX',2850,1800,1200,0);
INSERT INTO flightclass VALUES ('HX236','Economy','HX',27850,1800,1200,0);
INSERT INTO flightclass VALUES ('HX246','Business','HX',5600,5600,3000,0);
INSERT INTO flightclass VALUES ('HX246','Economy','HX',2850,1800,1200,0);
INSERT INTO flightclass VALUES ('HX252','Economy','HX',1584,1152,500,0);
INSERT INTO flightclass VALUES ('HX264','Economy','HX',1584,1152,500,0);
INSERT INTO flightclass VALUES ('HX282','Economy','HX',1584,1152,500,0);
INSERT INTO flightclass VALUES ('HX284','Business','HX',2499,2499,530,0);
INSERT INTO flightclass VALUES ('HX284','Economy','HX',1584,1160,530,0);
INSERT INTO flightclass VALUES ('JL7050','Business','JL',11000,7111,800,0);
INSERT INTO flightclass VALUES ('JL7050','Economy','JL',7111,5400,600,0);
INSERT INTO flightclass VALUES ('JL7054','Economy','JL',7111,5400,750,0);
INSERT INTO flightclass VALUES ('JL7060','Business','JL',11000,7111,800,0);
INSERT INTO flightclass VALUES ('JL7060','Economy','JL',7111,5400,750,0);
INSERT INTO flightclass VALUES ('KA482','Economy','KA',1699,1140,670,0);
INSERT INTO flightclass VALUES ('KA499','Economy','KA',1699,1162,970,0);
INSERT INTO flightclass VALUES ('KA565','Economy','KA',1069,1254,670,0);
INSERT INTO flightclass VALUES ('KA802','Business','KA',8000,7900,1200,0);
INSERT INTO flightclass VALUES ('KA802','Economy','KA',4100,3050,1000,0);
INSERT INTO flightclass VALUES ('KA858','Business','KA',8050,7900,1200,0);
INSERT INTO flightclass VALUES ('KA864','Economy','KA',4100,3050,1000,0);
INSERT INTO flightclass VALUES ('KA876','Economy','KA',4100,3050,1000,0);
INSERT INTO flightclass VALUES ('MU502','Economy','MU',1990,1190,900,0);
INSERT INTO flightclass VALUES ('MU503','Economy','MU',1688,1550,400,0);
INSERT INTO flightclass VALUES ('MU509','Economy','MU',1658,1550,400,0);
INSERT INTO flightclass VALUES ('MU702','Economy','MU',1990,1190,800,0);
INSERT INTO flightclass VALUES ('MU722','Economy','MU',1893,1140,800,0);
INSERT INTO flightclass VALUES ('MU724','Economy','MU',2690,2400,1000,0);
INSERT INTO flightclass VALUES ('MU728','Economy','MU',1458,1140,400,0);
INSERT INTO flightclass VALUES ('SQ857','Economy','SQ',2950,2950,800,0);
INSERT INTO flightclass VALUES ('SQ861','Business','SQ',6500,6500,800,0);
INSERT INTO flightclass VALUES ('SQ861','Economy','SQ',3000,3050,800,0);
INSERT INTO flightclass VALUES ('SQ865','Business','SQ',6500,6500,800,0);
INSERT INTO flightclass VALUES ('SQ865','Economy','SQ',3050,3050,800,0);
INSERT INTO flightclass VALUES ('SQ871','Economy','SQ',3000,3050,800,0);
INSERT INTO flightclass VALUES ('SQ891','Economy','SQ',3010,3010,800,0);
INSERT INTO flightclass VALUES ('TG601','Business','TG',5600,5600,1200,0);
INSERT INTO flightclass VALUES ('TG601','Economy','TG',2400,1850,1000,0);
INSERT INTO flightclass VALUES ('TG603','Economy','TG',2400,1850,1000,0);
INSERT INTO flightclass VALUES ('TG607','Economy','TG',2400,1850,1000,0);
INSERT INTO flightclass VALUES ('TG639','Business','TG',5600,5600,1200,0);
INSERT INTO flightclass VALUES ('TG639','Economy','TG',2400,1850,1000,0);
DROP TABLE IF EXISTS flightschedule;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE flightschedule (
  FlightNo varchar(6) NOT NULL,
  DepDateTime datetime NOT NULL,
  ArrDateTime datetime NOT NULL,
  DepAirport varchar(3) NOT NULL,
  ArrAirport varchar(3) NOT NULL,
  FlyMinute int(11) NOT NULL,
  Aircraft varchar(10) NOT NULL,
  PRIMARY KEY (FlightNo,DepDateTime),
  KEY idx_fs_FlightNp (FlightNo),
  CONSTRAINT fk_fs_flightclass FOREIGN KEY (FlightNo) REFERENCES flightclass (FlightNo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO flightschedule VALUES ('BR856','2016-06-22 17:00:00','2016-06-22 18:45:00','HKG','TPE',105,'A330-300');
INSERT INTO flightschedule VALUES ('BR858','2016-06-22 20:55:00','2016-06-22 22:40:00','HKG','TPE',105,'A330-300');
INSERT INTO flightschedule VALUES ('BR872','2016-06-23 19:25:00','2016-06-23 21:10:00','HKG','TPE',105,'A330-300');
INSERT INTO flightschedule VALUES ('CI602','2016-07-16 10:15:00','2016-07-16 11:55:00','HKG','TPE',100,'747-400');
INSERT INTO flightschedule VALUES ('CI614','2016-06-20 17:35:00','2016-06-20 19:15:00','HKG','TPE',100,'A330-300');
INSERT INTO flightschedule VALUES ('CI680','2016-06-20 13:25:00','2016-06-20 15:05:00','HKG','TPE',100,'A330-300');
INSERT INTO flightschedule VALUES ('CX360','2016-06-25 13:55:00','2016-06-25 16:25:00','HKG','PVG',150,'A330-200');
INSERT INTO flightschedule VALUES ('CX364','2016-06-24 17:35:00','2016-06-24 20:10:00','HKG','PVG',150,'777-300');
INSERT INTO flightschedule VALUES ('CX400','2016-06-22 16:25:00','2016-06-22 18:15:00','HKG','TPE',110,'A330-300');
INSERT INTO flightschedule VALUES ('CX406','2016-06-20 12:15:00','2016-06-20 14:15:00','HKG','TPE',120,'A330-300');
INSERT INTO flightschedule VALUES ('CX510','2016-06-22 14:55:00','2016-06-22 16:45:00','HKG','TPE',110,'A330-300');
INSERT INTO flightschedule VALUES ('CX564','2016-06-20 13:10:00','2016-06-20 15:05:00','HKG','TPE',115,'A330-300');
INSERT INTO flightschedule VALUES ('CX617','2016-07-24 21:20:00','2016-07-24 23:10:00','HKG','BKK',175,'777-300');
INSERT INTO flightschedule VALUES ('CX659','2016-07-28 01:45:00','2016-07-28 05:25:00','HKG','SIN',220,'A330-300');
INSERT INTO flightschedule VALUES ('CX703','2016-07-14 17:05:00','2016-07-14 19:00:00','HKG','BKK',170,'A330-300');
INSERT INTO flightschedule VALUES ('CX713','2016-07-22 08:50:00','2016-07-22 10:40:00','HKG','BKK',170,'A330-300');
INSERT INTO flightschedule VALUES ('CX715','2016-07-28 20:25:00','2016-07-28 00:15:00','HKG','SIN',230,'777-300');
INSERT INTO flightschedule VALUES ('CX715','2016-07-29 20:25:00','2016-07-29 00:15:00','HKG','SIN',230,'777-300');
INSERT INTO flightschedule VALUES ('CX735','2016-07-30 14:30:00','2016-07-30 18:20:00','HKG','SIN',230,'A340-300');
INSERT INTO flightschedule VALUES ('EK385','2016-07-22 21:50:00','2016-07-22 23:45:00','HKG','BKK',175,'A380-800');
INSERT INTO flightschedule VALUES ('EK385','2016-07-23 21:50:00','2016-07-23 23:45:00','HKG','BKK',175,'A380-800');
INSERT INTO flightschedule VALUES ('EK386','2016-07-24 19:50:00','2016-07-24 21:45:00','HKG','BKK',175,'A380-800');
INSERT INTO flightschedule VALUES ('EK395','2016-07-25 17:50:00','2016-07-25 19:45:00','HKG','BKK',175,'A380-800');
INSERT INTO flightschedule VALUES ('HX232','2016-06-29 17:25:00','2016-06-29 19:55:00','HKG','PVG',150,'A330-200');
INSERT INTO flightschedule VALUES ('HX234','2016-06-29 21:00:00','2016-06-29 23:25:00','HKG','PVG',145,'A330-200');
INSERT INTO flightschedule VALUES ('HX236','2016-06-30 08:15:00','2016-06-30 10:50:00','HKG','PVG',155,'A330-200');
INSERT INTO flightschedule VALUES ('HX246','2016-06-28 13:15:00','2016-06-28 15:45:00','HKG','PVG',150,'A330-200');
INSERT INTO flightschedule VALUES ('HX252','2016-06-21 09:30:00','2016-06-21 11:25:00','HKG','TPE',115,'A330-300');
INSERT INTO flightschedule VALUES ('HX264','2016-06-20 12:10:00','2016-06-20 13:50:00','HKG','TPE',100,'A330-300');
INSERT INTO flightschedule VALUES ('HX282','2016-06-20 17:40:00','2016-06-20 19:30:00','HKG','TPE',110,'A330-300');
INSERT INTO flightschedule VALUES ('HX284','2016-06-23 22:50:00','2016-06-24 00:40:00','HKG','TPE',110,'A330-300');
INSERT INTO flightschedule VALUES ('JL7050','2016-06-23 01:45:00','2016-06-23 06:25:00','HKG','KIX',220,'A320');
INSERT INTO flightschedule VALUES ('JL7054','2016-06-25 13:10:00','2016-06-25 20:00:00','HKG','KIX',350,'A320');
INSERT INTO flightschedule VALUES ('JL7060','2016-06-23 07:55:00','2016-06-23 12:45:00','HKG','KIX',230,'A320');
INSERT INTO flightschedule VALUES ('KA482','2016-06-20 18:25:00','2016-06-20 20:15:00','HKG','TPE',115,'A330-300');
INSERT INTO flightschedule VALUES ('KA499','2016-06-21 14:55:00','2016-06-21 16:45:00','HKG','TPE',110,'A330-300');
INSERT INTO flightschedule VALUES ('KA565','2016-06-24 17:00:00','2016-06-24 18:45:00','HKG','TPE',105,'A330-300');
INSERT INTO flightschedule VALUES ('KA802','2016-06-24 08:00:00','2016-06-24 10:30:00','HKG','PVG',150,'A330-200');
INSERT INTO flightschedule VALUES ('KA858','2016-09-30 10:00:00','2016-09-30 12:20:00','HKG','SHA',140,'A330-200');
INSERT INTO flightschedule VALUES ('KA864','2016-07-15 09:25:00','2016-07-15 12:00:00','HKG','SHA',155,'A330-200');
INSERT INTO flightschedule VALUES ('KA876','2016-06-22 09:55:00','2016-06-22 12:30:00','HKG','PVG',155,'A321');
INSERT INTO flightschedule VALUES ('MU502','2016-06-25 12:50:00','2016-06-25 15:25:00','HKG','PVG',155,'A321');
INSERT INTO flightschedule VALUES ('MU702','2016-06-26 13:55:00','2016-06-26 16:25:00','HKG','PVG',150,'A320');
INSERT INTO flightschedule VALUES ('MU724','2016-06-25 09:35:00','2016-06-25 11:45:00','HKG','PVG',130,'A321');
INSERT INTO flightschedule VALUES ('SQ857','2016-07-28 09:05:00','2016-07-28 12:50:00','HKG','SIN',225,'777-300');
INSERT INTO flightschedule VALUES ('SQ861','2016-07-26 15:20:00','2016-07-26 19:10:00','HKG','SIN',230,'A380-800');
INSERT INTO flightschedule VALUES ('SQ865','2016-07-26 18:50:00','2016-07-26 22:35:00','HKG','SIN',225,'777-300');
INSERT INTO flightschedule VALUES ('SQ871','2016-07-26 19:55:00','2016-07-26 23:40:00','HKG','SIN',225,'777-200');
INSERT INTO flightschedule VALUES ('SQ891','2016-07-30 12:30:00','2016-07-30 16:15:00','HKG','SIN',225,'A380-800');
INSERT INTO flightschedule VALUES ('TG601','2016-07-24 13:25:00','2016-07-24 15:05:00','HKG','BKK',160,'A380-800');
INSERT INTO flightschedule VALUES ('TG603','2016-07-25 07:45:00','2016-07-25 09:25:00','HKG','BKK',160,'A330-300');
INSERT INTO flightschedule VALUES ('TG607','2016-07-22 20:45:00','2016-07-22 22:25:00','HKG','BKK',160,'747-400');
INSERT INTO flightschedule VALUES ('TG639','2016-07-22 19:05:00','2016-07-22 20:45:00','HKG','BKK',160,'A330-300');
DROP TABLE IF EXISTS staff;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE staff (
  StaffID varchar(10) NOT NULL DEFAULT '',
  `Name` varchar(25) NOT NULL,
  Sex varchar(1) NOT NULL,
  Branch varchar(4) NOT NULL,
  Email varchar(25) NOT NULL,
  `Password` varchar(10) NOT NULL,
  Post varchar(25) NOT NULL,
  Supervisor varchar(10) DEFAULT NULL,
  PRIMARY KEY (StaffID),
  KEY idx_staff_Supervisor (Supervisor),
  CONSTRAINT fk_staff_StaffID FOREIGN KEY (Supervisor) REFERENCES staff (StaffID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO staff VALUES ('cheong1','Lam Sin Cheong','M','ST02','cheong@tt.com','123456','Customer Service Officer','on1');
INSERT INTO staff VALUES ('fai1','Siu Yao Fai','M','MK01','fai@tt.com','123456','Branch Manager','fan1');
INSERT INTO staff VALUES ('fan1','Tang Cheuk Fan','M','ST01','fan@tt.com','123456','CEO',NULL);
INSERT INTO staff VALUES ('han1','Chan Yuen Han','F','TS01','han@tt.com','123456','Customer Service Officer','shun1');
INSERT INTO staff VALUES ('kam1','Yuk Siu Kam','F','ST01','kam@tt.com','123456','Branch Manager','fan1');
INSERT INTO staff VALUES ('kuen1','Leung Siu Kuen','M','TW01','kuen@tt.com','123456','Branch Manager','fan1');
INSERT INTO staff VALUES ('lung1','Kam Hiu Lung','M','TS01','lung@tt.com','123456','Customer Service Officer','shun1');
INSERT INTO staff VALUES ('ming1','Cheung Ming','M','MK01','ming@tt.com','123456','Customer Service Officer','fai1');
INSERT INTO staff VALUES ('ning1','Leung Chin Ning','F','TW01','ning@tt.com','123456','Customer Service Officer','kuen1');
INSERT INTO staff VALUES ('on1','Lam Hin On','M','ST02','on@tt.com','123456','Branch Manager','fan1');
INSERT INTO staff VALUES ('shun1','Chan Tai Shun','M','TS01','shun@tt.com','123456','Branch Manager','fan1');
INSERT INTO staff VALUES ('tak1','Au Siu Tak','M','MK01','tak@tt.com','123456','Customer Service Officer','fai1');
INSERT INTO staff VALUES ('yum1','Chan See Yum','F','ST01','yum@tt.com','123456','Customer Service Officer','kam1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

