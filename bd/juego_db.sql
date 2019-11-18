drop database if exists juego_db ;
create database juego_db;
use juego_db;

DROP TABLE IF EXISTS preguntasRespuestas;
CREATE TABLE preguntasRespuestas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pregunta VARCHAR(60) NOT NULL,
    respuesta1 VARCHAR(20) NOT NULL,
	respuesta2 VARCHAR(20) NOT NULL,
    respuesta3 VARCHAR(20) NOT NULL,
    respuestaCorrecta VARCHAR(20) NOT NULL

);
DROP TABLE IF EXISTS usuarios;
CREATE TABLE  usuarios (
	id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(15) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    avatar VARCHAR(30) NOT NULL
);
DROP TABLE IF EXISTS partidas ;
CREATE TABLE partidas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vida INT NOT NULL,
    acierto INT NOT NULL,
    usuario_id INT  NOT NULL,
    puntuacion_id INT   NOT NULL
);
DROP TABLE IF EXISTS puntuaciones ;
CREATE TABLE puntuaciones(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    puntos INT NOT NULL
);

ALTER TABLE partidas ADD FOREIGN KEY (puntuacion_id) REFERENCES puntuaciones(id);
ALTER TABLE partidas ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);


