-- MySQL Script generated by MySQL Workbench
-- Tue Aug 20 17:02:03 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sistema_ventas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_ventas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_ventas` DEFAULT CHARACTER SET utf8 ;
USE `sistema_ventas` ;

-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_roles` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(255) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password_user` TEXT NULL,
  `token` VARCHAR(100) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  `id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_tb_usuarios_tb_roles_idx` (`id_rol` ASC) VISIBLE,
  CONSTRAINT `fk_tb_usuarios_tb_roles`
    FOREIGN KEY (`id_rol`)
    REFERENCES `sistema_ventas`.`tb_roles` (`id_rol`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_categorias` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(255) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_almacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_almacen` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(255) NULL,
  `nombre` VARCHAR(255) NULL,
  `descripcion` TEXT NULL,
  `stock` INT(11) NULL,
  `stock_minimo` INT(11) NULL,
  `stock_maximo` INT(11) NULL,
  `precio_compra` VARCHAR(255) NULL,
  `precio_venta` VARCHAR(255) NULL,
  `fecha_ingreso` DATE NULL,
  `imagen` TEXT NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  `id_categoria` INT(11) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  INDEX `fk_tb_almacen_tb_categorias1_idx` (`id_categoria` ASC) VISIBLE,
  INDEX `fk_tb_almacen_tb_usuarios1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_tb_almacen_tb_categorias1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `sistema_ventas`.`tb_categorias` (`id_categoria`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_almacen_tb_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `sistema_ventas`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_proveedores` (
  `id_proveedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` VARCHAR(255) NULL,
  `celular` VARCHAR(50) NULL,
  `telefono` VARCHAR(50) NULL,
  `empresa` VARCHAR(255) NULL,
  `email` VARCHAR(50) NULL,
  `direccion` VARCHAR(255) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_proveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_compras` (
  `id_compra` INT(11) NOT NULL AUTO_INCREMENT,
  `id_producto` INT(11) NOT NULL,
  `nro_compra` INT(11) NULL,
  `fecha_compra` DATE NULL,
  `id_proveedor` INT(11) NOT NULL,
  `comprobante` VARCHAR(255) NULL,
  `id_usuario` INT(11) NOT NULL,
  `precio_compra` VARCHAR(50) NULL,
  `cantidad` INT(11) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_compra`),
  INDEX `fk_tb_compras_tb_proveedores1_idx` (`id_proveedor` ASC) VISIBLE,
  INDEX `fk_tb_compras_tb_almacen1_idx` (`id_producto` ASC) VISIBLE,
  INDEX `fk_tb_compras_tb_usuarios1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_tb_compras_tb_proveedores1`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `sistema_ventas`.`tb_proveedores` (`id_proveedor`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_compras_tb_almacen1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sistema_ventas`.`tb_almacen` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_compras_tb_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `sistema_ventas`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_carrito` (
  `id_carrito` INT(11) NOT NULL AUTO_INCREMENT,
  `nro_venta` INT(11) NOT NULL,
  `id_producto` INT(11) NOT NULL,
  `cantidad` INT NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_carrito`),
  INDEX `fk_tb_carrito_tb_almacen1_idx` (`id_producto` ASC) VISIBLE,
  CONSTRAINT `fk_tb_carrito_tb_almacen1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sistema_ventas`.`tb_almacen` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_clientes` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` VARCHAR(255) NULL,
  `nit_ci_cliente` VARCHAR(255) NULL,
  `celular_cliente` VARCHAR(50) NULL,
  `email_cliente` VARCHAR(255) NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_ventas`.`tb_ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_ventas`.`tb_ventas` (
  `id_venta` INT(11) NOT NULL AUTO_INCREMENT,
  `nro_venta` INT(11) NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `total_pagado` INT NULL,
  `fyh_creacion` DATETIME NULL,
  `fyh_actualizacion` DATETIME NULL,
  PRIMARY KEY (`id_venta`),
  INDEX `fk_tb_ventas_tb_clientes1_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `fk_tb_ventas_tb_carrito1_idx` (`nro_venta` ASC) VISIBLE,
  CONSTRAINT `fk_tb_ventas_tb_clientes1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `sistema_ventas`.`tb_clientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_ventas_tb_carrito1`
    FOREIGN KEY (`nro_venta`)
    REFERENCES `sistema_ventas`.`tb_carrito` (`id_carrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
