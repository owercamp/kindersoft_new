<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Service\SchedulingService;
use Livewire\Component;
use Livewire\WithPagination;

class Scheduling extends Component
{
  use WithPagination;

  public bool $modal = false;
  public object $info;

  public function openModal(int $id)
  {
    $data = SchedulingService::show($id);
    $this->info = $data;
    $this->modal = true;
  }
  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.potential-customer.scheduling', compact('registers'));
  }
}
