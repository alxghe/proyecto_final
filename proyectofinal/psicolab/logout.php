<?php
session_start();

include_once('./include/dbconn.php');

$database = new Connection();
$db = $database->open();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// Cerrar la conexión a la base de datos
$database->close();

header("Location: index.php");
exit();
?>
