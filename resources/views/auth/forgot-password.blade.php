<x-guest-layout>
  <div class="bg-lime-900 absolute top-0 left-0 bg-gradient-to-b from-black via-gray-900 to-lime-600 bottom-0 leading-5 h-full w-full overflow-hidden">
    <div class="min-w-min">
      <div class="relative min-w-96 sm:flex sm:flex-row justify-center bg-transparent rounded-3xl mt-20">
        <div class="flex-col flex self-center lg:px-14 sm:max-w-xs md:max-w-md lg:max-w-xl xl:max-w-2xl 2xl:max-w-2xl z-50 items-center mt-10">
          <div class="h-20 w-20 -mb-7 z-30 rounded-[50%] bg-gradient-to-b" style="overflow: hidden;">
            <img src="{{asset("img/imagenes/shortlogo.gif")}}" alt="Imagen Logo" class="h-20 w-20 rounded-[50%]" />
          </div>
          <div class="bg-slate-100 dark:bg-gray-900 px-4 py-8 rounded-md">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
              {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
              {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
              {{ session('status') }}
            </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
              </div>

              <div class="flex items-center justify-end mt-4">
                <x-button>
                  {{ __('Email Password Reset Link') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-footer />
  <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
  </svg>
</x-guest-layout>