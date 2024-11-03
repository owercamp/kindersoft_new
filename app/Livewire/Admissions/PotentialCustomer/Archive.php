<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Service\SchedulingService;
use Livewire\Component;

class Archive extends Component
{
  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.potential-customer.archive', compact('registers'));
  }
}
