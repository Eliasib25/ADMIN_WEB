-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: parqueadero
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `parqueaderos`
--

DROP TABLE IF EXISTS `parqueaderos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parqueaderos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Capacidad_Total` int(11) NOT NULL,
  `Ubicacion` varchar(45) NOT NULL,
  `Disponibilidad` enum('NoDisponible','Disponible','Parcial') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueaderos`
--

LOCK TABLES `parqueaderos` WRITE;
/*!40000 ALTER TABLE `parqueaderos` DISABLE KEYS */;
INSERT INTO `parqueaderos` VALUES (13,'P.A',3,'Bloque a','Disponible');
/*!40000 ALTER TABLE `parqueaderos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puestos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoPuesto` enum('Disponible','NoDisponible') NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `parqueaderos_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_puestos_parqueaderos1` (`parqueaderos_Id`),
  CONSTRAINT `fk_puestos_parqueaderos1` FOREIGN KEY (`parqueaderos_Id`) REFERENCES `parqueaderos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (35,'Disponible','1',13),(36,'Disponible','2',13),(37,'Disponible','3',13);
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoraInicio` varchar(45) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `EstadoReserva` enum('Activa','Cancelada','Completada') NOT NULL,
  `Placa_Vehiculo` varchar(45) NOT NULL,
  `HoraFin` varchar(45) NOT NULL,
  `usuarios_Identificador` int(11) NOT NULL,
  `puestos_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_reservas_puestos1` (`puestos_Id`),
  KEY `fk_reservas_usuarios1` (`usuarios_Identificador`),
  CONSTRAINT `fk_reservas_puestos1` FOREIGN KEY (`puestos_Id`) REFERENCES `puestos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_usuarios1` FOREIGN KEY (`usuarios_Identificador`) REFERENCES `usuarios` (`Identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (4,'09:12:00','2023-06-04','Completada','xxx-333','00:12:00',15,37);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `Identificador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`Identificador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'Administrador'),(3,'Estudiantes');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Identificador` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  `NumeroIdentificacion` varchar(45) NOT NULL,
  `TipoIdentificacion` enum('CC','TI','CE') NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `FechaNacimiento` varchar(45) NOT NULL,
  `TipoSangre` enum('A+','A-','O+','O-','AB+','AB-','B+','B-') NOT NULL,
  `Foto` blob NOT NULL,
  `Programa` varchar(45) NOT NULL,
  PRIMARY KEY (`Identificador`),
  UNIQUE KEY `NombreUsuario` (`NombreUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (8,'1104008652','Asimismo','1104008652','CC','Eliasib','Benitez Mercado','2004-06-25','A+','','Ingenieria Sistemas'),(15,'daniel','danieljgg051204','1103858555','CC','Daniel Jesus','Gonzlaez','2012-05-12','A+','','Ingenieria de sistemas'),(16,'mendez','cecarteamomucho','777','CC','Jhon Jaime','Mendez Alandete','2023-06-07','A+','','El mundo');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariosroles`
--

DROP TABLE IF EXISTS `usuariosroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariosroles` (
  `usuarios_Identificador` int(11) NOT NULL,
  `roles_Identificador` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_Identificador`,`roles_Identificador`),
  KEY `fk_usuariosroles_roles1` (`roles_Identificador`),
  CONSTRAINT `fk_usuariosroles_roles1` FOREIGN KEY (`roles_Identificador`) REFERENCES `roles` (`Identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuariosroles_usuarios1` FOREIGN KEY (`usuarios_Identificador`) REFERENCES `usuarios` (`Identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariosroles`
--

LOCK TABLES `usuariosroles` WRITE;
/*!40000 ALTER TABLE `usuariosroles` DISABLE KEYS */;
INSERT INTO `usuariosroles` VALUES (16,2);
/*!40000 ALTER TABLE `usuariosroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariosvehiculos`
--

DROP TABLE IF EXISTS `usuariosvehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariosvehiculos` (
  `usuarios_Identificador` int(11) NOT NULL,
  `vehiculos_idVehiculos` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_Identificador`,`vehiculos_idVehiculos`),
  KEY `fk_usuariosvehiculos_vehiculos1` (`vehiculos_idVehiculos`),
  CONSTRAINT `fk_usuariosvehiculos_usuarios1` FOREIGN KEY (`usuarios_Identificador`) REFERENCES `usuarios` (`Identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuariosvehiculos_vehiculos1` FOREIGN KEY (`vehiculos_idVehiculos`) REFERENCES `vehiculos` (`idVehiculos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariosvehiculos`
--

LOCK TABLES `usuariosvehiculos` WRITE;
/*!40000 ALTER TABLE `usuariosvehiculos` DISABLE KEYS */;
INSERT INTO `usuariosvehiculos` VALUES (15,84);
/*!40000 ALTER TABLE `usuariosvehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `idVehiculos` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `PlacaVehiculo` varchar(45) NOT NULL,
  `Color` varchar(45) NOT NULL,
  PRIMARY KEY (`idVehiculos`),
  UNIQUE KEY `PlacaVehiculo` (`PlacaVehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (84,'Mecha-Chooper','Nadie sabe','xxx-333','Amarillo');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'parqueadero'
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AsociarVehiculoUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AsociarVehiculoUsuario`(
    IN poperacion INT, 
    IN pNumeroIdentificacion VARCHAR(45), 
    IN pTipoIdentificacion VARCHAR(45),
    IN pPlacaVehiculo VARCHAR(45)
)
BEGIN
    DECLARE vnumeroregistros INT;
    DECLARE pusuario_id INT;
    DECLARE pvehiculo_id INT;
    
    SET pusuario_id = (SELECT Identificador FROM usuarios WHERE NumeroIdentificacion = pNumeroIdentificacion AND TipoIdentificacion = pTipoIdentificacion);
	SET pvehiculo_id = (SELECT idVehiculos FROM vehiculos WHERE PlacaVehiculo = pPlacaVehiculo);
    
    IF (poperacion = 0) THEN
        SELECT COUNT(1) INTO vnumeroregistros
        FROM usuariosvehiculos
        WHERE pusuario_id AND pvehiculo_id;
        
        IF (vnumeroregistros = 0) THEN
            INSERT INTO usuariosvehiculos (usuarios_Identificador, vehiculos_idVehiculos)
			VALUES (pusuario_id, 
					pvehiculo_id);
        ELSE
            UPDATE usuariosvehiculos
            SET vehiculos_idVehiculos = pvehiculo_id
            WHERE usuarios_Identificador = pusuario_id AND vehiculos_idVehiculos = pvehiculo_id;
        END IF;
    ELSE
        DELETE FROM usuariosvehiculos 
        WHERE usuarios_Identificador = pusuario_id AND vehiculos_idVehiculos = pvehiculo_id;
    END IF; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearUsuario`(
    IN poperacion INT, 
    IN pIdentificador VARCHAR(45), 
    IN pNombreUsuario VARCHAR(45), 
    IN pContraseña VARCHAR(40), 
    IN pNumeroIdentificacion VARCHAR(45), 
    IN pTipoIdentificacion ENUM('CC', 'TI', 'CE'),
    IN pNombres VARCHAR(45),
    IN pApellidos VARCHAR(45),
    IN pFechaNacimiento DATE,
    IN pTipoSangre ENUM('A+', 'A-', 'O+', 'O-', 'AB+', 'AB-', 'B+', 'B-'),
    IN pFoto BLOB,
    IN pPrograma VARCHAR(45),
    
    in pRolNombre varchar(45)
)
BEGIN
    DECLARE vnumeroregistros INT;
    DECLARE usuarioidentificadorusuariosroles INT;
    DECLARE rolidentificadorusuariosroles int;
    
    IF (poperacion = 0) THEN
        SELECT COUNT(1) INTO vnumeroregistros
        FROM usuarios
        WHERE Identificador = pIdentificador AND TipoIdentificacion = pTipoIdentificacion;
        
        IF (vnumeroregistros = 0) THEN
            INSERT INTO usuarios (
                Identificador,
                NombreUsuario,
                Contraseña,
                NumeroIdentificacion,
                TipoIdentificacion,
                Nombres,
                Apellidos,
                FechaNacimiento,
                TipoSangre,
                Foto,
                Programa
            )
            VALUES (
                pIdentificador,
                pNombreUsuario,
                pContraseña,
                pNumeroIdentificacion,
                pTipoIdentificacion,
                pNombres,
                pApellidos,
                pFechaNacimiento,
                pTipoSangre,
                pFoto,
                pPrograma
            );
            
            set usuarioidentificadorusuariosroles = (select Identificador 
            from usuarios 
            where NumeroIdentificacion = pNumeroIdentificacion 
            and TipoIdentificacion = pTipoIdentificacion);
            
            set rolidentificadorusuariosroles = (select Identificador 
            from roles 
            where Nombre = pRolNombre);
            
            insert into usuariosroles (
            usuarios_Identificador, 
            roles_Identificador)
            values 
            (
            usuarioidentificadorusuariosroles, 
            rolidentificadorusuariosroles
            );
            
        ELSE
            UPDATE usuarios
            SET Identificador = pIdentificador, 
                NombreUsuario = pNombreUsuario,
                Contraseña = pContraseña,
                NumeroIdentificacion = pNumeroIdentificacion,
                Nombres = pNombres,
                Apellidos = pApellidos,
                FechaNacimiento = pFechaNacimiento,
                TipoSangre = pTipoSangre,
                Foto = pFoto,
                Programa = pPrograma
            WHERE Identificador = pIdentificador AND TipoIdentificacion = pTipoIdentificacion;
            
            set usuarioidentificadorusuariosroles = (select Identificador 
            from usuarios 
            where NumeroIdentificacion = pNumeroIdentificacion 
            and TipoIdentificacion = pTipoIdentificacion);
            
            set rolidentificadorusuariosroles = (select Identificador 
            from roles 
            where Nombre = pRolNombre);
            
            insert into usuariosroles (
            usuarios_Identificador, 
            roles_Identificador)
            values 
            (
            usuarioidentificadorusuariosroles, 
            rolidentificadorusuariosroles
            );
            
        END IF;
    ELSE
        DELETE FROM usuarios 
        WHERE NumeroIdentificacion = pNumeroIdentificacion AND TipoIdentificacion = pTipoIdentificacion;
    END IF; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GestionarParqueaderos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GestionarParqueaderos`(
    IN poperacion INT, 
    IN pNombre varchar(40),
    IN pCapacidad_Total int(10), 
    IN pUbicacion VARCHAR(45), 
    IN pDisponibilidad ENUM('NoDisponible', 'Disponible')
)
BEGIN
    DECLARE vnumeroregistros INT;
    DECLARE contador INT DEFAULT 1;
    
    IF (poperacion = 0) THEN
        SELECT COUNT(1) INTO vnumeroregistros
        FROM parqueaderos
        WHERE Nombre = pNombre;
        
        IF (vnumeroregistros = 0) THEN
            INSERT INTO parqueaderos (
                Nombre,
                Capacidad_Total,
                Ubicacion,
                Disponibilidad
            )
            VALUES (
                pNombre,
                pCapacidad_Total,
                pUbicacion,
                pDisponibilidad
            );
        ELSE
            UPDATE parqueaderos
            SET Nombre = pNombre, 
                Capacidad_Total = pCapacidad_Total,
                Ubicacion = pUbicacion,
                Disponibilidad = pDisponibilidad
            WHERE Nombre = pNombre;
        END IF;
        
        -- Insertar puestos
        WHILE contador <= pCapacidad_Total DO
            INSERT INTO puestos (EstadoPuesto, Numero, parqueaderos_id)
            VALUES (pDisponibilidad, contador, (select Id from parqueaderos where Nombre = pNombre));
            
            SET contador = contador + 1;
        END WHILE;
        
    ELSE
        DELETE FROM parqueaderos 
        WHERE Nombre = pNombre;
    END IF; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GestionarPuesto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GestionarPuesto`(
    IN poperacion INT,
    IN pEstadoPuesto ENUM('Disponible', 'NoDisponible'),
    IN pNumero varchar(10), 
    IN pparqueadero_id int(11)
)
BEGIN
		UPDATE puestos
		SET EstadoPuesto = pEstadoPuesto
		WHERE Numero = pNumero;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GestionarReserva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GestionarReserva`(
    IN poperacion INT, 
    IN pId int(11), 
    IN pHoraInicio time, 
    IN pFecha DATE, 
    IN pEstadoReserva ENUM('Activa', 'Cancelada', 'Completada'), 
    IN pPlaca_Vehiculo VARCHAR(45),
    IN pHoraFin Time,
    IN pNumeroIdentificacion int(11), 
    IN pNumeroPuesto varchar(10)
)
BEGIN
    DECLARE vnumeroregistros INT;
    DECLARE usuarioidentificadorreservas INT;
    DECLARE puestoidreservas int;
    
    set usuarioidentificadorreservas = (select Identificador 
            from usuarios 
            where NumeroIdentificacion = pNumeroIdentificacion);
            
	set puestoidreservas = (select Id 
            from puestos 
            where Numero = pNumeroPuesto);
    
    IF (poperacion = 0) THEN
        SELECT COUNT(1) INTO vnumeroregistros
        FROM reservas
        WHERE usuarios_Identificador = usuarioidentificadorreservas AND HoraInicio = pHoraInicio AND HoraFin = pHoraFin;
        
        IF (vnumeroregistros = 0) THEN
            INSERT INTO reservas (
                Id,
                HoraInicio,
                Fecha,
                EstadoReserva,
                Placa_Vehiculo,
                HoraFin,
                usuarios_Identificador,
                puestos_id
            )
            VALUES (
                pId,
                pHoraInicio,
                pFecha,
                pEstadoReserva,
                pPlaca_Vehiculo,
                pHoraFin,
                usuarioidentificadorreservas,
                puestoidreservas
            );
            
            
        ELSE
            UPDATE reservas
            SET EstadoReserva = pEstadoReserva
            WHERE usuarios_Identificador = usuarioidentificadorreservas AND HoraInicio = pHoraInicio AND HoraFin = pHoraFin;
            
        END IF;
    ELSE
        DELETE FROM reservas 
        WHERE Id = pId AND HoraInicio = pHoraInicio AND HoraFin = pHoraFin;
    END IF; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GestionarVehiculoAsociadoUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GestionarVehiculoAsociadoUsuario`(
    IN poperacion INT, 
    in pidVehiculo int(11),
    IN pNombre VARCHAR(45), 
    IN pModelo VARCHAR(45), 
    IN pPlacaVehiculo VARCHAR(45), 
    IN pColor VARCHAR(45),
    
    IN pNumeroIdentificacion VARCHAR(45), 
    IN pTipoIdentificacion VARCHAR(45)
)
BEGIN
    DECLARE vnumeroregistros INT;
    
    IF (poperacion = 0) THEN
        SELECT COUNT(1) INTO vnumeroregistros
        FROM vehiculos
        WHERE PlacaVehiculo = pPlacaVehiculo;
        
        IF (vnumeroregistros = 0) THEN
            INSERT INTO vehiculos (
                idVehiculos,
                Nombre,
                Modelo,
                PlacaVehiculo,
                Color
            )
            VALUES (
                pidVehiculo,
                pNombre,
                pModelo,
                pPlacaVehiculo,
                pColor
            );
            CALL AsociarVehiculoUsuario(poperacion, pNumeroIdentificacion, pTipoIdentificacion, pPlacaVehiculo);
        ELSE
            UPDATE vehiculos
            SET idVehiculos = pidVehiculo, 
                Nombre = pNombre,
                Modelo = pModelo,
                PlacaVehiculo = pPlacaVehiculo,
                Color = pColor
            WHERE PlacaVehiculo = pPlacaVehiculo;
            
            CALL AsociarVehiculoUsuario(poperacion, pNumeroIdentificacion, pTipoIdentificacion, pPlacaVehiculo);
            
        END IF;
    ELSE
        DELETE FROM vehiculos 
        WHERE PlacaVehiculo = pPlacaVehiculo;
    END IF; 
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

-- Dump completed on 2023-06-04 22:35:37
