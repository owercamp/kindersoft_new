<?php

namespace App\Livewire\Informations;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\CorporateImages as ModelsCorporateImages;

class CorporateImages extends Component
{
  use WithFileUploads;

  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $logoCompanies;
  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $qrCodeWebPage;
  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $qrCodeAdmissionForm;
  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $qrCodeSchoolAgenda;
  #[Rule('nullable|image|max:2048|extensions:jpg')]
  public $qrCodeVirtualPlatform;
  public $logoCompaniesCurrent;
  public $qrCodeWebPageCurrent;
  public $qrCodeAdmissionFormCurrent;
  public $qrCodeSchoolAgendaCurrent;
  public $qrCodeVirtualPlatformCurrent;
  public $logoCompaniesKey;
  public $qrCodeWebPageKey;
  public $qrCodeAdmissionFormKey;
  public $qrCodeSchoolAgendaKey;
  public $qrCodeVirtualPlatformKey;

  public function mount()
  {
    $default = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUmWHXPIc0Z3x1m0EF13NQmf_Tmor8xp9az21M0PoxA&s';
    $logoUrlCompanies = isset(ModelsCorporateImages::where('name', __('Corporate Logo'))->first()->url_image) ? ModelsCorporateImages::where('name', __('Corporate Logo'))->first()->url_image : $default;
    $logoUrlWebPage = isset(ModelsCorporateImages::where('name', __('QR Code Web Page'))->first()->url_image) ? ModelsCorporateImages::where('name', __('QR Code Web Page'))->first()->url_image : $default;
    $logoUrlAdmissionForm = isset(ModelsCorporateImages::where('name', __('QR Code Admission Form'))->first()->url_image) ? ModelsCorporateImages::where('name', __('QR Code Admission Form'))->first()->url_image : $default;
    $logoUrlSchoolAgenda = isset(ModelsCorporateImages::where('name', __('QR Code School Agenda'))->first()->url_image) ? ModelsCorporateImages::where('name', __('QR Code School Agenda'))->first()->url_image : $default;
    $logoUrlVirtualPlatform = isset(ModelsCorporateImages::where('name', __('QR Code Virtual Platform'))->first()->url_image) ? ModelsCorporateImages::where('name', __('QR Code Virtual Platform'))->first()->url_image : $default;

    $this->logoCompaniesCurrent = $logoUrlCompanies;
    $this->qrCodeWebPageCurrent = $logoUrlWebPage;
    $this->qrCodeAdmissionFormCurrent = $logoUrlAdmissionForm;
    $this->qrCodeSchoolAgendaCurrent = $logoUrlSchoolAgenda;
    $this->qrCodeVirtualPlatformCurrent = $logoUrlVirtualPlatform;
    $this->logoCompaniesKey = rand();
    $this->qrCodeWebPageKey = rand();
    $this->qrCodeAdmissionFormKey = rand();
    $this->qrCodeSchoolAgendaKey = rand();
    $this->qrCodeVirtualPlatformKey = rand();
  }

