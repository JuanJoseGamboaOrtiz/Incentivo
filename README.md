# REPOSITORIO PRUEBA INCENTIVO


### CREACIÓN DE LA BASE DE DATOS

Para la creación de la base de datos fue necesario cambiar el tipo de dato de int a VARCHAR a al columna nombrePais en la tabla pais, y en la tabla campers cambiar el tipo de varchar a int.

- CREATE DATABASE campuslands;
- USE campuslands;
- > CREATE TABLE pais(
    -> idPais INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombrePais VARCHAR(50) NOT NULL
    -> );

- > CREATE TABLE pais(
    -> idPais INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombrePais VARCHAR(50) NOT NULL
    -> );

- > CREATE TABLE region(
    -> idReg INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreReg VARCHAR(50) NOT NULL,
    -> idDep INT(11) NOT NULL,
    -> KEY idDep(idDep),
    -> CONSTRAINT idDep
    -> FOREIGN KEY (idDep)
    -> REFERENCES departamento(idDep)
    -> );

-    > CREATE TABLE campers(
    -> idCamper INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreCamper VARCHAR(50) NOT NULL,
    -> apellidoCamper VARCHAR(50) NOT NULL,
    -> fechaNac DATE NOT NULL,
    -> idReg INT(11) NOT NULL,
    -> KEY idReg(idReg),
    -> CONSTRAINT idReg
    -> FOREIGN KEY (idReg)
    -> REFERENCES region(idReg)
    -> );



