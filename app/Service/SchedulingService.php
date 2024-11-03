<?php

namespace App\Service;

use App\Livewire\Forms\scheduleForm;
use App\Models\Scheduling;
use App\Service\ConsultingServices;
use App\Service\Notified\SuccessNotification;
use Carbon\Carbon;
use InfoNotification;

class SchedulingService extends ConsultingServices
{

  public static function all()
  {
    $registers = Scheduling::with('customer_client')->paginate(10);
    return $registers;
  }

  public static function edit(scheduleForm $schedule, int $id)
  {
    $register = self::get_exists('schedulings', ['id' => $id]);
    if ($register) {
      $new_schedule = Scheduling::find($id);
      $new_schedule->date = $schedule->date;
      $new_schedule->time = Carbon::parse($schedule->time)->format('H:i');
      if ($new_schedule->save()) {
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    }
  }

  public static function show(int $id): object
  {
    $info = Scheduling::with('customer_client')->where('id', $id)->first();
    return $info;
  }

  public static function attended(int $id, string $status, string $obs): array
  {
    $register = self::show($id);

    if ($register) {
      $register->attended = strtolower($status);
      $register->observations = $obs;
      if ($register->save()) {
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    } else {
      return InfoNotification::get_notifications('info', __('Record Not Found'), 1500, 'completed');
    }
  }
}