  public function save()
  {
    $this->validate();

    $pointInit = '';
    if (config('app.env') == 'prod') {
      $pointInit = 'public';
    }else {
      $pointInit = 'storage';
    }

    if ($this->logoCompanies) {
      $name_logo = __('Corporate Logo');
      $exists = ModelsCorporateImages::where('name', $name_logo)->first();
      $name = 'logos' . DIRECTORY_SEPARATOR . uniqid() . '.' . $this->logoCompanies->extension();


      if (isset($exists)) {
        if(config('app.env') == 'prod'){
          $url_full = str_replace('/storage/','',Storage::disk('public')->url($exists->url_image));
          $url = explode('public/',str_replace('\\','/',$url_full))[1];
          Storage::delete($url);
        } else {
          $url = explode('storage/',str_replace('\\','/',$exists->url_image))[1];
          Storage::delete($url);
        }
        $exists->name = $name_logo;
        $exists->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->logoCompanies->storeAs(path: 'images', name: $name);
        $exists->save();
        $messages = __('Registration Successfully Updated');
      } else {
        $register = new ModelsCorporateImages();
        $register->name = $name_logo;
        $register->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->logoCompanies->storeAs(path: 'images', name: $name);
        $register->save();
        $messages = __('Successfully Created Record');
      }
    }

    if ($this->qrCodeWebPage) {
      $name_logo = __('QR Code Web Page');
      $exists = ModelsCorporateImages::where('name', $name_logo)->first();
      $name = 'logos' . DIRECTORY_SEPARATOR . uniqid() . '.' . $this->qrCodeWebPage->extension();

      if (isset($exists)) {
        if(config('app.env') == 'prod'){
          $url_full = str_replace('/storage/','',Storage::disk('public')->url($exists->url_image));
          $url = explode('public/',str_replace('\\','/',$url_full))[1];
          Storage::delete($url);
        } else {
          $url = explode('storage/',str_replace('\\','/',$exists->url_image))[1];
          Storage::delete($url);
        }
        $exists->name = $name_logo;
        $exists->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeWebPage->storeAs(path: 'images', name: $name);
        $exists->save();
        $messages = __('Registration Successfully Updated');
      } else {
        $register = new ModelsCorporateImages();
        $register->name = $name_logo;
        $register->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeWebPage->storeAs(path: 'images', name: $name);
        $register->save();
        $messages = __('Successfully Created Record');
      }
    }

    if ($this->qrCodeAdmissionForm) {
      $name_logo = __('QR Code Admission Form');
      $exists = ModelsCorporateImages::where('name', $name_logo)->first();
      $name = 'logos' . DIRECTORY_SEPARATOR . uniqid() . '.' . $this->qrCodeAdmissionForm->extension();

      if (isset($exists)) {
        if(config('app.env') == 'prod'){
          $url_full = str_replace('/storage/','',Storage::disk('public')->url($exists->url_image));
          $url = explode('public/',str_replace('\\','/',$url_full))[1];
          Storage::delete($url);
        } else {
          $url = explode('storage/',str_replace('\\','/',$exists->url_image))[1];
          Storage::delete($url);
        }
        $exists->name = $name_logo;
        $exists->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeAdmissionForm->storeAs(path: 'images', name: $name);
        $exists->save();
        $messages = __('Registration Successfully Updated');
      } else {
        $register = new ModelsCorporateImages();
        $register->name = $name_logo;
        $register->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeAdmissionForm->storeAs(path: 'images', name: $name);
        $register->save();
        $messages = __('Successfully Created Record');
      }
    }

    if ($this->qrCodeSchoolAgenda) {
      $name_logo = __('QR Code School Agenda');
      $exists = ModelsCorporateImages::where('name', $name_logo)->first();
      $name = 'logos' . DIRECTORY_SEPARATOR . uniqid() . '.' . $this->qrCodeSchoolAgenda->extension();

      if (isset($exists)) {
        if(config('app.env') == 'prod'){
          $url_full = str_replace('/storage/','',Storage::disk('public')->url($exists->url_image));
          $url = explode('public/',str_replace('\\','/',$url_full))[1];
          Storage::delete($url);
        } else {
          $url = explode('storage/',str_replace('\\','/',$exists->url_image))[1];
          Storage::delete($url);
        }
        $exists->name = $name_logo;
        $exists->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeSchoolAgenda->storeAs(path: 'images', name: $name);
        $exists->save();
        $messages = __('Registration Successfully Updated');
      } else {
        $register = new ModelsCorporateImages();
        $register->name = $name_logo;
        $register->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeSchoolAgenda->storeAs(path: 'images', name: $name);
        $register->save();
        $messages = __('Successfully Created Record');
      }
    }

    if ($this->qrCodeVirtualPlatform) {
      $name_logo = __('QR Code Virtual Platform');
      $exists = ModelsCorporateImages::where('name', $name_logo)->first();
      $name = 'logos' . DIRECTORY_SEPARATOR . uniqid() . '.' . $this->qrCodeVirtualPlatform->extension();

      if (isset($exists)) {
        if(config('app.env') == 'prod'){
          $url_full = str_replace('/storage/','',Storage::disk('public')->url($exists->url_image));
          $url = explode('public/',str_replace('\\','/',$url_full))[1];
          Storage::delete($url);
        } else {
          $url = explode('storage/',str_replace('\\','/',$exists->url_image))[1];
          Storage::delete($url);
        }
        $exists->name = $name_logo;
        $exists->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeVirtualPlatform->storeAs(path: 'images', name: $name);
        $exists->save();
        $messages = __('Registration Successfully Updated');
      } else {
        $register = new ModelsCorporateImages();
        $register->name = $name_logo;
        $register->url_image = $pointInit . DIRECTORY_SEPARATOR . $this->qrCodeVirtualPlatform->storeAs(path: 'images', name: $name);
        $register->save();
        $messages = __('Successfully Created Record');
      }
    }

    $this->dispatch('swal:modal', [
      'type' => 'success',
      'message' => $messages,
      'timer' => 3000,
      'showConfirmButton' => false
    ]);
    $logoCompaniesKey = rand();
    $qrCodeWebPageKey = rand();
    $qrCodeAdmissionFormKey = rand();
    $qrCodeSchoolAgendaKey = rand();
    $qrCodeVirtualPlatformKey = rand();
  }

  public function render()
  {
    return view('livewire.informations.corporate-images');
  }
}
