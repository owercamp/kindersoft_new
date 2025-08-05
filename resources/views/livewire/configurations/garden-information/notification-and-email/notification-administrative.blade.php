<div>
    <x-slot name="header">
        <h2 class="px-4 text-end text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('Notifications and Mail') }} >
            {{ __('Administrative Notifications') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white px-5 py-6 shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div x-data="{ 'showModal': false }" class="flex justify-center">
                    <!-- Trigger for Modal -->
                    <x-button type="button" @click="showModal = true"
                        class="mx-auto flex flex-row bg-green-800 text-white hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        {{ __('Create') }}</x-button>

                    <!-- Modal -->
                    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                        x-show="showModal" id="modal">
                        <!-- Modal inner -->
                        <div class="mx-auto max-h-[42rem] w-9/12 max-w-3xl overflow-y-auto rounded bg-white px-6 py-4 text-left text-gray-800 shadow-lg dark:bg-gray-800 dark:text-gray-200"
                            x-transition:enter="motion-safe:ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100">
                            <!-- Title / Close-->
                            <div class="my-4 flex items-center justify-between">
                                <h5 class="mr-3 max-w-none text-gray-800 dark:text-gray-200"> {{ __('Create') }}
                                    {{ __('Template') }} </h5>

                                <button type="button" class="z-50 cursor-pointer" @click="showModal = false"
                                    id="closedModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <hr>

                            @include('livewire.configurations.garden-information.notification-and-email.partials._partial-form')

                        </div>
                    </div>
                </div>

                {{-- this is the table --}}
                <div class="mt-3 flex flex-row">
                    <div class="w-full">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                            <thead
                                class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Shipping address') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Message') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <hr class="mx-auto mb-3 h-1 rounded border-0 bg-blue-400 dark:bg-gray-700">
                        <div class="mt-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
