<?php
session_start();
include_once('./include/dbconn.php');

$database = new Connection();
$db = $database->open();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM ProfesionalesSaludMental WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $especialista = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$especialista) {
        header("Location: especialistas.php");
        exit();
    }
} else {
    header("Location: especialistas.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $contacto = $_POST['contacto'];

    $stmt = $db->prepare("UPDATE ProfesionalesSaludMental SET nombre = :nombre, especialidad = :especialidad, contacto = :contacto WHERE id = :id");
    $stmt->execute(['nombre' => $nombre, 'especialidad' => $especialidad, 'contacto' => $contacto, 'id' => $id]);


    header("Location: ingresar_especialista.php");
    exit();
}

$database->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <title>Modificar Especialista</title>
</head>

<body>

    <div class="container-fluid my-3">
        <header class="background-header" style="background-color: black;"></header>
    </div>

    <main>
        <section class="container my-5">
            <h2 class="text-center mb-4">Modificar Especialista</h2>

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Especialista</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $especialista['nombre'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?= $especialista['especialidad'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="contacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="contacto" name="contacto" value="<?= $especialista['contacto'] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </section>
    </main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
