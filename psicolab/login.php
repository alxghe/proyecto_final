    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="./public/css/log-register-style.css">
        <title>login</title>
    </head>
    <body>
    <style>
</style>
        <div class="container">
            <div class="box form-box">
            <?php
session_start();

include_once('./include/dbconn.php');
$database = new Connection();
$db = $database->open();

try {
    if (isset($_POST['submit'])) {
        $correo_electronico = trim($_POST['email']);
        $nombre_usuario = trim($_POST['username']);
        $contrasena = trim($_POST['password']);

        if (!empty($correo_electronico) && !empty($nombre_usuario) && !empty($contrasena)) {
            $get_user_query = $db->prepare("SELECT contrasena FROM usuarios WHERE correo_electronico = :correo_electronico AND nombre = :nombre");
            $get_user_query->bindParam(':correo_electronico', $correo_electronico);
            $get_user_query->bindParam(':nombre', $nombre_usuario);
            $get_user_query->execute();
            $stored_password = $get_user_query->fetchColumn();

            if ($stored_password && password_verify($contrasena, $stored_password)) {
              
                $user_id = $database->obtenerIdUsuario($nombre_usuario);

                if ($user_id !== null) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user'] = $nombre_usuario;

                  
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='message'>
                            <p>Error al obtener el ID del usuario</p>
                          </div><br>";
                }
            } else {
                echo "<div class='message'>
                        <p>Credenciales incorrectas</p>
                      </div><br>";
            }
        }
    }
} catch (PDOException $e) {
    echo "Error en la conexión" . $e->getMessage();
} finally {
    $database->close();
}
?>
<div class="container">
    <div class="box form-box">

                <header>Iniciar sesion</header>
                <form action=""method="post">
                <div class="field input">
                        <label for="username">Nombre de usuario</label>
                        <input type="text"name="username"id="username" required>
                    </div>
                    <div class="field input">
                        <label for="email">correo electronico</label>
                        <input type="text"name="email"id="email" required>
                    </div>

                    <div class="field input">
                        <label for="password">Contraseña</label>
                        <input type="password"name="password"id="password" required>
                    </div>
                    <div class="field">
                        <input type="submit"class="btn" name="submit"value="login" required>
                    </div>
                    <div class="links">
                        No tienes una cuenta? <a href="register.php">Registrarse ahora</a>
                    </div>
        </div>
</div>
    </body>
    </html>