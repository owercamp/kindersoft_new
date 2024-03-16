<?php

namespace App\Livewire\Configurations;

use Livewire\Component;
use App\Models\Calendar;
use App\Models\CalendarHeadquarter;
use App\Models\Headquarter;
use App\Models\States;
use App\Models\StatesNames;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class SchoolCalendar extends Component
{
  public $register = '';
  public $calendars = [];
  public $calendar = '';
  public $start_date = '';
  public $end_date = '';
  public $headquarters = [];
  public $headquarter = '';
  public $status = '';
  public $registers = [];

  protected $listeners = ['recordDeleted' => 'mount'];

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric',
      'headquarter' => 'required|exists:headquarters,id',
      'calendar' => 'required|exists:calendars,id',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
    ], [], [
      'register' => __('Registration'),
      'calendar' => __('Calendar'),
      'start_date' => __('Start Date'),
      'end_date' => __('End Date'),
      'headquarter' => __('Headquarters')
    ]);

    $now = date('Y-m-d');
    if ($now > $this->end_date) {
      $status = 2;
    } else {
      $status = 1;
    }

    $calendary = new CalendarHeadquarter;
    $calendary->number_register = $this->register;
    $calendary->headquarter_id = $this->headquarter;
    $calendary->calendar_id = $this->calendar;
    $calendary->start_date = $this->start_date;
    $calendary->end_date = $this->end_date;
    if ($calendary->save()) {
      $calendary->state()->create([
        'stateable_id' => $calendary->id,
        'stateable_type' => 'App\Models\CalendarHeadquarter',
        'state_id' => $status
      ]);
    }

    $this->dispatch('swal:modal', [
      'type' => 'success',
      'message' => __('Successfully Created Record'),
      'timer' => 3000,
      'showConfirmButton' => false,
      'success' => true
    ]);

    $this->dispatch('recordDeleted');
  }

  public function delete($register)
  {
    $calendar = CalendarHeadquarter::find($register)->value('id');
    States::where('stateable_type', 'App\Models\CalendarHeadquarter')->where('stateable_id', $calendar)->delete();
    CalendarHeadquarter::destroy($calendar);
    DB::statement("ALTER TABLE calendar_headquarters AUTO_INCREMENT = 1");

    $this->dispatch('swal:modal', [
      'type' => 'success',
      'message' => __('Successfully Deleted Record'),
      'timer' => 3000,
      'showConfirmButton' => false
    ]);

    $this->dispatch('recordDeleted');
  }

  public function mount()
  {
    $row = [];
    $data = CalendarHeadquarter::with('headquarter:id,headquarters', 'calendar:id,name', 'state.state_name:id,name')->get();

    foreach ($data as $key => $value) {
      $row[] = [
        'id' => $value->id,
        'number_register' => $value->number_register,
        'headquarter' => $value->headquarter->headquarters,
        'calendar' => $value->calendar->name,
        'start_date' => $value->start_date,
        'end_date' => $value->end_date,
        'state' => $value->state->state_name->name
      ];
    }

    $this->registers = $row;

    $this->headquarters = Headquarter::select('id', 'headquarters')->get();
    $this->calendars = Calendar::select('id', 'name')->get();
    $this->register = '';
    $this->calendar = '';
    $this->start_date = '';
    $this->end_date = '';
    $this->headquarter = '';
    $this->status = '';
  }

  public function render()
  {
    return view('livewire.configurations.school-calendar');
  }
}
