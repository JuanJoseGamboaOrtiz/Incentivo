# REPOSITORIO PRUEBA INCENTIVO


### CREACIÓN DE LA BASE DE DATOS

Para la creación de la base de datos fue necesario cambiar el tipo de dato de int a VARCHAR a al columna nombrePais en la tabla pais, y en la tabla campers cambiar el tipo de varchar a int.

- CREATE DATABASE campuslands;
- USE campuslands;
- > CREATE TABLE pais(
    -> idPais INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombrePais VARCHAR(50) NOT NULL
    -> );

    Para insertar en la tabla pais

    * INSERT INTO pais (nombrePais) VALUES ('Colombia'); 

- > CREATE TABLE departamento(
    -> idDep INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreDep VARCHAR(50) NOT NULL,
    -> idPais INT(11) NOT NULL,
    -> KEY idPais(idPais),
    -> CONSTRAINT idPaisFK
    -> FOREIGN KEY (idPais)
    -> REFERENCES pais(idPais)
    -> );

    Para insertar en la tabla departamento

    * INSERT INTO departamento (nombreDep,idPais) VALUES ('Santander','idPaisqueCorresponda');


- > CREATE TABLE region(
    -> idReg INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreReg VARCHAR(50) NOT NULL,
    -> idDep INT(11) NOT NULL,
    -> KEY idDep(idDep),
    -> CONSTRAINT idDep
    -> FOREIGN KEY (idDep)
    -> REFERENCES departamento(idDep)
    -> );

    Para insertar en la tabla region
    
    * INSERT INTO region (nombreReg,idDep) VALUES ('nombreRegio','idDepQueCorresponda');

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

    Para insertar en la tabla campers

    * INSERT INTO campers (nombreCamper,apellidoCamper,fechaNac,idReg) VALUES ('Nombre','Apellido','fechaNac','IdQueCorresponda');

- 

## FUNCIONAMIENTO DE LAS RUTAS

http://localhost/ApolT01-032/Incentivo/uploads/camper , Está ruta con el metodo get obtiene todos los campers, con la información correspondiente.

http://localhost/ApolT01-032/Incentivo/uploads/camper, con el metodo DELETE elimina el camper según su id.

http://localhost/ApolT01-032/Incentivo/uploads/camper/paises, obtiene el nombre e id de todos los paises en la base de datos


http://localhost/ApolT01-032/Incentivo/uploads/camper/departamentos, obtiene el nombre e id de los departamentos

