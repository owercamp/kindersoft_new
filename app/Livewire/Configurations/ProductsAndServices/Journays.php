<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use Livewire\Component;
use App\Models\StatesNames;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Journays as ModelsJournays;

class Journays extends Component
{
  use WithPagination;
  protected $listeners = ['change_data' => 'render'];

  public $status;
  public $modal = false;
  public $data = [
    'register' => '',
    'description' => '',
    'price' => 0,
    'status' => 1,
    'id' => ''
  ];

  public function increment()
  {
    $number_register = DB::table('journays')->latest('register')->value('register') + 1;
    $this->data['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function openModal($register)
  {
    $this->reset('data');
    $journay = ModelsJournays::with('status')->find($register);
    $this->data['register'] = str_pad($journay->register, 4, "0", STR_PAD_LEFT);
    $this->data['description'] = $journay->description;
    $this->data['price'] = $journay->price;
    $this->data['status'] = $journay->status_id;
    $this->data['id'] = $journay->id;
    $this->modal = true;
  }

  public function edit()
  {
    $this->validate([
      'data.register' => 'required',
      'data.description' => 'required|string',
      'data.price' => 'required|numeric|min:1'
    ], [
      'data.price.min' => __('The Price cannot be less than or equal to 0.')
    ], [
      'data.register' => __('Registration'),
      'data.description' => __('Description'),
      'data.price' => __('Price')
    ]);
    $journay = ModelsJournays::find($this->data['id']);

    $journay->register = $this->data['register'];
    $journay->description = $this->data['description'];
    $journay->price = $this->data['price'];
    $journay->status_id = $this->data['status'];
    if ($journay->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Updated Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => 'completed'
      ]);
    }

    $this->modal = false;
  }

  public function delete(ModelsJournays $register)
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

  public function save()
  {
    $this->validate([
      'data.register' => 'required',
      'data.description' => 'required|string',
      'data.price' => 'required|numeric|min:1'
    ], [
      'data.price.min' => __('The Price cannot be less than or equal to 0.')
    ], [
      'data.register' => __('Registration'),
      'data.description' => __('Description'),
      'data.price' => __('Price')
    ]);

    $register = new ModelsJournays();
    $register->register = $this->data['register'];
    $register->description = $this->data['description'];
    $register->price = $this->data['price'];
    if ($register->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Created Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => 'completed'
      ]);
    }
  }
  public function mount()
  {
    $this->status = StatesNames::pluck('name', 'id');
  }
  public function render()
  {
    $journays = ModelsJournays::with('status')->orderBy('register')->paginate(15);
    return view('livewire.configurations.products-and-services.journays', compact('journays'));
  }
}
