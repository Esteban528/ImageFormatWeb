<?php

namespace MVC;

class ImageContainer
{
  public $image;

  public static function scanFile($file, $ext = "png") // Cambiado el valor predeterminado de extensión a "png" para las imágenes
  {

    ob_clean();
    $route = IMAGE_DIR . "$file";
    if (file_exists($route)) {
      header("Content-Type: image/$ext"); // Establecer el tipo de contenido como imagen
      header("Content-Disposition: attachment; filename=$file"); // Indicar al navegador que descargue el archivo

      readfile($route); // Leer el archivo y enviarlo al navegador
    } else {
      echo "El archivo no existe: " . $route;
    }
  }
}
