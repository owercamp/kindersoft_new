<?php

namespace App\Livewire\Configurations;

use App\Models\City;
use App\Models\Postal;
use App\Models\Country;
use Livewire\Component;
use App\Models\Departament;
use App\Models\GeneralInformation as ModelsGeneralInformation;
use App\Models\Headquarter;
use Illuminate\Support\Arr;
use App\Models\Municipality;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\Auth;

class GeneralInformation extends Component
{

  public $company;
  public $commercial;
  public $nit;
  public $dv;
  public $email;
  public $website;
  public $count;
  public $infoHeadquarters = [
    'headquarters' => [],
    'countryNumber' => [],
    'country' => [],
    'departmentNumber' => [],
    'department' => [],
    'municipalityNumber' => [],
    'municipality' => [],
    'cityNumber' => [],
    'city' => [],
    'neighborhoodNumber' => [],
    'neighborhood' => [],
    'zipcodeNumber' => [],
    'zipcode' => [],
    'address' => [],
    'phone' => [],
    'ids' => []
  ];
  public $countrys = [];
  public $departments = [];
  public $municipalities = [];
  public $cities = [];
  public $postals = [];
  public $zipcodes = [];
  public $neighborhoods = [];
  public $address = [];
  public $phones = [];
  public $form = [
    'headquarters' => '',
    'country' => '',
    'department' => '',
    'municipality' => '',
    'city' => '',
    'neighborhood' => '',
    'zipcode' => '',
    'address' => '',
    'phone' => ''
  ];

  public function mount()
  {
    $information_general = ModelsGeneralInformation::with('headquarters')->where('id', 1)->first();

    if ($information_general) {
      $this->company = $information_general->company;
      $this->commercial = $information_general->commercial;
      $this->nit = $information_general->nit;
      $this->dv = $information_general->dv;
      $this->email = $information_general->email;
      $this->website = $information_general->website;
      $this->count = $information_general->number_locations;
      $this->countrys = Arr::sort(Country::pluck('name', 'id')->toArray());
      if ($information_general->number_locations > 0) {
        foreach ($information_general->headquarters->toArray() as $key => $value) {
          // dd($information_general->headquarters->toArray());
          array_push($this->infoHeadquarters['headquarters'], ucfirst($value['headquarters']));

          // countries
          array_push($this->infoHeadquarters['countryNumber'], $value['country_id']);
          $country_selected = Country::Where('id', $value['country_id'])->value('name');
          array_push($this->infoHeadquarters['country'], $country_selected);
          // departments
          array_push($this->infoHeadquarters['departmentNumber'], $value['department_id']);
          $department_selected = Departament::Where('id', $value['department_id'])->value('name');
          array_push($this->infoHeadquarters['department'], $department_selected);
          // municipalities
          array_push($this->infoHeadquarters['municipalityNumber'], $value['municipality_id']);
          $municipality_selected = Municipality::Where('id', $value['municipality_id'])->value('name');
          array_push($this->infoHeadquarters['municipality'], $municipality_selected);
          // cities
          array_push($this->infoHeadquarters['cityNumber'], $value['city_id']);
          $city_selected = City::Where('id', $value['city_id'])->value('name');
          array_push($this->infoHeadquarters['city'], $city_selected);
          // neighborhoods
          array_push($this->infoHeadquarters['neighborhoodNumber'], $value['neighborhood_id']);
          $neighborhood_selected = Neighborhood::Where('id', $value['neighborhood_id'])->value('name');
          array_push($this->infoHeadquarters['neighborhood'], $neighborhood_selected);
          // postal
          array_push($this->infoHeadquarters['zipcodeNumber'], $value['postal_id']);
          $zipcode_selected = Postal::Where('id', $value['postal_id'])->value('name');
          array_push($this->infoHeadquarters['zipcode'], $zipcode_selected);

          array_push($this->infoHeadquarters['address'], $value['address']);
          array_push($this->infoHeadquarters['phone'], $value['phone']);
          array_push($this->infoHeadquarters['ids'], $value['id']);
        }
      }
    } else {
      $this->company = "";
      $this->commercial = "";
      $this->nit = "";
      $this->dv = "";
      $this->email = "";
      $this->website = "";
      $this->count = 0;
      $this->countrys = Arr::sort(Country::pluck('name', 'id')->toArray());
    }
    // dd($information_general);
  }

