<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Country;
use Livewire\Component;
use App\Models\Bloodtype;
use App\Models\HealthCareProvider;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;

class Students extends Component
{
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
  public $countrys, $type_ids;
  public $genres, $type_bloods, $genre;
  public $other, $health;

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
    $this->other = ($this->create['genre'] == 3) ? true : false;
  }

  public function increment()
  {
    $number_register = DB::table('students')->latest('register')->value('register') + 1;
    $this->create['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
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
    ],[],[
      'create.register' => __('Registration'),
      'create.identification' => __('Document Type'),
      'create.firstname' => __('First Name'),
      'create.lastname' => __('Last Name'),
      'create.nationality' => __('Nationality'),
      'create.blood' => __('Bloodtype'),
      'create.genre' => __('Genre'),
      'create.gestation' => __('Months of Gestation'),
    ]);
    dd($this->create);
  }

  public function render()
  {
    return view('livewire.students');
  }
}
