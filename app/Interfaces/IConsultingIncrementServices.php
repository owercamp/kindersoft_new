<?php

namespace App\Interfaces;

interface IConsultingIncrementServices
{
  public static function get_consulting_increment($table, $field): string;
}
