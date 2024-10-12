<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegistrationForm extends Form
{
  public string $register = '';
  public string $date = '';
  public string $name = '';
  public string $phone = '';
  public string $whatsapp = '';
  public string $email = '';
  public string $applicants = '';
  public string $applicant = '';
  public string $birthday = '';
  public int $genre = 0;

  public function rules()
  {
    return [
      'register' => 'required|numeric',
      'date' => 'required|date',
      'name' => 'required|string',
      'phone' => 'required|numeric',
      'email' => 'required|email',
      'applicants' => 'required|numeric|min:1|max:9',
      'applicant' => 'required|string',
      'birthday' => 'required|date',
      'genre' => 'required|numeric|exists:genres,id'
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
      'birthday' => ucfirst(__('validation.attributes.date_of_birth')),
      'applicant' => __('Name') . ' ' . __('Applicant'),
      'genre' => __('Genre')
    ];
  }
}
