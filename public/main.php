<?php

require __DIR__ . "/../vendor/autoload.php";

use Src\ApiService;
use Src\Ciudad;

$imagenes = (new ApiService)->getImagenes();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Imágenes de Florencia</h3>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $cont = 1;
                foreach ($imagenes as $imagen) {
                    echo ($cont == 1) ? "<div class='carousel-item active'>\n" : "<div class='carousel-item'>\n";
                    echo <<<TXT
                    <div class="card">
                    <img src="{$imagen->getURL_image()}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Autor: {$imagen->getAutor()}</h5>
                    <p class="card-text">Likes: {$imagen->getLikes()}</p>
                    </div>
                    </div>
                    TXT;
                    echo "</div>\n";
                    $cont++;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

</body>

</html>