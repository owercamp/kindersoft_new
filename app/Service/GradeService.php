<?php

namespace App\Service;

use App\Livewire\Forms\AcademicForm;
use App\Models\Grade;
use App\Models\StatesNames;

class GradeService
{
  public static function incrementRegister(): string
  {
    $register = ConsultingServices::get_consulting_increment('grades', 'register');
    return $register;
  }

  public static function store(AcademicForm $academicForm)
  {
    $grade = new Grade();
    $grade->register = $academicForm->register;
    $grade->name = $academicForm->description;
    if ($grade->save()) {
      return true;
    }

    return false;
  }

  public static function exists($name): bool
  {
    $exists = ConsultingServices::get_exists('grades', 'name', $name);
    return $exists;
  }

  public static function status()
  {
    $status = ConsultingServices::status();
    return $status;
  }

  public static function all()
  {
    $grades = Grade::with('status')->paginate();
    return $grades;
  }

  public static function information($id)
  {
    return Grade::find($id);
  }

  public static function edit(AcademicForm $academicForm, int $id, int $status)
  {
    $register = GradeService::information($id);

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
    $register = GradeService::information($id);
    if ($register) {
      if ($register->delete()) {
        return AlertService::deleted();
      }
    }
    return AlertService::error();
  }
}
