<?php
namespace App\Service;

use App\Models\Scheduling;

class SchedulingService extends ConsultingServices{

  public static function all()
  {
    $registers = Scheduling::with('customer_client')->paginate(10);
    return $registers;
  }

}
