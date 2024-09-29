<?php
namespace App\Interfaces;

interface IGetNotification
{
  public static function get_notifications($type,$message,$timer,$status): array;
}
