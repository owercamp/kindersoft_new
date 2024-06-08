<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\City;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\TypeIdentification;

class Providers extends Component
{
  public $country, $countrys, $current_country;
  public $department, $departments, $current_department;
  public $municipality, $municipalities, $current_municipality;
  public $city, $cities, $current_city;
  public $location, $locations, $current_location;
  public $postal, $postals, $current_postal;
  public $personal = false;
  public $legal = false;
  public $data = [
    'register' => '',
    'person' => '',
    'identification' => '',
    'number' => '',
    'firstname' => '',
    'middlename' => '',
    'lastname' => '',
    'middlelastname' => '',
    'address' => '',
    'phone' => '',
    'nit' => '',
    'company' => '',
    'email' => ''
  ];
  public $type_ids;

  public function increment()
  {
  }

  public function changePerson()
  {
    $this->legal = false;
    $this->personal = false;
    if ($this->data['person'] == 'natural') {
      $this->personal = true;
    } elseif ($this->data['person'] == 'juridica') {
      $this->legal = true;
    }
  }

  public function mount()
  {
    $this->type_ids = TypeIdentification::pluck('name', 'id');
    $this->countrys = Country::orderby('name')->pluck('name', 'id');
    $this->departments = Departament::where('country_id', $this->country)->orderby('name')->pluck('name', 'id');
    $this->municipalities = Municipality::where('departament_id', $this->department)->orderby('name')->pluck('name', 'id');
    $this->cities = City::where('municipality_id', $this->municipality)->orderby('name')->pluck('name', 'id');
    $this->locations = Neighborhood::where('city_id', $this->city)->orderby('name')->pluck('name', 'id');
    $this->postals = Postal::where('neighborhood_id', $this->location)->orderby('name')->pluck('name', 'id');
  }

  public function change_country()
  {
    $this->departments = Departament::where('country_id', $this->country)->orderby('name')->pluck('name', 'id');
  }

  public function change_department()
  {
    $this->municipalities = Municipality::where('departament_id', $this->department)->orderby('name')->pluck('name', 'id');
  }

  public function change_municipality()
  {
    $this->cities = City::where('municipality_id', $this->municipality)->orderby('name')->pluck('name', 'id');
  }

  public function change_city()
  {
    $this->locations = Neighborhood::where('city_id', $this->city)->orderby('name')->pluck('name', 'id');
  }

  public function change_location()
  {
    $this->postals = Postal::where('neighborhood_id', $this->location)->orderby('name')->pluck('name', 'id');
  }

  public function render()
  {
    return view('livewire.configurations.human-resources.providers');
  }
}
