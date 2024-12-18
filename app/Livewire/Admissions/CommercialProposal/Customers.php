<?php

namespace App\Livewire\Admissions\CommercialProposal;

use App\Livewire\Forms\RegistrationForm;
use App\Models\Genre;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use App\Service\PotentialCustomerService;
use App\Service\SchedulingService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
  use WithPagination;

  public ?bool $modal = false;
  public ?bool $modal_edit = false;
  public ?array $information = [];
  public ?int $id = null;
  public RegistrationForm $registerForm;
  public $genres = [];
  public ?string $age = "0";

  public function mount()
  {
    $genres = Genre::pluck('name', 'id');
    $this->genres = $genres;
  }

  public function openModal(int $id)
  {
    $info = SchedulingService::show($id);
    $this->information['name'] = $info->customer_client->name_attendant;
    $this->information['applicant'] = $info->customer_client->name_applicant;
    $this->information['age'] = $info->customer_client->birthdate[0];
    $this->information['birthdate'] = $info->customer_client->birthdate[1];
    $this->information['whatsapp'] = $info->customer_client->whatsapp;
    $this->information['phone'] = $info->customer_client->phone;
    $this->information['attended'] = __(ucfirst($info->attended));
    $this->information['email'] = $info->customer_client->email;
    $this->modal = true;
  }
  public function openEdit(int $id)
  {
    $this->reset(
      '$registerForm.register',
      '$registerForm.date',
      '$registerForm.name',
      '$registerForm.phone',
      '$new_register.whatsapp',
      '$registerForm.email',
      '$registerForm.applicants',
      '$registerForm.applicant',
      '$registerForm.genre',
      '$registerForm.birthday'
    );
    $this->id = $id;
    $register = PotentialCustomerService::information($id);
    $this->registerForm->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);
    $this->registerForm->date = Carbon::parse($register->date)->format('Y-m-d');
    $this->registerForm->name = $register->name_attendant;
    $this->registerForm->phone = $register->phone;
    $this->registerForm->whatsapp = $register->whatsapp;
    $this->registerForm->email = $register->email;
    $this->registerForm->applicants = $register->applicants;
    $this->registerForm->applicant = $register->name_applicant;
    $this->registerForm->genre = $register->genre_id;
    $this->registerForm->birthday = Carbon::parse($register->birthdate[1])->format('Y-m-d');

    $this->calculateAge();

    $this->modal_edit = true;
  }

  public function calculateAge()
  {
    $birthday = Carbon::parse($this->registerForm->birthday);
    $now = Carbon::now();

    $diffYears = $now->diffInYears($birthday);
    $diffMonths = $now->diffInMonths($birthday) % 12;
    $diffDays = $now->diffInDays($birthday) % 30;
    if ($diffYears == 0) {
      if ($diffMonths == 0) {
        $this->age = str_pad($diffDays, 2, '0', STR_PAD_LEFT) . ' dias';
      } else {
        $this->age = str_pad($diffMonths, 2, '0', STR_PAD_LEFT) . ' meses';
      }
    } else {
      $this->age = str_pad($diffYears, 2, '0', STR_PAD_LEFT) . ' años y ' . str_pad($diffMonths, 2, '0', STR_PAD_LEFT) . ' meses';
    }
  }

  public function edit()
  {
    $this->validate();
    $edited = PotentialCustomerService::edit($this->registerForm, $this->id);
    $this->dispatch('swal:modal', $edited);
    $this->modal_edit = false;
    $this->dispatch('saved');
  }

  public function openQuote(int $id) {}
  public function Delete(int $id)
  {
    $deleted = SchedulingService::delete($id);
    if ($deleted) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
  }

  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.commercial-proposal.customers', compact('registers'));
  }
}
