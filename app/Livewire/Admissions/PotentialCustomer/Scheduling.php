<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Service\SchedulingService;
use Livewire\Component;
use Livewire\WithPagination;

class Scheduling extends Component
{
  use WithPagination;
  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.potential-customer.scheduling', compact('registers'));
  }
}
