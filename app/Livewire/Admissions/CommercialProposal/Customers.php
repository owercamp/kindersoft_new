<?php

namespace App\Livewire\Admissions\CommercialProposal;

use App\Livewire\Forms\QuoteForm;
use App\Livewire\Forms\RegistrationForm;
use App\Models\Admissions;
use App\Models\Extracurricular;
use App\Models\ExtraTime;
use App\Models\Feeding;
use App\Models\Genre;
use App\Models\Journays;
use App\Models\Transport;
use App\Models\Uniform;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use App\Service\PotentialCustomerService;
use App\Service\QuotationService;
use App\Service\SchedulingService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
  use WithPagination;

  public ?bool $modal = false;
  public ?bool $modal_edit = false;
  public ?bool $modal_quote = false;
  public ?array $information = [];
  public ?int $id = null;
  public RegistrationForm $registerForm;
  public QuoteForm $quoteForm;
  public $admissions = [];
  public $journals = [];
  public $feedings = [];
  public $uniforms = [];
  public $extra_times = [];
  public $extracurriculars = [];
  public $transports = [];
  public $genres = [];
  public ?array $birthday = [];
  public ?string $age = "0";

  public function mount()
  {
    $this->genres = Genre::pluck('name', 'id');
    $this->admissions = Admissions::pluck('description', 'id');
    $this->journals = Journays::pluck('description', 'id');
    $this->feedings = Feeding::pluck('description', 'id');
    $this->uniforms = Uniform::pluck('description', 'id');
    $this->extra_times = ExtraTime::pluck('description', 'id');
    $this->extracurriculars = Extracurricular::pluck('description', 'id');
    $this->transports = Transport::pluck('description', 'id');
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
    $this->registerForm->validate();
    $edited = PotentialCustomerService::edit($this->registerForm, $this->id);
    $this->dispatch('swal:modal', $edited);
    $this->modal_edit = false;
    $this->dispatch('saved');
  }

  public function openQuote(int $id)
  {
    $this->reset(
      '$quoteForm.register',
      '$quoteForm.date',
      '$quoteForm.attendant_name',
      '$quoteForm.whatsapp',
      '$quoteForm.email',
      '$quoteForm.applicant_name',
      '$quoteForm.genre',
      '$quoteForm.birthday',
      '$quoteForm.admissions',
      '$quoteForm.journal',
      '$quoteForm.food',
      '$quoteForm.uniform',
      '$quoteForm.add_time',
      '$quoteForm.extracurricular',
      '$quoteForm.transport',
    );

    $info = SchedulingService::show($id);
    $this->id = $id;
    $this->quoteForm->register = str_pad(QuotationService::get_consulting_increment('quotations', 'register'), 4, '0', STR_PAD_LEFT);
    $this->quoteForm->date = Carbon::now()->format('Y-m-d');
    $this->quoteForm->attendant_name = $info->customer_client->name_attendant;
    $this->quoteForm->whatsapp = $info->customer_client->whatsapp;
    $this->quoteForm->email = $info->customer_client->email;
    $this->quoteForm->applicant_name = $info->customer_client->name_applicant;
    $this->quoteForm->genre = $info->customer_client->genre->name;
    $this->quoteForm->birthday = $info->customer_client->birthdate;
    $this->modal_quote = true;
  }
  public function Delete(int $id)
  {
    $deleted = SchedulingService::delete($id);
    if ($deleted) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
  }

  public function quotation()
  {
    $this->quoteForm->validateOnly('admissions');
    $this->quoteForm->validateOnly('journal');
    $this->quoteForm->validateOnly('food');
    $this->quoteForm->validateOnly('uniform');
    $this->quoteForm->validateOnly('add_time');
    $this->quoteForm->validateOnly('extracurricular');
    $this->quoteForm->validateOnly('transport');
    $response = QuotationService::create($this->quoteForm, $this->id);

    if ($response) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
    $this->modal_quote = false;
  }

  public function render()
  {
    $registers = SchedulingService::filter_scheduling();
    return view('livewire.admissions.commercial-proposal.customers', compact('registers'));
  }
}