  public function add()
  {
    $this->validate([
      'form.headquarters' => 'required|max:50',
      'form.country' => 'required|exists:countries,id',
      'form.department' => 'required|exists:departaments,id',
      'form.municipality' => 'required|exists:municipalities,id',
      'form.city' => 'required|exists:cities,id',
      'form.neighborhood' => 'required|exists:neighborhoods,id',
      'form.zipcode' => 'required|exists:postals,id',
      'form.address' => 'required|max:100',
      'form.phone' => 'required|max:10',
    ], [], [
      'form.headquarters' => __('Headquarters'),
      'form.country' => __('Country'),
      'form.department' => __('Department'),
      'form.municipality' => __('Municipality'),
      'form.city' => __('City'),
      'form.neighborhood' => __('Neighborhood'),
      'form.zipcode' => __('Zip Code'),
      'form.address' => __('Address'),
      'form.phone' => __('Phone'),
    ]);

    array_push($this->infoHeadquarters['headquarters'], ucfirst($this->form['headquarters']));

    // countries
    array_push($this->infoHeadquarters['countryNumber'], $this->form['country']);
    $country_selected = Country::Where('id', $this->form['country'])->value('name');
    array_push($this->infoHeadquarters['country'], $country_selected);
    // departments
    array_push($this->infoHeadquarters['departmentNumber'], $this->form['department']);
    $department_selected = Departament::Where('id', $this->form['department'])->value('name');
    array_push($this->infoHeadquarters['department'], $department_selected);
    // municipalities
    array_push($this->infoHeadquarters['municipalityNumber'], $this->form['municipality']);
    $municipality_selected = Municipality::Where('id', $this->form['municipality'])->value('name');
    array_push($this->infoHeadquarters['municipality'], $municipality_selected);
    // cities
    array_push($this->infoHeadquarters['cityNumber'], $this->form['city']);
    $city_selected = City::Where('id', $this->form['city'])->value('name');
    array_push($this->infoHeadquarters['city'], $city_selected);
    // neighborhoods
    array_push($this->infoHeadquarters['neighborhoodNumber'], $this->form['neighborhood']);
    $neighborhood_selected = Neighborhood::Where('id', $this->form['neighborhood'])->value('name');
    array_push($this->infoHeadquarters['neighborhood'], $neighborhood_selected);
    // postal
    array_push($this->infoHeadquarters['zipcodeNumber'], $this->form['zipcode']);
    $zipcode_selected = Postal::Where('id', $this->form['zipcode'])->value('name');
    array_push($this->infoHeadquarters['zipcode'], $zipcode_selected);

    array_push($this->infoHeadquarters['address'], $this->form['address']);
    array_push($this->infoHeadquarters['phone'], $this->form['phone']);


    $this->form = [
      'headquarters' => '',
      'country' => '',
      'department' => '',
      'municipality' => '',
      'city' => '',
      'neighborhood' => '',
      'zipcode' => '',
      'address' => '',
      'phone' => ''
    ];

    $this->dispatch('clean');
  }

  public function changeCountry()
  {
    $this->departments = [];
    $this->departments = Arr::sort(Departament::where('country_id', $this->form['country'])->pluck('name', 'id')->toArray());
  }

  public function changeDepartment()
  {
    $this->municipalities = [];
    $this->municipalities = Arr::sort(Municipality::where('departament_id', $this->form['department'])->pluck('name', 'id')->toArray());
  }

  public function changeMunicipality()
  {
    $this->cities = [];
    $this->cities = Arr::sort(City::where('municipality_id', $this->form['municipality'])->pluck('name', 'id')->toArray());
  }

  public function changeCity()
  {
    $this->neighborhoods = [];
    $this->neighborhoods = Arr::sort(Neighborhood::where('city_id', $this->form['city'])->pluck('name', 'id')->toArray());
  }

  public function changeNeighborhood()
  {
    $this->zipcodes = [];
    $this->zipcodes = Arr::sort(Postal::where('neighborhood_id', $this->form['neighborhood'])->pluck('name', 'id')->toArray());
  }

  public function updating($property, $value)
  {
    if ($property === 'count' && $value < count($this->infoHeadquarters['headquarters'])) {
      $value = count($this->infoHeadquarters['headquarters']);
      $this->dispatch('Error', [
        "message" => __('The number of HEADQUARTERS cannot be less than the number of registered Headquarters.'),
        "old" => count($this->infoHeadquarters['headquarters'])
      ]);
    }
  }

  public function delete($id, $index)
  {
    foreach ($this->infoHeadquarters as $key => $value) {
      if ($key == "ids" && count($this->infoHeadquarters[$key]) > 0) {
        $head = Headquarter::select('id', 'company_id')->where('id', $id)->get()->toArray();
        $general = ModelsGeneralInformation::where('id', $head[0]['company_id']);

        $counter = $general->value('number_locations') - 1;
        $this->count = $counter;
        $general->update(['number_locations' => $counter]);
        Headquarter::destroy($id);

        unset($this->infoHeadquarters[$key][$index]);
      } elseif ($this->infoHeadquarters[$key] != "ids") {
        unset($this->infoHeadquarters[$key][$index]);
      }
    }

    $this->dispatch('deleted', [
      "counter" => $counter
    ]);
  }

