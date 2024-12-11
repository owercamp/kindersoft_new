<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Exports\PotentialCustomerExcel;
use App\Livewire\Forms\RegistrationForm;
use App\Livewire\Forms\scheduleForm;
use App\Models\Genre;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use App\Service\PotentialCustomerService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Registration extends Component
{
  use WithPagination;
  public RegistrationForm $registerForm;
  public scheduleForm $scheduleForm;
  public $genres = [];
  public string $age = "0";
  public $searching;
  public int $id;
  public bool $modal = false;
  public bool $schedule = false;

  public function increment()
  {
    $register = PotentialCustomerService::get_consulting_increment('potential_customers', 'register');
    $this->registerForm->register = str_pad($register, 4, '0', STR_PAD_LEFT);
  }

  public function mount()
  {
    $genres = Genre::pluck('name', 'id');
    $this->genres = $genres;
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

  public function openModal($id)
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
    $this->registerForm->birthday = Carbon::parse($register->birthdate)->format('Y-m-d');
    $this->calculateAge();

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = PotentialCustomerService::edit($this->registerForm, $this->id);
    $this->dispatch('swal:modal', $edited);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function delete($id)
  {
    $deleted = PotentialCustomerService::delete($id);
    if ($deleted) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
  }

  public function save()
  {
    $this->registerForm->validate();

    $exists = PotentialCustomerService::get_exists('potential_customers', [
      ['name_attendant', $this->registerForm->register],
      ['name_applicant', $this->registerForm->applicant],
    ]);

    if (!$exists) {
      $saved = PotentialCustomerService::store($this->registerForm);
      if ($saved) {
        $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed'));
      } else {
        $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
      }
    }
  }

  public function export(int $id)
  {
    return Excel::download(new PotentialCustomerExcel($id), 'Cliente Potencial.xlsx');
  }

  public function schedule_model(int $id)
  {
    $this->id = $id;
    $this->schedule = true;
  }

  public function agent_schedule()
  {
    $this->scheduleForm->validate();
    $id = $this->id;
    $schedule = PotentialCustomerService::asigned($this->scheduleForm, $id);
    if ($schedule) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Scheduled Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
    $this->schedule = false;
    $this->scheduleForm->reset();
    $this->dispatch('cleanForm', ['clean' => true]);
  }

  public function render()
  {
    $registers = PotentialCustomerService::all();
    return view('livewire.admissions.potential-customer.registration', compact('registers'));
  }
}
