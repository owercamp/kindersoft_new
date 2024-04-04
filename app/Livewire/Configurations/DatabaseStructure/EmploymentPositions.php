<?php

namespace App\Livewire\Configurations\DatabaseStructure;

use App\Models\EmploymentPosition;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EmploymentPositions extends Component
{

  use WithPagination;

  public $register;
  public $document;
  public $modal = false;
  public $editArray = [
    'register' => '',
    'document' => '',
    'id' => ''
  ];

  protected $listeners = ['success' => 'increment', 'changes_data' => 'render'];

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric',
      'document' => 'required|string|max:30'
    ], [], [
      'register' => __('Registration'),
      'document' => __('Document Name')
    ]);

    $register = new EmploymentPosition();
    $register->register = $this->register;
    $register->name = $this->document;
    if ($register->save()) {
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
    $register = DB::table('employment_positions')->latest('register')->value('register') + 1;
    $this->register = str_pad($register, 4, '0', STR_PAD_LEFT);
  }

  public function delete(EmploymentPosition $register)
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

  public function openModal(EmploymentPosition $register)
  {
    $this->editArray['register'] = str_pad($register->register, 4, "0", STR_PAD_LEFT);
    $this->editArray['document'] = trim($register->name);
    $this->editArray['id'] = $register->id;
    $this->modal = true;
  }

  public function edit()
  {
    $this->validate([
      'editArray.register' => 'required',
      'editArray.document' => 'required|max:30|string'
    ], [], [
      'editArray.register' => __('Registration'),
      'editArray.document' => __('Document Name')
    ]);

    $update_register = EmploymentPosition::find($this->editArray['id']);
    $update_register->register = $this->editArray['register'];
    $update_register->name = $this->editArray['document'];
    if ($update_register->save()) {
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

  public function render()
  {
    $registers = DB::table('employment_positions')->orderBy('register')->paginate(10);
    return view('livewire.configurations.database-structure.employment-positions', compact('registers'));
  }
}
