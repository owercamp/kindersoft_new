<?php

namespace App\Service;

use App\Livewire\Forms\RegistrationForm;
use App\Livewire\Forms\scheduleForm;
use App\Models\PotentialCustomer;
use App\Models\Scheduling;
use App\Service\Notified\SuccessNotification;
use Illuminate\Support\Facades\DB;

class PotentialCustomerService extends ConsultingServices
{

  public static function delete(int $id): bool
  {
    $exists = ConsultingServices::get_exists('potential_customers', [
      ['id', $id]
    ]);
    if ($exists) {
      $deleted = PotentialCustomer::where('id', $id)->delete();
      if ($deleted) {
        return true;
      } else {
        return false;
      }
    }
  }

  public static function edit(RegistrationForm $registerForm, int $id)
  {
    $exists = PotentialCustomerService::information($id);
    if ($exists) {
      $exists->register = $registerForm->register;
      $exists->date = $registerForm->register;
      $exists->name_attendant = $registerForm->name;
      $exists->phone = $registerForm->phone;
      $exists->whatsapp = ($registerForm->whatsapp != '') ? $registerForm->whatsapp : $registerForm->phone;
      $exists->email = $registerForm->email;
      $exists->applicants = $registerForm->applicants;
      $exists->name_applicant = $registerForm->applicant;
      $exists->genre_id = $registerForm->genre;
      $exists->birthdate = $registerForm->birthday;
      if ($exists->save()) {
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    }
  }

  public static function store(RegistrationForm $registerForm)
  {
    $new_register = new PotentialCustomer();
    $new_register->register = $registerForm->register;
    $new_register->date = $registerForm->date;
    $new_register->name_attendant = $registerForm->name;
    $new_register->phone = $registerForm->phone;
    $new_register->whatsapp = ($registerForm->whatsapp != '') ? $registerForm->whatsapp : $registerForm->phone;
    $new_register->email = $registerForm->email;
    $new_register->applicants = $registerForm->applicants;
    $new_register->name_applicant = $registerForm->applicant;
    $new_register->genre_id = $registerForm->genre;
    $new_register->birthdate = $registerForm->birthday;
    if ($new_register->save()) {
      return true;
    } else {
      return false;
    }
  }

  public static function information(int $id)
  {
    return PotentialCustomer::with('genre')->find($id);
  }

  public static function asigned(scheduleForm $schedule, int $id)
  {
    $new_schedule = new Scheduling();
    $new_schedule->date = $schedule->date;
    $new_schedule->time = $schedule->time;
    $new_schedule->potential_customer_id = $id;
    $new_schedule->save();
    if ($new_schedule) {
      return true;
    }else{
      return false;
    }
  }

  public static function all()
  {
    return PotentialCustomer::with('genre','asigned')->paginate(10);
  }
}
