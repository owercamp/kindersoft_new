<?php

namespace App\Service;

use App\Livewire\Forms\AcademicForm;
use App\Models\Intelligence;
use App\Service\ConsultingServices;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;

class IntelligenceService
{

  public static function incrementRegister()
  {
    $register = ConsultingServices::get_consulting_increment('intelligences', 'register');
    return $register;
  }

  public static function exists($name): bool
  {
    $exists = ConsultingServices::get_exists('intelligences', ['name' => $name]);
    return $exists;
  }

  public static function store(AcademicForm $academicForm)
  {
    $course = new Intelligence();
    $course->register = $academicForm->register;
    $course->name = $academicForm->description;
    if ($course->save()) {
      return true;
    }

    return false;
  }

  public static function information($id)
  {
    return Intelligence::find($id);
  }

  public static function edit(AcademicForm $academicForm, int $id, int $status)
  {
    $register = self::information($id);

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
    $register = self::information($id);
    if ($register) {
      if ($register->delete()) {
        return SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed');
      }
    }
    return ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed');
  }

  public static function status()
  {
    $status = ConsultingServices::status();
    return $status;
  }

  public static function all()
  {
    $courses = Intelligence::with('status')->paginate(10);
    return $courses;
  }
}
