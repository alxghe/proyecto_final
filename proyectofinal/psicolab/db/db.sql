CREATE DATABASE IF NOT EXISTS psicolab;
USE psicolab;

CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    correo_electronico VARCHAR(255),
    contrasena VARCHAR(255),
    edad Int
);

CREATE TABLE HistoriasExito (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    titulo VARCHAR(255),
    contenido TEXT,
    fecha DATE,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

CREATE TABLE Recursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    descripcion TEXT,
    enlace VARCHAR(255)
);

CREATE TABLE MensajesApoyo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    contenido TEXT,
    fecha DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

CREATE TABLE ProfesionalesSaludMental (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    especialidad VARCHAR(255),
    contacto VARCHAR(255)
);
