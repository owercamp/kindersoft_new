<?php

namespace App\Service;

use App\Interfaces\IGetNotification;

class AlertService implements IGetNotification
{
  public static function get_notifications($type, $message, $timer, $status): array
  {
    $notified = [
      'type' => $type,
      'message' => $message,
      'timer' => $timer,
      'showConfirmButton' => false,
      'success' => $status
    ];

    return $notified;
  }
}
