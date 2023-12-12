<?php
session_start();
include_once('./include/dbconn.php');

$database = new Connection();
$db = $database->open();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si el especialista existe antes de intentar eliminarlo
    $stmt = $db->prepare("SELECT * FROM ProfesionalesSaludMental WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $especialista = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($especialista) {
        $stmt = $db->prepare("DELETE FROM ProfesionalesSaludMental WHERE id = :id");
        $stmt->execute(['id' => $id]);


        header("Location: ingresar_especialista.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
}
$database->close();
?>
