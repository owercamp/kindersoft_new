<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FormGrade extends Form
{
  public string $register = '';
  public string $grade = '';

  public function rules()
  {
    return [
      'register' => 'required',
      'grade' => 'required|string|max:35',
    ];
  }

  public function messages()
  {
    return [
      'grade.required' => __('The field is required'),
    ];
  }

  public function attributes()
  {
    return [
      'register' => __('Registration'),
      'grade' => __('Grade'),
    ];
  }
}
