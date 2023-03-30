-- MySQL dump 10.13  Distrib 5.1.46, for suse-linux-gnu (i686)
--
-- Host: localhost    Database: nienik_fakebook
-- ------------------------------------------------------
-- Server version	5.1.46-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `nienik_fakebook`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `nienik_fakebook` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `nienik_fakebook`;

--
-- Table structure for table `fakebook_friendships`
--

DROP TABLE IF EXISTS `fakebook_friendships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakebook_friendships` (
  `kaverisuhdeid` int(11) NOT NULL AUTO_INCREMENT,
  `pyytajanid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kohdeid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT 'n = nope, not answered , y = yes they are friends',
  PRIMARY KEY (`kaverisuhdeid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakebook_friendships`
--

LOCK TABLES `fakebook_friendships` WRITE;
/*!40000 ALTER TABLE `fakebook_friendships` DISABLE KEYS */;
INSERT INTO `fakebook_friendships` VALUES (11,'5','4','y'),(10,'4','6','y'),(19,'4','7','n'),(6,'8','7','y'),(9,'8','4','y'),(12,'7','6','y'),(15,'8','6','n'),(14,'7','5','n'),(16,'9','4','y'),(17,'10','9','y'),(18,'4','10','y'),(20,'7','9','n'),(22,'4','11','y');
/*!40000 ALTER TABLE `fakebook_friendships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakebook_kuvat`
--

DROP TABLE IF EXISTS `fakebook_kuvat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakebook_kuvat` (
  `kuvaid` int(11) NOT NULL AUTO_INCREMENT,
  `kuvannimi` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  `omistaja` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kuvaid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakebook_kuvat`
--

LOCK TABLES `fakebook_kuvat` WRITE;
/*!40000 ALTER TABLE `fakebook_kuvat` DISABLE KEYS */;
INSERT INTO `fakebook_kuvat` VALUES (1,'img-1288400401174.jpeg','7'),(3,'talvikuvai.jpg','4'),(4,'lumia800.jpg','4');
/*!40000 ALTER TABLE `fakebook_kuvat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakebook_palaute`
--

DROP TABLE IF EXISTS `fakebook_palaute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakebook_palaute` (
  `palauteid` int(11) NOT NULL AUTO_INCREMENT,
  `lahettaja` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `otsikko` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kommentti` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`palauteid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakebook_palaute`
--

LOCK TABLES `fakebook_palaute` WRITE;
/*!40000 ALTER TABLE `fakebook_palaute` DISABLE KEYS */;
INSERT INTO `fakebook_palaute` VALUES (1,'Niko Nieminen','niko.nieminen@ppq.inet.fi','Testi','testi testi testi testi testi testi testi!');
/*!40000 ALTER TABLE `fakebook_palaute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakebook_users`
--

DROP TABLE IF EXISTS `fakebook_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakebook_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sposti` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `etunimi` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sukunimi` varchar(84) COLLATE utf8_unicode_ci NOT NULL,
  `syntymapaiva` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `syntymakuukausi` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `syntymavuosi` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `sukupuoli` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `ilme` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sposti` (`sposti`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakebook_users`
--

LOCK TABLES `fakebook_users` WRITE;
/*!40000 ALTER TABLE `fakebook_users` DISABLE KEYS */;
INSERT INTO `fakebook_users` VALUES (4,'niko.nieminen@ppq.inet.fi','*CFEE360FDF33E02FF56F63EB0926BA92134F84ED','Niko','Nieminen','25','joulukuu','1993','Mies','ragequit.jpg'),(5,'fsfsfs','*1E446C0A5569A4DF26D31D1DE02EE51B9FC88812','fsafs','fsfsfssfsf','1','tammikuu','1996','Mies',''),(6,'punto.pinto@fiat.fi','*33009E699A40546AAEDDE45B11727756431BEBF8','Yrjö','Yläfemma','8','kesäkuu','1941','Mies','arsyyntynyt.jpg'),(7,'testi.testaaja@testi.com','*CFEE360FDF33E02FF56F63EB0926BA92134F84ED','Testi','Testaaja','1','tammikuu','1930','Mies','hymyileva.jpg'),(8,'jari.suomalainen@hotmail.com','*D36F00B81C7E8087ADABF47F2FBC71E7F7B30561','Jari','Suomalainen','4','maaliskuu','1993','Mies','hymyileva.jpg'),(9,'justjoo68@luukku.com','*2536E9983EA3CA3905C3A6D0083F180DF6A7340D','Jouko','Halminen','','','','','turhautunut.png'),(10,'supupo93@hotmail.com','*CFEE360FDF33E02FF56F63EB0926BA92134F84ED','Shuppo','Shuppondalen','25','joulukuu','1993','Mies','turhautunut.png'),(11,'a','*667F407DE7C6AD07358FA38DAED7828A72014B4E','a','a','2','heinäkuu','1925','Nainen','');
/*!40000 ALTER TABLE `fakebook_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakebook_yhteisot`
--

DROP TABLE IF EXISTS `fakebook_yhteisot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakebook_yhteisot` (
  `yhteisoid` int(11) NOT NULL AUTO_INCREMENT,
  `yhteisonimi` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tekijaen` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tekijasn` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kuvaus` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`yhteisoid`),
  UNIQUE KEY `yhteisonimi` (`yhteisonimi`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakebook_yhteisot`
--

LOCK TABLES `fakebook_yhteisot` WRITE;
/*!40000 ALTER TABLE `fakebook_yhteisot` DISABLE KEYS */;
INSERT INTO `fakebook_yhteisot` VALUES (1,'Jalkapallo','Niko','Nieminen','Kaikki, ketkä pitävät futiksesta, liitytte tähän!'),(4,'Blues - musiikki','Testi','Testaaja','Kaikki tänne ketkä pitävät vanhan kunnon bluesista!'),(5,'PHP-Mysql','Niko','Nieminen','Tänne kuuluvat kaikki käyttäjät, jotka tykkäävät phpstä ja mysqlistä!'),(6,'PHP-ohjelmointi','Niko','Nieminen','Tänne yhteisöön kaikki ketkä rakastavat PHPtä'),(7,'Esko Lankila','Jouko','Halminen','esko'),(8,'Shuppo - Maailman kuningas','Shuppo','Shuppondalen','Title sanoo jo kaiken!'),(9,'Jääkiekko','Niko','Nieminen','Tänne kaikki ketkä rakastavat jääkiekkoa');
/*!40000 ALTER TABLE `fakebook_yhteisot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seina`
--

DROP TABLE IF EXISTS `seina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seina` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `viestid` int(11) NOT NULL AUTO_INCREMENT,
  `hostid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tekijaid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `seinaetunimi` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `seinasukunimi` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tilapaivitys` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `kuvanimi` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  `paivitysaika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`viestid`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seina`
--

LOCK TABLES `seina` WRITE;
/*!40000 ALTER TABLE `seina` DISABLE KEYS */;
INSERT INTO `seina` VALUES ('5',60,'51','4','Niko','Nieminen','SOLOLOLOLOLOOLOLOLL','','2012-02-04 19:49:54'),('6',9,'0','4','Niko','Nieminen','Mun profiili on parempi kuin sun profiili :P','','2012-02-02 21:50:28'),('4',49,'22','6','Yrjö','Yläfemma','SOLOLOLOLOOOOOLOLOLOLOL','','2012-02-03 19:14:42'),('4',59,'0','4','Niko','Nieminen','Lisäys etusivun kautta!','','2012-02-04 19:42:17'),('5',58,'51','4','Niko','Nieminen','Nii o','','2012-02-04 19:40:37'),('4',46,'36','4','Niko','Nieminen','YAA','','2012-02-03 17:57:15'),('6',47,'21','4','Niko','Nieminen','NI PYSTYN','','2012-02-03 17:57:35'),('5',51,'0','6','Yrjö','Yläfemma','ES ON JONNEJEN JUOMA!','','2012-02-03 19:15:24'),('6',48,'9','6','Yrjö','Yläfemma','Sinun profiilisi on minunkin profiilini.','','2012-02-03 19:13:49'),('4',22,'0','4','Niko','Nieminen','If you want your fakebook to work, you got to co-operate, right?','','2012-02-03 15:59:47'),('4',23,'22','4','Niko','Nieminen','WRONG!','','2012-02-03 15:59:53'),('4',36,'0','4','Niko','Nieminen','I did nothing, da pavement was his enemy!','','2012-02-03 17:16:23'),('4',63,'62','4','Niko','Nieminen','Kuva aukeaa isommaksi klikkaamalla!','','2012-02-04 20:27:19'),('4',62,'0','4','Niko','Nieminen','Kyllä Gattuso on äijä!','img-1288400401174.jpeg','2012-02-04 20:24:08'),('4',64,'0','4','Niko','Nieminen','Sun pitäis piristyä fifa-tappion jälkeen, ota jäätelöä, arskakin tuli paremmalle tuulelle!','arnold_schwarzenegger_001b_090109_middle.jpg','2012-02-04 20:34:34'),('6',66,'0','4','Niko','Nieminen','Sunki pitäis alkaa polttamaan sikareita!','Arnold-Schwarzenegger-smoking-cigarette.jpg','2012-02-04 20:50:35'),('6',67,'0','6','Yrjö','Yläfemma','sololosololsoloslolosl','','2012-02-04 20:57:30'),('6',68,'67','4','Niko','Nieminen','SLALALALLALALALALAL','','2012-02-04 20:57:52'),('4',69,'0','4','Niko','Nieminen','Tämä kuva symbolisoi tämän sovelluksen onnistumista.','success_key.jpg','2012-02-05 12:43:46'),('4',70,'69','4','Niko','Nieminen','Hieno kuva google-haulla :P','','2012-02-05 12:44:05'),('7',71,'0','7','Testi','Testaaja','Testi Testaaja on täällä tänään!','','2012-02-05 18:01:32'),('7',72,'0','4','Niko','Nieminen','Testillä on korkea tunnetila verrattuna Yrjöön.','','2012-02-05 19:33:26'),('8',73,'0','8','Jari','Suomalainen','MOI MÄ OON JARI!','','2012-02-07 09:01:53'),('8',74,'73','8','Jari','Suomalainen','DERP DERP','','2012-02-07 11:10:48'),('4',76,'0','4','Niko','Nieminen','solololololo','','2012-02-07 17:12:26'),('8',77,'0','4','Niko','Nieminen','DERP DERP','','2012-02-08 09:08:44'),('9',78,'0','4','Niko','Nieminen','JEE Jouko liitty fakebookkiin!','','2012-02-08 19:41:55'),('10',79,'0','10','Shuppo','Shuppondalen','SHUPPO SHUPPOILEE','','2012-02-08 19:49:08'),('9',80,'78','10','Shuppo','Shuppondalen','Shuppo on täällä tänään!','','2012-02-08 19:49:57'),('4',81,'0','10','Shuppo','Shuppondalen','Wmuhahahhahaah soollolollolololololoololololloo','','2012-02-08 20:00:31'),('4',82,'81','4','Niko','Nieminen','SLOLOH!','','2012-02-08 20:01:50'),('8',83,'0','7','Testi','Testaaja','ES','','2012-02-09 10:27:29'),('11',84,'0','11','a','a','a','','2012-02-14 09:47:48'),('11',85,'0','11','a','a','a','','2012-02-14 09:47:50'),('11',86,'0','11','a','a','a','','2012-02-14 09:47:52'),('11',87,'0','11','a','a','a','','2012-02-14 09:47:54'),('11',88,'0','11','a','a','a','','2012-02-14 09:47:55'),('11',89,'0','11','a','a','a','','2012-02-14 09:47:56'),('11',90,'0','11','a','a','a','','2012-02-14 09:47:57'),('11',91,'0','11','a','a','a','','2012-02-14 09:47:59'),('11',92,'0','11','a','a','','','2012-02-14 09:48:00');
/*!40000 ALTER TABLE `seina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seinatykkaykset`
--

DROP TABLE IF EXISTS `seinatykkaykset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seinatykkaykset` (
  `tykkaysid` int(11) NOT NULL AUTO_INCREMENT,
  `seinaviestid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tykkaajaid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tyyppi` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'p' COMMENT 'p = positiivinen tykkays, n = negatiivinen tykkays',
  PRIMARY KEY (`tykkaysid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seinatykkaykset`
--

LOCK TABLES `seinatykkaykset` WRITE;
/*!40000 ALTER TABLE `seinatykkaykset` DISABLE KEYS */;
INSERT INTO `seinatykkaykset` VALUES (1,'36','4','n'),(2,'62','4','p'),(3,'46','4','p'),(4,'69','4','p'),(5,'67','4','p'),(6,'66','4','p'),(7,'48','4','p'),(8,'70','7','p'),(9,'71','4','p'),(10,'62','8','p'),(11,'73','8','p'),(12,'71','8','p'),(13,'23','4','n'),(14,'64','4','n'),(15,'75','4','n'),(16,'76','4','p'),(17,'51','4','n'),(18,'59','4','n'),(19,'77','4','p'),(20,'68','6','n'),(21,'67','6','p'),(22,'78','4','p'),(23,'78','9','p'),(24,'78','10','p'),(25,'81','4','n'),(26,'83','7','p');
/*!40000 ALTER TABLE `seinatykkaykset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yhteisotykkaykset`
--

DROP TABLE IF EXISTS `yhteisotykkaykset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yhteisotykkaykset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kohdeid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tykkaajaid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tyyppi` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'p',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yhteisotykkaykset`
--

LOCK TABLES `yhteisotykkaykset` WRITE;
/*!40000 ALTER TABLE `yhteisotykkaykset` DISABLE KEYS */;
INSERT INTO `yhteisotykkaykset` VALUES (1,'1','4','p'),(2,'1','7','p'),(3,'4','7','p'),(4,'4','4','p'),(5,'4','8','p'),(6,'5','4','p'),(7,'6','4','p'),(8,'7','9','p'),(9,'7','4','p'),(10,'8','10','p'),(11,'8','9','n'),(12,'9','4','n'),(13,'8','4','p');
/*!40000 ALTER TABLE `yhteisotykkaykset` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-14 19:17:58
