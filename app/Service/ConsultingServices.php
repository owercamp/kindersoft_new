<?php

namespace App\Service;

use App\Interfaces\IConsultingIncrementServices;
use App\Interfaces\IGetConsultingServices;
use App\Interfaces\IGetExistsServices;
use App\Interfaces\IStatusServices;
use App\Models\StatesNames;

use Illuminate\Support\Facades\DB;

class ConsultingServices implements IConsultingIncrementServices, IGetExistsServices, IStatusServices, IGetConsultingServices
{
  public static function get_consulting_increment($table, $field): string
  {
    $register = DB::table($table)->latest($field)->value($field) + 1;
    return $register;
  }

  public static function get_exists($table, $param): bool
  {
    $exists = DB::table($table)->where($param)->exists();
    return $exists;
  }

  public static function status()
  {
    $status = StatesNames::pluck('name', 'id');
    return $status;
  }

  public static function get_consulting($table, $params): object
  {
    $information = DB::table($table)->where($params)->pluck('name', 'id');
    return $information;
  }
}
