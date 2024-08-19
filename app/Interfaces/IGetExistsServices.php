<?php

namespace App\Interfaces;

interface IGetExistsServices
{
  public static function get_exists($table, $field, $param): bool;
}
