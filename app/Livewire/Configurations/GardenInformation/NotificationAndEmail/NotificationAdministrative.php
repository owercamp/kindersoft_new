<?php

namespace App\Livewire\Configurations\GardenInformation\NotificationAndEmail;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class NotificationAdministrative extends Component
{
  use WithPagination;
  use WithFileUploads;

  public string $title;
  public string $content = '';

  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $firm;


  public function save()
  {
    dd($this->title, $this->content, $this->firm);
  }

  public function render(): View
  {
    return view('livewire.configurations.garden-information.notification-and-email.notification-administrative');
  }
}
