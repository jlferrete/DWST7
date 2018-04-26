CREATE DATABASE biblioteca CHARACTER SET utf8 COLLATE utf8_spanish2_ci;

use biblioteca;

CREATE TABLE Usuarios(
idUsuario INT(8) NOT NULL AUTO_INCREMENT UNIQUE,
nombreUsuario VARCHAR(32) NOT NULL,
clave VARCHAR(64) NOT NULL,
tipo INT(2),
PRIMARY KEY(idUsuario)
);

CREATE TABLE Libros(
idLibro INT(8) NOT NULL AUTO_INCREMENT UNIQUE,
nombreLibro VARCHAR(128) NOT NULL,
autor VARCHAR(64) NOT NULL,
isbn VARCHAR(13) NOT NULL,
puntuacion INT(8),
genero VARCHAR(64) NOT NULL,
PRIMARY KEY(idLibro)
);

INSERT INTO Usuarios VALUES (DEFAULT, "juangr", "juangr", 1),
(DEFAULT, "mariapg", "mariapg", 2);

INSERT INTO Libros VALUES (DEFAULT, "El capitán Alatriste", "Arturo Pérez Reverte", 1, 8, "Novela Histórica"),
(DEFAULT, "El señor de los anillos", "JRR Tolkien", 2, 9, "Fantasía"),
(DEFAULT, "Juego de Tronos", "George RR Martin", 3, 9, "Fantasía");