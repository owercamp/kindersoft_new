<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AcademicForm extends Form
{
  public string $register = '';
  public string $description = '';

  public function rules()
  {
    return [
      'register' => 'required',
      'description' => 'required|string|max:35',
    ];
  }

  public function messages()
  {
    return [
      'description.required' => __('The field is required'),
    ];
  }

  public function validationAttributes()
  {
    return [
      'register' => __('Registration'),
      'description' => __('Description'),
    ];
  }
}
