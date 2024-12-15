<?php

    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']); 
        unset($_SESSION['senha']);
        header("Location: ../login.php");
    }
    $logado = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <!-- Cabeçalho com Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Galáxia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajuda</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="btn btn-logout">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carrossel -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/astro1.png" class="d-block w-100" alt="Imagem 1">
                <div class="carousel-caption d-none d-md-block">
                    <h3 id="dtitu">NASA's NEOWISE Infrared Heritage will live on</h3><br>
                    <p id="description">After 14 successful years in space, increased solar activity is causing the NEOWISE mission to end on July 31...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/astro2.png" class="d-block w-100" alt="Imagem 2">
                <div class="carousel-caption d-none d-md-block">
                    <h3 id="dtitu">The Moon</h3><br>
                    <p id="description">Earth's Moon is the brightest and largest object in our night sky...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/astro3.png" class="d-block w-100" alt="Imagem 3">
                <div class="carousel-caption d-none d-md-block">
                    <h3 id="dtitu">Sounding Rocket Mission Will Trace Auroral Winds</h3><br>
                    <p id="description">The beautiful lights are just the visible product of these collisions...</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Título da Seção -->
    <div class="container">
        <h2 class="section-title">NASA IMAGES</h2>
    </div>

    <!-- Cards -->
    <div class="container my-5">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card mb-4">
                    <img src="img/vialac.png" width="250px" height="350px" class="card-img-top" alt="Imagem do Cartão 1">
                    <div class="card-body">
                        <h5 class="card-title">Milky Way</h5>
                        <p class="card-text">Our home galaxy is called the Milky Way...</p>
                        <a href="https://science.nasa.gov/universe/galaxies/" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card mb-4">
                    <img src="img/sol.png" width="250px" height="350px" class="card-img-top" alt="Imagem do Cartão 2">
                    <div class="card-body">
                        <h5 class="card-title">Star</h5>
                        <p class="card-text">At first, most of the protostar’s energy comes from heat released by its initial collapse...</p>
                        <a href="https://science.nasa.gov/universe/stars/" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card mb-4">
                    <img src="img/exo.png" class="card-img-top" alt="Imagem do Cartão 3">
                    <div class="card-body">
                        <h5 class="card-title">Exoplanets</h5>
                        <p class="card-text">An exoplanet is any planet beyond our solar system...</p>
                        <a href="https://science.nasa.gov/exoplanets/" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card mb-4">
                    <img src="img/james.png" class="card-img-top" alt="Imagem do Cartão 4">
                    <div class="card-body">
                        <h5 class="card-title">James Webb</h5>
                        <p class="card-text">Webb is the premier observatory of the next decade...</p>
                        <a href="https://science.nasa.gov/mission/webb/" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-container my-5">
        <h3 class="text-center">WATCH THE VIDEO BELOW</h3>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8UqNVzY0EVg" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="footer mt-5">
        <p>&copy; Pagina teste. -Calebe- Setembro, 2023... Pagina em Ingles para teste de tradutor.</p>
    </footer>

    <!-- Bootstrap JS e dependências (jQuery e Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
