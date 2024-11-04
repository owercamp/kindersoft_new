<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Service\SchedulingService;
use Livewire\Attributes\Url;
use Livewire\Component;

class Archive extends Component
{
  public bool $modal = false;
  public object $info;
  #[Url(as: 's')]
  public string $search = '';

  public function openModal(int $id): void
  {
    $register = SchedulingService::show($id);
    $this->info = $register;
    $this->modal = true;
  }

  public function render()
  {
    $registers = SchedulingService::all_ordered($this->search);
    return view('livewire.admissions.potential-customer.archive', compact('registers'));
  }
}
