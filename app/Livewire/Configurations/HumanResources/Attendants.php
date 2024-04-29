<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\City;
use App\Models\Genre;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Attendant;
use App\Models\Bloodtype;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\AcademicLevel;
use App\Models\DependentContract;
use App\Models\EmploymentPosition;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;
use App\Models\IndependentContract;

class Attendants extends Component
{

  public $register, $type_ids, $identification, $number_document, $firstname, $middlename, $lastname, $middlelastname, $email;
  public $academic, $academics, $other_title, $title_academic;
  public $country, $countrys, $current_country;
  public $department, $departments, $current_department;
  public $municipality, $municipalities, $current_municipality;
  public $city, $cities, $current_city;
  public $location, $locations, $current_location;
  public $postal, $postals, $current_postal;
  public $genres, $genre, $type_bloods, $other_genre, $other, $blood;
  public $contract, $dependent, $independent, $address, $phone, $nationality, $indep_text;
  public $positions, $dep_company, $dep_nit, $dep_position, $dep_date_entry;
  public $registerPosition, $document;
  public $modal = false;
  public $arrayEdit = [
    'register' => '',
    'identification' => '',
    'number_document' => '',
    'firstname' => '',
    'middlename' => '',
    'lastname' => '',
    'middlelastname' => '',
    'email' => '',
    'academic' => '',
    'other_title' => false,
    'title_academic' => '',
    'country' => '',
    'department' => '',
    'municipality' => '',
    'city' => '',
    'location' => '',
    'postal' => '',
    'address' => '',
    'phone' => '',
    'nationality' => '',
    'genre' => '',
    'other' => false,
    'other_genre' => '',
    'blood' => '',
    'contract' => '',
    'dependent' => false,
    'independent' => false,
    'indep_text' => '',
    'dep_company' => '',
    'dep_nit' => '',
    'dep_position' => '',
    'dep_date_entry' => '',
    'position' => '',
    'id' => ''
  ];

  protected $listeners = ['successPosition' => 'incrementPosition', 'success' => 'increment', 'changes_data' => 'render'];

  public function mount()
  {
    $this->type_ids = TypeIdentification::pluck('name', 'id');
    $this->countrys = Country::orderby('name')->pluck('name', 'id');
    $this->departments = Departament::where('country_id', $this->country)->orderby('name')->pluck('name', 'id');
    $this->municipalities = Municipality::where('departament_id', $this->department)->orderby('name')->pluck('name', 'id');
    $this->cities = City::where('municipality_id', $this->municipality)->orderby('name')->pluck('name', 'id');
    $this->locations = Neighborhood::where('city_id', $this->city)->orderby('name')->pluck('name', 'id');
    $this->postals = Postal::where('neighborhood_id', $this->location)->orderby('name')->pluck('name', 'id');
    $this->genres = Genre::pluck('name', 'id');
    $this->type_bloods = Bloodtype::pluck('name', 'id');
    $this->academics = AcademicLevel::pluck('name', 'id');
    $this->positions = EmploymentPosition::pluck('name', 'id');
    $this->other = false;
    $this->other_title = false;
    $this->dependent = false;
    $this->independent = false;
  }

  public function increment()
  {
    $registers = DB::table('attendants')->latest('register')->value('register') + 1;
    $this->register = str_pad($registers, 4, '0', STR_PAD_LEFT);
  }

  public function incrementPosition()
  {
    $register = DB::table('employment_positions')->latest('register')->value('register') + 1;
    $this->registerPosition = str_pad($register, 4, '0', STR_PAD_LEFT);
  }

  public function savePosition()
  {
    $this->validate([
      'register' => 'required|numeric',
      'document' => 'required|string|max:30'
    ], [], [
      'register' => __('Registration'),
      'document' => __('Document Name')
    ]);

    $register = new EmploymentPosition();
    $register->register = $this->register;
    $register->name = $this->document;
    if ($register->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Created Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => true
      ]);

