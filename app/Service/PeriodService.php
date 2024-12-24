<?php

namespace App\Service;

use App\Livewire\Forms\AcademicForm;
use App\Models\Period;
use App\Service\AlertService;
use App\Service\ConsultingServices;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use InfoNotification;

class PeriodService
{
  public static function incrementRegister(): string
  {
    $register = ConsultingServices::get_consulting_increment('periods', 'register');
    return $register;
  }

  public static function exists($name): bool
  {
    $exists = ConsultingServices::get_exists('periods', ['name' => $name]);
    return $exists;
  }

  public static function store(AcademicForm $academicForm)
  {
    $period = new Period();
    $period->register = $academicForm->register;
    $period->name = $academicForm->description;
    if ($period->save()) {
      return true;
    }

    return false;
  }

  public static function status()
  {
    $status = ConsultingServices::status();
    return $status;
  }

  public static function all()
  {
    $periods = Period::with('status')->paginate(10);
    return $periods;
  }

  public static function information($id)
  {
    return Period::find($id);
  }

  public static function edit(AcademicForm $academicForm, int $id, int $status)
  {
    $register = PeriodService::information($id);

    if ($register) {
      $register->register = $academicForm->register;
      $register->name = $academicForm->description;
      $register->status_id = $status;
      if ($register->save()) {
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    }

    return ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed');
  }

  public static function destroy(int $id)
  {
    $register = PeriodService::information($id);
    if ($register) {
      if ($register->delete()) {
        return InfoNotification::get_notifications('info', __('Successfully Deleted Record'), 1500, 'completed');
      }
    }
    return ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed');
  }
}
