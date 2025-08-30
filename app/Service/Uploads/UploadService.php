<?php

namespace App\Service\Uploads;

use Ramsey\Uuid\Uuid;


class UploadService
{
  private const IMAGES = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'avif'];
  public static function upload($dir, $file)
  {
    $ext = $file->getClientOriginalExtension();

    if (in_array($ext, self::IMAGES)) {
      $filename = Uuid::uuid4()->toString() . '.' . $ext;
      return UploadImageService::upload($dir, $file, $filename);
    }
  }
}
