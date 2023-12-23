<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <x-authentication-card-logo />
    </x-slot>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
      {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="bg-lime-900 absolute top-0 left-0 bg-gradient-to-b from-black via-gray-900 to-lime-600 bottom-0 leading-5 h-full w-full overflow-hidden">
        <div>
          <div class="relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
            <div class="flex-row flex  self-center lg:px-14 sm:max-w-xs md:max-w-md lg:max-w-xl xl:max-w-2xl 2xl:max-w-2xl z-50 items-center">
              <div>
                <img src="{{asset("img/logo.png")}}" alt="Imagen Logo" class="min-w-[30rem] ml-[-8rem]" />
              </div>

              <div class="flex justify-center self-center z-10 ml-6">
                <div class="p-12 bg-white mx-auto rounded-3xl w-96 shadow-2xl shadow-lime-900">
                  <div class="space-y-6">
                    <x-validation-errors class="mb-4" />
                    <div>
                      <x-label for="identification" value="{{ __('Identification') }}" class="dark:text-slate-600" />
                      <x-input id="identification" class="block mt-1 w-full" type="text" name="identification" :value="old('identification')" required autofocus autocomplete="identification" placeholder="{{ __('Identification') }}" />
                    </div>
                    <div class="mt-4">
                      <x-label for="password" value="{{ __('Password') }}" class="dark:text-slate-600" />
                      <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </div>
                    <div class="block mt-4">
                      <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                      </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                      @if (Route::has('password.request'))
                      <a class="underline text-sm text-gray-600 hover:text-orange-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                      </a>
                      @endif

                      <x-button class="ms-4 dark:bg-sky-800 dark:text-zinc-50 dark:hover:bg-sky-600">
                        {{ __('Log in') }}
                      </x-button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
  </x-authentication-card>
  <x-footer />
  <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
  </svg>
</x-guest-layout>