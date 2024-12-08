<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Service\StadisticService;
use Carbon\Carbon;
use Livewire\Component;

class Statistics extends Component
{
  public $chartData;
  public $categories;

  public function mount()
  {
    $year = Carbon::now()->year;
    $min_age = $year - 5;

    $information = StadisticService::data_year($year, $min_age);

    $series = [];

    foreach ($information as $info) {
      $series[] = $info['attended'];
      $series[] = $info['not_attended'];
    }

    $this->chartData = [
      'series' => $series,
    ];

    $this->categories = [
      'categories' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    ];

  }
  public function render()
  {
    return view('livewire.admissions.potential-customer.statistics');
  }
}
