<?php

namespace App\Livewire\Informations;

use App\Models\Regime as ModelsRegime;
use Livewire\Component;

class Regime extends Component
{
  public $regimes;

  public function mount()
  {
    $this->regimes = ModelsRegime::select('name','description')->get();
  }

  public function render()
  {
    return view('livewire.informations.regime');
  }
}
