<?php
include_once('./include/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Connection();
    $db = $database->open();

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $enlace = $_POST['enlace'];

    $stmt = $db->prepare("INSERT INTO Recursos (titulo, descripcion, enlace) VALUES (?, ?, ?)");
    $stmt->execute([$titulo, $descripcion, $enlace]);

    
    header('Location: ingresar_recurso.php');

    $database->close();
}
?>
