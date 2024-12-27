<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use App\Exports\AchievementExcel;
use App\Imports\RemarkImport;
use App\Livewire\Forms\AchievementForm;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\InfoNotification;
use App\Service\Notified\SuccessNotification;
use App\Service\RemarksService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Observations extends Component
{
  use WithPagination;
  use WithFileUploads;

  public $searching;
  public AchievementForm $achievementForm;
  public $status_list;
  #[Validate('required|exists:states_names,id', 'Estado')]
  public int $status;
  public bool $modal = false;
  public int $id;
  public string $status_name;
  public $archivo;

  protected $listeners = ['saved' => 'render'];

  public function cargar()
  {
    $this->validate([
      'archivo' => 'required|file|mimes:xlsx,xls,csv|max:2048',
    ]);

    Excel::import(new RemarkImport, $this->archivo->getRealPath());

    $this->dispatch('saved');

    $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Imported Records'), 1500, 'completed'));
  }

  public function search()
  {
    $register = RemarksService::searchingIntelligence($this->achievementForm->intelligence);
    $this->achievementForm->register = str_pad($register, 4, '0', STR_PAD_LEFT);
  }

  public function excel()
  {
    return Excel::download(new AchievementExcel(), 'Plantilla Observaciones.xlsx');
  }

  public function save()
  {
    $this->achievementForm->validate();

    $exists = RemarksService::get_exists('remarks', [
      ['intelligence_id', $this->achievementForm->intelligence],
      ['register', $this->achievementForm->register]
    ]);

    if ($exists) {
      $notified = InfoNotification::get_notifications('info', __('Record Already Exists'), 1500, 'completed');
      $this->dispatch('swal:modal', $notified);
    }

    if (!$exists) {
      $achievement = RemarksService::store($this->achievementForm);
      if ($achievement) {
        $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed'));
      } else {
        $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
      }
    }
  }

  public function openModal($id)
  {
    $this->reset('achievementForm.intelligence', 'achievementForm.register', 'achievementForm.description', 'status');
    $this->reset('searching');
    $this->searching = RemarksService::get_consulting('intelligences', []);
    $this->id = $id;
    $register = RemarksService::information($id);
    $this->achievementForm->intelligence = isset($register->intelligence_id) ? $register->intelligence_id : 0;
    $this->achievementForm->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);
    $this->achievementForm->description = $register->description;
    $this->status = $register->status_id;
    $this->status_name = $register->status->name;

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = RemarksService::edit($this->achievementForm, $this->id, $this->status);
    $this->dispatch('swal:modal', $edited);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function delete($id)
  {
    $deleted = RemarksService::delete($id);
    if ($deleted) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
  }

  public function mount()
  {
    $this->searching = RemarksService::get_consulting('intelligences', ['status_id' => 1]);
    $this->status_list = RemarksService::status();
  }
  public function render()
  {
    $observations = RemarksService::all();
    return view('livewire.configurations.products-and-services.observations', compact('observations'));
  }
}
