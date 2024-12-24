<?php

namespace App\Livewire\Admissions\CommercialProposal;

use App\Service\QuotationService;
use Livewire\Component;

class Quotation extends Component
{
  public function PDF(int $id) {}

  public function mail(int $id) {}

  public function whatsApp(int $id) {}

  public function render()
  {
    $registers = QuotationService::show();
    return view('livewire.admissions.commercial-proposal.quotation', compact('registers'));
  }
}
