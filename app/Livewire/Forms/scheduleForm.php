<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class scheduleForm extends Form
{
  public ?string $date = null;
  public ?string $time = null;

  public function rules()
  {
    return [
      'date' => 'required|date',
      'time' => 'required',
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
