<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use App\Models\Uniform;
use Livewire\Component;
use App\Models\StatesNames;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Uniforms extends Component
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
    $number_register = DB::table('uniforms')->latest('register')->value('register') + 1;
    $this->data['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function openModal($register)
  {
    $this->reset('data');
    $uniform = Uniform::with('status')->find($register);
    $this->data['register'] = str_pad($uniform->register, 4, "0", STR_PAD_LEFT);
    $this->data['description'] = $uniform->description;
    $this->data['price'] = $uniform->price;
    $this->data['status'] = $uniform->status_id;
    $this->data['id'] = $uniform->id;
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
    $uniform = Uniform::find($this->data['id']);

    $uniform->register = $this->data['register'];
    $uniform->description = $this->data['description'];
    $uniform->price = $this->data['price'];
    $uniform->status_id = $this->data['status'];
    if ($uniform->save()) {
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

  public function delete(Uniform $register)
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

    $register = new Uniform();
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
    $uniforms = Uniform::with('status')->orderBy('id', 'desc')->paginate(15);
    return view('livewire.configurations.products-and-services.uniforms', compact('uniforms'));
  }
}
