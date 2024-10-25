<?php

namespace App\Service;

use App\Models\Scheduling;

class SchedulingService
{

  public static function all()
  {
    $registers = Scheduling::with('customer_client')->paginate(10);
    return $registers;
  }

  public static function show(int $id): object
  {
    $info = Scheduling::with('customer_client')->where('id', $id)->first();
    return $info;
  }
}
