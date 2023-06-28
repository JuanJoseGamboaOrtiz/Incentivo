 CREATE TABLE pais(
    idPais INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombrePais VARCHAR(50) NOT NULL
    );
    
CREATE TABLE departamento(
    idDep INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT(11) NOT NULL,
    KEY idPais(idPais),
    CONSTRAINT idPaisFK
    FOREIGN KEY (idPais)
    REFERENCES pais(idPais)
);
CREATE TABLE region(
     dReg INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreReg VARCHAR(50) NOT NULL,
    idDep INT(11) NOT NULL,
    KEY idDep(idDep),
    CONSTRAINT idDep
    FOREIGN KEY (idDep)
    REFERENCES departamento(idDep)
    );


CREATE TABLE campers(
     idCamper INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT(11) NOT NULL,
    KEY idReg(idReg),
    CONSTRAINT idReg
    -FOREIGN KEY (idReg)
    REFERENCES region(idReg)
    );

