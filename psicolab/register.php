<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="./public/css/log-register-style.css">
    <title>Register</title>
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
        $nombre = $_POST['username'];
        $correo_electronico = $_POST['email'];
        $edad = $_POST['age'];
        $contrasena = $_POST['password'];

        if (!is_numeric($edad)) {
            $_SESSION['error_message'] = "La edad debe ser un número entero";
            header("Location: register.php");
            exit();
        }

        $verify_query = $db->prepare("SELECT nombre FROM usuarios WHERE nombre = :nombre");
        $verify_query->bindParam(':nombre', $nombre);
        $verify_query->execute();

        if ($verify_query->rowCount() != 0) {
            $_SESSION['error_message'] = "Este nombre de usuario ya está en uso";
            header("Location: register.php");
            exit();
        }

        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

        $insert_query = $db->prepare("INSERT INTO usuarios (nombre, correo_electronico, edad, contrasena) VALUES (?, ?, ?, ?)");
        $insert_query->bindParam(1, $nombre);
        $insert_query->bindParam(2, $correo_electronico);
        $insert_query->bindParam(3, $edad, PDO::PARAM_INT); 
        $insert_query->bindParam(4, $contrasena_cifrada);
        $insert_query->execute();

        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        $_SESSION['error_message'] = "Este nombre de usuario o correo electrónico ya está en uso";
        header("Location: register.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error en la conexión: " . $e->getMessage();
        header("Location: register.php");
        exit();
    }
} finally {
    $database->close();
}
?>


        <div class="container">
            <div class="box form-box">
                <?php
                
                if (isset($_SESSION['error_message'])) {
                    echo "<div class='message'>
                        <p>{$_SESSION['error_message']}</p>
                      </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button></a>";

                    unset($_SESSION['error_message']);
                }
                ?>

                <header>Registrate</header>
                <form action="" method="post">

                    <div class="field input">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="field input">
                        <label for="email">Correo electronico</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="age">Edad</label>
                        <input type="text" name="age" id="age" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Registrarse" required>
                    </div>

                    <div class="links">
                        Ya tienes una cuenta? <a href="login.php">Inicia sesion ahora</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
