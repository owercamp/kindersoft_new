<?php

namespace App\Livewire\Admissions\CommercialProposal;

use App\Service\SchedulingService;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
  use WithPagination;

  public function openModal(int $id) {}
  public function openEdit(int $id) {}
  public function openQuote(int $id) {}
  public function openDelete(int $id) {}

  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.commercial-proposal.customers', compact('registers'));
  }
}
