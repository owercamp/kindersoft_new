<?php

namespace App\Livewire\Configurations;

use App\Models\DocumentCreation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CreationDocument extends Component
{

  use WithPagination;

  public $register;
  public $documentName;
  public $modal = false;
  public $editArray = [
    'register' => '',
    'documentName' => '',
    'id' => ''
  ];

  protected $listeners = ['success' => 'increment','changes_data' => 'render'];

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric|digits:4',
      'documentName' => 'required|string|max:30'
    ], [], [
      'register' => __('Registration'),
      'documentName' => __('Document Name')
    ]);

    $newRegister = new DocumentCreation();
    $newRegister->register = trim($this->register);
    $newRegister->name = ucfirst($this->documentName);
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
    $last_number = DB::table('document_creations')->latest('register')->value('register') + 1;
    $this->register = str_pad($last_number, 4, "0", STR_PAD_LEFT);
  }

  public function delete(DocumentCreation $register)
  {
    if($register->deleteOrFail()){
      $this->dispatch('swal:modal',[
        'type' => 'success',
        'message' => __('Successfully Deleted Record'),
        'timer' => 1500,
        'showConfirmButton' => false
      ]);

      $this->dispatch('changes_data');
    }
  }

  public function openModal(DocumentCreation $register)
  {
    $this->editArray['register'] = str_pad($register->register, 4, "0", STR_PAD_LEFT);
    $this->editArray['documentName'] = trim($register->name);
    $this->editArray['id'] = $register->id;
    $this->modal = true;
  }

  public function edit()
  {
    $this->validate([
      'editArray.register' => 'required',
      'editArray.documentName' => 'required|max:30|string'
    ],[],[
      'editArray.register' => __('Registration'),
      'editArray.documentName' => __('Document Name')
    ]);

    $update_register = DocumentCreation::find($this->editArray['id']);
    $update_register->register = trim($this->editArray['register']);
    $update_register->name = ucfirst($this->editArray['documentName']);
    if ($update_register->save()) {
      $this->dispatch('swal:modal',[
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
    $registers = DocumentCreation::orderby('register', 'asc')->paginate(10);
    return view('livewire.configurations.creation-document', compact('registers'));
  }
}
