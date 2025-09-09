<?php

namespace App\Livewire\Configurations\GardenInformation\NotificationAndEmail;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Livewire\Forms\NotificationForm;
use App\Service\AcademicService;

class NotificationAcademic extends Component
{
  use WithPagination;
  use WithFileUploads;

  public NotificationForm $formAdmin;

  public bool $modal = false;
  public ?int $id = null;

  public function save()
  {
    $this->formAdmin->validate();
    $success = AcademicService::saveAcademic($this->formAdmin);
    if ($success) {
      $this->dispatch('swal:modal', $success);
    }
  }

  public function openModal(int $id)
  {
    $this->formAdmin->reset();
    $this->dispatch('resetTinyMCE');
    $exists = AcademicService::getInformation($id);

    if ($exists) {
      $this->formAdmin->email = $exists->email;
      $this->formAdmin->content = $exists->content;
      $this->formAdmin->firm = $exists->firm;
      $this->id = $exists->id;
      $this->dispatch('updateTinyMCE', content: $exists->content);
    }
    $this->modal = true;
  }

  public function edit()
  {
    $edited = AcademicService::editAcademic($this->formAdmin, $this->id);
    $this->modal =  false;
    $this->dispatch('swal:modal', $edited);
  }

  public function delete(int $id)
  {
    $destroy = AcademicService::destroyAcademic($id);
    $this->dispatch('swal:modal', $destroy);
  }

  public function render()
  {
    $informations = AcademicService::getAcademic();

    return view('livewire.configurations.garden-information.notification-and-email.notification-academic', compact('informations'));
  }
}
