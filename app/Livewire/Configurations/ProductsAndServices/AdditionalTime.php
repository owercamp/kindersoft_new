<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use Livewire\Component;
use App\Models\ExtraTime;
use App\Models\StatesNames;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdditionalTime extends Component
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
    $number_register = DB::table('extra_times')->latest('register')->value('register') + 1;
    $this->data['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function openModal($register)
  {
    $this->reset('data');
    $additional = ExtraTime::with('status')->find($register);
    $this->data['register'] = str_pad($additional->register, 4, "0", STR_PAD_LEFT);
    $this->data['description'] = $additional->description;
    $this->data['price'] = $additional->price;
    $this->data['status'] = $additional->status_id;
    $this->data['id'] = $additional->id;
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
    $additional = ExtraTime::find($this->data['id']);

    $additional->register = $this->data['register'];
    $additional->description = $this->data['description'];
    $additional->price = $this->data['price'];
    $additional->status_id = $this->data['status'];
    if ($additional->save()) {
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

  public function delete(ExtraTime $register)
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

    $register = new ExtraTime();
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
    $extratimes = ExtraTime::with('status')->orderBy('register')->paginate(15); 
    return view('livewire.configurations.products-and-services.additional-time', compact('extratimes'));
  }
}
