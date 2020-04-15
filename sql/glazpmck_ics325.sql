CREATE DATABASE  IF NOT EXISTS `glazpmck_ics325` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `glazpmck_ics325`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: glazpmck_ics325
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `City_ID` int NOT NULL,
  `CityName` varchar(32) NOT NULL,
  `CityDescription` text,
  `map_x` double DEFAULT NULL,
  `map_y` double DEFAULT NULL,
  `Country` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`City_ID`),
  KEY `Country_idx` (`Country`),
  CONSTRAINT `City_ID` FOREIGN KEY (`City_ID`) REFERENCES `sitemap` (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (7,'Qeqertarsuatsiaat','If you like a small-town getaway feel with treasure hunts and whales, then this is the location for you!',15,35,'GL'),(8,'Bad Kissingen','I know what you may be thinking… does the name of this region really speak for the millions of kissers that live there? It’s possible, but situations have not been reported. ',35,50,'DE'),(10,'Alice Springs','This location is geared more towards spring breakers. Australia is known for hot and hip culture.',76,82.5,'AU'),(12,'Los Angeles','Los Angeles is a water-park of dreams! Every year floods provide entertainment beyond your wildest dreams!',45,16,'US'),(13,'Mwanza','Africa has so many things to offer. Mwanza is practically off the grid, but be warned... this travel destination isn’t for the weak.',60,53,'AF'),(16,'Snezhngorsk','This location is a closed city. You know what this means! It means that like spy movies, and other video games... the main goal is to infiltrate and become one with this city.',25,70,'RU');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `Country_ID` varchar(2) NOT NULL,
  `CountryName` varchar(32) NOT NULL,
  PRIMARY KEY (`Country_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('AD','Andorra'),('AE','United Arab Emirates'),('AF','Afghanistan'),('AG','Antigua & Barbuda'),('AI','Anguilla'),('AL','Albania'),('AM','Armenia'),('AN','Netherland Antilles'),('AO','Angola'),('AR','Argentina'),('AS','American Samoa'),('AT','Austria'),('AU','Australia'),('AW','Aruba'),('AZ','Azerbaijan'),('BA','Bosnia & Herzegovina'),('BB','Barbados'),('BD','Bangladesh'),('BE','Belgium'),('BF','Burkina Faso'),('BG','Bulgaria'),('BH','Bahrain'),('BI','Burundi'),('BJ','Benin'),('BL','St Barthelemy'),('BM','Bermuda'),('BN','Brunei'),('BO','Bolivia'),('BQ','St Eustatius'),('BR','Brazil'),('BS','Bahamas'),('BT','Bhutan'),('BW','Botswana'),('BY','Belarus'),('BZ','Belize'),('CA','Canada'),('CC','Cocos Island'),('CF','Central African Republic'),('CG','Congo'),('CH','Switzerland'),('CI','Cote DIvoire'),('CK','Cook Islands'),('CL','Chile'),('CM','Cameroon'),('CN','China'),('CO','Colombia'),('CR','Costa Rica'),('CU','Cuba'),('CV','Cape Verde'),('CW','Curacao'),('CX','Christmas Island'),('CY','Cyprus'),('CZ','Czech Republic'),('DE','Germany'),('DJ','Djibouti'),('DK','Denmark'),('DM','Dominica'),('DO','Dominican Republic'),('DZ','Algeria'),('EC','Ecuador'),('EE','Estonia'),('EG','Egypt'),('ER','Eritrea'),('ES','Spain'),('ET','Ethiopia'),('FI','Finland'),('FJ','Fiji'),('FK','Falkland Islands'),('FO','Faroe Islands'),('FR','France'),('GA','Gabon'),('GB','United Kingdom'),('GE','Georgia'),('GF','French Guiana'),('GH','Ghana'),('GI','Gibraltar'),('GL','Greenland'),('GM','Gambia'),('GN','Guinea'),('GP','Guadeloupe'),('GQ','Equatorial Guinea'),('GR','Greece'),('GT','Guatemala'),('GU','Guam'),('GY','Guyana'),('HK','Hong Kong'),('HN','Honduras'),('HR','Croatia'),('HT','Haiti'),('HU','Hungary'),('IC','Canary Islands'),('ID','Indonesia'),('IE','Ireland'),('IL','Israel'),('IM','Isle of Man'),('IN','India'),('IO','British Indian Ocean Ter'),('IQ','Iraq'),('IR','Iran'),('IS','Iceland'),('IT','Italy'),('JE','Channel Islands'),('JM','Jamaica'),('JO','Jordan'),('JP','Japan'),('KE','Kenya'),('KG','Kyrgyzstan'),('KH','Cambodia'),('KI','Kiribati'),('KM','Comoros'),('KN','Nevis'),('KP','Korea North'),('KR','Korea South'),('KW','Kuwait'),('KY','Cayman Islands'),('KZ','Kazakhstan'),('LA','Laos'),('LB','Lebanon'),('LC','St Lucia'),('LI','Liechtenstein'),('LK','Sri Lanka'),('LR','Liberia'),('LS','Lesotho'),('LT','Lithuania'),('LU','Luxembourg'),('LV','Latvia'),('LY','Libya'),('MA','Morocco'),('MC','Monaco'),('MD','Moldova'),('ME','Montenegro'),('MF','St Maarten'),('MG','Madagascar'),('MH','Marshall Islands'),('MI','Midway Islands'),('MK','Macedonia'),('ML','Mali'),('MM','Myanmar'),('MN','Mongolia'),('MO','Macao'),('MP','Saipan'),('MQ','Martinique'),('MR','Mauritania'),('MS','Montserrat'),('MT','Malta'),('MU','Mauritius'),('MV','Maldives'),('MW','Malawi'),('MX','Mexico'),('MY','Malaysia'),('MZ','Mozambique'),('NA','Nambia'),('NC','New Caledonia'),('NE','Niger'),('NF','Norfolk Island'),('NG','Nigeria'),('NI','Nicaragua'),('NL','Netherlands (Holland, Europe)'),('NO','Norway'),('NP','Nepal'),('NR','Nauru'),('NU','Niue'),('NZ','New Zealand'),('OM','Oman'),('PA','Panama'),('PE','Peru'),('PF','French Polynesia'),('PG','Papua New Guinea'),('PH','Philippines'),('PK','Pakistan'),('PL','Poland'),('PM','St Pierre & Miquelon'),('PN','Pitcairn Island'),('PR','Puerto Rico'),('PS','Palestine'),('PT','Portugal'),('PW','Palau Island'),('PY','Paraguay'),('QA','Qatar'),('RE','Reunion'),('RO','Romania'),('RS','Serbia'),('RU','Russia'),('RW','Rwanda'),('SA','Saudi Arabia'),('SB','Solomon Islands'),('SC','Seychelles'),('SD','Sudan'),('SE','Sweden'),('SG','Singapore'),('SH','St Helena'),('SI','Slovenia'),('SK','Slovakia'),('SL','Sierra Leone'),('SM','San Marino'),('SN','Senegal'),('SO','Somalia'),('SR','Suriname'),('ST','Sao Tome & Principe'),('SV','El Salvador'),('SY','Syria'),('SZ','Swaziland'),('TC','Turks & Caicos Is'),('TD','Chad'),('TF','French Southern Ter'),('TG','Togo'),('TH','Thailand'),('TJ','Tajikistan'),('TK','Tokelau'),('TL','Timor-Leste'),('TM','Turkmenistan'),('TN','Tunisia'),('TO','Tonga'),('TR','Turkey'),('TT','Trinidad & Tobago'),('TV','Tuvalu'),('TW','Taiwan'),('TZ','Tanzania'),('UA','Ukraine'),('UG','Uganda'),('US','United States of America'),('UY','Uruguay'),('UZ','Uzbekistan'),('VA','Vatican City State'),('VC','St Vincent & Grenadines'),('VE','Venezuela'),('VG','Virgin Islands (Brit)'),('VI','Virgin Islands (USA)'),('VN','Vietnam'),('VU','Vanuatu'),('WF','Wallis & Futana Is'),('WK','Wake Island'),('WS','Samoa'),('YE','Yemen'),('YT','Mayotte'),('ZA','South Africa'),('ZM','Zambia'),('ZW','Zimbabwe');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expedition`
--

DROP TABLE IF EXISTS `expedition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expedition` (
  `Expedition_ID` int NOT NULL AUTO_INCREMENT,
  `ExpeditionName` varchar(32) NOT NULL,
  `ExpeditionType` varchar(24) NOT NULL,
  `ExpeditionDescription` text,
  `ExpeditionMetatags` varchar(72) DEFAULT NULL,
  `Location_ID` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Expedition_ID`),
  KEY `Location_ID` (`Location_ID`),
  CONSTRAINT `expedition_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`location_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expedition`
--

LOCK TABLES `expedition` WRITE;
/*!40000 ALTER TABLE `expedition` DISABLE KEYS */;
INSERT INTO `expedition` VALUES (1,'Techno Party','dancing','Go down to The Techno house and see where the real party is. Not for the feignt of heart as mo\'foes be wearing latex undies and what-not','dancing,music,club,party','BB0002'),(2,'Whale watching tour','experience','Get on a boat, see some big ass fish, that\'s fun right','tour, whales, boat','KK0001'),(3,'Dallas Cowboy Football game','experience','Go to Jerry-land. Buy a 20 dollar pop, see big lights and maybe even see a grandslam touchdown','football,cowboys,event,game','TD0002');
/*!40000 ALTER TABLE `expedition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `location_ID` varchar(6) NOT NULL,
  `LocationName` varchar(32) NOT NULL,
  `LocationType` varchar(24) NOT NULL,
  `MapCoord_x` decimal(8,5) DEFAULT NULL,
  `MapCoord_y` decimal(8,5) DEFAULT NULL,
  `Country_ID` varchar(2) NOT NULL,
  `State_ID` varchar(6) NOT NULL,
  `City_ID` int NOT NULL,
  PRIMARY KEY (`location_ID`),
  KEY `State_ID` (`State_ID`),
  KEY `Country_ID` (`Country_ID`),
  CONSTRAINT `location_ibfk_1` FOREIGN KEY (`State_ID`) REFERENCES `state` (`State_ID`),
  CONSTRAINT `location_ibfk_2` FOREIGN KEY (`Country_ID`) REFERENCES `country` (`Country_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES ('BB0001','Brats and Krauts','Food',35.00000,50.00000,'DE','BAVARI',8),('BB0002','Techno House','Venue',35.00000,50.00000,'DE','BAVARI',8),('KK0001','Albatros Artic Circle','Tours',35.00000,15.00000,'GL','KINGDE',6),('KK0002','Muskox','Food',35.00000,15.00000,'GL','KINGDE',6),('TD0001','Dallas Museum Of Art','Education',45.00000,16.00000,'US','TEXAS',18),('TD0002','AT&T Stadium','Sports',45.00000,16.00000,'US','TEXAS',18);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviewlist`
--

DROP TABLE IF EXISTS `reviewlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviewlist` (
  `User_ID` int NOT NULL,
  `Rating` int NOT NULL,
  `ReviewType` varchar(24) NOT NULL,
  `Review` text,
  `ReviewHeadline` text,
  `Country` varchar(2) DEFAULT NULL,
  `City` varchar(6) DEFAULT NULL,
  `ReviewID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ReviewID`),
  KEY `Country_idx` (`Country`),
  CONSTRAINT `Country` FOREIGN KEY (`Country`) REFERENCES `country` (`Country_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviewlist`
--

LOCK TABLES `reviewlist` WRITE;
/*!40000 ALTER TABLE `reviewlist` DISABLE KEYS */;
INSERT INTO `reviewlist` VALUES (200000,2,'Expedition','Hated it. Shitty DJ',NULL,NULL,NULL,1),(200001,5,'Location','The Techno house was a way cooler place to hang-out then I though, the back bar that was an old tank was AMAZEBALLS',NULL,NULL,NULL,2),(200002,3,'Location','Garbage ass texas, get me outta here! Anything would be better than this boring as stadium',NULL,NULL,NULL,3);
/*!40000 ALTER TABLE `reviewlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `savedlist`
--

DROP TABLE IF EXISTS `savedlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `savedlist` (
  `User_ID` int NOT NULL,
  `Expedition_ID` int DEFAULT NULL,
  `Location_ID` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `Location_ID` (`Location_ID`),
  KEY `Expedition_ID` (`Expedition_ID`),
  CONSTRAINT `savedlist_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`location_ID`),
  CONSTRAINT `savedlist_ibfk_2` FOREIGN KEY (`Expedition_ID`) REFERENCES `expedition` (`Expedition_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `savedlist`
--

LOCK TABLES `savedlist` WRITE;
/*!40000 ALTER TABLE `savedlist` DISABLE KEYS */;
INSERT INTO `savedlist` VALUES (200000,NULL,'BB0002'),(200001,NULL,NULL),(200002,3,'TD0002');
/*!40000 ALTER TABLE `savedlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitemap`
--

DROP TABLE IF EXISTS `sitemap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sitemap` (
  `PageTitle` varchar(32) NOT NULL,
  `BGImg` varchar(32) DEFAULT NULL,
  `BGImgAlt` text,
  `pageID` int NOT NULL,
  `PageName` varchar(45) NOT NULL,
  `Content` longtext,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitemap`
--

LOCK TABLES `sitemap` WRITE;
/*!40000 ALTER TABLE `sitemap` DISABLE KEYS */;
INSERT INTO `sitemap` VALUES ('Your Expeditions Start Here','background.jpg','Cliffs of Moor, Ireland',1,'Index',NULL),('The Wanderer\'s Blog','mountains.jpg','Gone Wandering...',2,'Blog',NULL),('Choose Your Expedition',NULL,NULL,3,'Expedtions',NULL),('Login To Your Account','islandBackground.jpg','Desert island',4,'Login',NULL),('New User Registration','marley_resort.jpg','Bob Marley Resort, Nasau, Bahamas',5,'Register',NULL),('Qeqertarsuatsiaat, Greenland','qeqertarsuatsiaat.jpg','Small Town, Large Mountains',7,'Qeqertarsuatsiaat','If you like a small-town getaway feel with treasure hunts and whales, then this is the location for you! A town of about 200 people, they sure do know how to make you feel welcome and introduce you to the community. Qeqertarsuatsiaat thrive on their trade of salmon, cod, whale blubber, seal and seal skins, and mining. Due to this way of life, hunting parties, fishing fun, and treasure hunting is availably to all. Imagine you and your cohorts venture through the mines digging for rubies and pink sapphires!  Or volunteering to help those in need by organizing food packing parties as a way to give back to the world. If you simply want to fish, that is another relaxing way to vay-cay. Hop on a boat, bring some food... you will be sailing for a while.'),('Bad Kissingen, Germany','bad-kissingen.jpg','Sleeping in Bad Kissingen',8,'Bad Kissingen','I know what you may be thinking... does the name of this region really speak for the millions of kissers that live there? It\'s possible, but situations have not bee reported. You would think that the hot mineral springs would set a better tone for such a situation... but let\'s leave it to our reviewers to tell their tails! Though the natural springs sound lovely, it is the perfect getaway if you want peace and quiet and a whole lot of sleep. The residents and visitors will be fitted with a wearable device that tracks human habits that would eventually read people as having the same patterns. The towns experiment simulates dusk and down. Talk about relaxing! Kiss the world of waking goodnight!'),('Alice Springs Australia','alice-springs.jpg','Bonfires with the Locals',10,'Alice Springs','This location is geared more towards spring breakers. Australia is known for hot and hip culture. Types of events include bonfires, camp fires, fire performers, and it’s really thanks to nature. The beautiful embers of red, and the mythical smoke produced by the natural fires each year produce somewhat of a giant fire festival. Fire enables new to be born, so everyone celebrates by extinguishing the flames so the new form of life can begin. Nations have helped partake in this event in recent years. If you like a warm destination with majestic flames... this hot spot is for you!'),('Los Angeles, CA, USA','los-angeles.jpg','Tubing through Los Angeles',12,'Los Angeles','Los Angeles is a water-park of dreams! Every year floods provide entertainment beyond your wildest dreams! Like locations that have snowmobiling when snow hits, Los Angeles has boats and tubing when the floods hit! It is very popular amongst the younger crowds and quite a site to see. Most businesses shut down to partake in the activities, but some stay open to provide food services. Some other activities closer to the evening include stargazing from the roof tops with your pets, it’s almost as if every person in Los Angeles stops to take a breath because there is no place they\'d rather be than to sit atop a roof with family and friends... possibly strangers, but how else are you going to meet people! They are a friendly type in this area. Prepare yourself for tubing, water skiing, star gazing from rooftops, and the food... well you are just going to have to see for yourself!'),('Mwanza, Africa','mwanza.jpg','Calm before the Storm',13,'Mwanza','Africa has so many things to offer. Mwanza is practically off the grid, but be warned... this travel destination isn’t for the weak. This is for the more experienced live off the land travelers. Believe it or not, isolation and survival skills are a way from some people to relax. Instead of playing war video games, you can participate in real life here. While the town is populated and developing their region, there are those surprise visits in which people must defend their lives. It’s almost like grand theft auto, but a bit more inclusive. You travel through tribes, developed land, or just nature itself on your own. Regardless, this is more of a thrill seeker type area where you would journey as a minimalist.'),('Snezhngorsk, Russia','snezhnogorsk.jpg','Closed City of Snezhnogorsk',16,'Snezhngorsk','This location is a closed city. You know what this means! It means that like spy movies, and other video games... the main goal is to infiltrate and become one with this city. Once you do that the rest of your vacation will flourish. One option is touring the Naval Nerpa Shipyard. Since there are only 12,000 for the population, this shipyard is the main employer. The shipyard services and repairs nuclear submarines, wouldn\'t that be a sight to behold? Different character you could play would be an asylum seeker, double agent, or deserter. Think of this opportunity as a live action role play (larp). This destination is definitely a larper\'s dream.');
/*!40000 ALTER TABLE `sitemap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `State_ID` varchar(6) NOT NULL,
  `StateName` varchar(32) NOT NULL,
  `Country_ID` varchar(2) NOT NULL,
  PRIMARY KEY (`State_ID`),
  KEY `Country_ID` (`Country_ID`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`Country_ID`) REFERENCES `country` (`Country_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES ('BAVARI','Bavaria','DE'),('KINGDE','Kingdom of Denmark','GL'),('TEXAS','Texas','US');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(72) NOT NULL,
  `FName` varchar(24) NOT NULL,
  `LName` varchar(24) NOT NULL,
  `Psword` varchar(42) NOT NULL,
  `DOB` date NOT NULL,
  `Origin` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=200003 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (200000,'mikekn@gmail.com','Mike','Kn','p@ssw0rd','1989-09-09','USA'),(200001,'meygansc@yahoo.com','Meygan','Sc','123098','1990-10-10','Merica'),(200002,'nickok@mail.net','Nick','Ok','de094f0212bca2b964835017ef893fe8','1991-11-11','The US of A');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-14 21:39:38
