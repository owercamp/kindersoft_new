<?php

namespace App\Livewire\Configurations;

use Livewire\Component;

class GeneralInformation extends Component
{

  public $numberContainers = 0;
  public $nombre = "ower";
  public function render()
  {
    return view('livewire.configurations.general-information');
  }

  public function save(){
    dd($this->numberContainers);
  }
}
