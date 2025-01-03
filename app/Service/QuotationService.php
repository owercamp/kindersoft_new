<?php

namespace App\Service;

use App\Livewire\Forms\QuoteForm;
use App\Models\Admissions;
use App\Models\Extracurricular;
use App\Models\ExtraTime;
use App\Models\Feeding;
use App\Models\Journays;
use App\Models\Quotation;
use App\Models\Quotationable;
use App\Models\Transport;
use App\Models\Uniform;
use App\Service\ConsultingServices;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use Illuminate\Support\Facades\DB;

class QuotationService extends ConsultingServices
{
  public static function create(QuoteForm $form, int $id, array $data)
  {
    $register = new Quotation();
    $register->register = $form->register;
    $register->date = $form->date;
    $register->scheduling_id = $id;
    if ($register->save()) {
      foreach ($data as $key => $value) {
        $activity = new Quotationable();
        $activity->quotation_id = $register->id;
        $activity->quotationable_id = $value['id'];
        $activity->quotationable_type = $value['table'];
        $activity->save();
      }
      return SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed');
    } else {
      return ErrorNotification::get_notifications('error', __('Error Creating Record'), 1500, 'error');
    }
  }

  public static function get_consulting_array($table, $params): array
  {
    $array_information = [];

    if ($table == 'admissions') {
      $model = Admissions::class;
    }

    if ($table == 'journays') {
      $model = Journays::class;
    }

    if ($table == 'feedings') {
      $model = Feeding::class;
    }

    if ($table == 'uniforms') {
      $model = Uniform::class;
    }

    if ($table == 'extra_times') {
      $model = ExtraTime::class;
    }

    if ($table == 'extracurriculars') {
      $model = Extracurricular::class;
    }

    if ($table == 'transports') {
      $model = Transport::class;
    }

    $information = DB::table($table)->where($params)->select('description', 'price', 'id')->get()->toArray();

    $array_information['description'] = $information[0]->description;
    $array_information['price'] = $information[0]->price;
    $array_information['id'] = $information[0]->id;
    $array_information['table'] = $model;
    return $array_information;
  }

  public static function show()
  {
    $registers = Quotation::with('scheduling', 'scheduling.customer_client')->paginate(10);
    return $registers;
  }
}
