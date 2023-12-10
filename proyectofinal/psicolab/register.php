<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Register</title>
</head>
<body>
    <style>

body{
    background: #e3e9f7;
}
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 90vh;
}
.box{
    background: #fdfdfd;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 10px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
}
.form-box{
    width: 450px;
    margin: 0px 10px;
}
.form-box header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
    margin-bottom: 10px;
}
.form-box form .field{
    display: flex;
    margin-bottom: 10px;
    flex-direction: column;

}
.form-box form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.btn{
    height: 35px;
    background: rgb(64, 125, 105);;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: all .3s;
    margin-top: 10px;
    padding: 0px 10px;
}
.btn:hover{
    opacity: 0.82;
}
.submit{
    width: 100%;
}
.links{
    margin-bottom: 15px;
}

/********* Home *****************/

.nav{
    background: #fff;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    line-height: 60px;
    z-index: 100;
}
.logo{
    font-size: 25px;
    font-weight: 900;
    
}
.logo a{
    text-decoration: none;
    color: #000;
}
.right-links a{
    padding: 0 10px;
}
main{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 60px;
}
.main-box{
    display: flex;
    flex-direction: column;
    width: 70%;
}
.main-box .top{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.bottom{
    width: 100%;
    margin-top: 20px;
}
@media only screen and (max-width:840px){
    .main-box .top{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .top .box{
        margin: 10px 10px;
    }
    .bottom{
        margin-top: 0;
    }
}
.message{
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border:1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}
    </style>
    <div class="container">
        <div class="box form-box">

        <?php
include_once('./include/dbconn.php');
$database = new Connection();
$db = $database->open();
try{

if (isset($_POST['submit'])) {
    $nombre = $_POST['username'];
    $correo_electronico = $_POST['email'];
    $edad = $_POST['age'];
    $contrasena = $_POST['password'];

    $verify_query = $db->prepare("SELECT correo_electronico FROM usuarios WHERE correo_electronico = :correo_electronico");
    $verify_query->bindParam(':correo_electronico', $correo_electronico);
    $verify_query->execute();

    if ($verify_query->rowCount() != 0) {
        echo "<div class='message'>
                <p>Este correo electrónico ya está en uso</p>
              </div><br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button></a>";
    } else {
        $contrasena_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);

        $insert_query = $db->prepare("INSERT INTO usuarios (nombre, correo_electronico, edad, contrasena) VALUES (?, ?, ?, ?)");
        $insert_query->bindParam(1, $nombre);
        $insert_query->bindParam(2, $correo_electronico);
        $insert_query->bindParam(3, $edad);
        $insert_query->bindParam(4, $contrasena_cifrada);
        $insert_query->execute();

        header("Location: login.php");
        exit();
    }
}}catch (PDOException $e){
    echo "Error en la coneccion" . $e->getMessage();
  }
  $database->close();
?>


            <header>Registrate</header>
            <form action=""method="post">

                <div class="field input">
                    <label for="username">Nombre de usuario</label>
                    <input type="text"name="username"id="username" required>
                </div>
                <div class="field input">
                    <label for="email">Correo electronico</label>
                    <input type="text"name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Edad</label>
                    <input type="text"name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password"name="password"id="password" required>
                </div>

                <div class="field">
                    <input type="submit"class="btn" name="submit"value="Registrarse" required>
                </div>

                <div class="links">
                    Ya tienes una cuenta? <a href="login.php">Inicia sesion ahora</a>
                </div>
</body>
</html>
