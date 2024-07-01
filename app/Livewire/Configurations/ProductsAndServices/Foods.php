<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use App\Models\Feeding;
use Livewire\Component;
use App\Models\StatesNames;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Foods extends Component
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
    $number_register = DB::table('feedings')->latest('register')->value('register') + 1;
    $this->data['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function openModal($register)
  {
    $this->reset('data');
    $feeding = Feeding::with('status')->find($register);
    $this->data['register'] = str_pad($feeding->register, 4, "0", STR_PAD_LEFT);
    $this->data['description'] = $feeding->description;
    $this->data['price'] = $feeding->price;
    $this->data['status'] = $feeding->status_id;
    $this->data['id'] = $feeding->id;
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
    $feeding = Feeding::find($this->data['id']);

    $feeding->register = $this->data['register'];
    $feeding->description = $this->data['description'];
    $feeding->price = $this->data['price'];
    $feeding->status_id = $this->data['status'];
    if ($feeding->save()) {
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

  public function delete(Feeding $register)
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

    $register = new Feeding();
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
    $feedings = Feeding::with('status')->orderBy('register')->paginate(15);
    return view('livewire.configurations.products-and-services.foods', compact('feedings'));
  }
}
