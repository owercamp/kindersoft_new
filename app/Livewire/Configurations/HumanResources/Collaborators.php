<?php

namespace App\Livewire\Configurations\HumanResources;

use App\Models\City;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Departament;
use App\Models\Collaborator;
use App\Models\Municipality;
use App\Models\Neighborhood;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Collaborators extends Component
{

  use WithFileUploads;
  use WithPagination;

  public $register, $type_ids, $identification, $number_document, $firstname, $middlename, $lastname, $middlelastname, $email;
  public $country, $countrys, $current_country;
  public $department, $departments, $current_department;
  public $municipality, $municipalities, $current_municipality;
  public $city, $cities, $current_city;
  public $location, $locations, $current_location;
  public $postal, $postals, $current_postal;
  public $address, $phone;
  #[Rule('nullable|file|extensions:pdf')]
  public $curriculum;
  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $photo;
  public $modal = false;
  public $editArray = [
    'register' => '',
    'identification' => '',
    'number_document' => '',
    'firstname' => '',
    'middlename' => '',
    'lastname' => '',
    'middlelastname' => '',
    'country' => '',
    'countryorigin' => '',
    'department' => '',
    'municipality' => '',
    'city' => '',
    'location' => '',
    'postal' => '',
    'address' => '',
    'phone' => '',
    'email' => '',
    'photo' => '',
    'curriculum' => '',
    'id' => ''
  ];

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

  public function increment()
  {
    $registers = DB::table('collaborators')->latest('register')->value('register') + 1;
    $this->register = str_pad($registers, 4, '0', STR_PAD_LEFT);
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

  public function save()
  {
    $this->validate([
      'register' => 'required|numeric',
      'identification' => 'required|numeric|exists:type_identifications,id',
      'number_document' => 'required|numeric|max_digits:15',
      'firstname' => 'required|string',
      'middlename' => 'required|string',
      'lastname' => 'required|string',
      'middlelastname' => 'required|string',
      'country' => 'required|numeric|exists:countries,id',
      'department' => 'required|numeric|exists:departaments,id',
      'municipality' => 'required|numeric|exists:municipalities,id',
      'city' => 'required|numeric|exists:cities,id',
      'location' => 'required|numeric|exists:neighborhoods,id',
      'postal' => 'required|numeric|exists:postals,id',
      'address' => 'required|string',
      'phone' => 'required|numeric|min:10',
      'email' => 'required|email',
    ], [], [
      'register' => __('Registration'),
      'identification' => __('Document Type'),
      'number_document' => __('Number') . " " . __('Document'),
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
      'email' => __('Email address')
    ]);

    $pointInit = '';
    if (config('app.env') == 'prod') {
      $pointInit = 'public';
    } else {
      $pointInit = 'storage';
    }

    $curriculum_name = '';
    if ($this->curriculum) {
      $curriculum_name = 'curriculums' . DIRECTORY_SEPARATOR . $this->curriculum->getClientOriginalName();
    }

    $photo_name = '';
    if ($this->photo) {
      $photo_name = 'collaborators' . DIRECTORY_SEPARATOR . $this->photo->getClientOriginalName();
    }

    $newRegister = new Collaborator();
    $newRegister->register = trim($this->register);
    $newRegister->type_identification_id = trim($this->identification);
    $newRegister->document_number = trim($this->number_document);
    $newRegister->firstname = trim($this->firstname);
    $newRegister->middlename = trim($this->middlename);
    $newRegister->lastname = trim($this->lastname);
    $newRegister->middlelastname = trim($this->middlelastname);
    $newRegister->country_id = trim($this->country);
    $newRegister->department_id = trim($this->department);
    $newRegister->city_id = trim($this->city);
    $newRegister->municipality_id = trim($this->municipality);
    $newRegister->neighborhood_id = trim($this->location);
    $newRegister->postal_id = trim($this->postal);
    $newRegister->address = trim($this->address);
    $newRegister->phone = trim($this->phone);
    $newRegister->email = trim($this->email);
    $newRegister->curriculum = $pointInit . DIRECTORY_SEPARATOR . $this->curriculum->storeAs(path: 'documents', name: $curriculum_name);
    $newRegister->photo = $pointInit . DIRECTORY_SEPARATOR . $this->photo->storeAs(path: 'photos', name: $photo_name);
    if ($newRegister->save()) {
      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Created Record'),
        'timer' => 1500,
        'showConfirmButton' => false,
        'success' => true
      ]);

      $this->dispatch('changes_data');
    }
  }

  public function delete(Collaborator $register)
  {
    $oldRegister = $register;
    if ($register->deleteOrFail()) {
      if (config('app.env') == 'prod') {
        $url_full_curriculum = str_replace('/storage/', '', Storage::disk('public')->url($oldRegister->curriculum));
        $url_curruculum = explode('public/', str_replace('\\', '/', $url_full_curriculum))[1];
        Storage::delete($url_curruculum);
        $url_full_photo = str_replace('/storage/', '', Storage::disk('public')->url($oldRegister->photo));
        $url_photo = explode('public/', str_replace('\\', '/', $url_full_photo))[1];
        Storage::delete($url_photo);
      } else {
        $url_curruculum = explode('storage/', str_replace('\\', '/', $oldRegister->curriculum))[1];
        Storage::delete($url_curruculum);
        $url_photo = explode('storage/', str_replace('\\', '/', $oldRegister->photo))[1];
        Storage::delete($url_photo);
      }

      $this->dispatch('swal:modal', [
        'type' => 'success',
        'message' => __('Successfully Deleted Record'),
        'timer' => 1500,
        'showConfirmButton' => false
      ]);

      $this->dispatch('changes_data');
    }
  }

  public function edit()
  {
    $this->validate([
      'editArray.register' => 'required|numeric',
      'editArray.identification' => 'required|numeric|exists:type_identifications,id',
      'editArray.number_document' => 'required|numeric|max_digits:15',
      'editArray.firstname' => 'required|string',
      'editArray.middlename' => 'required|string',
      'editArray.lastname' => 'required|string',
      'editArray.middlelastname' => 'required|string',
      'editArray.countryorigin' => 'required|numeric|exists:countries,id',
      'editArray.department' => 'required|numeric|exists:departaments,id',
      'editArray.municipality' => 'required|numeric|exists:municipalities,id',
      'editArray.city' => 'required|numeric|exists:cities,id',
      'editArray.location' => 'required|numeric|exists:neighborhoods,id',
      'editArray.postal' => 'required|numeric|exists:postals,id',
      'editArray.address' => 'required|string',
      'editArray.phone' => 'required|numeric|min:10',
      'editArray.email' => 'required|email'
    ], [], [
      'editArray.register' => __('Registration'),
      'editArray.identification' => __('Document Type'),
      'editArray.number_document' => __('Number') . ' ' . __('Document'),
      'editArray.firstname' => __('First Name'),
      'editArray.middlename' => __('Middle Name'),
      'editArray.lastname' => __('Last Name'),
      'editArray.middlelastname' => __('Middle Last Name'),
      'editArray.countryorigin' => __('Country'),
      'editArray.department' => __('Department'),
      'editArray.municipality' => __('Municipality'),
      'editArray.city' => __('City'),
      'editArray.location' => __('Location / Neighborhood'),
      'editArray.postal' => __('Zip Code'),
      'editArray.address' => __('Address'),
      'editArray.phone' => __('Phone'),
      'editArray.email' => __('Email address')
    ]);

    $pointInit = '';
    if (config('app.env') == 'prod') {
      $pointInit = 'public';
    } else {
      $pointInit = 'storage';
    }

    $register = Collaborator::find($this->editArray['id']);
    $register->register = trim($this->editArray['register']);
    $register->type_identification_id = trim($this->editArray['identification']);
    $register->document_number = trim($this->editArray['number_document']);
    $register->firstname = trim($this->editArray['firstname']);
    $register->middlename = trim($this->editArray['middlename']);
    $register->lastname = trim($this->editArray['lastname']);
    $register->middlelastname = trim($this->editArray['middlelastname']);
    $coun = ($this->editArray['country'] != "") ? $this->editArray['country'] : $this->editArray['countryorigin'];
    $register->country_id = trim($coun);
    $register->department_id = trim($this->editArray['department']);
    $register->city_id = trim($this->editArray['city']);
    $register->municipality_id = trim($this->editArray['municipality']);
    $register->neighborhood_id = trim($this->editArray['location']);
    $register->postal_id = trim($this->editArray['postal']);
    $register->address = trim($this->editArray['address']);
    $register->phone = trim($this->editArray['phone']);
    $register->email = trim($this->editArray['email']);

    $curriculum_name = '';
    if ($this->curriculum) {
      $curriculum_name = 'curriculums' . DIRECTORY_SEPARATOR . $this->curriculum->getClientOriginalName();
      if (config('app.env') == 'prod') {
        $url_full_curriculum = str_replace('/storage/', '', Storage::disk('public')->url($this->editArray['curriculum']));
        $url_curruculum = explode('public/', str_replace('\\', '/', $url_full_curriculum))[1];
        Storage::delete($url_curruculum);
      } else {
        $url_curruculum = explode('storage/', str_replace('\\', '/', $this->editArray['curriculum']))[1];
        Storage::delete($url_curruculum);
      }
      $register->curriculum = $pointInit . DIRECTORY_SEPARATOR . $this->curriculum->storeAs(path: 'documents', name: $curriculum_name);
    } else {
      $register->curriculum = $this->editArray['curriculum'];
    }

    $photo_name = '';
    if ($this->photo) {
      $photo_name = 'collaborators' . DIRECTORY_SEPARATOR . $this->photo->getClientOriginalName();
      if (config('app.env') == 'prod') {
        $url_full_photo = str_replace('/storage/', '', Storage::disk('public')->url($this->editArray['photo']));
        $url_photo = explode('public/', str_replace('\\', '/', $url_full_photo))[1];
        Storage::delete($url_photo);
      } else {
        $url_photo = explode('storage/', str_replace('\\', '/', $this->editArray['photo']))[1];
        Storage::delete($url_photo);
      }
      $register->photo = $pointInit . DIRECTORY_SEPARATOR . $this->photo->storeAs(path: 'photos', name: $photo_name);
    } else {
      $register->photo = $this->editArray['photo'];
    }


    if ($register->save()) {
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

  public function openModal($register)
  {
    $collaborator = Collaborator::with('country:id,name', 'department:id,name', 'municipality:id,name', 'city:id,name', 'neighborhood:id,name', 'postal:id,name', 'type_identification:id,name')->where('id', $register)->get();
    // dd($collaborator);
    $this->editArray['register'] = str_pad($collaborator[0]->register, 4, "0", STR_PAD_LEFT);
    $this->editArray['identification'] = $collaborator[0]->type_identification_id;
    $this->editArray['number_document'] = $collaborator[0]->document_number;
    $this->editArray['firstname'] = $collaborator[0]->firstname;
    $this->editArray['middlename'] = $collaborator[0]->middlename;
    $this->editArray['lastname'] = $collaborator[0]->lastname;
    $this->editArray['middlelastname'] = $collaborator[0]->middlelastname;
    $this->editArray['countryorigin'] = $collaborator[0]->country_id;
    $this->editArray['department'] = $collaborator[0]->department_id;
    $this->editArray['municipality'] = $collaborator[0]->municipality_id;
    $this->editArray['city'] = $collaborator[0]->city_id;
    $this->editArray['location'] = $collaborator[0]->neighborhood_id;
    $this->editArray['postal'] = $collaborator[0]->postal_id;
    $this->editArray['address'] = $collaborator[0]->address;
    $this->editArray['phone'] = $collaborator[0]->phone;
    $this->editArray['email'] = $collaborator[0]->email;
    $this->editArray['id'] = $collaborator[0]->id;
    $this->editArray['photo'] = $collaborator[0]->photo;
    $this->editArray['curriculum'] = $collaborator[0]->curriculum;

    $this->current_country = $collaborator[0]->country->name;
    $this->current_department = $collaborator[0]->department->name;
    $this->current_municipality = $collaborator[0]->municipality->name;
    $this->current_city = $collaborator[0]->city->name;
    $this->current_location = $collaborator[0]->neighborhood->name;
    $this->current_postal = $collaborator[0]->postal->name;
    $this->modal = true;
  }

  public function render()
  {
    $registers = Collaborator::with('country:id,name', 'department:id,name', 'municipality:id,name', 'city:id,name', 'neighborhood:id,name', 'postal:id,name', 'type_identification:id,name')->paginate(10);
    $fullname = $this->firstname . " " . $this->middlename . " " . $this->lastname . " " . $this->middlelastname;
    return view('livewire.configurations.human-resources.collaborators', compact('fullname', 'registers'));
  }
}
