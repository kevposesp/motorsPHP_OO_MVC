-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: motors
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id_attribute` varchar(12) NOT NULL,
  `name_attribute` varchar(45) NOT NULL,
  `title_attribute` varchar(45) NOT NULL,
  PRIMARY KEY (`id_attribute`),
  UNIQUE KEY `id_attribute_UNIQUE` (`id_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES ('0d4a1374ac8c','Nuevos','Coches nuevos'),('15bfdaa74445','Semi nuevos','Coches semi nuevos'),('dffc6662ecde','KM0','Coches kilometro 0');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_have_attribute`
--

DROP TABLE IF EXISTS `car_have_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_have_attribute` (
  `attribute_cha` varchar(12) NOT NULL,
  `car_cha` varchar(12) NOT NULL,
  KEY `fk_car_have_attribute_attributes1_idx` (`attribute_cha`),
  KEY `fk_car_have_attribute_cars1_idx` (`car_cha`),
  CONSTRAINT `fk_car_have_attribute_attributes1` FOREIGN KEY (`attribute_cha`) REFERENCES `attributes` (`id_attribute`),
  CONSTRAINT `fk_car_have_attribute_cars1` FOREIGN KEY (`car_cha`) REFERENCES `cars` (`id_car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_have_attribute`
--

LOCK TABLES `car_have_attribute` WRITE;
/*!40000 ALTER TABLE `car_have_attribute` DISABLE KEYS */;
INSERT INTO `car_have_attribute` VALUES ('0d4a1374ac8c','31fcf2b6f4fc'),('15bfdaa74445','ef32b972e855'),('dffc6662ecde','ef32b972e855'),('0d4a1374ac8c','aa008bed34b5'),('0d4a1374ac8c','69dc1226da6e'),('15bfdaa74445','0afb62dba3d2'),('15bfdaa74445','da337c2b9955'),('15bfdaa74445','c3d992b8041f'),('dffc6662ecde','c3d992b8041f'),('15bfdaa74445','873d63137054');
/*!40000 ALTER TABLE `car_have_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id_car` varchar(12) CHARACTER SET utf8 NOT NULL,
  `model_car` varchar(12) CHARACTER SET utf8 NOT NULL,
  `cv_car` int NOT NULL,
  `manufacturingdate_car` varchar(10) CHARACTER SET utf8 NOT NULL,
  `km_car` int NOT NULL,
  `fuel_type_car` varchar(12) CHARACTER SET utf8 NOT NULL,
  `overview_car` varchar(255) CHARACTER SET utf8 NOT NULL,
  `numberofcylinders_car` int NOT NULL,
  `doors_car` int NOT NULL,
  `color_ext_car` varchar(45) CHARACTER SET utf8 NOT NULL,
  `color_int_car` varchar(45) CHARACTER SET utf8 NOT NULL,
  `price_car` varchar(45) CHARACTER SET utf8 NOT NULL,
  `drive_car` varchar(45) CHARACTER SET utf8 NOT NULL,
  `framenumber_car` varchar(17) CHARACTER SET utf8 NOT NULL,
  `category_car` varchar(12) CHARACTER SET utf8 NOT NULL,
  `lng` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `city_car` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `count` int DEFAULT '0',
  PRIMARY KEY (`id_car`),
  UNIQUE KEY `id_car_UNIQUE` (`id_car`),
  KEY `fk_cars_categories1_idx` (`category_car`),
  KEY `fk_cars_models1_idx` (`model_car`),
  KEY `fk_cars_type_fuels1_idx` (`fuel_type_car`),
  CONSTRAINT `fk_cars_categories1` FOREIGN KEY (`category_car`) REFERENCES `categories` (`id_category`),
  CONSTRAINT `fk_cars_models1` FOREIGN KEY (`model_car`) REFERENCES `models` (`id_model`),
  CONSTRAINT `fk_cars_type_fuels1` FOREIGN KEY (`fuel_type_car`) REFERENCES `type_fuel` (`id_type_fuel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES ('0afb62dba3d2','d9eb3efbfd57',140,'08/07/2020',20000,'d7d515e14978','Est corporis sit, accusamus consequuntur reprehenderit .',8,5,'#171717','#0f3852','28.000','4x4','FIbghT1qEGnu08yah','61ffb8567a0c','-0.5497333695655748','38.91420214396847','Olleria',27),('31fcf2b6f4fc','8568575ecc05',330,'02/16/2022',100,'d7d515e14978','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum efficitur nunc nec mattis. Sed vitae aliquam lectus, nec vestibulum velit. Etiam tempus et ante nec venenatis.',8,5,'#000000','#000000','140000','4x4','p0W1Jgqymxko6LR7A','f96a5090f3bb','-0.6068264392088937','38.82541851446487','Ontinyent',1),('69dc1226da6e','84ec62886ed7',75,'03/03/2007',220000,'d7d515e14978','Lorem ipsum dolor sit amet, consectetur adipiscing elit.',4,5,'#000000','#000000','3500','4x4','p0W1Jgqymxko6LR7A','366d677ae0bc','-0.5203645389318979','38.839720247492004','Albaida',5),('873d63137054','f1b7007b2c68',177,'03/03/2015',58000,'d7d515e14978','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc malesuada iaculis tortor vitae rutrum.',8,5,'#000000','#000000','22.900','4x4','wImBuRJXDAohEWV2S','61ffb8567a0c','-0.5149904954966311','38.86785949415472','Bufali',62),('aa008bed34b5','530bc8e029ea',90,'02/17/2022',10000,'9f3583a4320e','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus elit eget vulputate auctor. Vestibulum vitae facilisis felis, vel laoreet libero. Curabitur ultrices felis ut tempus varius.',6,5,'#000000','#000000','20000','4x4','UdjU8AFFyLsVXg3fc','d37cb1f9db88','-0.5501326616555664','38.822875475891536','Agullent',11),('c3d992b8041f','6025022ee462',150,'09/11/2021',19000,'d7d515e14978','Beatae sunt, aut fugiat officia id tempora earum quam v.',8,5,'#363636','#000000','22.900','4x4','2vGfsRbfpN3HvPVQN','d37cb1f9db88','-0.5012038166097309','38.85370567444743','Palomar',2),('da337c2b9955','f1b7007b2c68',177,'08/01/2014',112000,'d7d515e14978','Modi voluptatem. Blanditiis aliquam quidem in ea sed eu.',8,5,'#000000','#000000','15.990','4x4','Z4fN0zxW7dOWw4eSe','61ffb8567a0c','-0.47526960031129556','38.860214987483026','Bélgida',1),('ef32b972e855','aaa03ec6e9ea',320,'02/16/2022',120,'d7d515e14978','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum efficitur nunc nec mattis. Sed vitae aliquam lectus, nec vestibulum velit. Etiam tempus et ante nec venenatis.',8,5,'#000000','#000000','220000','4x4','vjn0ii8WavLNKiiWW','e95eb7d7a42c','-0.5865846076642458','38.87945961630203','Aielo',1),('f55224353e74','59be77ae1cef',180,'05/11/2011',97072,'d7d515e14978','Sed ut inventore nisi anim saepe quis minima est atque .',6,5,'#d5cd5d','#223cb0','13.900','4x4','cIbCwux8PGLQ7X7JH','d37cb1f9db88','-0.7851449048104783','38.78281891433759','Fontanars',1);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_category` varchar(12) NOT NULL,
  `name_category` varchar(45) NOT NULL,
  `title_category` varchar(45) NOT NULL,
  `description_category` varchar(255) NOT NULL,
  `img_category` varchar(100) DEFAULT NULL,
  `icon_category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `id_category_UNIQUE` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('2669b5225df0','Berlina','Coches berlina','Son turismos de tres volúmenes que cuentan con tres partes totalmente diferenciadas: capó, habitáculo y maletero.','/categories/img/berlina.png','/categories/icons/berlina.svg'),('366d677ae0bc','Familiar','Coches familiares','Son aquellos turismos derivados de compactos, sedanes o berlinas con carrocería de cinco puertas y techo elevado, a fin de ampliar el compartimento de carga.','/categories/img/family.png','/categories/icons/family.svg'),('3af7467ea594','SUV','Coches suv','Nos adentramos en el segmento más popular a día de hoy. Los SUV han pasado de ser modelos poco conocidos al mercado de mayor expansión dentro del territorio europeo.','/categories/img/suv.png','/categories/icons/suv.svg'),('44dd6f8f67aa','Pick Up','Coches pick up','Acabamos este repaso a los diferentes tipos de coches que existen con un formato muy especial. Se calcula que uno de cada cuatro modelos que circulan en el mundo es una pick up.','/categories/img/pick-up.png','/categories/icons/pick-up.svg'),('519b3c1ba4f8','HatchBack','Coches hatchback','Vamos a coger la palabra hatchback con pinzas, porque este término hace referencia, en sentido literal, a aquél automóvil compuesto por dos espacios diferenciados: el de los pasajeros y el del espacio de carga o maletero, al que se accede desde un portón.','/categories/img/hatchback.png','/categories/icons/hatchback.svg'),('61ffb8567a0c','Sedán','Coches sedán','Un sedán es un turismo de tres volúmenes en el que desde el compartimento de carga no se permite el acceso al habitáculo, ya que la tapa del maletero los separa.','/categories/img/sedan.png','/categories/icons/sedan.svg'),('6bdddc945707','Subcompacto','Coches Subcompactos','Este tipo de coches pueden tener tres, cuatro o cinco puertas, dependiendo un poco del diseño de su carrocería. Están diseñados para que puedan viajar cuatro pasajeros cómodamente','/categories/img/subcompacto.png','/categories/icons/subcompacto.svg'),('d37cb1f9db88','Urbano','Coches Urbanos','Se caracterizan por su reducido tamaño y están pensados para circular por la ciudad, ya que gozan de algunas virtudes como la maniobrabilidad, la facilidad para aparcar o los bajos consumos.','/categories/img/city.png','/categories/icons/city.svg'),('e95eb7d7a42c','Deportivo','Coches deportivos','Dentro de este tipo de vehículos encontramos diversos tipos de carrocerías, pero todos ellos se caracterizan por equipar diseños realmente atractivos, motores muy potentes.','/categories/img/sport.png','/categories/icons/sport.svg'),('f96a5090f3bb','Muscle Car','Coches muscle car','típico coche americano de tracción trasera con un poderoso bloque V8 escondido en sus entrañas y altas dosis de potencia.','/categories/img/muscle.png','/categories/icons/muscle.svg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_cars`
--

DROP TABLE IF EXISTS `img_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `img_cars` (
  `id_car` varchar(12) NOT NULL,
  `url_img` varchar(100) NOT NULL,
  KEY `fk_img_cars_cars1_idx` (`id_car`),
  CONSTRAINT `fk_img_cars_cars1` FOREIGN KEY (`id_car`) REFERENCES `cars` (`id_car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_cars`
--

LOCK TABLES `img_cars` WRITE;
/*!40000 ALTER TABLE `img_cars` DISABLE KEYS */;
INSERT INTO `img_cars` VALUES ('31fcf2b6f4fc','/cars/mustang.jpg'),('31fcf2b6f4fc','/cars/mustang2.jpg'),('31fcf2b6f4fc','/cars/mustang3.jpg'),('31fcf2b6f4fc','/cars/mustang4.jpg'),('31fcf2b6f4fc','/cars/mustang5.jpg'),('31fcf2b6f4fc','/cars/mustang6.jpg'),('ef32b972e855','/cars/rs7.jpg'),('ef32b972e855','/cars/rs72.jpg'),('ef32b972e855','/cars/rs73.jpg'),('ef32b972e855','/cars/rs74.jpg'),('ef32b972e855','/cars/rs75.jpg'),('ef32b972e855','/cars/rs76.jpg'),('aa008bed34b5','/cars/renault.jpg'),('aa008bed34b5','/cars/renault2.jpg'),('aa008bed34b5','/cars/renault3.jpg'),('aa008bed34b5','/cars/renault4.jpg'),('aa008bed34b5','/cars/renault5.jpg'),('aa008bed34b5','/cars/renault6.jpg'),('69dc1226da6e','/cars/tourneo.jpg'),('69dc1226da6e','/cars/tourneo2.jpg'),('69dc1226da6e','/cars/tourneo3.jpg'),('69dc1226da6e','/cars/tourneo4.jpg'),('69dc1226da6e','/cars/tourneo5.jpg'),('69dc1226da6e','/cars/tourneo6.jpg'),('f55224353e74','/cars/polo.jpg'),('f55224353e74','/cars/polo2.jpg'),('f55224353e74','/cars/polo3.jpg'),('f55224353e74','/cars/polo4.jpg'),('f55224353e74','/cars/polo5.jpg'),('f55224353e74','/cars/polo6.jpg'),('0afb62dba3d2','/cars/serieuno.jpg'),('0afb62dba3d2','/cars/serieuno2.jpg'),('0afb62dba3d2','/cars/serieuno3.jpg'),('0afb62dba3d2','/cars/serieuno4.jpg'),('0afb62dba3d2','/cars/serieuno5.jpg'),('0afb62dba3d2','/cars/serieuno6.jpg'),('da337c2b9955','/cars/acinco.jpg'),('da337c2b9955','/cars/acinco2.jpg'),('da337c2b9955','/cars/acinco3.jpg'),('da337c2b9955','/cars/acinco4.jpg'),('da337c2b9955','/cars/acinco5.jpg'),('da337c2b9955','/cars/acinco6.jpg'),('c3d992b8041f','/cars/leon.jpg'),('c3d992b8041f','/cars/leon2.jpg'),('c3d992b8041f','/cars/leon3.jpg'),('c3d992b8041f','/cars/leon4.jpg'),('c3d992b8041f','/cars/leon5.jpg'),('c3d992b8041f','/cars/leon6.jpg'),('873d63137054','/cars/acincodos.jpg'),('873d63137054','/cars/acincodos2.jpg'),('873d63137054','/cars/acincodos3.jpg'),('873d63137054','/cars/acincodos4.jpg'),('873d63137054','/cars/acincodos5.jpg'),('873d63137054','/cars/acincodos6.jpg');
/*!40000 ALTER TABLE `img_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id_user` varchar(12) COLLATE utf8_bin NOT NULL,
  `id_car` varchar(12) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_user`,`id_car`),
  KEY `fk_id_user_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES ('f3ccf43c68d6','0afb62dba3d2');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marks` (
  `id_mark` varchar(12) NOT NULL,
  `name_mark` varchar(45) NOT NULL,
  `img_mark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_mark`),
  UNIQUE KEY `id_mark_UNIQUE` (`id_mark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES ('7050e61205df','Audi','/marks/img/audi.png'),('758750ab8cbf','Ford','/marks/img/ford.png'),('88c3d3893996','Chevrolet','/marks/img/chevrolet.png'),('88f0c2840305','Porsche','/marks/img/porsche.png'),('8993fd69cc54','Volkswagen',NULL),('8cccb99e8605','Mercedes-Benz','/marks/img/mercedes.png'),('9311f4f64240','Seat','/marks/img/seat.png'),('cb8758919ec6','Renault','/marks/img/renault.png'),('d991f4b6322d','BMW','/marks/img/bmw.png'),('ecd4e3424dcd','Mazda','/marks/img/mazda.png');
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `models` (
  `id_model` varchar(12) NOT NULL,
  `name_model` varchar(45) NOT NULL,
  `img_model` varchar(100) NOT NULL,
  `mark_model` varchar(12) NOT NULL,
  PRIMARY KEY (`id_model`),
  UNIQUE KEY `id_model_UNIQUE` (`id_model`),
  KEY `fk_models_marks1_idx` (`mark_model`),
  CONSTRAINT `fk_models_marks1` FOREIGN KEY (`mark_model`) REFERENCES `marks` (`id_mark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES ('1f9dd25c0517','A7','/','7050e61205df'),('530bc8e029ea','Clio E-Tech','/','cb8758919ec6'),('59be77ae1cef','Polo','/','8993fd69cc54'),('6025022ee462','Leon','/','9311f4f64240'),('845074cf2027','Camaro RS','/','88c3d3893996'),('84ec62886ed7','Tourneo','/','758750ab8cbf'),('8568575ecc05','Mustang','/','758750ab8cbf'),('aaa03ec6e9ea','RS7','/','7050e61205df'),('b9d23f0ddf1f','Clase A','/','8cccb99e8605'),('d9eb3efbfd57','Serie 1','/','d991f4b6322d'),('e78f258aa1e3','3','/','ecd4e3424dcd'),('f1b7007b2c68','A5','/','7050e61205df');
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_fuel`
--

DROP TABLE IF EXISTS `type_fuel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_fuel` (
  `id_type_fuel` varchar(12) NOT NULL,
  `name_type_fuel` varchar(45) NOT NULL,
  `title_type_fuel` varchar(45) NOT NULL,
  `img_type_fuel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_type_fuel`),
  UNIQUE KEY `id_type_fuel_UNIQUE` (`id_type_fuel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_fuel`
--

LOCK TABLES `type_fuel` WRITE;
/*!40000 ALTER TABLE `type_fuel` DISABLE KEYS */;
INSERT INTO `type_fuel` VALUES ('07d527c8ad42','Electrico','Coches electricos','/fuels/img/electrico.jpg'),('9f3583a4320e','Hibrido','Coches hibridos','/fuels/img/hibrido.jpg'),('d7d515e14978','Gasolina','Coches gasolina','/fuels/img/gasolina.jpg');
/*!40000 ALTER TABLE `type_fuel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `username_user` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password_user` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `type_user` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `avatar_user` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`),
  UNIQUE KEY `username_user_UNIQUE` (`username_user`),
  UNIQUE KEY `email_user_UNIQUE` (`email_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('58b4213d0419','kevin','pablocs@gmail.com','$2y$12$M55uxEeO1Kl3gzV.MhdgqeeUKVYlxQb8hQc7oVMkNnZ9m5CGtmDWG','client','http://res.cloudinary.com/kevposesp/image/upload/v1648826184/motors/users/btmvcqkzswl5rhlafxcp.png'),('f3ccf43c68d6','kevinaris84','posada772@gmail.com','$2y$12$QbXguD4VNQ689rDK5HAgGe5szOyoAI7hwlAa4iq4KD2e9TX9ZSlu2','client','http://res.cloudinary.com/kevposesp/image/upload/v1648825640/motors/users/a0c95lqrym8h8uwxquym.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'motors'
--
/*!50003 DROP PROCEDURE IF EXISTS `like_proced` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `like_proced`(in v_id_usr varchar(12), in v_id_car varchar(12))
BEGIN
	if (select count(*) from likes where id_user = v_id_usr and id_car = v_id_car) = 0 then
		insert into likes values (v_id_usr, v_id_car);
	else
		delete from likes where id_user = v_id_usr and id_car = v_id_car;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11 15:37:00
