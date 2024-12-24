<?php

namespace App\Livewire\Configurations\AcademicPrograms;

use App\Livewire\Forms\AcademicForm;
use App\Service\AlertService;
use App\Service\GradeService;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;
use InfoNotification;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class AcademicGrade extends Component
{

  use WithPagination;
  public AcademicForm $academicForm;
  public $status_list;
  #[Validate('required|exists:states_names,id', 'Estado')]
  public int $status;
  public bool $modal = false;
  public int $id;
  public string $status_name;

  protected $listeners = ['saved' => 'render'];

  public function increment()
  {
    $this->academicForm->register = str_pad(GradeService::incrementRegister(), 4, '0', STR_PAD_LEFT);
    $this->academicForm->description = '';
  }

  public function save()
  {
    $this->academicForm->validate();

    $exists = GradeService::exists($this->academicForm->description);

    if (!$exists) {
      $saved = GradeService::store($this->academicForm);
      if ($saved) {
        $this->dispatch('swal:modal', SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed'));
      } else {
        $this->dispatch('swal:modal', ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed'));
      }
    } else {
      $this->dispatch('swal:modal', InfoNotification::get_notifications('info', __('Record Already Exists'), 1500, 'completed'));
    }
    $this->dispatch('saved');
  }

  public function openModal($id)
  {
    $this->reset('academicForm.register', 'academicForm.description', 'status');
    $this->id = $id;
    $register = GradeService::information($id);
    $this->academicForm->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);;
    $this->academicForm->description = $register->name;
    $this->status = $register->status_id;
    $this->status_name = $register->status->name;

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = GradeService::edit($this->academicForm, $this->id, $this->status);
    $this->dispatch('swal:modal', $edited);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function delete(int $id)
  {
    $deleted = GradeService::destroy($id);
    $this->dispatch('swal:modal', $deleted);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function mount()
  {
    $this->status_list = GradeService::status();
  }

  public function render()
  {
    $grades = GradeService::all();
    return view('livewire.configurations.academic-programs.academic-grade', compact('grades'));
  }
}
