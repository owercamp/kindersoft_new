<?php

namespace App\Livewire\Admissions\PotentialCustomer;

use App\Livewire\Forms\scheduleForm;
use App\Service\SchedulingService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Scheduling extends Component
{
  use WithPagination;

  public bool $modal = false;
  public bool $edition = false;
  public scheduleForm $scheduleForm;
  public object $info;

  public function openModal(int $id)
  {
    $data = SchedulingService::show($id);
    $this->info = $data;
    $this->modal = true;
  }

  public function openEdit(int $id)
  {
    $data = SchedulingService::show($id);
    $this->scheduleForm->date = Carbon::parse($data->date)->format('Y-m-d');
    $this->scheduleForm->time = $data->time;
    $this->edition = true;
  }

  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.potential-customer.scheduling', compact('registers'));
  }
}
