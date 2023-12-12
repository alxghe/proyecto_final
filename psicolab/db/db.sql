            CREATE DATABASE IF NOT EXISTS psicolab;
            USE psicolab;

            CREATE TABLE Usuarios (
                id INT PRIMARY KEY AUTO_INCREMENT,
                nombre VARCHAR(255) unique,
                correo_electronico VARCHAR(255) unique,
                contrasena VARCHAR(255),
                fecha_creacion DATETIME,
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

            CREATE TABLE ProfesionalesSaludMental (
                id INT PRIMARY KEY AUTO_INCREMENT,
                nombre VARCHAR(255),
                especialidad VARCHAR(255),
                contacto VARCHAR(255)
            );
          DELIMITER //
            CREATE TRIGGER validar_edad_usuario
            BEFORE INSERT ON Usuarios
            FOR EACH ROW
            BEGIN
                IF NEW.edad <= 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'La edad debe ser mayor a cero.';
                END IF;
            END;
            //
            DELIMITER ;



            DELIMITER //
            CREATE TRIGGER trigger_fecha_creacion_usuario
            BEFORE INSERT ON Usuarios
            FOR EACH ROW
            BEGIN
                SET NEW.fecha_creacion = NOW();
            END;
            //
            DELIMITER ;

