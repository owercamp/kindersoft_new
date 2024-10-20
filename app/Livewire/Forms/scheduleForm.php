<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class scheduleForm extends Form
{
  public string $date;
  public string $time;

  public function rules()
  {
    return [
      'date' => 'required|date',
      'time' => 'required|date_format:H:i',
    ];
  }

  public function messages()
  {
    return [];
  }

  public function validationAttributes()
  {
    return [
      'date' => ucfirst(__('validation.attributes.date')),
      'time' => ucfirst(__('validation.attributes.hour')),
    ];
  }
}
