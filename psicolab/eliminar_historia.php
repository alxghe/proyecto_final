<?php
session_start();

include('./include/dbconn.php');

if (isset($_SESSION['user_id'])) {
    $database = new Connection();
    $db = $database->open();

    $usuario_id = $_SESSION['user_id'];

    if (isset($_GET['eliminar'])) {
        $id_historia = $_GET['eliminar'];
        $stmt = $db->prepare("DELETE FROM HistoriasExito WHERE id = :id AND usuario_id = :usuario_id");
        $stmt->bindParam(':id', $id_historia);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();
    }
    header("Location: exito.php");

    $database->close();
} else {
    $_SESSION['error_message'] = "Debes iniciar sesión para acceder a esta página.";
    header("Location: exito.php");
    exit();
}
