<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

  <title>Ingresar Recurso</title>
</head>

<body>
  <section>
    <?php
    session_start();
    include_once('./include/dbconn.php');

    $database = new Connection();
    $db = $database->open();
    ?>
    ]
  </section>

  <div class="container-fluid my-3">
    <header class="background-header" style="background-color:black">

    </header>
  </div>

  <main>
    <section class="container my-5">
      <h2 class="text-center mb-4">Ingresar Nuevo Recurso</h2>

      <div class="row">
        <div class="col-md-6 mx-auto">
          <form action="procesar_recurso.php" method="POST">
            <div class="mb-3">
              <label for="titulo" class="form-label">Título del Recurso</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="enlace" class="form-label">Enlace</label>
              <input type="url" class="form-control" id="enlace" name="enlace" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Recurso</button>
          </form>
        </div>
      </div>
    </section>
  </main>
          <section class="container my-5">
            <h2 class="text-center mb-4">Recursos Disponibles</h2>

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Enlace</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $db->query("SELECT * FROM Recursos");
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>{$row['titulo']}</td>";
                                echo "<td>{$row['descripcion']}</td>";
                                echo "<td><a href='{$row['enlace']}' target='_blank'>Enlace</a></td>";
                                echo "<td><a href='eliminar_recurso.php?id={$row['id']}' class='btn btn-danger'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        <
                    </table>
                </div>
            </div>
        </section>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
