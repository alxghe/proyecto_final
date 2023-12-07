-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS psicolab;
USE psicolab;

-- Crear la tabla de Usuarios
CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    correo_electronico VARCHAR(255),
    contrasena VARCHAR(255)
);

-- Crear la tabla de Historias de Éxito
CREATE TABLE HistoriasExito (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    titulo VARCHAR(255),
    contenido TEXT,
    fecha DATE,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

-- Crear la tabla de Recursos
CREATE TABLE Recursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    descripcion TEXT,
    enlace VARCHAR(255)
);

-- Crear la tabla de Mensajes de Apoyo
CREATE TABLE MensajesApoyo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    contenido TEXT,
    fecha DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

-- Crear la tabla de Profesionales de la Salud Mental
CREATE TABLE ProfesionalesSaludMental (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    especialidad VARCHAR(255),
    contacto VARCHAR(255)
);
