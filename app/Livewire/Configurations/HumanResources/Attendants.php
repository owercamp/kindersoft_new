<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\City;
use App\Models\Genre;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Bloodtype;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\AcademicLevel;
use App\Models\EmploymentPosition;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;

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
    $registers = DB::table('collaborators')->latest('register')->value('register') + 1;
    $this->register = str_pad($registers, 4, '0', STR_PAD_LEFT);
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
      ],[],[
        'dep_company' => __('Company'),
        'dep_nit' => __('NIT'),
        'dep_position' => __('Position'),
        'dep_date_entry' => __('Date of Entry')
      ]);
    } elseif ($this->contract == "INDEPENDIENTE") {
      $this->validate([
        'indep_text' => 'required|max:500'
      ],[],[
        'indep_text' => __('Date of Entry')
      ]);
    }

    dd('success');
  }

  public function render()
  {
    return view('livewire.configurations.human-resources.attendants');
  }
}
