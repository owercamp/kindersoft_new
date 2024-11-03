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
  public bool $comment = false;
  public string $attended = "";
  public string $name_status = "";
  public string $obs = "";
  public scheduleForm $scheduleForm;
  public int $id;
  public object $info;
  protected $listeners = ['saved' => 'render'];

  public function openModal(int $id)
  {
    $data = SchedulingService::show($id);
    $this->info = $data;
    $this->modal = true;
  }

  public function openEdit(int $id)
  {
    $data = SchedulingService::show($id);
    $this->id = $id;
    $this->scheduleForm->date = Carbon::parse($data->date)->format('Y-m-d');
    $this->scheduleForm->time = $data->time;
    $this->edition = true;
  }

  public function openComments(int $id, string $name)
  {
    $this->attended = __($name);
    $this->id = $id;
    $this->name_status = $name;
    $this->comment = true;
  }

  public function commentary()
  {
    $this->validate(['obs' => 'required|max:500'], [], ['obs' => __('Observations')]);
    $assistent = SchedulingService::attended($this->id, $this->name_status, $this->obs);
    $this->dispatch('swal:modal', $assistent);
    $this->comment = false;
    $this->dispatch('saved');
  }


  public function edit()
  {
    $this->scheduleForm->validate();
    $edited = SchedulingService::edit($this->scheduleForm, $this->id);
    $this->dispatch('swal:modal', $edited);
    $this->edition = false;
    $this->dispatch('saved');
  }

  public function render()
  {
    $registers = SchedulingService::all();
    return view('livewire.admissions.potential-customer.scheduling', compact('registers'));
  }
}
