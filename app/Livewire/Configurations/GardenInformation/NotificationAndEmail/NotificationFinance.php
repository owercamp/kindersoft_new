<?php

namespace App\Livewire\Configurations\GardenInformation\NotificationAndEmail;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Service\FinanceService;
use App\Livewire\Forms\NotificationForm;

class NotificationFinance extends Component
{
  use WithPagination;
  use WithFileUploads;

  public NotificationForm $formAdmin;

  public bool $modal = false;
  public ?int $id = null;

  public function save()
  {
    $this->formAdmin->validate();
    $success = FinanceService::saveFinance($this->formAdmin);
    if ($success) {
      $this->dispatch('swal:modal', $success);
    }
  }

  public function openModal(int $id)
  {
    $this->formAdmin->reset();
    $this->dispatch('resetTinyMCE');
    $exists = FinanceService::getInformation($id);

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
    $edited = FinanceService::editFinance($this->formAdmin, $this->id);
    $this->modal =  false;
    $this->dispatch('swal:modal', $edited);
  }

  public function delete(int $id)
  {
    $destroy = FinanceService::destroyFinance($id);
    $this->dispatch('swal:modal', $destroy);
  }

  public function render()
  {
    $informations = FinanceService::getFinances();
    return view('livewire.configurations.garden-information.notification-and-email.notification-finance', compact('informations'));
  }
}
