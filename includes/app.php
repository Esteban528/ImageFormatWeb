<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/misc.php';

use Controller\EmailController;

function showFormat ($value, $bool = false)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';

  if($bool){
    exit;
  }
}

function calcTime($fechaPublicacion) {
  $fechaPublicacion_timestamp = strtotime($fechaPublicacion);
  $ahora = time();
  $diferenciaSegundos = $ahora - $fechaPublicacion_timestamp;
  $diferenciaDias = round($diferenciaSegundos / (60 * 60 * 24));

  if ($diferenciaDias == 0) {
      return "Hoy";
  } elseif ($diferenciaDias == 1) {
      return "Hace 1 día";
  } else {
      return "Hace " . $diferenciaDias . " días";
  }
}

function s($html) : string {
  $s = htmlspecialchars($html);
  return $s;
}

function checkDirs()
{
  $dirs = array(IMAGE_DIR, TEMPLATES_DIR);

  foreach ($dirs as $dir) {
    if (!file_exists($dir)) {
      mkdir($dir, 755);
    }
  }
}
checkDirs();