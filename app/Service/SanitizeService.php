<?php

namespace App\Service;

use Mews\Purifier\Facades\Purifier;

class SanitizeService
{
  static function sanitize(string $string, string $type)
  {
    switch ($type) {
      case 'email':
        return filter_var($string, FILTER_SANITIZE_EMAIL);
        break;

      case 'url':
        return filter_var($string, FILTER_SANITIZE_URL);
        break;

      case 'html':
        return Purifier::clean($string);
        break;
    }
  }
}
