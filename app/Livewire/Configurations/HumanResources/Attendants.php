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
  public $country, $countrys, $current_country, $current_country_id;
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
      'registerPosition' => 'required|numeric',
      'document' => 'required|string|max:30'
    ], [], [
      'registerPosition' => __('Registration'),
      'document' => __('Document Name')
    ]);

    $register = new EmploymentPosition();
    $register->register = $this->registerPosition;
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
    $this->arrayEdit['dependent'] = false;
    $this->independent = false;
    $this->arrayEdit['independent'] = false;

    $expr = ($this->contract) ? $this->contract : $this->arrayEdit['contract'];
    switch ($expr) {
      case "DEPENDIENTE":
        $this->dependent = true;
        $this->arrayEdit['dependent'] = true;
        break;
      case "INDEPENDIENTE":
        $this->independent = true;
        $this->arrayEdit['independent'] = true;
        break;
    }
  }

  public function change_country($from = "")
  {
    if ($from) {
      $this->departments = Departament::where('country_id', $this->arrayEdit['country'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->departments = Departament::where('country_id', $this->country)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_department($from = "")
  {
    if ($from) {
      $this->municipalities = Municipality::where('departament_id', $this->arrayEdit['department'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->municipalities = Municipality::where('departament_id', $this->department)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_municipality($from = "")
  {
    if ($from) {
      $this->cities = City::where('municipality_id', $this->arrayEdit['municipality'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->cities = City::where('municipality_id', $this->municipality)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_city($from = "")
  {
    if ($from) {
      $this->locations = Neighborhood::where('city_id', $this->arrayEdit['city'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->locations = Neighborhood::where('city_id', $this->city)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_location($from = "")
  {
    if ($from) {
      $this->postals = Postal::where('neighborhood_id', $this->arrayEdit['location'])->orderby('name')->pluck('name', 'id');
    } else {
      $this->postals = Postal::where('neighborhood_id', $this->location)->orderby('name')->pluck('name', 'id');
    }
  }

  public function change_academic()
  {
    $this->other_title = ($this->academic == 4) ? true : false;
    $this->arrayEdit['other_title'] = ($this->arrayEdit['academic'] == 4) ? true : false;
  }

  function change_genre()
  {
    $this->other = ($this->genre == 3) ? true : false;
    $this->arrayEdit['other'] = ($this->arrayEdit['genre'] == 3) ? true : false;
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
    $register = Attendant::with('academic', 'neighborhood', 'country', 'department', 'municipality', 'city', 'postal', 'contract_dependent', 'contract_independent', 'bloodtype', 'genre', 'nationality', 'identification')->find($id);

    $this->current_country_id = $register->country_id;
    $this->current_country = Country::where('id', $register->country_id)->value('name');
    $this->current_department = Departament::where('id', $register->department_id)->value('name');
    $this->current_municipality = Municipality::where('id', $register->municipality_id)->value('name');
    $this->current_city = City::where('id', $register->city_id)->value('name');
    $this->current_location = Neighborhood::where('id', $register->location_id)->value('name');
    $this->current_postal = Postal::where('id', $register->postal_id)->value('name');

    $this->arrayEdit['register'] = str_pad($register->register, 4, "0", STR_PAD_LEFT);
    $this->arrayEdit['identification'] = $register->type_identification_id;
    $this->arrayEdit['number_document'] = $register->number_document;
    $this->arrayEdit['firstname'] = $register->firstname;
    $this->arrayEdit['middlename'] = $register->middlename;
    $this->arrayEdit['lastname'] = $register->lastname;
    $this->arrayEdit['middlelastname'] = $register->middlelastname;
    $this->arrayEdit['country'] = $register->country_id;
    $this->arrayEdit['department'] = $register->department_id;
    $this->arrayEdit['municipality'] = $register->municipality_id;
    $this->arrayEdit['city'] = $register->city_id;
    $this->arrayEdit['address'] = $register->address;
    $this->arrayEdit['location'] = $register->location_id;
    $this->arrayEdit['postal'] = $register->postal_id;
    $this->arrayEdit['phone'] = $register->phone;
    $this->arrayEdit['email'] = $register->email;
    $this->arrayEdit['nationality'] = $register->nationality_id;
    $this->arrayEdit['genre'] = $register->genre_id;
    $this->arrayEdit['id'] = $register->id;

    if ($register->genre_id == 3) {
      $this->arrayEdit['other'] = true;
      $this->arrayEdit['other_genre'] = $register->genre_text;
    }

    $this->arrayEdit['academic'] = $register->academic_id;
    if ($register->academic_id == 4) {
      $this->arrayEdit['other_title'] = true;
      $this->arrayEdit['title_academic'] = $register->academic_text;
    }

    $this->arrayEdit['blood'] = $register->bloodtype_id;

    $this->arrayEdit['contract'] = $register->contract;

    switch ($register->contract) {
      case 'DEPENDIENTE':
        $this->arrayEdit['dependent'] = true;
        $this->arrayEdit['dep_company'] = $register->contract_dependent->company;
        $this->arrayEdit['dep_nit'] = $register->contract_dependent->nit;
        $this->arrayEdit['dep_position'] = $register->contract_dependent->position_id;
        $this->arrayEdit['dep_date_entry'] = $register->contract_dependent->date_entry;
        break;

      case 'INDEPENDIENTE':
        $this->arrayEdit['independent'] = true;
        $this->arrayEdit['indep_text'] = $register->contract_independent->description;
        break;
    }
    $this->modal = true;
  }

  public function edit()
  {
    $this->validate([
      'arrayEdit.register' => 'required|numeric',
      'arrayEdit.identification' => 'required|numeric|exists:type_identifications,id',
      'arrayEdit.number_document' => 'required|numeric|max_digits:16',
      'arrayEdit.firstname' => 'required|string',
      'arrayEdit.middlename' => 'nullable|string',
      'arrayEdit.lastname' => 'required|string',
      'arrayEdit.middlelastname' => 'nullable|string',
      'arrayEdit.country' => 'required|numeric|exists:countries,id',
      'arrayEdit.department' => 'required|numeric|exists:departaments,id',
      'arrayEdit.municipality' => 'required|numeric|exists:municipalities,id',
      'arrayEdit.city' => 'required|numeric|exists:cities,id',
      'arrayEdit.location' => 'required|numeric|exists:neighborhoods,id',
      'arrayEdit.postal' => 'required|numeric|exists:postals,id',
      'arrayEdit.address' => 'required|string',
      'arrayEdit.phone' => 'required|numeric|min:10',
      'arrayEdit.email' => 'required|email',
      'arrayEdit.nationality' => 'required|numeric|exists:countries,id',
      'arrayEdit.genre' => 'required|numeric|exists:genres,id',
      'arrayEdit.academic' => 'required|numeric|exists:academic_levels,id',
      'arrayEdit.blood' => 'required|numeric|exists:bloodtypes,id',
      'arrayEdit.contract' => 'required|string'
    ], [], [
      'arrayEdit.register' => __('Registration'),
      'arrayEdit.identification' => __('Document Type'),
      'arrayEdit.number_document' => __('Number') . " " . __('of') . " " . __('Document'),
      'arrayEdit.firstname' => __('First Name'),
      'arrayEdit.middlename' => __('Middle Name'),
      'arrayEdit.lastname' => __('Last Name'),
      'arrayEdit.middlelastname' => __('Middle Last Name'),
      'arrayEdit.country' => __('Country'),
      'arrayEdit.department' => __('Department'),
      'arrayEdit.municipality' => __('Municipality'),
      'arrayEdit.city' => __('City'),
      'arrayEdit.location' => __('Location / Neighborhood'),
      'arrayEdit.postal' => __('Zip Code'),
      'arrayEdit.address' => __('Address'),
      'arrayEdit.phone' => __('Phone'),
      'arrayEdit.email' => __('Email address'),
      'arrayEdit.nationality' => __('Nationality'),
      'arrayEdit.genre' => __('Genre'),
      'arrayEdit.academic' => __('Academic level'),
      'arrayEdit.blood' => __('Bloodtype'),
      'arrayEdit.contract' => __('Contract Work or Labor')
    ]);

    if ($this->arrayEdit['genre'] == 3) {
      $this->validate([
        'arrayEdit.other_genre' => 'required|string'
      ], [
        'arrayEdit.other_genre' => __('Please fill in the text box for gender')
      ], []);
    }

    if ($this->arrayEdit['academic'] == 4) {
      $this->validate([
        'arrayEdit.title_academic' => 'required|string'
      ], [
        'arrayEdit.title_academic' => __('Please enter the title obtained')
      ], []);
    }

    if ($this->arrayEdit['contract'] == "DEPENDIENTE") {
      $this->validate([
        'arrayEdit.dep_company' => 'required|string',
        'arrayEdit.dep_nit' => 'required|string',
        'arrayEdit.dep_position' => 'required|numeric|exists:employment_positions,id',
        'arrayEdit.dep_date_entry' => 'required|date'
      ], [], [
        'arrayEdit.dep_company' => __('Company'),
        'arrayEdit.dep_nit' => __('NIT'),
        'arrayEdit.dep_position' => __('Position'),
        'arrayEdit.dep_date_entry' => __('Date of Entry')
      ]);
    } elseif ($this->arrayEdit['contract'] == "INDEPENDIENTE") {
      $this->validate([
        'arrayEdit.indep_text' => 'required|max:500'
      ], [], [
        'arrayEdit.indep_text' => __('Date of Entry')
      ]);
    }
    $register = Attendant::with('academic', 'neighborhood', 'country', 'department', 'municipality', 'city', 'postal', 'contract_dependent', 'contract_independent', 'bloodtype', 'genre', 'nationality', 'identification')->find($this->arrayEdit['id']);


    DB::beginTransaction();
    try {
      $register->register = $this->arrayEdit['register'];
      $register->type_identification_id = $this->arrayEdit['identification'];
      $register->number_document = $this->arrayEdit['number_document'];
      $register->firstname = $this->arrayEdit['firstname'];
      $register->middlename = $this->arrayEdit['middlename'];
      $register->lastname = $this->arrayEdit['lastname'];
      $register->middlelastname = $this->arrayEdit['middlelastname'];
      $register->country_id = ($this->arrayEdit['country']) ? $this->arrayEdit['country'] : $this->current_country_id;
      $register->department_id = $this->arrayEdit['department'];
      $register->municipality_id = $this->arrayEdit['municipality'];
      $register->city_id = $this->arrayEdit['city'];
      $register->location_id = $this->arrayEdit['location'];
      $register->postal_id = $this->arrayEdit['postal'];
      $register->address = $this->arrayEdit['address'];
      $register->phone = $this->arrayEdit['phone'];
      $register->email = $this->arrayEdit['email'];
      $register->nationality_id = $this->arrayEdit['nationality'];
      $register->genre_id = $this->arrayEdit['genre'];
      if ($this->arrayEdit['genre'] != 3) {
        $register->genre_text = '';
      } elseif ($this->arrayEdit['genre'] == 3) {
        $register->genre_text = $this->arrayEdit['other_genre'];
      }

      $register->academic_id = $this->arrayEdit['academic'];
      if ($this->arrayEdit['academic'] != 4) {
        $register->academic_text = '';
      } elseif ($this->arrayEdit['academic'] == 4) {
        $register->academic_text = $this->arrayEdit['title_academic'];
      }

      if ($this->arrayEdit['contract'] == "DEPENDIENTE") {
        $register->contract = "DEPENDIENTE";
        $register->save();
        if (isset($register->contract_independent->id)) {
          IndependentContract::destroy($register->contract_independent->id);
        }
        DependentContract::UpdateOrCreate(
          ['attendant_id' => $register->id],
          ['company' => $this->arrayEdit['dep_company']],
          ['nit' => $this->arrayEdit['dep_nit']],
          ['position_id' => $this->arrayEdit['dep_position']],
          ['date_entry' => $this->arrayEdit['dep_date_entry']]
        );
      } elseif ($this->arrayEdit['contract'] == "INDEPENDIENTE") {
        $register->contract = "INDEPENDIENTE";
        $register->save();
        if (isset($register->contract_dependent->id)) {
          DependentContract::destroy($register->contract_dependent->id);
        }
        IndependentContract::UpdateOrCreate(
          ['attendant_id' => $register->id],
          ['description' => $this->arrayEdit['indep_text']]
        );
      }
      DB::commit();
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Registration Successfully Updated'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => true
      ]);
      $this->dispatch('changes_data');
      $this->modal = false;
    } catch (\Throwable $th) {
      DB::rollBack();
      $this->dispatch('swal:modal', [
        'type' => 'error',
        'message' => $th->getMessage(),
        'timer' => 4000,
        'showConfirmButton' => true
      ]);
    }
  }

  public function render()
  {
    $attendants = Attendant::with('academic', 'neighborhood')->paginate(15);
    return view('livewire.configurations.human-resources.attendants', compact('attendants'));
  }
}
