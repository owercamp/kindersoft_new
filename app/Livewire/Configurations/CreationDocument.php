<?php

namespace App\Livewire\Configurations;

use App\Models\DocumentCreation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreationDocument extends Component
{
  public $register;
  public $documentName;

  protected $listeners = ['success' => 'increment'];

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
    $newRegister->register = $this->register;
    $newRegister->name = filter_var($this->documentName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($newRegister->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successful storage'),
        'timer' => 3000,
        'showConfirmButton' => false,
        'success' =>true
      ]);

      $this->dispatch('success');
    }
  }

  public function increment()
  {
    $last_number = DB::table('document_creations')->latest('register')->value('register') + 1;
    $this->register = str_pad($last_number, 4, "0", STR_PAD_LEFT);
  }

  public function render()
  {
    return view('livewire.configurations.creation-document');
  }
}
