<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateCustomerForm extends Form
{
  public ?string $register = null;
  public ?string $date = null;
  public ?string $name = null;
  public ?string $phone = null;
  public ?string $whatsapp = null;
  public ?string $email = null;
  public ?string $applicants = null;
  public ?array $applicants_data = [
    'name' => [],
    'genre' => [],
    'birthday' => []
  ];

  public function rules()
  {
    return [
      'register' => 'required|numeric',
      'date' => 'required|date',
      'name' => 'required|string',
      'phone' => 'required|numeric',
      'email' => 'required|email',
      'applicants' => 'required|numeric|min:1|max:9',
      'applicants_data.name' => 'required',
      'applicants_data.birthday' => 'required',
      'applicants_data.genre' => 'required'
    ];
  }

  public function messages()
  {
    return [];
  }

  public function validationAttributes()
  {
    return [
      'register' => __('Registration'),
      'date' => ucfirst(__('validation.attributes.date')),
      'name' => __('Name'),
      'phone' => __('Phone'),
      'email' => __('Email address'),
      'applicants' => __('Number of applicants'),
      'applicants_data.birthday' => ucfirst(__('validation.attributes.date_of_birth')),
      'applicants_data.name' => __('Name') . ' ' . __('Applicant'),
      'applicants_data.genre.id' => __('Genre')
    ];
  }
}
