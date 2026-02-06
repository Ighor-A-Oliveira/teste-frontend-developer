CREATE DATABASE IF NOT EXISTS db_testetecnico CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_testetecnico;


CREATE TABLE IF NOT EXISTS `contato_clientes` (
  `contato_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` VARCHAR(100) NOT NULL,
  `cliente_email` VARCHAR(100) NOT NULL,
  `cliente_fone` VARCHAR(20) NOT NULL,
  `contato_mensagem` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;