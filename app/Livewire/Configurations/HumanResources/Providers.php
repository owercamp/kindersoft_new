<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\City;
use App\Models\Legal;
use App\Models\Person;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Departament;
use App\Models\StatesNames;
use App\Models\Municipality;
use App\Models\Neighborhood;
use Livewire\WithPagination;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;
use App\Models\Providers as ModelsProviders;

class Providers extends Component
{

  use WithPagination;
  protected $listeners = ['save' => 'render'];

  public $country, $countrys, $current_country;
  public $department, $departments, $current_department;
  public $municipality, $municipalities, $current_municipality;
  public $city, $cities, $current_city;
  public $location, $locations, $current_location;
  public $postal, $postals, $current_postal;
  public $status;
  public $personal = false;
  public $legal = false;
  public $modal = false;
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
    'email' => '',
    'status' => 1,
    'id' => ''
  ];
  public $type_ids;

  public function increment()
  {
    $number_register = DB::table('providers')->latest('register')->value('register') + 1;
    $this->data['register'] = str_pad($number_register, 4, "0", STR_PAD_LEFT);
  }

  public function save()
  {
    $this->validate([
      'data.register' => 'required|numeric',
      'data.person' => 'required|string'
    ], [], [
      'data.register' => __('Registration'),
      'data.person' => __('Type of Person')
    ]);

    if ($this->data['person'] == 'natural') {
      $this->validate([
        'data.identification' => 'required|numeric|exists:type_identifications,id',
        'data.number' => 'required|numeric',
        'data.firstname' => 'required|string',
        'data.lastname' => 'required|string',
        'data.address' => 'required|string',
        'data.phone' => 'required|numeric',
        'data.email' => 'required|email'
      ], [], [
        'data.identification' => __('Document Type'),
        'data.number' => __('Number') . ' ' . __('Document'),
        'data.firstname' => __('First Name'),
        'data.lastname' => __('Last Name'),
        'data.address' => __('Address'),
        'data.phone' => __('Phone'),
        'data.email' => __('Email')
      ]);

      $this->validate([
        'country' => 'required|numeric|exists:countries,id',
        'department' => 'required|numeric|exists:departaments,id',
        'municipality' => 'required|numeric|exists:municipalities,id',
        'city' => 'required|numeric|exists:cities,id',
        'location' => 'required|numeric|exists:neighborhoods,id',
        'postal' => 'required|numeric|exists:postals,id'
      ], [], [
        'country' => __('Country'),
        'department' => __('Department'),
        'municipality' => __('Municipality'),
        'city' => __('City'),
        'location' => __('Location / Neighborhood'),
        'postal' => __('Zip Code')
      ]);
    } else if ($this->data['person'] == 'juridica') {
      $this->validate([
        'data.nit' => 'required|string',
        'data.company' => 'required|string',
        'data.email' => 'required|email',
        'data.address' => 'required|string',
        'data.phone' => 'required|numeric',
      ], [], [
        'data.nit' => __('NIT'),
        'data.company' => __('Company'),
        'data.email' => __('Email'),
        'data.address' => __('Address'),
        'data.phone' => __('Phone')
      ]);

      $this->validate([
        'country' => 'required|numeric|exists:countries,id',
        'department' => 'required|numeric|exists:departaments,id',
        'municipality' => 'required|numeric|exists:municipalities,id',
        'city' => 'required|numeric|exists:cities,id',
        'location' => 'required|numeric|exists:neighborhoods,id',
        'postal' => 'required|numeric|exists:postals,id'
      ], [], [
        'country' => __('Country'),
        'department' => __('Department'),
        'municipality' => __('Municipality'),
        'city' => __('City'),
        'location' => __('Location / Neighborhood'),
        'postal' => __('Zip Code')
      ]);
    }

    // dd($this->data);
    $provider = new ModelsProviders();
    $provider->register = $this->data['register'];
    $provider->person = $this->data['person'];
    if ($provider->save()) {
      if ($this->data['person'] == 'natural') {
        $person_natural = new Person();
        $person_natural->type_identification_id = $this->data['identification'];
        $person_natural->document_number = $this->data['number'];
        $person_natural->first_name = $this->data['firstname'];
        $person_natural->middle_name = $this->data['middlename'];
        $person_natural->last_name = $this->data['lastname'];
        $person_natural->middle_last_name = $this->data['middlelastname'];
        $person_natural->email = $this->data['email'];
        $person_natural->phone = $this->data['phone'];
        $person_natural->address = $this->data['address'];
        $person_natural->country_id = $this->country;
        $person_natural->department_id = $this->department;
        $person_natural->municipality_id = $this->municipality;
        $person_natural->city_id = $this->city;
        $person_natural->neighborhood_id = $this->location;
        $person_natural->postal_id = $this->postal;
        $person_natural->provider_id = $provider->id;
        if ($person_natural->save()) {
          $this->dispatch('swal:modal', [
            'type' => 'success',
            'message' => __('Successfully Created Record'),
            'timer' => 1500,
            'showConfirmButton' => false,
            'success' => 'completed'
          ]);
        }
      } elseif ($this->data['person'] == 'juridica') {
        $person_legal = new Legal();
        $person_legal->nit = $this->data['nit'];
        $person_legal->company_name = $this->data['company'];
        $person_legal->email = $this->data['email'];
        $person_legal->phone = $this->data['phone'];
        $person_legal->address = $this->data['address'];
        $person_legal->country_id = $this->country;
        $person_legal->department_id = $this->department;
        $person_legal->municipality_id = $this->municipality;
        $person_legal->city_id = $this->city;
        $person_legal->neighborhood_id = $this->location;
        $person_legal->postal_id = $this->postal;
        $person_legal->provider_id = $provider->id;
        if ($person_legal->save()) {
          $this->dispatch('swal:modal', [
            'type' => 'success',
            'message' => __('Successfully Created Record'),
            'timer' => 1500,
            'showConfirmButton' => false,
            'success' => 'completed'
          ]);
        }
      }
    }
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
    $this->status = StatesNames::pluck('name', 'id');
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

  public function openModal($provider)
  {
    $this->reset('data');
    $search = ModelsProviders::with('personal', 'legal', 'status:id,name', 'legal.city:id,name', 'legal.municipality:id,name', 'legal.department:id,name', 'legal.country:id,name', 'legal.neighborhood:id,name', 'legal.postal:id,name', 'personal.city:id,name', 'personal.municipality:id,name', 'personal.department:id,name', 'personal.country:id,name', 'personal.neighborhood:id,name', 'personal.postal:id,name', 'personal.identification:id,name')->where('id', $provider)->get();

    if ($search[0]->person == 'natural') {
      $this->personal = true;
      $this->legal = false;
    } elseif ($search[0]->person == 'juridica') {
      $this->legal = true;
      $this->personal = false;
    }

    if ($search[0]->person == 'natural') {
      $this->data =  [
        'id' => $search[0]->id,
        'register' => str_pad($search[0]->register, 4, "0", STR_PAD_LEFT),
        'person' => $search[0]->person,
        'identification' => $search[0]->personal->type_identification_id,
        'number' => $search[0]->personal->document_number,
        'firstname' => $search[0]->personal->first_name,
        'middlename' => $search[0]->personal->middle_name,
        'lastname' => $search[0]->personal->last_name,
        'middlelastname' => $search[0]->personal->middle_last_name,
        'address' => $search[0]->personal->address,
        'phone' => $search[0]->personal->phone,
        'email' => $search[0]->personal->email,
        'status' => $search[0]->status_id
      ];
    } elseif ($search[0]->person == 'juridica') {
      $this->data =  [
        'id' => $search[0]->id,
        'register' => str_pad($search[0]->register, 4, "0", STR_PAD_LEFT),
        'person' => $search[0]->person,
        'nit' => $search[0]->legal->nit,
        'company' => $search[0]->legal->company_name,
        'address' => $search[0]->legal->address,
        'phone' => $search[0]->legal->phone,
        'email' => $search[0]->legal->email,
        'status' => $search[0]->status_id
      ];
    }

    $country = $search[0]->legal->country_id ?? $search[0]->personal->country_id;
    $department = $search[0]->legal->department_id ?? $search[0]->personal->department_id;
    $municipality = $search[0]->legal->municipality_id ?? $search[0]->personal->municipality_id;
    $city = $search[0]->legal->city_id ?? $search[0]->personal->city_id;
    $location = $search[0]->legal->neighborhood_id ?? $search[0]->personal->neighborhood_id;
    $postal = $search[0]->legal->postal_id ?? $search[0]->personal->postal_id;

    $this->country = $country;
    $this->department = $department;
    $this->municipality = $municipality;
    $this->city = $city;
    $this->location = $location;
    $this->postal = $postal;

    $this->current_country = Country::where('id', $country)->value('name');
    $this->current_department = Departament::where('id', $department)->value('name');
    $this->current_municipality = Municipality::where('id', $municipality)->value('name');
    $this->current_city = City::where('id', $city)->value('name');
    $this->current_location = Neighborhood::where('id', $location)->value('name');
    $this->current_postal = Postal::where('id', $postal)->value('name');

    $this->modal = true;
  }

  public function edit()
  {
    $this->validate([
      'data.register' => 'required|numeric',
      'data.person' => 'required|string'
    ], [], [
      'data.register' => __('Registration'),
      'data.person' => __('Type of Person')
    ]);

    if ($this->data['person'] == 'natural') {
      $this->validate([
        'data.identification' => 'required|numeric|exists:type_identifications,id',
        'data.number' => 'required|numeric',
        'data.firstname' => 'required|string',
        'data.lastname' => 'required|string',
        'data.address' => 'required|string',
        'data.phone' => 'required|numeric',
        'data.email' => 'required|email'
      ], [], [
        'data.identification' => __('Document Type'),
        'data.number' => __('Number') . ' ' . __('Document'),
        'data.firstname' => __('First Name'),
        'data.lastname' => __('Last Name'),
        'data.address' => __('Address'),
        'data.phone' => __('Phone'),
        'data.email' => __('Email')
      ]);

      $this->validate([
        'country' => 'required|numeric|exists:countries,id',
        'department' => 'required|numeric|exists:departaments,id',
        'municipality' => 'required|numeric|exists:municipalities,id',
        'city' => 'required|numeric|exists:cities,id',
        'location' => 'required|numeric|exists:neighborhoods,id',
        'postal' => 'required|numeric|exists:postals,id'
      ], [], [
        'country' => __('Country'),
        'department' => __('Department'),
        'municipality' => __('Municipality'),
        'city' => __('City'),
        'location' => __('Location / Neighborhood'),
        'postal' => __('Zip Code')
      ]);
    } else if ($this->data['person'] == 'juridica') {
      $this->validate([
        'data.nit' => 'required|string',
        'data.company' => 'required|string',
        'data.email' => 'required|email',
        'data.address' => 'required|string',
        'data.phone' => 'required|numeric',
      ], [], [
        'data.nit' => __('NIT'),
        'data.company' => __('Company'),
        'data.email' => __('Email'),
        'data.address' => __('Address'),
        'data.phone' => __('Phone')
      ]);

      $this->validate([
        'country' => 'required|numeric|exists:countries,id',
        'department' => 'required|numeric|exists:departaments,id',
        'municipality' => 'required|numeric|exists:municipalities,id',
        'city' => 'required|numeric|exists:cities,id',
        'location' => 'required|numeric|exists:neighborhoods,id',
        'postal' => 'required|numeric|exists:postals,id'
      ], [], [
        'country' => __('Country'),
        'department' => __('Department'),
        'municipality' => __('Municipality'),
        'city' => __('City'),
        'location' => __('Location / Neighborhood'),
        'postal' => __('Zip Code')
      ]);
    }

    $provider = ModelsProviders::with('personal', 'legal')->where('id', $this->data['id'])->first();

    $provider->register = $this->data['register'];
    $provider->person = $this->data['person'];
    $provider->status_id = $this->data['status'];

    if ($provider->save() && isset($provider->personal->provider_id) && $this->data['person'] == 'juridica') {
      Person::where('id', $provider->personal->id)->delete();
      $legal = new Legal();
      $legal->nit = $this->data['nit'];
      $legal->company_name = $this->data['company'];
      $legal->address = $this->data['address'];
      $legal->country_id = $this->country;
      $legal->department_id = $this->department;
      $legal->municipality_id = $this->municipality;
      $legal->city_id = $this->city;
      $legal->neighborhood_id = $this->location;
      $legal->postal_id = $this->postal;
      $legal->provider_id = $provider->id;
      $legal->email = $this->data['email'];
      $legal->phone = $this->data['phone'];
      if ($legal->save()) {
        $this->dispatch('swal:modal', [
          'type' => 'success',
          'message' => __('Registration Successfully Updated'),
          'timer' => 1500,
          'showConfirmButton' => false,
          'success' => true
        ]);

        $this->dispatch('save');
        $this->modal = false;
      }
    } elseif ($provider->save() && isset($provider->legal->provider_id) && $this->data['person'] == 'natural') {
      Legal::where('id', $provider->legal->id)->delete();
      $person = new Person();
      $person->type_identification_id = $this->data['identification'];
      $person->document_number = $this->data['number'];
      $person->first_name = $this->data['firstname'];
      $person->middle_name = (isset($this->data['middlename'])) ? $this->data['middlename'] : '';
      $person->last_name = $this->data['lastname'];
      $person->middle_last_name = (isset($this->data['middlelastname'])) ? $this->data['middlelastname'] : '';
      $person->country_id = $this->country;
      $person->department_id = $this->department;
      $person->municipality_id = $this->municipality;
      $person->city_id = $this->city;
      $person->neighborhood_id = $this->location;
      $person->postal_id = $this->postal;
      $person->address = $this->data['address'];
      $person->provider_id = $provider->id;
      $person->phone = $this->data['phone'];
      $person->email = $this->data['email'];
      if ($person->save()) {
        $this->dispatch('swal:modal', [
          'type' => 'success',
          'message' => __('Registration Successfully Updated'),
          'timer' => 1500,
          'showConfirmButton' => false,
          'success' => true
        ]);

        $this->dispatch('save');
        $this->modal = false;
      }
    } elseif ($provider->save() && isset($provider->legal->provider_id) && $this->data['person'] == 'juridica') {
      $legal = Legal::where('id', $provider->legal->id)->first();
      $legal->nit = $this->data['nit'];
      $legal->company_name = $this->data['company'];
      $legal->address = $this->data['address'];
      $legal->country_id = $this->country;
      $legal->department_id = $this->department;
      $legal->municipality_id = $this->municipality;
      $legal->city_id = $this->city;
      $legal->neighborhood_id = $this->location;
      $legal->postal_id = $this->postal;
      $legal->email = $this->data['email'];
      $legal->phone = $this->data['phone'];
      if ($legal->save()) {
        $this->dispatch('swal:modal', [
          'type' => 'success',
          'message' => __('Registration Successfully Updated'),
          'timer' => 1500,
          'showConfirmButton' => false,
          'success' => true
        ]);

        $this->dispatch('save');
        $this->modal = false;
      }
    } elseif ($provider->save() && isset($provider->personal->provider_id) && $this->data['person'] == 'natural') {
      $person = Person::where('id', $provider->personal->id)->first();
      $person->type_identification_id = $this->data['identification'];
      $person->document_number = $this->data['number'];
      $person->first_name = $this->data['firstname'];
      $person->middle_name = (isset($this->data['middlename'])) ? $this->data['middlename'] : '';
      $person->last_name = $this->data['lastname'];
      $person->middle_last_name = (isset($this->data['middlelastname'])) ? $this->data['middlelastname'] : '';
      $person->country_id = $this->country;
      $person->department_id = $this->department;
      $person->municipality_id = $this->municipality;
      $person->city_id = $this->city;
      $person->neighborhood_id = $this->location;
      $person->postal_id = $this->postal;
      $person->address = $this->data['address'];
      $person->phone = $this->data['phone'];
      $person->email = $this->data['email'];
      if ($person->save()) {
        $this->dispatch('swal:modal', [
          'type' => 'success',
          'message' => __('Registration Successfully Updated'),
          'timer' => 1500,
          'showConfirmButton' => false,
          'success' => true
        ]);

        $this->dispatch('save');
        $this->modal = false;
      }
    }
  }

  public function delete($id)
  {
    $register = ModelsProviders::find($id);
    if ($register->deleteOrFail()) {
      Person::where('provider_id', $register->id)->delete();
      Legal::where('provider_id', $register->id)->delete();
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Deleted Record'),
        'timer' => 1500,
        'showConfirmButton' => false
      ]);

      $this->dispatch('changes_data');
    }
  }

  public function render()
  {
    $providers = ModelsProviders::with('personal', 'legal', 'status:id,name', 'legal.city:id,name', 'legal.municipality:id,name', 'legal.department:id,name', 'legal.country:id,name', 'legal.neighborhood:id,name', 'legal.postal:id,name', 'personal.city:id,name', 'personal.municipality:id,name', 'personal.department:id,name', 'personal.country:id,name', 'personal.neighborhood:id,name', 'personal.postal:id,name', 'personal.identification:id,name')->paginate(15);

    return view('livewire.configurations.human-resources.providers', compact('providers'));
  }
}
