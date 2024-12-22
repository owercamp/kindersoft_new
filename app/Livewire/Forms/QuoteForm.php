<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class QuoteForm extends Form
{
  public ?string $register = null;
  public ?string $date = null;
  public ?string $attendant_name = null;
  public ?string $whatsapp = null;
  public ?string $email = null;
  public ?string $applicant_name = null;
  public ?string $genre = null;
  public ?array $birthday = null;
  public ?int $admissions = null;
  public ?int $journal = null;
  public ?int $food = null;
  public ?int $uniform = null;
  public ?int $add_time = null;
  public ?int $extracurricular = null;
  public ?int $transport = null;

  public function rules()
  {
    return [
      'register' => 'required',
      'date' => 'required|date',
      'attendant_name' => 'required|string',
      'whatsapp' => 'required|numeric',
      'email' => 'required|email',
      'applicant_name' => 'required|string',
      'genre' => 'required|numeric|exists:genres,name',
      'birthday' => 'required|array',
      'admissions' => 'required|numeric|exists:admissions,id',
      'journal' => 'required|numeric|exists:journays,id',
      'food' => 'required|numeric|exists:feedings,id',
      'uniform' => 'required|numeric|exists:uniforms,id',
      'add_time' => 'required|numeric|exists:extra_times,id',
      'extracurricular' => 'required|numeric|exists:extracurriculars,id',
      'transport' => 'required|numeric|exists:transports,id'
    ];
  }

  public function messages()
  {
    return [];
  }

  public function validationAttributes()
  {
    return [
      'register' => ucfirst(__('Registration')),
      'date' => ucfirst(__('validation.attributes.date')),
      'attendant_name' => ucfirst(substr(__('Attendees'), 0, -1)),
      'whatsapp' => "WhatsApp",
      'email' => __('Email address'),
      'applicant_name' => __('Applicant'),
      'genre' => __('Genre'),
      'birthday' => __('validation.attributes.date_of_birth'),
      'admissions' => __('Admissions'),
      'journal' => __('Journays'),
      'food' => __('Feeding'),
      'uniform' => __('Uniforms'),
      'add_time' => __('Additional Time'),
      'extracurricular' => __('Extracurricular'),
      'transport' => __('Transportation')
    ];
  }
}
