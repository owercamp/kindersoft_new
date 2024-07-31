<?php

namespace App\Livewire\Configurations\AcademicPrograms;

use App\Livewire\Forms\AcademicForm;
use App\Service\AlertService;
use App\Service\IntelligenceService;
use Livewire\Component;
use Livewire\WithPagination;

class AcademicIntelligence extends Component
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
    $this->academicForm->register = str_pad(IntelligenceService::incrementRegister(), 4, '0', STR_PAD_LEFT);
    $this->academicForm->description = '';
  }

  public function save()
  {
    $this->academicForm->validate();

    $exists = IntelligenceService::exists($this->academicForm->description);

    if (!$exists) {
      $saved = IntelligenceService::store($this->academicForm);
      if ($saved) {
        $this->dispatch('swal:modal', AlertService::success());
      } else {
        $this->dispatch('swal:modal', AlertService::error());
      }
    } else {
      $this->dispatch('swal:modal', AlertService::warning());
    }
    $this->dispatch('saved');
  }

  public function openModal($id)
  {
    $this->reset('academicForm.register', 'academicForm.description', 'status');
    $this->id = $id;
    $register = IntelligenceService::information($id);
    $this->academicForm->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);;
    $this->academicForm->description = $register->name;
    $this->status = $register->status_id;
    $this->status_name = $register->status->name;

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = IntelligenceService::edit($this->academicForm, $this->id, $this->status);
    $this->dispatch('swal:modal', $edited);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function delete(int $id)
  {
    $deleted = IntelligenceService::destroy($id);
    $this->dispatch('swal:modal', $deleted);
    $this->modal = false;
    $this->dispatch('saved');
  }

  public function mount()
  {
    $this->status_list = IntelligenceService::status();
  }

  public function render()
  {
    $intelligences = IntelligenceService::all();
    return view('livewire.configurations.academic-programs.academic-intelligence', compact('intelligences'));
  }
}