      $this->dispatch('successPosition');
      $this->positions = EmploymentPosition::pluck('name', 'id');
    }
  }

  public function contract_change()
  {
    $this->dependent = false;
    $this->independent = false;
    switch ($this->contract) {
      case "DEPENDIENTE":
        $this->dependent = true;
        break;
      case "INDEPENDIENTE":
        $this->independent = true;
        break;
    }
  }

  public function change_country($from = "")
  {
    if ($from) {
      $this->departments = Departament::where('country_id', $this->editArray['country'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->departments = Departament::where('country_id', $this->country)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_department($from = "")
  {
    if ($from) {
      $this->municipalities = Municipality::where('departament_id', $this->editArray['department'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->municipalities = Municipality::where('departament_id', $this->department)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_municipality($from = "")
  {
    if ($from) {
      $this->cities = City::where('municipality_id', $this->editArray['municipality'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->cities = City::where('municipality_id', $this->municipality)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_city($from = "")
  {
    if ($from) {
      $this->locations = Neighborhood::where('city_id', $this->editArray['city'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->locations = Neighborhood::where('city_id', $this->city)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_location($from = "")
  {
    if ($from) {
      $this->postals = Postal::where('neighborhood_id', $this->editArray['location'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->postals = Postal::where('neighborhood_id', $this->location)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_academic()
  {
    $this->other_title = ($this->academic == 4) ? true : false;
  }

  function change_genre()
  {
    if ($this->genre == 3) {
      $this->other = true;
    } else {
      $this->other = false;
    }
  }

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric',
      'identification' => 'required|numeric|exists:type_identifications,id',
      'number_document' => 'required|numeric|max_digits:16',
      'firstname' => 'required|string',
      'middlename' => 'nullable|string',
      'lastname' => 'required|string',
      'middlelastname' => 'nullable|string',
      'country' => 'required|numeric|exists:countries,id',
      'department' => 'required|numeric|exists:departaments,id',
      'municipality' => 'required|numeric|exists:municipalities,id',
      'city' => 'required|numeric|exists:cities,id',
      'location' => 'required|numeric|exists:neighborhoods,id',
      'postal' => 'required|numeric|exists:postals,id',
      'address' => 'required|string',
      'phone' => 'required|numeric|min:10',
      'email' => 'required|email',
      'nationality' => 'required|numeric|exists:countries,id',
      'genre' => 'required|numeric|exists:genres,id',
      'academic' => 'required|numeric|exists:academic_levels,id',
      'blood' => 'required|numeric|exists:bloodtypes,id',
      'contract' => 'required|string'
    ], [], [
      'register' => __('Registration'),
      'identification' => __('Document Type'),
      'number_document' => __('Number') . " " . __('of') . " " . __('Document'),
      'firstname' => __('First Name'),
      'middlename' => __('Middle Name'),
      'lastname' => __('Last Name'),
      'middlelastname' => __('Middle Last Name'),
      'country' => __('Country'),
      'department' => __('Department'),
      'municipality' => __('Municipality'),
      'city' => __('City'),
      'location' => __('Location / Neighborhood'),
      'postal' => __('Zip Code'),
      'address' => __('Address'),
      'phone' => __('Phone'),
      'email' => __('Email address'),
      'nationality' => __('Nationality'),
      'genre' => __('Genre'),
      'academic' => __('Academic level'),
      'blood' => __('Bloodtype'),
      'contract' => __('Contract Work or Labor')
    ]);

    if ($this->genre == 3) {
      $this->validate([
        'other_genre' => 'required|string'
      ], [
        'other_genre' => __('Please fill in the text box for gender')
      ], []);
    }

    if ($this->academic == 4) {
      $this->validate([
        'title_academic' => 'required|string'
      ], [
        'title_academic' => __('Please enter the title obtained')
      ], []);
    }

    if ($this->contract == "DEPENDIENTE") {
      $this->validate([
        'dep_company' => 'required|string',
        'dep_nit' => 'required|string',
        'dep_position' => 'required|numeric|exists:employment_positions,id',
        'dep_date_entry' => 'required|date'
      ], [], [
        'dep_company' => __('Company'),
        'dep_nit' => __('NIT'),
        'dep_position' => __('Position'),
        'dep_date_entry' => __('Date of Entry')
      ]);
    } elseif ($this->contract == "INDEPENDIENTE") {
      $this->validate([
        'indep_text' => 'required|max:500'
      ], [], [
        'indep_text' => __('Date of Entry')
      ]);
    }

    DB::beginTransaction();
    try {
      $register = new Attendant();
      $register->register = trim($this->register);
      $register->type_identification_id = $this->identification;
      $register->number_document = trim($this->number_document);
      $register->firstname = trim($this->firstname);
      $register->middlename = trim($this->middlename);
      $register->lastname = trim($this->lastname);
      $register->middlelastname = trim($this->middlelastname);
      $register->country_id = $this->country;
      $register->department_id = $this->department;
      $register->municipality_id = $this->municipality;
      $register->city_id = $this->city;
      $register->location_id = $this->location;
      $register->postal_id = $this->postal;
      $register->address = trim($this->address);
      $register->phone = trim($this->phone);
      $register->email = trim($this->email);
      $register->nationality_id = $this->nationality;
      $register->genre_id = $this->genre;

      if ($this->genre == 3) {
        $register->genre_text = $this->other_genre;
      }

      $register->academic_id = $this->academic;

      if ($this->academic == 4) {
        $register->academic_text = $this->title_academic;
      }

      $register->bloodtype_id = $this->blood;
      $register->contract = $this->contract;
      if ($register->save()) {
        if ($this->contract == "DEPENDIENTE") {
          $contracts = new DependentContract();
          $contracts->attendant_id = $register->id;
          $contracts->company = trim($this->dep_company);
          $contracts->nit = trim($this->dep_nit);
          $contracts->position_id = $this->dep_position;
          $contracts->date_entry = $this->dep_date_entry;
          $contracts->save();
        } elseif ($this->contract == "INDEPENDIENTE") {
          $contracts_independent = new IndependentContract();
          $contracts_independent->attendant_id = $register->id;
          $contracts_independent->description = trim($this->indep_text);
          $contracts_independent->save();
        }

        $this->dispatch('swal:modal', [
          'type' => 'success',
          'message' => __('Successfully Created Record'),
          'timer' => 1500,
          'showConfirmButton' => false,
          'success' => 'completed'
        ]);

        $this->reset([
          'identification',
          'number_document',
          'firstname',
          'middlename',
          'lastname',
          'middlelastname',
          'country',
          'department',
          'municipality',
          'city',
          'location',
          'postal',
          'address',
          'phone',
          'email',
          'nationality',
          'genre',
          'other_genre',
          'academic',
          'title_academic',
          'blood',
          'contract',
          'dep_company',
          'dep_nit',
          'dep_position',
          'dep_date_entry',
          'indep_text'
        ]);
        $this->dispatch('success');
        $this->dispatch('changes_data');
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      $this->dispatch('swal:modal', [
        'type' => 'error',
        'message' => $e->getMessage(),
        'timer' => 4000,
        'showConfirmButton' => true
      ]);
    }
  }

  public function openModal($id)
  {
    $register = Attendant::with('academic', 'neighborhood','country','department','municipality','city','postal','contract_dependent','contract_independent','bloodtype','genre','nationality','identification')->find($id);
    $this->modal = true;
  }

  public function render()
  {
    $attendants = Attendant::with('academic', 'neighborhood')->paginate(15);
    return view('livewire.configurations.human-resources.attendants', compact('attendants'));
  }
}
