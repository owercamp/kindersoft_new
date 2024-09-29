<?php

namespace App\Livewire\Configurations\ProductsAndServices;

use App\Exports\AchievementExcel;
use App\Imports\AchievementImport;
use App\Livewire\Forms\AchievementForm;
use App\Service\AchievementService;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use InfoNotification;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Achievements extends Component
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

    Excel::import(new AchievementImport, $this->archivo->getRealPath());

    $this->dispatch('saved');

    $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Imported Records'), 1500, 'completed'));
  }

  public function search()
  {
    $register = AchievementService::searchingIntelligence($this->achievementForm->intelligence);
    $this->achievementForm->register = str_pad($register, 4, '0', STR_PAD_LEFT);
  }

  public function increment() {}

  public function excel()
  {
    return Excel::download(new AchievementExcel(), 'Plantilla Logros.xlsx');
  }

  public function save()
  {
    $this->achievementForm->validate();

    $exists = AchievementService::get_exists('achievements', [
      ['intelligence_id', $this->achievementForm->intelligence],
      ['register', $this->achievementForm->register]
    ]);

    if ($exists) {
      $notified = InfoNotification::get_notifications('info', __('Record Already Exists'), 1500, 'completed');
      $this->dispatch('swal:modal', $notified);
    }

    if (!$exists) {
      $achievement = AchievementService::store($this->achievementForm);
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
    $this->searching = AchievementService::get_consulting('intelligences', []);
    $this->id = $id;
    $register = AchievementService::information($id);
    $this->achievementForm->intelligence = $register->intelligence_id;
    $this->achievementForm->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);
    $this->achievementForm->description = $register->description;
    $this->status = $register->status_id;
    $this->status_name = $register->status->name;

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = AchievementService::edit($this->achievementForm, $this->id, $this->status);
    $this->dispatch('swal:modal', $edited);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function delete($id)
  {
    $deleted = AchievementService::delete($id);
    if ($deleted) {
      $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed'));
    } else {
      $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
    }
  }

  public function mount()
  {
    $this->searching = AchievementService::get_consulting('intelligences', ['status_id' => 1]);
    $this->status_list = AchievementService::status();
  }
  public function render()
  {
    $achievements = AchievementService::all();
    return view('livewire.configurations.products-and-services.achievements', compact('achievements'));
  }
}
