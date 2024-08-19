<?php

namespace App\Interfaces;

interface IGetConsultingServices
{
  public static function get_consulting($table, $params): object;
}
