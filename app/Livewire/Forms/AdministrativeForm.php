<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AdministrativeForm extends Form
{
  public string $email = '';
  public string $content = '';
  public $firm;

  public function rules()
  {
    return [
      'email' => 'required|string|max:60|email',
      'content' => 'required|string|max:1100',
      'firm' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ];
  }

  public function messages()
  {
    return [];
  }

  public function validationAttributes()
  {
    return [
      'email' => __('Email address'),
      'content' => __('validation.attributes.content'),
      'firm' => __('Firm')
    ];
  }
}
