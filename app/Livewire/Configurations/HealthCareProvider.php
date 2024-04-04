<?php

namespace App\Livewire\Configurations;

use App\Models\HealthCareProvider as ModelsHealthCareProvider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class HealthCareProvider extends Component
{

  use WithPagination;

  public $register;
  public $provider;
  public $modal = false;
  public $editArray = [
    'register' => '',
    'provider' => '',
    'id' => ''
  ];

  protected $listeners = ['success' => 'increment', 'cahnges_data' => 'render'];

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric',
      'provider' => 'required|string|max:30'
    ], [], [
      'register' => __('Registration'),
      'provider' => __('Health Care Provider')
    ]);

    $newRegister = new ModelsHealthCareProvider();
    $newRegister->register = trim($this->register);
    $newRegister->name = strtolower($this->provider);
    if ($newRegister->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Created Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => true
      ]);

      $this->dispatch('success');
      $this->dispatch('changes_data');
    }
  }

  public function increment()
  {
    $number_register = DB::table('health_care_providers')->latest('register')->value('register') + 1;
    $this->register = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function delete(ModelsHealthCareProvider $register)
  {
    if ($register->deleteOrFail()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Deleted Record'),
        'timer' => 1500,
        'showConfirmButton' => false
      ]);

      $this->dispatch('changes_data');
    }
  }

  public function edit()
  {
    $register = ModelsHealthCareProvider::find($this->editArray['id']);
    $register->register = $this->editArray['register'];
    $register->name = strtolower($this->editArray['provider']);
    if ($register->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Registration Successfully Updated'),
        'timer' => 1500,
        'showConfirmButton' => false
      ]);

      $this->dispatch('changes_data');
      $this->modal = false;
    }
  }

  public function openModal(ModelsHealthCareProvider $register)
  {
    $this->editArray['register'] = str_pad($register->register, 4, '0', STR_PAD_LEFT);
    $this->editArray['provider'] = trim($register->name);
    $this->editArray['id'] = trim($register->id);
    $this->modal = true;
  }

  public function render()
  {
    $providers = ModelsHealthCareProvider::orderby('register', 'asc')->paginate(10);
    return view('livewire.configurations.health-care-provider', compact('providers'));
  }
}
