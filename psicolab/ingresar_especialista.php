<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <title>Ingresar Especialista</title>
</head>

<body>
    <section>
        <?php
        session_start();
        include('./include/dbconn.php');

        $database = new Connection();
        $db = $database->open();
        ?>
    </section>

    <div class="container-fluid my-3">
        <header class="background-header" style="background-color: black;"></header>
    </div>

    <main>
        <section class="container my-5">
            <h2 class="text-center mb-4">Ingresar Nuevo Especialista</h2>

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="procesar_especialista.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Especialista</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="contacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="contacto" name="contacto" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Especialista</button>
                    </form>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM ProfesionalesSaludMental";
            $result = $db->query($sql);

            if ($result->rowCount() > 0) {
                echo '<div class="table-responsive mt-5">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Especialidad</th>';
                echo '<th>Contacto</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['especialidad'] . '</td>';
                    echo '<td>' . $row['contacto'] . '</td>';
                    echo '<td>';
                    echo '<a href="eliminar_especialista.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                    echo ' <a href="modificar_especialista.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Modificar</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p class="text-center">No hay especialistas registrados.</p>';
            }

            $database->close();
            ?>
        </section>
    </main>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
