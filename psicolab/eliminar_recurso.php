<?php
session_start();
include_once('./include/dbconn.php');

$database = new Connection();
$db = $database->open();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recurso_id = $_GET['id'];

    $sql = "DELETE FROM Recursos WHERE id = :recurso_id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':recurso_id', $recurso_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: recursos.php');
        exit();
    } else {
        echo "Error al eliminar el recurso.";
    }
} else {
    echo "ID de recurso no válido.";
}
?>