  public function save()
  {
    $this->validate([
      'company' => 'required|max:50',
      'commercial' => 'required|max:50',
      'nit' => 'required|numeric|min_digits:9',
      'dv' => 'required|numeric|min_digits:1',
      'email' => 'required|email',
      'website' => 'required|url'
    ], [], [
      'company' => __('Company Name'),
      'commercial' => __('Commercial Name'),
      'nit' => __('NIT'),
      'dv' => __('DV'),
      'email' => __('Email'),
      'website' => __('Website')
    ]);

    $exists = ModelsGeneralInformation::where('id', 1)->first();

    if ($exists) {
      $exists->company = $this->company;
      $exists->commercial = $this->commercial;
      $exists->nit = $this->nit;
      $exists->dv = $this->dv;
      $exists->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
      $exists->website = filter_var($this->website, FILTER_SANITIZE_URL);
      if ($this->count == count($this->infoHeadquarters['headquarters'])) {
        $exists->number_locations = $this->count;
        if ($exists->save()) {
          foreach ($this->infoHeadquarters['headquarters'] as $key => $value) {

            if (isset($this->infoHeadquarters['ids'][$key])) {
              $headquarter = Headquarter::find($this->infoHeadquarters['ids'][$key]);

              if ($headquarter) {
                $headquarter->company_id = $exists->id;
                $headquarter->headquarters = $value;
                $headquarter->country_id = $this->infoHeadquarters['countryNumber'][$key];
                $headquarter->department_id = $this->infoHeadquarters['departmentNumber'][$key];
                $headquarter->municipality_id = $this->infoHeadquarters['municipalityNumber'][$key];
                $headquarter->city_id = $this->infoHeadquarters['cityNumber'][$key];
                $headquarter->neighborhood_id = $this->infoHeadquarters['neighborhoodNumber'][$key];
                $headquarter->postal_id = $this->infoHeadquarters['zipcodeNumber'][$key];
                $headquarter->address = $this->infoHeadquarters['address'][$key];
                $headquarter->phone = $this->infoHeadquarters['phone'][$key];
                $headquarter->save();
              } else {
                $headquarter = new Headquarter();
                $headquarter->company_id = $exists->id;
                $headquarter->headquarters = $value;
                $headquarter->country_id = $this->infoHeadquarters['countryNumber'][$key];
                $headquarter->department_id = $this->infoHeadquarters['departmentNumber'][$key];
                $headquarter->municipality_id = $this->infoHeadquarters['municipalityNumber'][$key];
                $headquarter->city_id = $this->infoHeadquarters['cityNumber'][$key];
                $headquarter->neighborhood_id = $this->infoHeadquarters['neighborhoodNumber'][$key];
                $headquarter->postal_id = $this->infoHeadquarters['zipcodeNumber'][$key];
                $headquarter->address = $this->infoHeadquarters['address'][$key];
                $headquarter->phone = $this->infoHeadquarters['phone'][$key];
                $headquarter->save();
              }
            } else {
              $headquarter = new Headquarter();
              $headquarter->company_id = $exists->id;
              $headquarter->headquarters = $value;
              $headquarter->country_id = $this->infoHeadquarters['countryNumber'][$key];
              $headquarter->department_id = $this->infoHeadquarters['departmentNumber'][$key];
              $headquarter->municipality_id = $this->infoHeadquarters['municipalityNumber'][$key];
              $headquarter->city_id = $this->infoHeadquarters['cityNumber'][$key];
              $headquarter->neighborhood_id = $this->infoHeadquarters['neighborhoodNumber'][$key];
              $headquarter->postal_id = $this->infoHeadquarters['zipcodeNumber'][$key];
              $headquarter->address = $this->infoHeadquarters['address'][$key];
              $headquarter->phone = $this->infoHeadquarters['phone'][$key];
              $headquarter->save();
            }
          }
        }
      } else {
        $exists->number_locations = count($this->infoHeadquarters['headquarters']);
        $exists->save();
      }
    } else {
      $garden = new ModelsGeneralInformation();
      $garden->company = $this->company;
      $garden->commercial = $this->commercial;
      $garden->nit = $this->nit;
      $garden->dv = $this->dv;
      $garden->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
      $garden->website = filter_var($this->website, FILTER_SANITIZE_URL);
      if ($this->count == count($this->infoHeadquarters['headquarters'])) {
        $garden->number_locations = $this->count;
        if ($garden->save()) {
          foreach ($this->infoHeadquarters['headquarters'] as $key => $value) {
            $headquarter = new Headquarter();
            $headquarter->company_id = $garden->id;
            $headquarter->headquarters = $value;
            $headquarter->country_id = $this->infoHeadquarters['countryNumber'][$key];
            $headquarter->department_id = $this->infoHeadquarters['departmentNumber'][$key];
            $headquarter->municipality_id = $this->infoHeadquarters['municipalityNumber'][$key];
            $headquarter->city_id = $this->infoHeadquarters['cityNumber'][$key];
            $headquarter->neighborhood_id = $this->infoHeadquarters['neighborhoodNumber'][$key];
            $headquarter->postal_id = $this->infoHeadquarters['zipcodeNumber'][$key];
            $headquarter->address = $this->infoHeadquarters['address'][$key];
            $headquarter->phone = $this->infoHeadquarters['phone'][$key];
            $headquarter->save();
          }
        }
      } else {
        $garden->number_locations = count($this->infoHeadquarters['headquarters']);
        $garden->save();
      }
    }

    $this->dispatch('swal:modal', [
      'type' => 'success',
      'message' => __('Successful storage'),
      'timer' => 3000,
      'showConfirmButton' => false
    ]);
  }

  public function render()
  {
    return view('livewire.configurations.general-information');
  }
}
