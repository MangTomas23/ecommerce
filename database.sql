-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.18-MariaDB

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Adrian Paul','Matos','39-1 Zone 4 Concepcion Grande Naga City','$2y$10$VquRbJb6JjTT9Hffn4Xw0eOuQuwkxFgyGRJ0S0oCgoB4Q2MUQrbLO','customer@email.com','09061774642');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchants`
--

DROP TABLE IF EXISTS `merchants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchants`
--

LOCK TABLES `merchants` WRITE;
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
INSERT INTO `merchants` VALUES (1,'merchant@email.com','Juan','dela Cruz','$2y$10$OYo2cCMibZLEPpXyo4kvpOqY9fMaRI0TumcHptXsz6S92M8EAcrfa');
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_items_1_idx` (`order_id`),
  KEY `fk_order_items_2_idx` (`product_id`),
  CONSTRAINT `fk_order_items_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_order_items_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,NULL,1),(2,1,1,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_1_idx` (`customer_id`),
  CONSTRAINT `fk_orders_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,20000.00,'PROCESSING');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Samsung Galaxy J7','1.jpeg','Nulla facilisi. Nullam tincidunt tincidunt nisi, eget malesuada leo lacinia id. Suspendisse et finibus sapien. Aenean sed ipsum ac sapien fringilla faucibus. Ut sit amet placerat tortor, vitae volutpat erat. Donec tempus nunc ac libero feugiat venenatis. Aliquam in arcu dolor. Pellentesque sollicitudin pellentesque ante eget consequat. Aenean vel placerat est.',8000.00),(10,'Samsung Galaxy s7','10.png','Donec mauris nibh, luctus vel fermentum ut, dictum in eros. Suspendisse suscipit sem in nisi viverra, id rutrum urna ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in dolor pellentesque, sagittis massa ac, eleifend quam. Integer sed neque ut nunc posuere sagittis ut in elit. Proin diam eros, aliquet nec odio in, euismod congue diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur non tempor nisl. Aliquam at fringilla odio. Suspendisse ut semper mauris. Nulla laoreet purus ac erat sollicitudin, at ultricies enim eleifend. Nullam placerat hendrerit varius. Nam quis erat in nibh iaculis accumsan. Sed vehicula non erat ut viverra. Vestibulum eget sapien vel augue dignissim viverra nec sit amet magna.',12000.00),(11,'Galaxy Note 7','11.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut purus mauris, volutpat id ipsum a, dictum bibendum magna. Proin gravida mauris neque, sit amet sollicitudin turpis pulvinar vel. Mauris in diam mauris. Nulla pharetra ultricies justo viverra placerat. Phasellus blandit nisl eu enim lobortis auctor. Praesent dictum ac magna ut facilisis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',20000.00),(12,'Google Pixel','12.jpg','Nulla facilisi. Nullam tincidunt tincidunt nisi, eget malesuada leo lacinia id. Suspendisse et finibus sapien. Aenean sed ipsum ac sapien fringilla faucibus. Ut sit amet placerat tortor, vitae volutpat erat. Donec tempus nunc ac libero feugiat venenatis. Aliquam in arcu dolor. Pellentesque sollicitudin pellentesque ante eget consequat. Aenean vel placerat est.\r\n\r\n',10000.00),(13,'Samsung Galaxy J1','13.jpg','Nulla facilisi. Nullam tincidunt tincidunt nisi, eget malesuada leo lacinia id. Suspendisse et finibus sapien. Aenean sed ipsum ac sapien fringilla faucibus. Ut sit amet placerat tortor, vitae volutpat erat. Donec tempus nunc ac libero feugiat venenatis. Aliquam in arcu dolor. Pellentesque sollicitudin pellentesque ante eget consequat. Aenean vel placerat est.',4000.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-30 12:48:06
