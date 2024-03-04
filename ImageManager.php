<?php

namespace MVC;

use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\ImageException;

class ImageManager
{
  private $image;
  private $imageContainer;
  public $imageName;
  private $format;
  public $error = null;

  public function __construct($imageContainer = null, $format)
  {
    $this->imageContainer = $imageContainer;
    $this->format = $format;
  }

  public function setFiles(array $files)
  {
    $tempImageName = $files['file']['tmp_name'];
    // showFormat($tempImageName, true);
    $this->error = null;

    if ($tempImageName) {
      $this->imageName = md5(uniqid(rand(), true)) . ".$this->format";
      try {
        switch ($this->format) {
          case 'webp':
            break;
          case 'avif':
            break;
          default:
            $this->image = Image::make($tempImageName);
            $this->image->encode($this->format, 70);
        }
      } catch (ImageException $e) {
        $this->error = "El formato o la imagen no pueden ser procesados";
      }
    } else {
      $this->error = "No se pudo cargar la imagen";
    }

    if (!is_null($this->error))
      return $this->error;
  }

  public function make()
  {
    if ($this->imageContainer && $this->imageContainer->image) {
      self::removeImage($this->imageContainer->image);
    }

    if ($this->image) {
      $this->image->save(IMAGE_DIR . $this->imageName);
    }
  }

  public static function removeImage($name)
  {

    unlink(IMAGE_DIR . $name);
  }

  public function getImageName()
  {
    return $this->imageName;
  }
}
