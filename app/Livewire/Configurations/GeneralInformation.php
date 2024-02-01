<?php

namespace App\Livewire\Configurations;

use App\Models\Country;
use Livewire\Component;

class GeneralInformation extends Component
{

  public $company;
  public $commercial;
  public $nit;
  public $dv;
  public $email;
  public $website;
  public $count;
  public $countrys = [];

  public function mount()
  {
    $this->company = "";
    $this->commercial = "";
    $this->nit = "";
    $this->dv = "";
    $this->email = "";
    $this->website = "";
    $this->count = 0;
    $this->countrys = Country::pluck('name', 'id')->sort()->toArray();
  }

  public function save()
  {
    dd($this->company, $this->commercial, $this->nit, $this->dv, $this->email, $this->website);
  }

  public function render()
  {
    return view('livewire.configurations.general-information');
  }
}
