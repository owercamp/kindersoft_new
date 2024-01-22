<?php

namespace App\Livewire\Configurations;

use App\Models\Regime;
use App\Models\TaxInformation as ModelsTaxInformation;
use Carbon\Carbon;
use Livewire\Component;

class TaxInformation extends Component
{
  public $taxInformation;
  public $taxSelected;
  public $form_number;
  public $prefix_number;
  public $next_invoice;
  public $from_number;
  public $up_to_number;
  public $effective_from;
  public $validity_until;
  public $note = [
    '1' => '',
    '2' => ''
  ];
  public $statement = '';

  public function mount()
  {
    $information = ModelsTaxInformation::first();
    // dd($information);

    $this->taxInformation = Regime::pluck('name', 'id')->toArray();

    if (isset($information)) {
      $this->taxSelected = $information->tax_liability_id;
      $this->form_number = $information->form_number;
      $this->prefix_number = $information->prefix_number;
      $this->next_invoice = $information->next_invoice;
      $this->from_number = $information->from_number;
      $this->up_to_number = $information->up_to_number;
      $this->effective_from = date_format($information->effective_from, 'd/m/Y');
      $this->validity_until = $information->validity_until;
      $this->note['1'] = $information->note_1;
      $this->note['2'] = $information->note_2;
      $this->statement = $information->statement;
    } else {
      $date_final = isset($this->validity_until) ? Carbon::parse($this->validity_until)->format('d-m-Y') : '';
      $date_initial = isset($this->effective_from) ? Carbon::parse($this->effective_from)->format('d-m-Y') : '';
      $this->statement = 'RESOLUCIÓN: Autorización de numeración de facturación No. A' . $this->form_number . ' de ' . $date_initial . ' Modalidad Factura Electrónica desde No. ' . strtoupper($this->prefix_number) . $this->from_number . ' hasta ' . strtoupper($this->prefix_number) . $this->up_to_number . ' con vigencia hasta ' . $date_final . '.';
    }
  }

  public function save()
  {
    $this->validate([
      'taxSelected' => 'required',
      'form_number' => 'required|max_digits:20|min_digits:20|numeric',
      'prefix_number' => 'required|max:3|alpha_num',
      'next_invoice' => 'required|max_digits:6|min_digits:6|numeric',
      'from_number' => 'required|max_digits:6|min_digits:6|numeric',
      'up_to_number' => 'required|max_digits:6|min_digits:6|numeric',
      'effective_from' => 'required|date',
      'validity_until' => 'required|date'
    ], [], [
      'taxSelected' => __('Tax Liability'),
      'form_number' => __('Form Number'),
      'prefix_number' => __('Numbering Prefix'),
      'next_invoice' => __('Next Invoice'),
      'from_number' => __('From Number'),
      'up_to_number' => __('Up to Number'),
      'effective_from' => __('Effective From'),
      'validity_until' => __('Validity Until')
    ]);

    $this->statement = 'RESOLUCIÓN: Autorización de numeración de facturación No. ' . $this->form_number . ' de ' . Carbon::parse($this->effective_from)->format('d-m-Y') . ' Modalidad Factura Electrónica desde No. ' . strtoupper($this->prefix_number) . $this->from_number . ' hasta ' . strtoupper($this->prefix_number) . $this->up_to_number . ' con vigencia hasta ' . Carbon::parse($this->validity_until)->format('d-m-Y') . '.';

    $exists = ModelsTaxInformation::first();
    $messages = '';

    if (isset($exists)) {
      $exists->tax_liability_id = $this->taxSelected;
      $exists->form_number = $this->form_number;
      $exists->prefix_number = strtoupper($this->prefix_number);
      $exists->next_invoice = $this->next_invoice;
      $exists->from_number = $this->from_number;
      $exists->up_to_number = $this->up_to_number;
      $exists->effective_from = $this->effective_from;
      $exists->validity_until = $this->validity_until;
      $exists->note_1 = $this->note['1'];
      $exists->note_2 = $this->note['2'];
      $exists->statement = $this->statement;
      $exists->save();
      $messages = __('Registration Successfully Updated');
    } else {
      $register = new ModelsTaxInformation();

      $register->tax_liability_id = $this->taxSelected;
      $register->form_number = $this->form_number;
      $register->prefix_number = strtoupper($this->prefix_number);
      $register->next_invoice = $this->next_invoice;
      $register->from_number = $this->from_number;
      $register->up_to_number = $this->up_to_number;
      $register->effective_from = $this->effective_from;
      $register->validity_until = $this->validity_until;
      $register->note_1 = $this->note['1'];
      $register->note_2 = $this->note['2'];
      $register->statement = $this->statement;
      $register->save();
      $messages = __('Successfully Created Record');
    }

    $this->dispatch('swal:modal', [
      'type' => 'success',
      'message' => $messages,
      'timer' => 3000,
      'showConfirmButton' => false
    ]);
  }
  public function render()
  {
    return view('livewire.configurations.tax-information');
  }
}
