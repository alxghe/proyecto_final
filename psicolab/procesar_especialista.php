<?php
session_start();

include_once('./include/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Connection();
    $db = $database->open();

    try {
        $nombre = $_POST['nombre'];
        $especialidad = $_POST['especialidad'];
        $contacto = $_POST['contacto'];

        // Insertar datos en la base de datos
        $sql = "INSERT INTO ProfesionalesSaludMental (nombre, especialidad, contacto) VALUES (:nombre, :especialidad, :contacto)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':nombre' => $nombre, ':especialidad' => $especialidad, ':contacto' => $contacto));

        $_SESSION['success'] = 'Especialista registrado correctamente';
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error al registrar el especialista: ' . $e->getMessage();
    }

    $database->close();
    header('Location: ingresar_especialista.php'); // Redirige a la página de ingreso de especialistas
    exit();
} else {
    $_SESSION['error'] = 'Acceso no válido';
    header('Location: ingresar_especialista.php');
    exit();
}
