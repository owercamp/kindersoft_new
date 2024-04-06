<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('Corporate Images') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg py-8 px-5">
        <form wire:submit="save" class="flex flex-col gap-2">
          <div class="flex flex-col md:flex-row gap-2 justify-center py-2">
            <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <div class="md:flex">
                <div class="md:shrink-0">
                  @if ($logoCompanies)
                  <img class="h-48 w-full object-cover md:w-48" src="{{ $logoCompanies->temporaryUrl() }}">
                  @else
                  <img class="h-48 w-full object-cover md:w-48" src="{{ asset($logoCompaniesCurrent) }}" alt="">
                  @endif
                </div>
                <div class="p-8">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white p-1">{{ __('Corporate Logo') }}</h5>
                  <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <x-input-file wire:model='logoCompanies' wire:key="logoCompaniesKey" id="logoCompaniesKey" accept="image/jpeg" />
                    <div x-show="uploading">
                      <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                    </div>
                  </div>
                  <x-input-error for="logoCompanies" />
                </div>
              </div>
            </div>
            <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <div class="md:flex">
                <div class="md:shrink-0">
                  @if ($qrCodeWebPage)
                  <img class="h-48 w-full object-cover md:w-48" src="{{ $qrCodeWebPage->temporaryUrl() }}">
                  @else
                  <img class="h-48 w-full object-cover md:w-48" src="{{ asset($qrCodeWebPageCurrent) }}" alt="">
                  @endif
                </div>
                <div class="p-8">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white p-1">{{ __('QR Code Web Page') }}</h5>
                  <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                  <x-input-file wire:model='qrCodeWebPage' wire:key="qrCodeWebPageKey" id="qrCodeWebPageKey" accept="image/jpeg" />
                    <div x-show="uploading">
                      <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                    </div>
                  </div>
                  <x-input-error for="qrCodeWebPage" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col md:flex-row gap-2 justify-center py-2">
            <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <div class="md:flex">
                <div class="md:shrink-0">
                  @if ($qrCodeAdmissionForm)
                  <img class="h-48 w-full object-cover md:w-48" src="{{ $qrCodeAdmissionForm->temporaryUrl() }}">
                  @else
                  <img class="h-48 w-full object-cover md:w-48" src="{{ asset($qrCodeAdmissionFormCurrent) }}" alt="">
                  @endif
                </div>
                <div class="p-8">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white p-1">{{ __('QR Code Admission Form') }}</h5>
                  <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <x-input-file wire:model='qrCodeAdmissionForm' wire:key="qrCodeAdmissionFormKey" id="qrCodeAdmissionFormKey" accept="image/jpeg" />
                    <div x-show="uploading">
                      <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                    </div>
                  </div>
                  <x-input-error for="qrCodeAdmissionForm" />
                </div>
              </div>
            </div>
            <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <div class="md:flex">
                <div class="md:shrink-0">
                  @if ($qrCodeSchoolAgenda)
                  <img class="h-48 w-full object-cover md:w-48" src="{{ $qrCodeSchoolAgenda->temporaryUrl() }}">
                  @else
                  <img class="h-48 w-full object-cover md:w-48" src="{{ asset($qrCodeSchoolAgendaCurrent) }}" alt="">
                  @endif
                </div>
                <div class="p-8">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white p-1">{{ __('QR Code School Agenda') }}</h5>
                  <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <x-input-file wire:model='qrCodeSchoolAgenda' wire:key="qrCodeSchoolAgendaKey" id="qrCodeSchoolAgendaKey" accept="image/jpeg" />
                    <div x-show="uploading">
                      <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                    </div>
                  </div>
                  <x-input-error for="qrCodeSchoolAgenda" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col md:flex-row gap-2 justify-center py-2">
            <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <div class="md:flex">
                <div class="md:shrink-0">
                  @if ($qrCodeVirtualPlatform)
                  <img class="h-48 w-full object-cover md:w-48" src="{{ $qrCodeVirtualPlatform->temporaryUrl() }}">
                  @else
                  <img class="h-48 w-full object-cover md:w-48" src="{{ asset($qrCodeVirtualPlatformCurrent) }}" alt="">
                  @endif
                </div>
                <div class="p-8">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white p-1">{{ __('QR Code Virtual Platform') }}</h5>
                  <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <x-input-file wire:model='qrCodeVirtualPlatform' wire:key="qrCodeVirtualPlatformKey" id="qrCodeVirtualPlatform" accept="image/jpeg" />
                    <div x-show="uploading">
                      <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                    </div>
                  </div>
                  <x-input-error for="qrCodeVirtualPlatform" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex justify-center w-full">
            <x-button type="submit" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white font-bold py-2 px-4 rounded w-full">{{ __('Save') }}</x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('swal:modal', event => {
      let bgColor;
      let theme = document.getElementsByTagName('html')[0].classList.contains('dark') ? 'dark' : 'light';

      if (theme === 'dark') {
        bgColor = '#e9f1f6';
      } else {
        bgColor = '#9cbfff';
      }

      Swal.fire({
        icon: event.detail[0].type,
        title: event.detail[0].message,
        showConfirmButton: event.detail[0].showConfirmButton,
        timer: event.detail[0].timer,
        background: bgColor
      });
    })
  </script>
</div>