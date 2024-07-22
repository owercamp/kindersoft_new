<?php

namespace App\Service;

class AlertService
{
  public static function success(): array
  {
    $success = [
      'type' => 'success',
      'message' => __('Successfully Created Record'),
      'timer' => 1500,
      'showConfirmButton' => false,
      'success' => 'completed'
    ];
    return $success;
  }

  public static function warning(): array
  {
    $warning = [
      'type' => 'warning',
      'message' => __('Record Already Exists'),
      'timer' => 1500,
      'showConfirmButton' => false,
      'success' => 'warning'
    ];
    return $warning;
  }

  public static function error(): array
  {
    $error = [
      'type' => 'error',
      'message' => __('An error has occurred'),
      'timer' => 1500,
      'showConfirmButton' => false,
      'success' => 'error'
    ];
    return $error;
  }

  public static function info(): array
  {
    $info = [
      'type' => 'info',
      'message' => __('Successfully Updated Record'),
      'timer' => 1500,
      'showConfirmButton' => false,
      'success' => 'completed'
    ];
    return $info;
  }

  public static function deleted(): array
  {
    $deleted = [
      'type' => 'success',
      'message' => __('Successfully Deleted Record'),
      'timer' => 1500,
      'showConfirmButton' => false,
      'success' => 'completed'
    ];
    return $deleted;
  }
}
