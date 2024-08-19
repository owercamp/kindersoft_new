<?php

namespace App\Interfaces;

interface IConsultingServices
{
  public static function get_consulting_increment($table, $field): string;
}
