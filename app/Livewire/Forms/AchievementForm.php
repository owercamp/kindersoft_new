<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AchievementForm extends Form
{
  public int $intelligence = 0;
  public string $register = '';
  public string $description = '';

  public function rules()
  {
    return [
      'intelligence' => 'required|exists:intelligences,id',
      'register' => 'required',
      'description' => 'required|string|max:35',
    ];
  }

  public function messages()
  {
    return [];
  }

  public function validationAttributes()
  {
    return [
      'intelligence' => __('Intelligence'),
      'register' => __('Registration'),
      'description' => __('Description'),
    ];
  }
}
