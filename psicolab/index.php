  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">


    <title>Home</title>
  </head>

  <body>
    <section>
      <?php
  session_start();
  include_once('./include/dbconn.php');

  $database = new Connection();
  $db = $database->open();
  ?>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><span style="color:rgb(64, 125, 105);">Psico</span>Lab</a>
          <button class="navbar-toggler"
            style="color: rgb(64, 125, 105); border: 1px solid white; background-color: white;" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="exito.php">Cuentanos tu historia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mostrar_historias.php">Exitos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="recursos.php">Recursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="especialistas.php">Especialistas</a>
              </li>

            </ul>
            <?php if (isset($_SESSION['user'])): ?>
            <span class="navbar-text" style="color: rgb(215, 218, 182);">
              Bienvenido,
              <?php echo $_SESSION['user']; ?>
            </span>
            <?php endif; ?>
          </div>
        </div>
      </nav>


    </section>


    <div class="container-fluid my-3">
      <header class="background-header" style="background-image: url(public/images/apo.jpeg);">
        <div class="contenido d-block">
          <div class="card"></div>
          <h6 style="color: #f4f4f4;">No estás solo en esto. Juntos, podemos construir un espacio de reflexión,
            crecimiento y conexión. Explora,
            aprende y comparte. Estamos aquí para ti.</h6>
          <h1 class="display-2" style="text-shadow: #4a3d3d;">PSICOLAB</h1>
          <p class="text-justify">En PSICOLAB, estamos para acompañarte en tu viaje hacia el bienestar emocional.
            Sabemos que la vida puede presentar desafíos, y queremos ser un faro de apoyo y esperanza en tu camino.

            Aquí encontrarás recursos, información y una comunidad acogedora que entiende y valora tus experiencias. La
            salud mental es una prioridad, y estamos comprometidos a brindarte las herramientas y el apoyo necesario para
            fortalecer tu bienestar emocional.</p>
        </div>
    </div>
    </header>
    </div>

    <main>
      <section class="shadow" style="display: block;background-color: rgba(107, 166, 239, 1);">
        <br>
        <div class="container-fluid">
          <div class="row flex-column">
            <div class="col mb-3">
              <div class="card h-100 shadow">
                <div class="card-body text-center" style="background-color: azure;">
                  <p class="text-justify fw-bold fs-4">Historias de éxito</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow h-100 bg-cover bg-center" style="background-color: azure;">
                <div class="overlay"></div>
                <div class="card-body position-relative">
                  <h5 class="card-title text-dark">Nunca es facil pero...</h5>
                  <p class="card-text text-dark">
                    Hablar con otras personas sobre las cosas que te molestan es una práctica fundamental para el bienestar emocional. Compartir tus preocupaciones y desahogarte con personas que te entienden puede aliviar el peso emocional que llevas. Este proceso de comunicación efectiva no solo te permite expresar tus sentimientos, sino que también fomenta la conexión emocional con quienes te rodean.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
      </section>

      <br>
      <section class="shadow" style="background-color: rgba(182, 158, 222, 1);">
        <br>
        <div class="container-fluid my-3">
          <div class="row text-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
              <div class="shadow" style=" background-size: cover; position: relative;">
                <div
                  style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(129, 103, 103, 0.1); z-index: 1;">
                </div>
                <div class="bg-body" style=" position: relative; z-index: 2;">
                  <h4 class="text-bg-secondary" style="color: #4a3d3d;">NO ESTAS SOLO</h4>
                  <p class="" style="color: rgb(41, 39, 39);">Hay muchas personas dispuestas a escucharte, comprender tus sentimientos y ofrecerte su apoyo incondicional. No estás solo en tu camino hacia el bienestar emocional.</p>
                </div>

              
                <div id="textCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                      <div class="carousel-text">
                        <p>Encuentra la luz en los días oscuros. La felicidad a menudo viene de las pequeñas cosas y de apreciar el momento presente.</p>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="carousel-text">
                        <p>Cada día es una nueva oportunidad para comenzar de nuevo. No importa lo que haya sucedido ayer, hoy es una página en blanco</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="carousel-text">
                        <p>La vida es como una bicicleta, para mantener el equilibrio, debes seguir adelante. Atrévete a avanzar y disfrutar del viaje.</p>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="carousel-text">
                        <p>Tu actitud determina tu dirección. Mantén una actitud positiva y verás cómo cambia tu perspectiva y tu vida.</p>
                      </div>
                    </div>


                    <a class="carousel-control-prev" href="#textCarousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#textCarousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only"></span>
                    </a>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        <br>
      </section>
      <br>

      <section class="container-fluid shadow" style="background-color: rgb(62, 149, 149);">
        <section class="p-5">
          <div class="container">
            <div class="row text-center g-4">
            
              <div class="col-md">
                <div class="card bg-secondary text-light">
                  <div class="card-body text-center">
                    <div class="h1 mb-3">
                      <i class="bi bi-person-square"></i>
                    </div>
                    <h3 class="card-title mb-3">Recursos</h3>
                    <p class="card-text">
                      Explora recursos valiosos que pueden guiarte en tu camino hacia el bienestar emocional.   
                    </p>
                    <a href="recursos.php" class="btn btn-dark">Leer mas</a>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="card bg-dark text-light">
                  <div class="card-body text-center">
                    <div class="h1 mb-3">
                      <i class="bi bi-people"></i>
                    </div>
                    <h3 class="card-title mb-3">Profesionales</h3>
                    <p class="card-text">
                      Descubre cómo su experiencia puede ser un recurso invaluable en tu viaje hacia el bienestar emocional.
                    </p>
                    <a href="especialistas.php" class="btn btn-primary">Leer mas</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>

      <section>
        <section id="learn" class="p-5">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-md">
                <img src="public/images/bienestar.png" class="img-fluid" alt="" />
              </div>
              <div class="col-md p-5">
                <h2>Encuentra profesionles</h2>
                <p class="lead">
                  Puedes apoyarte de expertos que están capacitados para brindarte orientación y apoyo especializado
                </p>
                <p>
                  Los profesionales de la salud mental, como psicólogos, terapeutas y consejeros, están dedicados a ayudarte a comprender y superar tus desafíos emocionales. 
                </p>
                <a href="especialistas.php" class="btn btn-light mt-3">
                  <i class="bi bi-chevron-right"></i> Leer más
                </a>
              </div>
            </div>
          </div>
        </section>
      </section>


    </main>
    <br>
    <div class="row">
      <footer class="py-3 my-4 ">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item">

            <a class="nav-link px-2 text-muted" href="https://twitter.com">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter"
                viewBox="0 0 16 16">
                <path
                  d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 a3.203 a3.203">
                </path>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-2 text-muted" href="https://www.youtube.com">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube"
                viewBox="0 0 16 16">
                <path
                  d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.instagram.com" class="nav-link px-2 text-muted">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram"
                viewBox="0 0 16 16">
                <path
                  d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
              </svg>
            </a>
          </li>
        </ul>
        <p class="text-center text-muted">©2023 PSICOLAB</p>
      </footer>
    </div>

    <script>function confirmLogout() {
        var confirmLogout = confirm("¿Realmente quieres cerrar sesión?");
        if (confirmLogout) {
          window.location.href = "logout.php";
        }
      }</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="public/js/bootstrap.min.js"></script>


  </body>

  </html>