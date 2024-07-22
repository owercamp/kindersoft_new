<?php

namespace App\Livewire\Configurations\AcademicPrograms;


use Livewire\Component;
use App\Service\AlertService;
use App\Service\GradeService;
use App\Livewire\Forms\FormGrade;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class AcademicGrade extends Component
{

  use WithPagination;
  public FormGrade $formGrade;
  public $status_list;
  #[Validate('required|exists:states_names,id', 'Estado')]
  public int $status;
  public bool $modal = false;
  public int $id;
  public string $status_name;

  protected $listeners = ['saved' => 'render'];

  public function increment()
  {
    $this->formGrade->register = str_pad(GradeService::incrementRegister(), 4, '0', STR_PAD_LEFT);
    $this->formGrade->grade = '';
  }

  public function save()
  {
    $this->validate();

    $exists = GradeService::exists($this->formGrade->grade);

    if (!$exists) {
      $saved = GradeService::store($this->formGrade);
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
    $this->reset('formGrade.register', 'formGrade.grade', 'status');
    $this->id = $id;
    $register = GradeService::information($id);
    $this->formGrade->register = str_pad($register->register, 4, '0', STR_PAD_LEFT);;
    $this->formGrade->grade = $register->name;
    $this->status = $register->status_id;
    $this->status_name = $register->status->name;

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate();
    $edited = GradeService::edit($this->formGrade, $this->id, $this->status);
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
