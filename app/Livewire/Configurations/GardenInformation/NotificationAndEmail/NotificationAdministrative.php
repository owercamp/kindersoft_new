<?php

namespace App\Livewire\Configurations\GardenInformation\NotificationAndEmail;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use App\Livewire\Forms\AdministrativeForm;

class NotificationAdministrative extends Component
{
  use WithPagination;
  use WithFileUploads;

  public AdministrativeForm $formAdmin;

  public function save()
  {
    $this->formAdmin->validate();
    dd($this->formAdmin->email, $this->formAdmin->content, $this->formAdmin->firm);
  }

  public function render(): View
  {
    return view('livewire.configurations.garden-information.notification-and-email.notification-administrative');
  }
}
