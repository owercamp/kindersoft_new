<?php

namespace App\Service\Uploads;

use Illuminate\Support\Facades\Storage;

class UploadImageService
{
  static function upload(string $dir, mixed $file, string $filename): string
  {
    $path = Storage::putFileAs($dir, $file, $filename);
    return $path;
  }
}
