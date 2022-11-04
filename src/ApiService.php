<?php

namespace Src;

use Src\Ciudad;

define ("URL","https://pixabay.com/api/?key=31094765-26087c8ddef91ed0970fdf50a&q=florencia&image_type=photo");


class ApiService{
    public function getImagenes():array{
        $imagenes = [];
        $datos = file_get_contents(URL);
        //Transformamos el archivo json para que sea legible
        $datosJson = json_decode($datos);
        $datosImagenes = $datosJson->hits;

        foreach($datosImagenes as $objCiudad){
            $imagenes[]= (new Ciudad)->setUrl_image($objCiudad->largeImageURL)
            ->setAutor($objCiudad->user)
            ->setLikes($objCiudad->likes);
        }   

        return $imagenes;
    }
}

(new ApiService)->getImagenes();