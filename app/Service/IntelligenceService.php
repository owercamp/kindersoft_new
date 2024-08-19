<?php

namespace App\Service;

use App\Livewire\Forms\AcademicForm;
use App\Models\Intelligence;
use App\Service\AlertService;
use App\Service\ConsultingServices;

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
    $register = IntelligenceService::information($id);

    if ($register) {
      $register->register = $academicForm->register;
      $register->name = $academicForm->description;
      $register->status_id = $status;
      if ($register->save()) {
        return AlertService::info();
      }
    }

    return AlertService::error();
  }

  public static function destroy(int $id)
  {
    $register = IntelligenceService::information($id);
    if ($register) {
      if ($register->delete()) {
        return AlertService::deleted();
      }
    }
    return AlertService::error();
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
