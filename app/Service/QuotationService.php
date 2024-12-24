<?php

namespace App\Service;

use App\Livewire\Forms\QuoteForm;
use App\Models\Quotation;
use App\Service\ConsultingServices;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;

class QuotationService extends ConsultingServices
{
  public static function create(QuoteForm $form, int $id)
  {
    $register = new Quotation();
    $register->register = $form->register;
    $register->date = $form->date;
    $register->scheduling_id = $id;

    if ($form->admissions) {
      $register->admission_id = $form->admissions;
    }

    if ($form->journal) {
      $register->journal_id = $form->journal;
    }

    if ($form->food) {
      $register->feeding_id = $form->food;
    }

    if ($form->uniform) {
      $register->uniform_id = $form->uniform;
    }

    if ($form->add_time) {
      $register->extra_time_id = $form->add_time;
    }

    if ($form->extracurricular) {
      $register->extra_curricular_id = $form->extracurricular;
    }

    if ($form->transport) {
      $register->transport_id = $form->transport;
    }

    if ($register->save()) {
      return SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed');
    } else {
      return ErrorNotification::get_notifications('error', __('Error Creating Record'), 1500, 'error');
    }
  }

  public static function show()
  {
    $registers = Quotation::with('scheduling','scheduling.customer_client', 'admission', 'journal', 'feeding', 'uniform', 'extra_time', 'extra_curricular', 'transport')->paginate(10);
    return $registers;
  }
}
