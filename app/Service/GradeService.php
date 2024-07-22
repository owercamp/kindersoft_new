<?php

namespace App\Service;

use App\Models\Grade;
use App\Models\StatesNames;
use App\Livewire\Forms\FormGrade;
use Illuminate\Support\Facades\DB;

class GradeService
{
  public static function incrementRegister(): string
  {
    $register = DB::table('grades')->latest('register')->value('register') + 1;
    return $register;
  }

  public static function store(FormGrade $formGrade)
  {
    $grade = new Grade();
    $grade->register = $formGrade->register;
    $grade->name = $formGrade->grade;
    if ($grade->save()) {
      return true;
    }

    return false;
  }

  public static function exists($name): bool
  {
    $exists = DB::table('grades')->where('name', $name)->exists();
    return $exists;
  }

  public static function status()
  {
    $status = StatesNames::pluck('name', 'id');
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

  public static function edit(FormGrade $formGrade, int $id, int $status)
  {
    $register = GradeService::information($id);

    if ($register) {
      $register->register = $formGrade->register;
      $register->name = $formGrade->grade;
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
