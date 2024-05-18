<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Student;
use Livewire\Component;
use App\Models\Bloodtype;
use App\Models\HealthCareProvider;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Students extends Component
{

  use WithPagination;

  public $create = [
    'register' => '',
    'identification' => '',
    'number_identification' => '',
    'firstname' => '',
    'middlename' => '',
    'lastname' => '',
    'middlelastname' => '',
    'nationality' => '',
    'blood' => '',
    'genre' => '',
    'other_genre' => '',
    'gestation' => '',
    'velivery' => '',
    'sibling' => '',
    'place' => '',
    'allergy' => false,
    'allergys' => '',
    'therapy' => false,
    'therapies' => '',
    'prepaid' => false,
    'prepaids' => '',
    'special' => false,
    'specials' => '',
    'lives' => '',
    'eps' => ''
  ];
  public $edit = [
    'register' => '',
    'identification' => '',
    'number_identification' => '',
    'firstname' => '',
    'middlename' => '',
    'lastname' => '',
    'middlelastname' => '',
    'nationality' => '',
    'blood' => '',
    'genre' => '',
    'other_genre' => '',
    'gestation' => '',
    'velivery' => '',
    'sibling' => '',
    'place' => '',
    'allergy' => false,
    'allergys' => '',
    'therapy' => false,
    'therapies' => '',
    'prepaid' => false,
    'prepaids' => '',
    'special' => false,
    'specials' => '',
    'lives' => '',
    'eps' => '',
    'id' => ''
  ];
  public $countrys, $type_ids;
  public $genres, $type_bloods, $genre;
  public $other, $health, $modal = false;

  protected $listeners = ['changes_data' => 'render'];

  public function mount()
  {
    $this->type_ids = TypeIdentification::pluck('name', 'id');
    $this->countrys = Country::orderby('name')->pluck('name', 'id');
    $this->genres = Genre::pluck('name', 'id');
    $this->type_bloods = Bloodtype::pluck('name', 'id');
    $this->other = false;
    $this->health = HealthCareProvider::pluck('name', 'id');
  }

  public function change_genre()
  {
    $this->other = false;
    if ($this->create['genre'] == 3) {
      $this->other = true;
    }

    if ($this->edit['genre'] == 3) {
      $this->other = true;
    }
  }

  public function increment()
  {
    $number_register = DB::table('students')->latest('register')->value('register') + 1;
    $this->create['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function edit_student()
  {
    $this->validate([
      'edit.identification' => 'required|numeric|max_digits:15',
      'edit.firstname' => 'required|string',
      'edit.lastname' => 'required|string',
      'edit.nationality' => 'required|numeric|exists:countries,id',
      'edit.blood' => 'required|numeric|exists:bloodtypes,id',
      'edit.genre' => 'required|numeric|exists:genres,id',
      'edit.gestation' => 'required|numeric',
      'edit.velivery' => 'required|string',
      'edit.sibling' => 'required|numeric',
      'edit.place' => 'required|string',
      'edit.lives' => 'required|string',
      'edit.eps' => 'required|numeric|exists:health_care_providers,id'
    ], [], [
      'edit.register' => __('Registration'),
      'edit.identification' => __('Document Type'),
      'edit.firstname' => __('First Name'),
      'edit.lastname' => __('Last Name'),
      'edit.nationality' => __('Nationality'),
      'edit.blood' => __('Bloodtype'),
      'edit.genre' => __('Genre'),
      'edit.gestation' => __('Months of Gestation'),
      'edit.velivery' => __('Type of delivery'),
      'edit.sibling' => __('Number of siblings'),
      'edit.place' => __('Place Occupied'),
      'edit.lives' => __('Who do you live with?'),
      'edit.eps' => __('Health Care Provider')
    ]);

    if ($this->edit['genre'] == 3) {
      $this->validate([
        'edit.other_genre' => 'required|string'
      ], [], [
        'edit.other_genre' => __('Which') . '?'
      ]);
    }

    if ($this->edit['allergy'] == true) {
      $this->validate([
        'edit.allergys' => 'required|string'
      ], [], [
        'edit.allergys' => __('Which') . '?'
      ]);
    }

    if ($this->edit['therapy'] == true) {
      $this->validate([
        'edit.therapies' => 'required|string'
      ], [], [
        'edit.therapies' => __('Which') . '?'
      ]);
    }

    if ($this->edit['prepaid'] == true) {
      $this->validate([
        'edit.prepaids' => 'required|string'
      ], [], [
        'edit.prepaids' => __('Which') . '?'
      ]);
    }

    if ($this->edit['special'] == true) {
      $this->validate([
        'edit.specials' => 'required|string'
      ], [], [
        'edit.specials' => __('Which') . '?'
      ]);
    }

    $student = Student::find($this->edit['id']);
    $student->register = $this->edit['register'];
    $student->identification_id = $this->edit['identification'];
    $student->firstname = $this->edit['firstname'];
    $student->middlename = $this->edit['middlename'];
    $student->lastname = $this->edit['lastname'];
    $student->middlelastname = $this->edit['middlelastname'];
    $student->nationality_id = $this->edit['nationality'];
    $student->blood_id = $this->edit['blood'];
    $student->genre_id = $this->edit['genre'];
    $student->other_genre = $this->edit['other_genre'];
    $student->gestation = $this->edit['gestation'];
    $student->velivery = $this->edit['velivery'];
    $student->sibling = $this->edit['sibling'];
    $student->place = $this->edit['place'];
    $student->allergy = $this->edit['allergy'];
    $student->allergys = $this->edit['allergys'];
    $student->therapy = $this->edit['therapy'];
    $student->therapies = $this->edit['therapies'];
    $student->prepaid = $this->edit['prepaid'];
    $student->prepaids = $this->edit['prepaids'];
    $student->special = $this->edit['special'];
    $student->specials = $this->edit['specials'];
    $student->lives = $this->edit['lives'];
    $student->eps_id = $this->edit['eps'];
    if ($student->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Registration Successfully Updated'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => true
      ]);

      $this->dispatch('changes_data');
      $this->modal = false;
    }
  }

  public function save()
  {
    $this->validate([
      'create.register' => 'required',
      'create.identification' => 'required|numeric|max_digits:15',
      'create.firstname' => 'required|string',
      'create.lastname' => 'required|string',
      'create.nationality' => 'required|numeric|exists:countries,id',
      'create.blood' => 'required|numeric|exists:bloodtypes,id',
      'create.genre' => 'required|numeric|exists:genres,id',
      'create.gestation' => 'required|numeric',
      'create.velivery' => 'required|string',
      'create.sibling' => 'required|numeric',
      'create.place' => 'required|string',
      'create.lives' => 'required|string',
      'create.eps' => 'required|numeric|exists:health_care_providers,id'
    ], [], [
      'create.register' => __('Registration'),
      'create.identification' => __('Document Type'),
      'create.firstname' => __('First Name'),
      'create.lastname' => __('Last Name'),
      'create.nationality' => __('Nationality'),
      'create.blood' => __('Bloodtype'),
      'create.genre' => __('Genre'),
      'create.gestation' => __('Months of Gestation'),
      'create.velivery' => __('Type of delivery'),
      'create.sibling' => __('Number of siblings'),
      'create.place' => __('Place Occupied'),
      'create.lives' => __('Who do you live with?'),
      'create.eps' => __('Health Care Provider')
    ]);

    if ($this->create['genre'] == 3) {
      $this->validate([
        'create.other_genre' => 'required|string'
      ], [], [
        'create.other_genre' => __('Which') . '?'
      ]);
    }

    if ($this->create['allergy'] == true) {
      $this->validate([
        'create.allergys' => 'required|string'
      ], [], [
        'create.allergys' => __('Which') . '?'
      ]);
    }

    if ($this->create['therapy'] == true) {
      $this->validate([
        'create.therapies' => 'required|string'
      ], [], [
        'create.therapies' => __('Which') . '?'
      ]);
    }

    if ($this->create['prepaid'] == true) {
      $this->validate([
        'create.prepaids' => 'required|string'
      ], [], [
        'create.prepaids' => __('Which') . '?'
      ]);
    }

    if ($this->create['special'] == true) {
      $this->validate([
        'create.specials' => 'required|string'
      ], [], [
        'create.specials' => __('Which') . '?'
      ]);
    }

    $newStudent = new Student();
    $newStudent->register = $this->create['register'];
    $newStudent->identification_id = $this->create['identification'];
    $newStudent->number_identification = $this->create['number_identification'];
    $newStudent->firstname = $this->create['firstname'];
    $newStudent->middlename = $this->create['middlename'];
    $newStudent->lastname = $this->create['lastname'];
    $newStudent->middlelastname = $this->create['middlelastname'];
    $newStudent->nationality_id = $this->create['nationality'];
    $newStudent->blood_id = $this->create['blood'];
    $newStudent->genre_id = $this->create['genre'];
    $newStudent->other_genre = $this->create['other_genre'];
    $newStudent->gestation = $this->create['gestation'];
    $newStudent->velivery = $this->create['velivery'];
    $newStudent->sibling = $this->create['sibling'];
    $newStudent->place = $this->create['place'];
    $newStudent->allergy = $this->create['allergy'];
    $newStudent->allergys = $this->create['allergys'];
    $newStudent->therapy = $this->create['therapy'];
    $newStudent->therapies = $this->create['therapies'];
    $newStudent->prepaid = $this->create['prepaid'];
    $newStudent->prepaids = $this->create['prepaids'];
    $newStudent->special = $this->create['special'];
    $newStudent->specials = $this->create['specials'];
    $newStudent->lives = $this->create['lives'];
    $newStudent->eps_id = $this->create['eps'];
    if ($newStudent->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Created Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => 'completed'
      ]);

      $this->reset([
        'create.register',
        'create.identification',
        'create.number_identification',
        'create.firstname',
        'create.middlename',
        'create.lastname',
        'create.middlelastname',
        'create.nationality',
        'create.blood',
        'create.genre',
        'create.other_genre',
        'create.gestation',
        'create.velivery',
        'create.sibling',
        'create.place',
        'create.allergy',
        'create.allergys',
        'create.therapy',
        'create.therapies',
        'create.prepaid',
        'create.prepaids',
        'create.special',
        'create.specials',
        'create.lives',
        'create.eps'
      ]);

      $this->dispatch('changes_data');
    };
  }

  public function openModal($register)
  {
    $this->edit['register'] = '';
    $this->edit['identification'] = '';
    $this->edit['number_identification'] = '';
    $this->edit['firstname'] = '';
    $this->edit['middlename'] = '';
    $this->edit['lastname'] = '';
    $this->edit['middlelastname'] = '';
    $this->edit['nationality'] = '';
    $this->edit['blood'] = '';
    $this->edit['genre'] = '';
    $this->edit['other_genre'] = '';
    $this->edit['gestation'] = '';
    $this->edit['velivery'] = '';
    $this->edit['sibling'] = '';
    $this->edit['place'] = '';
    $this->edit['allergy'] = '';
    $this->edit['allergys'] = '';
    $this->edit['therapy'] = '';
    $this->edit['therapies'] = '';
    $this->edit['prepaid'] = '';
    $this->edit['prepaids'] = '';
    $this->edit['special'] = '';
    $this->edit['specials'] = '';
    $this->edit['lives'] = '';
    $this->edit['eps'] = '';

    $student = Student::where('id', $register)->first();
    $this->edit['register'] = str_pad($student->register, 4, "0", STR_PAD_LEFT);
    $this->edit['identification'] = $student->identification_id;
    $this->edit['number_identification'] = $student->number_identification;
    $this->edit['firstname'] = $student->firstname;
    $this->edit['middlename'] = $student->middlename;
    $this->edit['lastname'] = $student->lastname;
    $this->edit['middlelastname'] = $student->middlelastname;
    $this->edit['nationality'] = $student->nationality_id;
    $this->edit['blood'] = $student->blood_id;
    $this->edit['genre'] = $student->genre_id;
    $this->edit['other_genre'] = $student->other_genre;
    $this->edit['gestation'] = $student->gestation;
    $this->edit['velivery'] = $student->velivery;
    $this->edit['sibling'] = $student->sibling;
    $this->edit['place'] = $student->place;
    $this->edit['allergy'] = $student->allergy;
    $this->edit['allergys'] = $student->allergys;
    $this->edit['therapy'] = $student->therapy;
    $this->edit['therapies'] = $student->therapies;
    $this->edit['prepaid'] = $student->prepaid;
    $this->edit['prepaids'] = $student->prepaids;
    $this->edit['special'] = $student->special;
    $this->edit['specials'] = $student->specials;
    $this->edit['lives'] = $student->lives;
    $this->edit['eps'] = $student->eps_id;
    $this->edit['id'] = $student->id;
    $this->modal = true;
  }

  public function delete()
  {
  }

  public function render()
  {
    $students = Student::with('type_identification:id,name', 'bloodtype:id,name', 'genre:id,name', 'eps:id,name', 'nationality:id,name')->paginate(15);
    return view('livewire.configurations.human-resources.students', compact('students'));
  }
}
